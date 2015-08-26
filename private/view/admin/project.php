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

$xcrud->columns(['name', 'image_path', 'address', 'tel_company',
// 'number_buildings', 'number_units', 'number_floors', 'center_area'
]);
$xcrud->fields([
  'name', 'image_path', 'address', 'tel_company', 'number_buildings', 'number_units', 'number_floors', 'center_area',
  'has_swimming_pool', 'has_onsen', 'has_gyn', 'has_garden', 'has_futsal', 'has_badminton', 'has_basketball', 'has_tennis', 'has_bowling', 'has_pool_room',
  'has_game_room', 'has_playground', 'has_meeting_room', 'has_private_butler', 'has_shuttle_bus', 'has_minimart_supermarket', 'has_restaurant',
  'has_laundry_service', 'has_private_parking', 'has_bathtub_inside_unit', 'builder_by'
  ]);

$xcrud->change_type('has_swimming_pool', 'bool');
$xcrud->change_type('has_onsen', 'bool');
$xcrud->change_type('has_gyn', 'bool');
$xcrud->change_type('has_garden', 'bool');
$xcrud->change_type('has_futsal', 'bool');
$xcrud->change_type('has_badminton', 'bool');
$xcrud->change_type('has_basketball', 'bool');
$xcrud->change_type('has_tennis', 'bool');
$xcrud->change_type('has_bowling', 'bool');
$xcrud->change_type('has_pool_room', 'bool');
$xcrud->change_type('has_game_room', 'bool');
$xcrud->change_type('has_playground', 'bool');
$xcrud->change_type('has_meeting_room', 'bool');
$xcrud->change_type('has_private_butler', 'bool');
$xcrud->change_type('has_private_butler', 'bool');
$xcrud->change_type('has_shuttle_bus', 'bool');
$xcrud->change_type('has_minimart_supermarket', 'bool');
$xcrud->change_type('has_restaurant', 'bool');
$xcrud->change_type('has_laundry_service', 'bool');
$xcrud->change_type('has_private_parking', 'bool');
$xcrud->change_type('has_bathtub_inside_unit', 'bool');

echo $xcrud->render();
?>
