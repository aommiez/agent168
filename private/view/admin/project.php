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
// $xcrud->change_type('address', 'textarea');

$xcrud->columns(['name', 'image_path', 'address', 'tel_company',
// 'number_buildings', 'number_units', 'number_floors', 'center_area'
]);
$xcrud->fields([
  'name', 'image_path', 'tel_company', 'number_buildings', 'number_units', 'number_floors', 'common_area_floor',
  'has_swimming_pool', 'has_onsen', 'has_gym', 'has_garden', 'has_futsal', 'has_badminton', 'has_basketball', 'has_tennis', 'has_bowling', 'has_pool_room',
  'has_game_room', 'has_playground', 'has_meeting_room', 'has_private_butler', 'has_shuttle_bus', 'has_minimart_supermarket', 'has_restaurant',
  'has_laundry_service', 'has_private_parking', 'has_bathtub_inside_unit', 'builder_by',
  'address', 'province_id', 'district_id', 'sub_district_id', 'bts_id', 'mrt_id', 'airport_link_id',
  'location_lat', 'location_lng'
  ]);

$xcrud->relation('province_id', 'province', 'id', 'name', '');
$xcrud->relation('district_id', 'district', 'id', 'name', '','','','','','province_id','province_id');
$xcrud->relation('sub_district_id', 'sub_district', 'id', 'name', '','','','','','district_id','district_id');

$xcrud->relation('bts_id', 'bts', 'id', 'name');
$xcrud->relation('mrt_id', 'mrt', 'id', 'name');
$xcrud->relation('airport_link_id', 'airport_link', 'id', 'name');

$xcrud->change_type('has_swimming_pool', 'bool');
$xcrud->change_type('has_onsen', 'bool');
$xcrud->change_type('has_gym', 'bool');
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
$xcrud->change_type('has_shuttle_bus', 'bool');
$xcrud->change_type('has_minimart_supermarket', 'bool');
$xcrud->change_type('has_restaurant', 'bool');
$xcrud->change_type('has_laundry_service', 'bool');
$xcrud->change_type('has_private_parking', 'bool');
$xcrud->change_type('has_bathtub_inside_unit', 'bool');

$xcrud->label([
  'has_swimming_pool'=> 'Swimming Pool',
  'has_onsen'=> 'Onsen',
  'has_gym'=> 'Gym',
  'has_garden'=> 'Garden',
  'has_futsal'=> 'Futsal',
  'has_badminton'=> 'Badminton',
  'has_basketball'=> 'Basketball',
  'has_tennis'=> 'Tennis',
  'has_bowling'=> 'Bowling',
  'has_pool_room'=> 'Pool Room',
  'has_game_room'=> 'Game Room',
  'has_playground'=> 'Playground',
  'has_meeting_room'=> 'Meeting Room',
  'has_private_butler'=> 'Private Butler',
  'has_shuttle_bus'=> 'Shuttle Bus',
  'has_minimart_supermarket'=> 'Minimart Supermarket',
  'has_restaurant'=> 'Restaurant',
  'has_laundry_service'=> 'Laundry Service',
  'has_private_parking'=> 'Private Parking',
  'has_bathtub_inside_unit'=> 'Bathtub Inside Unit'
  ]);

echo $xcrud->render();
?>
<style>
@media (min-width: 768px) {
  .form-horizontal .form-group:nth-child(8),
  .form-horizontal .form-group:nth-child(9),
  .form-horizontal .form-group:nth-child(10),
  .form-horizontal .form-group:nth-child(11),
  .form-horizontal .form-group:nth-child(12),
  .form-horizontal .form-group:nth-child(13),
  .form-horizontal .form-group:nth-child(14),
  .form-horizontal .form-group:nth-child(15),
  .form-horizontal .form-group:nth-child(16),
  .form-horizontal .form-group:nth-child(17),
  .form-horizontal .form-group:nth-child(18),
  .form-horizontal .form-group:nth-child(19),
  .form-horizontal .form-group:nth-child(20),
  .form-horizontal .form-group:nth-child(21),
  .form-horizontal .form-group:nth-child(22),
  .form-horizontal .form-group:nth-child(23),
  .form-horizontal .form-group:nth-child(24),
  .form-horizontal .form-group:nth-child(25),
  .form-horizontal .form-group:nth-child(26),
  .form-horizontal .form-group:nth-child(27) {
    width: 30%;
    display: inline-block;
    margin-left: 3%;
  }
  .form-horizontal .form-group:nth-child(8) .col-sm-9,
  .form-horizontal .form-group:nth-child(9) .col-sm-9,
  .form-horizontal .form-group:nth-child(10) .col-sm-9,
  .form-horizontal .form-group:nth-child(11) .col-sm-9,
  .form-horizontal .form-group:nth-child(12) .col-sm-9,
  .form-horizontal .form-group:nth-child(13) .col-sm-9,
  .form-horizontal .form-group:nth-child(14) .col-sm-9,
  .form-horizontal .form-group:nth-child(15) .col-sm-9,
  .form-horizontal .form-group:nth-child(16) .col-sm-9,
  .form-horizontal .form-group:nth-child(17) .col-sm-9,
  .form-horizontal .form-group:nth-child(18) .col-sm-9,
  .form-horizontal .form-group:nth-child(19) .col-sm-9,
  .form-horizontal .form-group:nth-child(20) .col-sm-9,
  .form-horizontal .form-group:nth-child(21) .col-sm-9,
  .form-horizontal .form-group:nth-child(22) .col-sm-9,
  .form-horizontal .form-group:nth-child(23) .col-sm-9,
  .form-horizontal .form-group:nth-child(24) .col-sm-9,
  .form-horizontal .form-group:nth-child(25) .col-sm-9,
  .form-horizontal .form-group:nth-child(26) .col-sm-9,
  .form-horizontal .form-group:nth-child(27) .col-sm-9 {
    width: 30%;
  }
  .form-horizontal .form-group:nth-child(8) .col-sm-3,
  .form-horizontal .form-group:nth-child(9) .col-sm-3,
  .form-horizontal .form-group:nth-child(10) .col-sm-3,
  .form-horizontal .form-group:nth-child(11) .col-sm-3,
  .form-horizontal .form-group:nth-child(12) .col-sm-3,
  .form-horizontal .form-group:nth-child(13) .col-sm-3,
  .form-horizontal .form-group:nth-child(14) .col-sm-3,
  .form-horizontal .form-group:nth-child(15) .col-sm-3,
  .form-horizontal .form-group:nth-child(16) .col-sm-3,
  .form-horizontal .form-group:nth-child(17) .col-sm-3,
  .form-horizontal .form-group:nth-child(18) .col-sm-3,
  .form-horizontal .form-group:nth-child(19) .col-sm-3,
  .form-horizontal .form-group:nth-child(20) .col-sm-3,
  .form-horizontal .form-group:nth-child(21) .col-sm-3,
  .form-horizontal .form-group:nth-child(22) .col-sm-3,
  .form-horizontal .form-group:nth-child(23) .col-sm-3,
  .form-horizontal .form-group:nth-child(24) .col-sm-3,
  .form-horizontal .form-group:nth-child(25) .col-sm-3,
  .form-horizontal .form-group:nth-child(26) .col-sm-3,
  .form-horizontal .form-group:nth-child(27) .col-sm-3 {
    width: 70%;
  }

  .form-horizontal .form-group:nth-child(36) {
    margin-left: 14%;
  }
  .form-horizontal .form-group:nth-child(36),
  .form-horizontal .form-group:nth-child(37) {
    width: 40%;
    display: inline-block;
  }
}

</style>
