<?php
/**
 * Created by PhpStorm.
 * User: NUIZ
 * Date: 7/4/2558
 * Time: 16:32
 */

namespace Main\CTL;
use FileUpload\FileUpload;
use Main\DAO\ListDAO;
use Main\DB\Medoo\MedooFactory;
use Main\Helper\ArrayHelper;
use Main\Helper\ResponseHelper;
use Main\Helper\URL;
use Main\Helper\LastAssignManagerHelper;

/**
 * @Restful
 * @uri /api/enquiry
 */
class ApiEnquiry extends BaseCTL {
    private $table = "enquiry";
    /**
     * @GET
     */
    public function index () {
        $field = [
          "*",
          "enquiry_type.name(enquiry_type_name)",
          "enquiry_status.name(enquiry_status_name)",
          "enquiry.id"
      ];
        $join = [
            "[>]requirement"=> ["requirement_id"=> "id"],
            "[>]size_unit"=> ["size_unit_id"=> "id"],
            "[>]enquiry_type"=> ["enquiry_type_id"=> "id"],
            "[>]enquiry_status"=> ["enquiry_status_id"=> "id"]
        ];
        $where = ["AND"=> []];

        if(@$_SESSION["login"]["level_id"] == 3) {
          $where["AND"]["assign_manager_id"] = $_SESSION["login"]["id"];
        }
        else if(@$_SESSION["login"]["level_id"] == 4) {
          $where["AND"]["assign_sale_id"] = $_SESSION["login"]["id"];
        }

        $params = $this->reqInfo->params();
        if(!empty($params['match_enquiry_id'])) {
          $where["AND"]['property.inc_vat'] = $params['inc_vat'];
        }

        $where["ORDER"] = "updated_at DESC";

        if(count($where["AND"]) > 0){
            $list = ListDAO::gets($this->table, [
                "field"=> $field,
                "join"=> $join,
                "where"=> $where,
                "limit"=> 100
            ]);
        }
        else {
            $list = ListDAO::gets($this->table, [
                "field"=> $field,
                "join"=> $join,
                "limit"=> 100
            ]);
        }

        $this->_builds($list["data"]);
        return $list;
    }

    /**
     * @POST
     */
    public function add () {
        $params = $this->reqInfo->params();
        $insert = ArrayHelper::filterKey([
          "enquiry_type_id", "customer", "requirement_id", "property_type_id", "province_id", "project_id",
          "buy_budget_start", "buy_budget_end", "rent_budget_start", "rent_budget_end", "zone_id",
          "desicion_maker", "bedroom", "is_studio", "size", "size_unit_id", "bts_id", "mrt_id",
          "airport_link_id", "enquiry_status_id", "ex_location", "ptime_to_pol", "sq_furnish",
          "sq_hospital", "sq_school", "sq_park", "sq_bts", "sq_shopmall", "sq_airport", "sq_mainroad",
          "sq_other", "contact_type_id"
        ], $params);

        $insert = array_map(function($item) {
          if(is_string($item)) {
            $item = trim($item);
          }
          return $item;
        }, $insert);

        if(empty($params['comment'])) {
          return ResposenHelper::error("require comment");
        }
        $now = date('Y-m-d H:i:s');;
        $insert['created_at'] = $now;
        $insert['updated_at'] = $now;
        $insert['enquiry_no'] = $this->_generateReferenceId($insert["enquiry_type_id"]);

        $db = MedooFactory::getInstance();
        $db->pdo->beginTransaction();
        $id = $db->insert($this->table, $insert);
        if(!$id) {
           return ResponseHelper::error("Error can't add enquiry.".$db->error()[2]);
        }

        $accId = $_SESSION['login']['id'];
        $commentInsert = [
          "enquiry_id"=> $id,
          "comment"=> $params["comment"],
          "comment_by"=> $accId,
          "updated_at"=> $now
        ];

        $db->insert("enquiry_comment", $commentInsert);
        $db->update("request_contact", ["commented"=> 1], [
          "AND"=> [
            "enquiry_id"=> $id,
            "account_id"=> $accId
            ]
          ]);
        $db->pdo->commit();

        $item = $db->get($this->table, "*", ["id"=> $id]);
        return $item;
    }

