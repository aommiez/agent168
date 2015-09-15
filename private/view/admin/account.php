<?php
/**
 *  collection.php
 *  Project : bc
 *
 *  Created by Issarapong Wongyai on 18/3/2558 10:41
 *  Copyright 2015 Issarapong Wongyai. All rights reserved.
 *
 *
 */

use Main\ThirdParty\Xcrud\Xcrud;

$xcrud = Xcrud::get_instance();
$xcrud->table('account');
$xcrud->where('level_id >', 2);
$xcrud->fields('created_at,last_login', true);
$xcrud->relation('level_id', 'level', 'id', 'name', 'level.id > 2');
$xcrud->relation('account_status_id', 'account_status', 'id', 'name');

function account_beforeInsert($postdata, $xcrud)
{
  $postdata->set('created_at', date('Y-m-d H:i:s'));
}
$xcrud->before_insert("account_beforeInsert");

echo $xcrud->render();
