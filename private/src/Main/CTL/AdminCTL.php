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
use Main\ThirdParty\Xcrud\Xcrud;

/**
 * @Restful
 * @uri /admin
 */
class AdminCTL extends BaseCTL {

    /**
     * @GET
     */
    public function index () {
        return new HtmlView('/admin/index');
    }

    /**
     * @GET
     * @uri /login
     */
    public function getLogin () {
        return new HtmlView('/admin/login');
    }

    /**
     * @GET
     * @uri /[a:view]
     */
    public function indexView () {
        $view = $this->reqInfo->urlParam("view");
        return new HtmlView('/admin/index', array("view"=>$view));
    }

    /**
     * @POST
     * @uri /login
     */
    public function postLogin () {
        $email = $this->reqInfo->param('email');
        $password = $this->reqInfo->param('password');
        return new JsonView(["email"=>$email , "password" => $password]);
    }
}