    /**
     * @DELETE
     * @uri /[i:id]
     */
    public function delete() {
        $id = $this->reqInfo->urlParam("id");

        $db = MedooFactory::getInstance();
        $id = $db->delete($this->table, ["id"=> $id]);

        if(!$id){
            return ResponseHelper::error("Error can't remove property.");
        }

        return ["success"=> true];
    }

    /**
     * @POST
     * @uri /edit/[i:id]
     */
    public function edit() {
        $id = $this->reqInfo->urlParam("id");

        $params = $this->reqInfo->params();
        $set = ArrayHelper::filterKey([
          "enquiry_type_id", "customer", "requirement_id", "property_type_id", "province_id", "project_id",
          "buy_budget_start", "buy_budget_end", "rent_budget_start", "rent_budget_end", "zone_id",
          "desicion_maker", "bedroom", "is_studio", "size", "size_unit_id", "bts_id", "mrt_id",
          "airport_link_id", "enquiry_status_id", "ex_location", "ptime_to_pol", "sq_furnish",
          "sq_hospital", "sq_school", "sq_park", "sq_bts", "sq_shopmall", "sq_airport", "sq_mainroad",
          "sq_other", "contact_type_id"
        ], $params);

        $now = date('Y-m-d H:i:s');
        $set['updated_at'] = $now;

        $db = MedooFactory::getInstance();
        $db->update($this->table, $set, ['id'=> $id]);

        $accId = $_SESSION['login']['id'];
        $commentInsert = [
          "enquiry_id"=> $id,
          "comment"=> $params["comment"],
          "comment_by"=> $accId,
          "updated_at"=> $now
        ];

        $db->insert("enquiry_comment", $commentInsert);

        $item = $db->get($this->table, "*", ["id"=> $id]);
        return $item;
    }

    /**
     * @GET
     * @uri /[i:id]
     */
    public function get() {
        $id = $this->reqInfo->urlParam("id");
        $db = MedooFactory::getInstance();
        $item = $db->get($this->table, "*", ["id"=> $id]);
        $this->_build($item);
        return $item;
    }

    /**
     * @GET
     * @uri /assign_list
     */
    public function assignList()
    {
      $level_id = $_SESSION['login']['level_id'];
      $db = MedooFactory::getInstance();

      if($level_id <= 2) {
          $lastId = LastAssignManagerHelper::get();
          if(empty($lastId)) $lastId = 0;

          $next = $db->get("account", "*", [
            "AND"=> [
              "level_id"=> 3,
              "id[>]"=> $lastId
            ],
            "ORDER"=> "id ASC"
          ]);
          if(!$next) {
            $next = $db->get("account", "*", [
              "level_id"=> 3,
              "ORDER"=> "id ASC"
            ]);
          }
          $accounts = $db->select("account", "*", [
            "level_id"=> 3,
            "ORDER"=> "id ASC"
          ]);
      }
      else if($level_id = 3) {
        $las = $db->get("last_assign_sale", "*", ["manager_id"=> $_SESSION['login']['id']]);
        $lastId = !$las? 0: $las['sale_id'];

        $next = $db->get("account", "*", [
          "AND"=> [
            "level_id"=> 4,
            "manager_id"=> $_SESSION["login"]["id"],
            "id[>]"=> $lastId
          ],
          "ORDER"=> "id ASC"
        ]);
        if(!$next) {
          $next = $db->get("account", "*", [
            "AND"=> [
              "level_id"=> 4,
              "manager_id"=> $_SESSION["login"]["id"]
            ],
            "ORDER"=> "id ASC"
          ]);
        }
        $accounts = $db->select("account", "*", [
          "AND"=> [
            "level_id"=> 4,
            "manager_id"=> $_SESSION["login"]["id"]
          ],
          "ORDER"=> "id ASC"
        ]);
      }
      else {
        return ResponseHelper::error("You do not have permission");
      }

      return [
        "auto_assign"=> $next,
        "accounts"=> $accounts
        ];
    }

