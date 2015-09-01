<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 7/15/14
 * Time: 11:27 AM
 */

namespace Main\CTL;


use Main\Context\Context;
use Main\Http\RequestInfo;
use Main\View\HtmlView;
use Main\View\JsonView;
use Main\ThirdParty\Xcrud\Xcrud;
use Main\DB\Medoo\MedooFactory;
use Main\Helper\URL;

/**
 * @Restful
 * @uri /list
 */
class ListCTL extends BaseCTL {

    private $projects = [];

    /**
     * @GET
     */
    public function index ()
    {
      $params = $this->reqInfo->params();
      $reqTypeId = empty($params['requirement_id'])? 0: $params['requirement_id'];
      $propTypeId = empty($params['property_type_id'])? 0: $params['property_type_id'];
      $db = MedooFactory::getInstance();
      $stmt = $db->pdo->prepare("SELECT * FROM property
        WHERE web_status=1
        AND (requirement_id=:req1 OR requirement_id=3)
        AND property_type_id=:property_type_id
        ORDER BY created_at DESC
        LIMIT 15");

      $stmt->execute([':req1'=> $reqTypeId, ':property_type_id'=> $propTypeId]);
      $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      $this->_buildItems($items);
      return new HtmlView('/list', ['items'=> $items]);
    }

    public function _buildItems(&$items)
    {
      foreach($items as &$item) {
        $item['project'] = $this->getProject($item['project_id']);
        $this->_buildThumb($item);
        $this->_buildPropertyType($item);
        $this->_buildRequirement($item);
      }
    }

    public function _buildPropertyType(&$item)
    {
      $db = MedooFactory::getInstance();
      $type = $db->get("property_type", "*", ["id"=> $item['property_type_id']]);
      $item['property_type'] = $type;
    }

    public function _buildRequirement(&$item)
    {
      $db = MedooFactory::getInstance();
      $type = $db->get("requirement", "*", ["id"=> $item['requirement_id']]);
      $item['requirement'] = $type;
    }

    public function _buildThumb(&$item)
    {
      $db = MedooFactory::getInstance();
      $pic = $db->get("property_image", "*", ["property_id"=> $item['id']]);
      if(!$pic){
        $pic = [];
        $pic['url'] = URL::absolute("/public/images/default-project.png");
      }
      else {
        $pic['url'] = URL::absolute("/public/images/upload/".$pic['name']);
      }
      $item['picture'] = $pic;
    }

    public function getProject($id)
    {
      foreach($this->projects as $item) {
        if($item['id'] == $id) return $item;
      }

      $db = MedooFactory::getInstance();
      $project = $db->get("project", "*", ["id"=> $id]);
      if($project) $this->projects[] = $project;

      return $project;
    }
}
