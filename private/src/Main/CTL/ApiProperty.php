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
        $page = !empty($params['page'])? $params['page']: 1;

        if(count($where["AND"]) > 0){
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

    public function _buildImage(&$item){
        $item['url'] = URL::absolute("/public/images/upload/".$item['name']);
    }

    public function _buildImages(&$items){
        foreach($items as $key=> $value){
            $this->_buildImage($items[$key]);
        }
    }
}
