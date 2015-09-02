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
use Main\Helper\URL;
use Main\DB\Medoo\MedooFactory;

/**
 * @Restful
 * @uri /property
 */
class PropertyCTL extends BaseCTL {

    /**
    * @GET
    * @uri /[:id]
    */
    public function index () {
      $id = $this->reqInfo->urlParams("id");
      $db = MedooFactory::getInstance();
      $item = $db->get("property", "*", ["id"=> $id]);
      $this->_buildItem($item);
      return new HtmlView('/property', ['item'=> $item]);
    }

    public function _buildItem(&$item)
    {
      // foreach($items as &$item) {
        $item['project'] = $this->getProject($item['project_id']);
        $this->_buildThumb($item);
        $this->_buildSizeUnit($item);
        $this->_buildRequirement($item);
        $this->_buildImages($item);
        $this->_buildPropType($item);
      // }
    }

    public function _buildPropType(&$item)
    {
      $db = MedooFactory::getInstance();
      $item['property_type'] = $db->get("property_type", "*", ["id"=> $item['property_type_id']]);
    }

    public function _buildThumb(&$item)
    {
      $db = MedooFactory::getInstance();
      $pic = $db->get("property_image", "*", ["property_id"=> $item['id']]);
      if(!$pic){
        $pic = [];
        $path = 'private/src/Main/ThirdParty/uploads/'.$item['project']['image_path'];
        if(is_file($path)) {
          $pic['url'] = URL::absolute("/".$path);
        }
        else {
          $pic['url'] = URL::absolute("/public/images/default-project.png");
        }
      }
      else {
        $pic['url'] = URL::absolute("/public/images/upload/".$pic['name']);
      }
      $item['picture'] = $pic;
    }

    public function _buildSizeUnit(&$item)
    {
      $db = MedooFactory::getInstance();
      $item['size_unit'] = $db->get("size_unit", "*", ["id"=> $item['size_unit_id']]);
    }

    public function _buildRequirement(&$item)
    {
      $db = MedooFactory::getInstance();
      $item['requirement'] = $db->get("requirement", "*", ["id"=> $item['requirement_id']]);
    }

    public function _buildImages(&$item)
    {
      $db = MedooFactory::getInstance();
      $item['images'] = $db->select("property_image", "*", ["property_id"=> $item['id']]);
      foreach ($item['images'] as &$img) {
        $img['url'] = URL::absolute("/public/images/upload/".$img['name']);
      }
    }

    private $projects = [];
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
