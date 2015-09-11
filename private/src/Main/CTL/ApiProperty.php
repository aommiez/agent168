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
 * @uri /api/property
 */

class ApiProperty extends BaseCTL {
    private $table = "property";
    /**
     * @GET
     */
    public function index () {
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
        $where = ["AND"=> []];

        $params = $this->reqInfo->params();
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
            $list = ListDAO::gets($this->table, [
                "field"=> $field,
                "join"=> $join,
                "where"=> $where,
                "page"=> $page,
                "limit"=> 15
            ]);
        }
        else {
            $list = ListDAO::gets($this->table, [
                "field"=> $field,
                "join"=> $join,
                "page"=> $page,
                'where'=> ["ORDER"=> $order],
                "limit"=> 15
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
            "property_type_id", "bed_rooms", "selling_price", "zone_group_id", "duplex","status", "rented_expire", "transfer_status",
            "requirement_type_id", "developer_id", "size_start", "size_end", "size_unit_id", "rental_price_start", "rental_price_end",
            "web_status", "inc_vat", "address_no", "unit_no", "property_highlight", "feature_unit"
        ], $params);
        $insert['created_at'] = date('Y-m-d H:i:s');

        $db = MedooFactory::getInstance();
        $id = $db->insert($this->table, $insert);

        if(!$id){
            return ResponseHelper::error("Error can't add property.");
        }

        $validator = new \FileUpload\Validator\Simple(1024 * 1024 * 4, ['image/png', 'image/jpg', 'image/jpeg']);
        $pathresolver = new \FileUpload\PathResolver\Simple('public/images/upload');
        $filesystem = new \FileUpload\FileSystem\Simple();
        $filenamegenerator = new \FileUpload\FileNameGenerator\Random();

        $fileupload = new \FileUpload\FileUpload($_FILES['images'], $_SERVER);
        $fileupload->setPathResolver($pathresolver);
        $fileupload->setFileSystem($filesystem);
        $fileupload->addValidator($validator);

        $fileupload->setFileNameGenerator($filenamegenerator);

        list($files, $headers) = $fileupload->processAll();

        foreach($files as $file){
            if($file->error == 0){
                $db->insert("property_image", ["property_id"=> $id, "name"=> $file->name]);
            }
        }

        $item = $db->get($this->table, "*", ["id"=> $id]);
        return $item;
    }

