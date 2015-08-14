<?php
/**
 * Created by PhpStorm.
 * User: NUIZ
 * Date: 8/5/2558
 * Time: 11:27
 */

namespace Main\CTL;
use Main\DAO\ListDAO;
use Main\DB\Medoo\MedooFactory;

/**
 * @Restful
 * @uri /api/report_property
 */

class ApiPropertyReportCTL extends BaseCTL {
    public function getByWeek(){
        $back = (int)$this->reqInfo->param('back');

        $day = date('w');
//        $day -= 1;
        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));


    }

    /**
     * @GET
     */
    public function getByBetween(){
        $start = $this->reqInfo->param('start');
        $end = $this->reqInfo->param('end');

        $db = MedooFactory::getInstance();

        $field = [
            "property.*",
            "property_type.name(property_type_name)",
            "property_type.code(property_type_code)",
            "zone_group.name(zone_group_name)",
            "requirement_type.name(requirement_type_name)",
            "developer.name(developer_name)",
            "size_unit.name(size_unit_name)"
        ];

        $join = [
            "[>]property_type"=> ["property_type_id"=> "id"],
            "[>]zone_group"=> ["zone_group_id"=> "id"],
            "[>]requirement_type"=> ["requirement_type_id"=> "id"],
            "[>]developer"=> ["developer_id"=> "id"],
            "[>]size_unit"=> ["size_unit_id"=> "id"]
        ];

        $where = [
            "AND"=> [
                "property.created_at[>=]"=> $start,
                "property.created_at[<=]"=> $end
            ]
        ];

        $list = ListDAO::gets("property", [
            "field"=> $field,
            "join"=> $join,
            "where"=> $where,
            "limit"=> 100
        ]);

        return $list;
    }
}