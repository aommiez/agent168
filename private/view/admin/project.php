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
$xcrud->table('project');
$xcrud->change_type('image_path','image','', [
  'thumbs'=> [
    ['width'=> 50, 'marker'=>'_small'],
    ['width'=> 100, 'marker'=>'_middle'],
    ['width' => 150, 'folder' => 'thumbs']
  ]
]);
$xcrud->change_type('address', 'textarea');
$xcrud->change_type('has_swimming_pool', 'bool');
$xcrud->change_type('has_onsen', 'bool', '0', ['values'=> ['no'=> 0, 'yes'=> 1]]);

$xcrud->columns(['name', 'image_path', 'address', 'tel_company',
// 'number_buildings', 'number_units', 'number_floors', 'center_area'
]);
$xcrud->fields(['name', 'image_path', 'address', 'tel_company', 'number_buildings', 'number_units', 'number_floors', 'center_area', 'has_swimming_pool', 'has_onsen']);
echo $xcrud->render();
?>