    /**
    * @GET
    * @uri /[i:id]/comment
    */
    public function getComments()
    {
      $id = $this->reqInfo->urlParam("id");
      $list = ListDAO::gets("enquiry_comment", [
          "field"=> [
            "enquiry_comment.*", "account.id(account_id)", "account.name", "account.email",
          ],
          "join"=> [
            "[>]account"=> ["comment_by"=> "id"]
          ],
          "limit"=> 100,
          "where"=> [
              "enquiry_id"=> $id,
              "ORDER"=> "updated_at DESC"
          ]
      ]);

      foreach($list['data'] as &$item) {
        if(is_null($item['account_id'])) {
          $item['name'] = "System";
        }
      }

      return $list;
    }

    /**
     * @POST
     * @uri /assign_manager
     */
    public function assignManager()
    {
      $params = $this->reqInfo->params();
      $id = $params['id'];

      $set = [];
      $set['assign_manager_id'] = empty($params['assign_manager_id'])? NULL: $params['assign_manager_id'];
      $set['assign_manager_at'] = $set['assign_manager_id'] == NULL? NULL: date('Y-m-d H:i:s');
      $set['assign_sale_id'] = NULL;
      $set['assign_sale_at'] = NULL;

      $db = MedooFactory::getInstance();
      $item = $db->get("enquiry", "*", ["id"=> $id]);
      $acc = $db->get("account", "*", ["id"=> $set['assign_manager_id']]);

      $db->update($this->table, $set, ['id'=> $id]);
      if(@$params['is_auto'] == 1) {
        LastAssignManagerHelper::set($set["assign_manager_id"]);
      }

      $mailContent = <<<MAILCONTENT
      Assign enquiry: {$item["enquiry_no"]} to you. please check enquiry.
MAILCONTENT;
      @mail($acc["email"], "Assign enquiry: ".$item["enquiry_no"], $mailContent);

      $item = $db->get($this->table, "*", ["id"=> $id]);

      return $item;
    }



    /**
     * @POST
     * @uri /assign_sale
     */
    public function assignSale()
    {
      $params = $this->reqInfo->params();
      $id = $params['id'];

      $set = [];
      $set['assign_sale_id'] = empty($params['assign_sale_id'])? NULL: $params['assign_sale_id'];
      $set['assign_sale_at'] = $set['assign_sale_id'] == NULL? NULL: date('Y-m-d H:i:s');

      $db = MedooFactory::getInstance();
      $item = $db->get("enquiry", "*", ["id"=> $id]);
      $acc = $db->get("account", "*", ["id"=> $set['assign_manager_id']]);

      $db->update($this->table, $set, ['id'=> $id]);
      if(@$params['is_auto'] == 1) {
        if($db->get("last_assign_sale", "*", ["manager_id"=> @$_SESSION["login"]["id"]])) {
          $db->update("last_assign_sale", ["sale_id"=> $params['assign_sale_id']]);
        }
        else {
          $db->insert("last_assign_sale", [
            "sale_id"=> $params['assign_sale_id'],
            "manager_id"=> @$_SESSION["login"]["id"]
          ]);
        }
      }

      $mailContent = <<<MAILCONTENT
      Assign enquiry: {$item["enquiry_no"]} to you. please check enquiry.
MAILCONTENT;
      @mail($acc["email"], "Assign enquiry: ".$item["enquiry_no"], $mailContent);

      $item = $db->get($this->table, "*", ["id"=> $id]);

      return $item;
    }


