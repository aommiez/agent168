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
      $reqTypeId = empty($params['reqTypeId'])? 1: $params['reqTypeId'];
      $db = MedooFactory::getInstance();
      $stmt = $db->pdo->prepare("SELECT * FROM property
        WHERE web_status=1
        AND (requirement_id=:req1 OR requirement_id=3)
        AND property_type_id=1 LIMIT 15");

      $stmt->execute([':req1'=> $reqTypeId]);
      $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      $this->_buildItems($items);
      return new HtmlView('/list', ['items'=> $items]);
    }

    public function _buildItems(&$items)
    {
      foreach($items as &$item) {
        $item['project'] = $this->getProject($item['project_id']);

      }
    }

    public function _buildThumb(&$item) {
      $db = MedooFactory::getInstance();
      $pic = $db->get("property_image", "*", ["property_id"=> $item['id']]);
      if(!$pic) $pic['url'] = URL::absolute("/public/images/default-project.png");
      $item['picture'] = $pic;
    }

    public function getProject($id)
    {
      foreach($this->projects as $item) {
        if($item['id'] == $id) return $item;
      }

      $db = MedooFactory::getInstance();
      $project = $db->get("project", "*", ["id"=> $id]);
      if(!$project) $this->projects[] = $project;

      return $project;
    }
}
