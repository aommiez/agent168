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
 * @uri /api/collection
 */

class ApiCollection extends BaseCTL {
    /**
     * @GET
     */
    public function index () {
        $collection = [];
        $collection['property_type'] = ListDAO::gets("property_type", [
            "limit"=> 100
        ]);

        $collection['zone_zone_group'] = ListDAO::gets("zone_zone_group", [
            "limit"=> 100
        ]);
        $collection['zone'] = ListDAO::gets("zone", [
            "limit"=> 100
        ]);
        $collection['zone_group'] = ListDAO::gets("zone_group", [
            "limit"=> 100
        ]);
//        foreach($collection['zone_group']['data'] as $key => $value){
//
//        }

        $collection['status_type'] = ListDAO::gets("status_type", [
            "limit"=> 100
        ]);

        $collection['requirement_type'] = ListDAO::gets("requirement_type", [
            "limit"=> 100
        ]);
        $collection['developer'] = ListDAO::gets("developer", [
            "limit"=> 100
        ]);
        $collection['size_unit'] = ListDAO::gets("size_unit", [
            "limit"=> 100
        ]);
        $collection['customer'] = ListDAO::gets("customer", [
            "limit"=> 100
        ]);

        /** enquiry collection */

        $collection['enquiry_status'] = ListDAO::gets("enquiry_status", [
            "limit"=> 100
        ]);
        $collection['enquiry_budget_payment'] = ListDAO::gets("enquiry_budget_payment", [
            "limit"=> 100
        ]);
        $collection['enquiry_budget_purchases'] = ListDAO::gets("enquiry_budget_purchases", [
            "limit"=> 100
        ]);
        $collection['enquiry_reason'] = ListDAO::gets("enquiry_reason", [
            "limit"=> 100
        ]);
        $collection['enquiry_plan_tobuy'] = ListDAO::gets("enquiry_plan_tobuy", [
            "limit"=> 100
        ]);

        return $collection;
    }
}