    /**
     * @GET
     * @uri /[i:id]/for_match
     */
    public function getForMatch()
    {
      $id = $this->reqInfo->urlParam("id");
      // $sql = "SELECT
      //   property.*,
      //   requirement.name as requirement_name,
      //   property_status.name as property_status_name,
      //   size_unit.name as size_unit_name
      //   project.name as project_name
      //     FROM property
      //     LEFT JOIN requirement ON property.requirement_id = requirement.id
      //     LEFT JOIN property_status ON property.property_status_id = property_status.id
      //     LEFT JOIN size_unit ON property.size_unit_id = size_unit.id
      //     LEFT JOIN project ON property.project_id = project.id
      //     WHERE ";

        $field = [
            "property.*",
            // "property_type.name(property_type_name)",
            // "property_type.code(property_type_code)",
            // "zone_group.name(zone_group_name)",
            "requirement.name(requirement_name)",
            "property_status.name(property_status_name)",
            // "developer.name(developer_name)",
            "size_unit.name(size_unit_name)",
            "project.name(project_name)"
        ];
        $join = [
            // "[>]property_type"=> ["property_type_id"=> "id"],
            // "[>]zone_group"=> ["zone_group_id"=> "id"],
            "[>]requirement"=> ["requirement_id"=> "id"],
            "[>]property_status"=> ["property_status_id"=> "id"],
            // "[>]developer"=> ["developer_id"=> "id"],
            "[>]size_unit"=> ["size_unit_id"=> "id"],
            "[>]project"=> ["project_id"=> "id"]
        ];

        $limit = empty($_GET['limit'])? 15: $_GET['limit'];
        $where = ["AND"=> []];

        $params = $this->reqInfo->params();
        $where["AND"]['property.match_enquiry_id'] = NULL;

        if(!empty($params['property_type_id'])){
            $where["AND"]['property.property_type_id'] = $params['property_type_id'];
        }
        if(!empty($params['bedrooms'])){
            if($params['bedrooms'] == "4+") {
              $where["AND"]['property.bedrooms[>=]'] = $params['bedrooms'];
            }
            else {
              $where["AND"]['property.bedrooms'] = $params['bedrooms'];
            }
        }
        if(!empty($params['requirement_id'])){
            $where["AND"]['property.requirement_id'] = $params['requirement_id'];
        }
        if(!empty($params['project_id'])){
            $where["AND"]['property.project_id'] = $params['project_id'];
        }
        if(!empty($params['web_status'])){
            $where["AND"]['property.web_status'] = $params['web_status'];
        }
        if(!empty($params['property_highlight_id'])){
            $where["AND"]['property.property_highlight_id'] = $params['property_highlight_id'];
        }
        if(!empty($params['feature_unit_id'])){
            $where["AND"]['property.feature_unit_id'] = $params['feature_unit_id'];
        }


        // new
        if(!empty($params['web_status'])){
            $where["AND"]['property.web_status'] = $params['web_status'];
        }
        if(!empty($params['reference_id'])){
            $where["AND"]['property.reference_id'] = $params['reference_id'];
        }
        if(!empty($params['owner'])){
            $where["AND"]['property.owner[~]'] = $params['owner'];
        }
        if((!empty($params['size_start']) || !empty($params['size_end'])) && !empty($params['size_unit_id'])){
            $where["AND"]['property.size_unit_id'] = $params['size_unit_id'];

            if(!empty($params['size_start'])) {
              $where["AND"]['property.size[>=]'] = $params['size_start'];
            }
            if(!empty($params['size_end'])) {
              $where["AND"]['property.size[<=]'] = $params['size_end'];
            }
        }

        // sell price
        if(!empty($params['sell_price_start'])) {
          $where["AND"]['property.sell_price[>=]'] = $params['sell_price_start'];
        }
        if(!empty($params['sell_price_end'])) {
          $where["AND"]['property.sell_price[<=]'] = $params['sell_price_end'];
        }

        // rent price
        if(!empty($params['rent_price_start'])) {
          $where["AND"]['property.rent_price[>=]'] = $params['rent_price_start'];
        }
        if(!empty($params['rent_price_end'])) {
          $where["AND"]['property.rent_price[<=]'] = $params['rent_price_end'];
        }

        // vat
        if(!empty($params['inc_vat'])) {
          $where["AND"]['property.inc_vat'] = $params['inc_vat'];
        }

        // address_no
        if(!empty($params['address_no'])) {
          $where["AND"]['property.address_no[~]'] = $params['address_no'];
        }

        // status
        if(!empty($params['property_status_id'])) {
          $where["AND"]['property.property_status_id'] = $params['property_status_id'];
        }

        $page = !empty($params['page'])? $params['page']: 1;
        $orderType = !empty($params['orderType'])? $params['orderType']: "DESC";
        $orderBy = !empty($params['orderBy'])? $params['orderBy']: "updated_at";
        $order = "{$orderBy} {$orderType}";

        if(count($where["AND"]) > 0){
            $where['ORDER'] = $order;
            $list = ListDAO::gets("property", [
                "field"=> $field,
                "join"=> $join,
                "where"=> $where,
                "page"=> $page,
                "limit"=> $limit
            ]);
        }
        else {
            $list = ListDAO::gets("property", [
                "field"=> $field,
                "join"=> $join,
                "page"=> $page,
                'where'=> ["ORDER"=> $order],
                "limit"=> $limit
            ]);
        }

        // $this->_proBuilds($list['data']);

        return $list;
    }

