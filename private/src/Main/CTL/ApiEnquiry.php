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
            "enquiry.*",
            "property_type.name(property_type_name)",
            "property_type.code(property_type_code)",
            "customer.firstname(customer_firstname)",
            "customer.lastname(customer_lastname)",
            "developer.name(developer_name)",
            "requirement_type.name_for_enquiry(requirement_type_name)",
            "developer.name(developer_name)",
            "size_unit.name(size_unit_name)"
        ];
        $join = [
            "[>]property_type"=> ["property_type_id"=> "id"],
            "[>]requirement_type"=> ["requirement_type_id"=> "id"],
            "[>]developer"=> ["developer_id"=> "id"],
            "[>]size_unit"=> ["size_unit_id"=> "id"],
            "[>]customer"=> ["customer_id"=> "id"]
        ];
        $where = ["AND"=> []];

        $params = $this->reqInfo->params();
        if(!empty($params['property_type_id'])){
            $where["AND"] = ['property.property_type_id'=> $params['property_type_id']];
        }
        if(!empty($params['bed_rooms'])){
            $where["AND"] = ['property.bed_rooms'=> $params['bed_rooms']];
        }
        if(!empty($params['zone_group_id'])){
            $where["AND"] = ['property.zone_group_id'=> $params['zone_group_id']];
        }
        if(!empty($params['duplex'])){
            $where["AND"] = ['property.duplex'=> $params['duplex']];
        }
        if(!empty($params['status'])){
            $where["AND"] = ['property.status'=> $params['status']];
        }
        if(!empty($params['rented_expire'])){
            $where["AND"] = ['property.rented_expire'=> $params['rented_expire']];
        }
        if(!empty($params['transfer_status'])){
            $where["AND"] = ['property.transfer_status'=> $params['transfer_status']];
        }
        if(!empty($params['requirement_type_id'])){
            if(is_array($params['requirement_type_id']) && count($params['requirement_type_id']) > 0){
                $where["AND"] = ['property.requirement_type_id'=> $params['requirement_type_id']];
            }
        }
        if(!empty($params['developer_id'])){
            $where["AND"] = ['property.developer_id'=> $params['developer_id']];
        }
        if(!empty($params['web_status'])){
            $where["AND"] = ['property.web_status'=> $params['web_status']];
        }
        if(!empty($params['property_highlight'])){
            $where["AND"] = ['property.property_highlight'=> $params['property_highlight']];
        }

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
          
        ], $params);
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = $insert['created_at'];

        $db = MedooFactory::getInstance();
        $id = $db->insert($this->table, $insert);
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
