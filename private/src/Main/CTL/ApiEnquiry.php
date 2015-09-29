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
        $field = ["*",
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
          "sq_other", "contact_type_id",
          "assign_sale_id"
        ], $params);

        $now = date('Y-m-d H:i:s');
        $set['updated_at'] = $now;

        $db = MedooFactory::getInstance();
        $db->update($this->table, $set, ['id'=> $id]);

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
            "id[>]"=> $lastId
          ],
          "ORDER"=> "id ASC"
        ]);
        if(!$next) {
          $next = $db->get("account", "*", [
            "level_id"=> 4,
            "ORDER"=> "id ASC"
          ]);
        }
        $accounts = $db->select("account", "*", [
          "level_id"=> 4,
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
      $db->update($this->table, $set, ['id'=> $id]);
      if(@$params['is_auto'] == 1) {
        LastAssignManagerHelper::set($set["assign_manager_id"]);
      }

      $item = $db->get($this->table, "*", ["id"=> $id]);

      return $item;
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
}
