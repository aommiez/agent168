<?php
/**
 *  AdminCTL.php
 *  Project : bc
 *
 *  Created by Issarapong Wongyai on 17/3/2558 16:15
 *  Copyright 2015 Issarapong Wongyai. All rights reserved.
 */

namespace Main\CTL;

use Main\Context\Context;
use Main\View\HtmlView;
use Main\View\JsonView;
use Main\View\RedirectView;
use Main\ThirdParty\Xcrud\Xcrud;
use Main\Helper\URL;
use Main\DB\Medoo\MedooFactory;

/**
 * @Restful
 * @uri /admin
 */
class AdminCTL extends BaseCTL {

    /**
     * @GET
     */
    public function index () {
      if(empty($_SESSION['login'])) {
        return new RedirectView(URL::absolute('/admin/login'));
      }
      return new HtmlView('/admin/index');
    }

    /**
     * @GET
     * @uri /login
     */
    public function getLogin () {
      unset($_SESSION['login']);
        return new HtmlView('/admin/login');
    }

    /**
     * @GET
     * @uri /[a:view]
     */
    public function indexView () {
        if(empty($_SESSION['login'])) {
          return new RedirectView(URL::absolute('/admin/login'));
        }
        $view = $this->reqInfo->urlParam("view");
        return new HtmlView('/admin/index', array("view"=>$view));
    }

    /**
     * @POST
     * @uri /login
     */
    public function postLogin () {
        $db = MedooFactory::getInstance();
        $db->get("account");

        $email = $this->reqInfo->param('email');
        $password = $this->reqInfo->param('password');
        if($email == 'admin@admin.com' && $password == '111111') {
          $_SESSION['login'] = "admin@admin.com";
          return new JsonView(["success"=> true]);
        }
        else {
          unset($_SESSION['login']);
          return new JsonView(["error"=> ["message"=> "Login failed username or password wrong"]]);
        }
    }
}
