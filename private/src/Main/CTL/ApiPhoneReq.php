<?php

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
 * @uri /api/phonereq
 */
class ApiPhoneReq extends BaseCTL
{
  /**
   * @GET
   */
  public function index ()
  {
    $db = MedooFactory::getInstance();
    $join = [
      "[>]property"=> ["property_id"=> "id"],
      "[>]account"=> ["account_id"=> "id"],
      "[>]enquiry"=> ["enquiry_id"=> "id"],
      "[>]project"=> ["property.project_id"=> "id"],
      "[>]project(project_enq)"=> ["enquiry.project_id"=> "id"],
      "[>]account(manager)"=> ["account.manager_id"=> "id"],
      "[>]requirement(req_enq)"=> ["enquiry.requirement_id"=> "id"]
    ];
    $field = [
      "property.reference_id",
      "property.project_id",
      "property.address_no",

      "account.id",
      "account.name(sale_name)",

      "enquiry.enquiry_no",
      "enquiry.customer",
      "req_enq.name_for_enquiry(req_name_for_enquiry)",

      "project.name(project_name)",
      "project_enq.name(project_name_enq)",

      "manager.name(manager_name)",

      "request_contact.*"
    ];
    $where = [
      "ORDER"=> "request_contact.created_at DESC"
    ];
    $list = ListDAO::gets("request_contact", [
        "field"=> $field,
        "join"=> $join,
        "where"=> $where,
        "limit"=> 15
    ]);

    return $list;
  }

  /**
   * @POST
   * @uri /[i:id]/accept
   */
  public function accept()
  {
    $id = $this->reqInfo->urlParam("id");
    $db = MedooFactory::getInstance();
    $db->update("request_contact", ["status_id"=> 2], ["id"=> $id]);

    $item = $db->get("request_contact", "*", ["id"=> $id]);
    $prop = $db->get("property", "*", ["id"=> $item["property_id"]]);
    $acc = $db->get("account", "*", ["id"=> $item["account_id"]]);

    $email = $acc["email"];

    $mailContent = <<<MAILCONTENT
    Owner: {$prop["owner"]}
    ==============================
    property no: {$prop["reference_id"]}
    ==============================
MAILCONTENT;

    @mail($email, "Accept request contact property: ".$prop["reference_id"], $mailContent, "From: system@agent168th.com");

    return ["success"=> true];
  }

  /**
   * @POST
   * @uri /[i:id]/denine
   */
  public function denine()
  {
    $id = $this->reqInfo->urlParam("id");
    $db = MedooFactory::getInstance();
    $db->update("request_contact", ["status_id"=> 3], ["id"=> $id]);

    $item = $db->get("request_contact", "*", ["id"=> $id]);
    $prop = $db->get("property", "*", ["id"=> $item["property_id"]]);
    $acc = $db->get("account", "*", ["id"=> $item["account_id"]]);

    $email = $acc["email"];

    $mailContent = <<<MAILCONTENT
    Denine request
MAILCONTENT;

    @mail($email, "Denine request contact property: ".$prop["reference_id"], $mailContent, "From: system@agent168th.com");

    return ["success"=> true];
  }

  // internal function
  public function _builds(&$items)
  {
    $enqIdList = array_map(function($item){
      return $item["enquiry_id"];
    }, $items);

    $db = MedooFactory::getInstance();
    $enqs = $db->select("project", ["id", "name"], ["id"=> $enqIdList]);

    foreach($items as &$item){

    }
  }
}