    /**
     * @POST
     * @uri /edit/[:id]
     */
    public function edit () {
        $id = $this->reqInfo->urlParam("id");
        $params = $this->reqInfo->params();
        // $insert = ArrayHelper::filterKey([
        //
        // ], $params);
        $set = $params;
        $set = array_map(function($item) {
          if(is_string($item)) {
            $item = trim($item);
          }
          return $item;
        }, $set);
        $set['updated_at'] = date('Y-m-d H:i:s');
        if(trim($set['contract_expire']) == "") $set['contract_expire'] = null;
        if(trim($set['rented_expire']) == "") $set['rented_expire'] = null;

        if(isset($set['comment'])) {
          unset($set['comment']);
        }

        $where = ["id"=> $id];

        $db = MedooFactory::getInstance();
        $updated = $db->update($this->table, $set, $where);

        if(!$updated){
            return ResponseHelper::error("Error can't update property.");
        }

        $commentStr = trim($params['comment']);
        $db->insert("property_comment", ["property_id"=> $id, "comment"=> $commentStr, "updated_at"=> date('Y-m-d H:i:s')]);

        return ["success"=> true];
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
     * @uri /uploadexcel
     */
    public function uploadexcel(){
        $file = $_FILES['excel'];
        $inputFileName = $file['tmp_name'];
        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFileName);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(\Exception $e) {
            return ResponseHelper::error('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $db = MedooFactory::getInstance();
        $propTypesRows = $db->select("property_type", "*");
        $propTypeCodes = [];
        foreach($propTypesRows as $value){
            $propTypeCodes[$value['name']] = $value['id'];
        }
//        var_dump($propTypeCodes); exit();
        for ($row = 2; $row <= $highestRow; $row++){
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            foreach($rowData[0] as $key => $value){
                if(is_null($value)){
                    $rowData[0][$key] = "";
                }
            }
            $id = $db->insert("property", [
                "property_type_id"=> isset($propTypeCodes[$rowData[0][18]])? $propTypeCodes[$rowData[0][18]]: 1,
                "bed_rooms"=> $rowData[0][32],
                "bath_rooms"=> $rowData[0][33],
                "selling_price"=> $rowData[0][13],
                "zone_group_id"=> 1,
                "duplex"=> 'Duplex',
                "road"=> $rowData[0][38],
                "status"=> $rowData[0][15],
                "rented_expire"=> '',
                "transfer_status"=> $rowData[0][24],
                "requirement_type_id"=> 1,
                "developer_id"=> 1,
                "size"=> $rowData[0][3],
                "size_unit_id"=> 1,
                "rental_price"=> $rowData[0][22],
                "web_status"=> $rowData[0][45],
                "inc_vat"=> $rowData[0][9]=="TRUE",
                "address_no"=> $rowData[0][29],
                "unit_no"=> '',
                "property_highlight"=> $rowData[0][40],
                "feature_unit"=> $rowData[0][46],
                "property_for_id"=> 0,
                "created_at"=> date('Y-m-d'),
                "owner"=> $rowData[0][1],
                "desired_profit"=> $rowData[0][8],
                "with_tenant"=> $rowData[0][11]=="TRUE",
                "tenant_price_per_month"=> $rowData[0][12],
                "commission"=> $rowData[0][14],
                "commission_unit"=> $rowData[0][15],
                "markup_type"=> $rowData[0][16],
                "markup_price"=> $rowData[0][17],
                "branch"=> $rowData[0][21]
            ]);
            if(!$id){
                return ResponseHelper::error($db->error());
            }
        }
    }

    /**
     * @GET
     * @uri /[i:id]/gallery
     */
    public function getGallery(){
        $id = $this->reqInfo->urlParam("id");

        $list = ListDAO::gets("property_image", [
            "limit"=> 100,
            "where"=> [
                "property_id"=> $id
            ]
        ]);

        $this->_buildImages($list["data"]);

        return $list;
    }

    /**
     * @POST
     * @uri /[i:id]/gallery
     */
    public function postGallery(){
        $id = $this->reqInfo->urlParam("id");

        $validator = new \FileUpload\Validator\Simple(1024 * 1024 * 4, ['image/png', 'image/jpg', 'image/jpeg']);
        $pathresolver = new \FileUpload\PathResolver\Simple('public/images/upload');
        $filesystem = new \FileUpload\FileSystem\Simple();
        $filenamegenerator = new \FileUpload\FileNameGenerator\Random();

        $fileupload = new \FileUpload\FileUpload($_FILES['images'], $_SERVER);
        $fileupload->setPathResolver($pathresolver);
        $fileupload->setFileSystem($filesystem);
        $fileupload->addValidator($validator);

        $fileupload->setFileNameGenerator($filenamegenerator);

        list($files, $headers) = $fileupload->processAll();

        $db = MedooFactory::getInstance();
        foreach($files as $file){
            if($file->error == 0){
                $db->insert("property_image", ["property_id"=> $id, "name"=> $file->name]);
            }
        }

        return ["success"=> true];
    }

    /**
     * @GET
     * @uri /[i:id]
     */
    public function get() {
      $id = $this->reqInfo->urlParam("id");
      $db = MedooFactory::getInstance();
      $item = $db->get("property", "*", ["id"=> $id]);
      return $item;
    }

    /**
     * @DELETE
     * @uri /[i:id]/gallery
     */
    public function deleteGallery(){
        $id = $this->reqInfo->urlParam("id");
        $params = $this->reqInfo->inputs();

        if(!is_array($params['id'])){
            $params['id'] = [$params['id']];
        }

        $db = MedooFactory::getInstance();
        foreach($params['id'] as $imgId){
            $db->delete("property_image", ["AND"=> ["property_id"=> $id, "id"=> $imgId]]);
        }

        return ["success"=> true];
    }

    /**
    * @GET
    * @uri /[i:id]/comment
    */
    public function getComments()
    {
      $id = $this->reqInfo->urlParam("id");
      $list = ListDAO::gets("property_comment", [
          "limit"=> 100,
          "where"=> [
              "property_id"=> $id
          ]
      ]);

      return $list;
    }

    public function _buildImage(&$item){
        $item['url'] = URL::absolute("/public/images/upload/".$item['name']);
    }

    public function _buildImages(&$items){
        foreach($items as $key=> $value){
            $this->_buildImage($items[$key]);
        }
    }
}