    /**
     * @POST
     * @uri /[i:id]/match
     */
    public function match()
    {
      $id = $this->reqInfo->urlParam("id");
      $params = $this->reqInfo->params();
      $db = MedooFactory::getInstance();
      foreach($params["props_id"] as $propId) {
        $db->update("property", ["match_enquiry_id"=> $id], ["id"=> $propId]);
      }
      return ["success"=> true];
    }

    /**
     * @GET
     * @uri /[i:id]/matched
     */
    public function matched()
    {
        $id = $this->reqInfo->urlParam("id");
        $field = [
            "property.*",
            "requirement.name(requirement_name)",
            "property_status.name(property_status_name)",
            "size_unit.name(size_unit_name)",
            "project.name(project_name)"
        ];
        $join = [
            "[>]requirement"=> ["requirement_id"=> "id"],
            "[>]property_status"=> ["property_status_id"=> "id"],
            "[>]size_unit"=> ["size_unit_id"=> "id"],
            "[>]project"=> ["project_id"=> "id"]
        ];

        $limit = empty($_GET['limit'])? 15: $_GET['limit'];
        $where = ["AND"=> ["property.match_enquiry_id"=> $id]];

        $page = !empty($params['page'])? $params['page']: 1;
        $orderType = !empty($params['orderType'])? $params['orderType']: "DESC";
        $orderBy = !empty($params['orderBy'])? $params['orderBy']: "updated_at";
        $order = "{$orderBy} {$orderType}";

        if(count($where["AND"]) > 0){
            $where['ORDER'] = $order;
            $list = ListDAO::gets("property", [
                "field"=> $field,
                "join"=> $join,
                "where"=> $where,
                "page"=> $page,
                "limit"=> $limit
            ]);
        }
        else {
            $list = ListDAO::gets("property", [
                "field"=> $field,
                "join"=> $join,
                "page"=> $page,
                'where'=> ["ORDER"=> $order],
                "limit"=> $limit
            ]);
        }

        $db = MedooFactory::getInstance();
        foreach($list["data"] as &$item) {
          $item["request_contact"] = $db->get("request_contact", "*", [
            "AND"=> [
              "property_id"=> $item["id"],
              "enquiry_id"=> $id,
              "account_id"=> $_SESSION['login']['id']
            ],
            "ORDER"=> 'id DESC'
          ]);
        }

        return $list;
    }

