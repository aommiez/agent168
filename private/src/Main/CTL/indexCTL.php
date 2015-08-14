<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 7/15/14
 * Time: 11:27 AM
 */

namespace Main\CTL;


use Main\Context\Context;
use Main\Helper\URL;
use Main\Http\RequestInfo;
use Main\View\HtmlView;
use Main\View\JsonView;
use Main\ThirdParty\Xcrud\Xcrud;
use Main\View\RedirectView;

/**
 * @Restful
 * @uri /
 */
class indexCTL extends BaseCTL {

    /**
     * @GET
     */
    public function index () {
        return new RedirectView(URL::absolute("/home"));
//        return new HtmlView('/index');
    }


}