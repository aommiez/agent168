<?php
/**
 * Created by PhpStorm.
 * User: bbillboy
 * Date: 19/6/2558
 * Time: 11:35
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
 * @uri /home
 */
class HomeCTL extends BaseCTL {

    private $projects = [];

    /**
     * @GET
     */
    public function index ()
    {
      $params = $this->reqInfo->params();
      $db = MedooFactory::getInstance();
      $query = "SELECT * FROM property
        WHERE web_status=1
        AND (property_highlight_id IS NOT NULL AND property_highlight_id != 0)
        ORDER BY RAND()
        LIMIT 3";

      $stmt = $db->pdo->prepare($query);
      $stmt->execute();
      $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      $this->_buildItems($items);
      return new HtmlView('/home', ['highlight'=> $items]);
    }

    public function _buildItems(&$items)
    {
      foreach($items as &$item) {
        $item['project'] = $this->getProject($item['project_id']);
        $this->_buildThumb($item);
      }
    }

    public function _buildThumb(&$item) {
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