    /**
     * @POST
     * @uri /request_contact
     */
    public function requestContact()
    {
      //status_id: 1 request, 2 accept, 3 denine

      $params = $this->reqInfo->params();
      $db = MedooFactory::getInstance();

      $reqContact = $db->get("request_contact", "*", [
          "AND"=> [
            "enquiry_id"=> $params["enquiry_id"],
            "property_id"=> $params["property_id"],
            "account_id"=> $_SESSION["login"]["id"],
            "status_id"=> 1
          ]
        ]);

      if($reqContact) {
        return ResponseHelper::error("You are wait to approve from admin");
      }

      $insert = [
        "enquiry_id"=> $params["enquiry_id"],
        "property_id"=> $params["property_id"],
        "account_id"=> $_SESSION["login"]["id"],
        "status_id"=> 1,
        "created_at"=> date("Y-m-d H:i:s")
      ];
      $db->insert("request_contact", $insert);
      return ['success'=> true];

      // return $list = ListDAO::gets($this->table, [
      //     "field"=> $field,
      //     "join"=> $join,
      //     "where"=> $where,
      //     "limit"=> 100
      // ]);

    }

    /**
     * @GET
     * @uri /matched/delete/[i:id]
     */
    public function matchedDelete()
    {
      $id = $this->reqInfo->urlParam("id");
      $params = $this->reqInfo->params();
      $db = MedooFactory::getInstance();
      $db->update("property", ["match_enquiry_id"=> NULL], ["id"=> $id]);
      $db->delete("request_contact", ["property_id"=> $id]);

      return ['success'=> true];
    }

    // internal function

    private $managers = [];
    private $sales = [];

    public function getManager($id)
    {
      $db = MedooFactory::getInstance();
      $keyId = strval($id);
      if(isset($this->managers[$keyId])) {
        return $this->managers[$keyId];
      }
      else {
        $this->managers[$keyId] = $db->get("account", ["id", "name", "username", "email"], [
          "AND"=> [
            "id"=> $id,
            "level_id"=> 3
          ]
        ]);
        return $this->managers[$keyId];
      }
    }

    public function getSale($id)
    {
      $db = MedooFactory::getInstance();
      $keyId = strval($id);
      if(isset($this->sales[$keyId])) {
        return $this->sales[$keyId];
      }
      else {
        $this->sales[$keyId] = $db->get("account", ["id", "name", "username", "email"], [
          "AND"=> [
            "id"=> $id,
            "level_id"=> 4
          ]
        ]);
        return $this->sales[$keyId];
      }
    }

    public function _build(&$item)
    {
      $db = MedooFactory::getInstance();
      $item["assign_manager"] = $this->getManager($item["assign_manager_id"]);
      $item["assign_sale"] = $this->getSale($item["assign_sale_id"]);
    }

    public function _builds(&$items)
    {
      foreach($items as &$item) {
        $this->_build($item);
      }
    }



    public function _generateReferenceId($propTypeId)
    {
      $db = MedooFactory::getInstance();
      $propType = $db->get("enquiry_type", "*", ["id"=> $propTypeId]);
      if(!$propType) {
        return false;
      }

      $code = "E".$propType["code"];
      $dt = new \DateTime();
      return $this->_generateReferenceId2($code, $dt);
    }

    public function _generateReferenceId2($code, $dt) {
      $dtStr = $code.$dt->format('dmy');

      $db = MedooFactory::getInstance();
      $sql = "SELECT enquiry_no FROM enquiry WHERE SUBSTRING(enquiry_no, 1, 8) = '{$dtStr}' ORDER BY enquiry_no DESC LIMIT 1";
      $r = $db->query($sql);
      $row = $r->fetch(\PDO::FETCH_ASSOC);
      if(!empty($row)) {
        $n = substr($row['enquiry_no'], -2);
        if($n == '99') {
          $dt->add(new \DateInterval('P1D'));
          return $this->_generateReferenceId2($code, $dt);
        }
        else {
          $n = intval($n) + 1;
          return $code.$dt->format("dmy").sprintf("%02d", $n);
        }
      }
      else {
        return $code.$dt->format("dmy")."00";
      }
    }
}
