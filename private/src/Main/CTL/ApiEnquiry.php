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
        ];
        $join = [
            "[>]property_type"=> ["property_type_id"=> "id"],
            "[>]requirement_type"=> ["requirement_type_id"=> "id"],
            "[>]size_unit"=> ["size_unit_id"=> "id"],
            "[>]customer"=> ["customer_id"=> "id"]
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
}
