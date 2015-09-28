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
        if(empty($params['comment'])) {
          return ResposenHelper::error("require comment");
        }
        $now = date('Y-m-d H:i:s');;
        $insert['created_at'] = $now;
        $insert['updated_at'] = $now;

        $db = MedooFactory::getInstance();
        $id = $db->insert($this->table, $insert);
        if(!$id) {
           return ResponseHelper::error("Error can't add enquiry.".$db->error()[2]);
        }

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
          "assign_to"
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
     * @uri /assign_manager_collection
     */
    public function assignManagerCollection()
    {
      $lastId = LastAssignManagerHelper::get();
      if(empty($lastId)) $lastId = 0;

      $db = MedooFactory::getInstance();
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
      $managers = $db->select("account", "*", [
        "level_id"=> 3,
        "ORDER"=> "id ASC"
      ]);
      return [
        "auto_assign"=> $next,
        "managers"=> $managers
        ];
    }

    /**
     * @POST
     * @uri /assign_manager
     */
    public function assignManager()
    {
      $params = $this->reqInfo->params();
      $id = $params['id'];

      $set = ArrayHelper::filterKey([
        "assign_to"
      ], $params);


      $db = MedooFactory::getInstance();
      $db->update($this->table, $set, ['id'=> $id]);
      LastAssignManagerHelper::set($set["assign_to"]);

      $item = $db->get($this->table, "*", ["id"=> $id]);

      return $item;
    }
}
