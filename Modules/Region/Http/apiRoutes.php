<?php
use Illuminate\Routing\Router;
/** @var Router $router */
$router->group(['prefix' => 'user'], function (Router $router) {
 
 $router->post('register', [
       'as' => 'apiController.api.register',
       'uses' => 'apiController@register',
   ]);
  $router->post('otp', [
       'as' => 'apiController.api.otp',
       'uses' => 'apiController@otp',
   ]);
  $router->get('city', [
       'as' => 'apiController.api.city',
       'uses' => 'apiController@city',
   ]);
   $router->get('banner', [
       'as' => 'apiController.api.banner',
       'uses' => 'apiController@banner',
   ]);
    $router->get('towingtype', [
       'as' => 'apiController.api.towingtype',
       'uses' => 'apiController@towingtype',
   ]);
  
  $router->post('wallettransaction', [
       'as' => 'apiController.api.wallettransaction',
       'uses' => 'apiController@wallettransaction',
   ]);
   $router->post('locationupdateservice', [
       'as' => 'apiController.api.locationupdateservice',
       'uses' => 'apiController@locationupdateservice',
   ]);
   $router->post('locationupdatefuel', [
       'as' => 'apiController.api.locationupdatefuel',
       'uses' => 'apiController@locationupdatefuel',
   ]);
  
   $router->post('addmoneywallet', [
       'as' => 'apiController.api.addmoneywallet',
       'uses' => 'apiController@addmoneywallet',
   ]);
    $router->post('wallettransactiondisplay', [
       'as' => 'apiController.api.wallettransactiondisplay',
       'uses' => 'apiController@wallettransactiondisplay',
   ]);
   
  
$router->post('timingsupdate', [
       'as' => 'apiController.api.timingsupdate',
       'uses' => 'apiController@timingsupdate',
   ]);
$router->post('insurancebooking', [
       'as' => 'apiController.api.insurancebooking',
       'uses' => 'apiController@insurancebooking',
   ]);
$router->post('insurancebookingsuser', [
       'as' => 'apiController.api.insurancebookingsuser',
       'uses' => 'apiController@insurancebookingsuser',
   ]);
$router->post('insurancepaymentupdate', [
       'as' => 'apiController.api.insurancepaymentupdate',
       'uses' => 'apiController@insurancepaymentupdate',
   ]);
$router->post('towingpayment', [
       'as' => 'apiController.api.towingpayment',
       'uses' => 'apiController@towingpayment',
   ]);

$router->post('towingbooking', [
       'as' => 'apiController.api.towingbooking',
       'uses' => 'apiController@towingbooking',
   ]);
$router->post('towingbookingsuser', [
       'as' => 'apiController.api.towingbookingsuser',
       'uses' => 'apiController@towingbookingsuser',
   ]);


 $router->post('timingsdisplay', [
       'as' => 'apiController.api.timingsdisplay',
       'uses' => 'apiController@timingsdisplay',
   ]);
  $router->post('timingsdisplayuser', [
       'as' => 'apiController.api.timingsdisplayuser',
       'uses' => 'apiController@timingsdisplayuser',
   ]);
   $router->post('applycoupon', [
       'as' => 'apiController.api.applycoupon',
       'uses' => 'apiController@applycoupon',
   ]);
 
 $router->post('profileupdate', [
       'as' => 'apiController.api.profileupdate',
       'uses' => 'apiController@profileupdate',
   ]);
   
   $router->post('area', [
       'as' => 'apiController.api.area',
       'uses' => 'apiController@area',
   ]);
    $router->post('order_cancel', [
       'as' => 'apiController.api.order_cancel',
       'uses' => 'apiController@order_cancel',
   ]);
     $router->post('dropservicedeliverypaymentdone', [
       'as' => 'apiController.api.dropservicedeliverypaymentdone',
       'uses' => 'apiController@dropservicedeliverypaymentdone',
   ]);
       $router->post('dropservicedeliverypaymentnotdone', [
       'as' => 'apiController.api.dropservicedeliverypaymentnotdone',
       'uses' => 'apiController@dropservicedeliverypaymentnotdone',
   ]);
          $router->post('servicepaymentupdate', [
       'as' => 'apiController.api.servicepaymentupdate',
       'uses' => 'apiController@servicepaymentupdate',
   ]);
     $router->post('servicereview', [
       'as' => 'apiController.api.servicereview',
       'uses' => 'apiController@servicereview',
   ]);
       $router->post('intransitservicebiker', [
       'as' => 'apiController.api.intransitservicebiker',
       'uses' => 'apiController@intransitservicebiker',
   ]);
       
       
   
     $router->post('current_location', [
       'as' => 'apiController.api.current_location',
       'uses' => 'apiController@current_location',
   ]);
      $router->post('stores1', [
       'as' => 'apiController.api.stores1',
       'uses' => 'apiController@stores1',
   ]);
   
     $router->post('store_details', [
       'as' => 'apiController.api.store_details',
       'uses' => 'apiController@store_details',
   ]);
      $router->post('add_vehicle', [
       'as' => 'apiController.api.add_vehicle',
       'uses' => 'apiController@add_vehicle',
   ]);
      $router->post('review', [
       'as' => 'apiController.api.review',
       'uses' => 'apiController@review',
   ]);
       $router->post('review_post', [
       'as' => 'apiController.api.review_post',
       'uses' => 'apiController@review_post',
   ]);
      
        $router->post('remove_vehicle', [
       'as' => 'apiController.api.remove_vehicle',
       'uses' => 'apiController@remove_vehicle',
   ]);
           $router->post('dropaccept', [
       'as' => 'apiController.api.dropaccept',
       'uses' => 'apiController@dropaccept',
   ]);
   $router->post('dropdeliveredforpaymentdone', [
       'as' => 'apiController.api.dropdeliveredforpaymentdone',
       'uses' => 'apiController@dropdeliveredforpaymentdone',
   ]);
        $router->post('dropdeliveredforpaymentnotdone', [
       'as' => 'apiController.api.dropdeliveredforpaymentnotdone',
       'uses' => 'apiController@dropdeliveredforpaymentnotdone',
   ]);
           
        
       $router->post('myvehicles', [
       'as' => 'apiController.api.myvehicles',
       'uses' => 'apiController@myvehicles',
   ]);
        $router->post('myprofile', [
       'as' => 'apiController.api.myprofile',
       'uses' => 'apiController@myprofile',
   ]);
          $router->post('biker_profile', [
       'as' => 'apiController.api.biker_profile',
       'uses' => 'apiController@biker_profile',
   ]);
         $router->post('owner_profile', [
       'as' => 'apiController.api.owner_profile',
       'uses' => 'apiController@owner_profile',
   ]); 
      $router->post('booking', [
       'as' => 'apiController.api.booking',
       'uses' => 'apiController@booking',
   ]);
       $router->post('mybookings', [
       'as' => 'apiController.api.mybookings',
       'uses' => 'apiController@mybookings',
   ]);
        $router->post('paymentupdate', [
       'as' => 'apiController.api.paymentupdate',
       'uses' => 'apiController@paymentupdate',
   ]);
       
        $router->post('newstorebookings', [
       'as' => 'apiController.api.newstorebookings',
       'uses' => 'apiController@newstorebookings',
   ]);
      $router->post('readystorebookings', [
       'as' => 'apiController.api.readystorebookings',
       'uses' => 'apiController@readystorebookings',
   ]);
       $router->post('readystorebookings1', [
       'as' => 'apiController.api.readystorebookings1',
       'uses' => 'apiController@readystorebookings1',
   ]);
        $router->post('readystorebookings2', [
       'as' => 'apiController.api.readystorebookings2',
       'uses' => 'apiController@readystorebookings2',
   ]);
          $router->post('deliveredstorebookings', [
       'as' => 'apiController.api.deliveredstorebookings',
       'uses' => 'apiController@deliveredstorebookings',
   ]);
        
        $router->get('brand', [
       'as' => 'apiController.api.brand',
       'uses' => 'apiController@brand',
   ]);
       $router->post('model', [
       'as' => 'apiController.api.model',
       'uses' => 'apiController@model',
   ]);
        $router->post('billupload', [
       'as' => 'apiController.api.billupload',
       'uses' => 'apiController@billupload',
   ]);
       $router->post('alogin', [
       'as' => 'apiController.api.alogin',
       'uses' => 'apiController@alogin',
   ]);
        $router->post('blogin', [
       'as' => 'apiController.api.blogin',
       'uses' => 'apiController@blogin',
   ]);
      $router->post('newbookingbikerpickup', [
       'as' => 'apiController.api.newbookingbikerpickup',
       'uses' => 'apiController@newbookingbikerpickup',
   ]);
       $router->post('newbookingbikerdelivery', [
       'as' => 'apiController.api.newbookingbikerdelivery',
       'uses' => 'apiController@newbookingbikerdelivery',
   ]);
         $router->post('intransitbikerbookingpickup', [
       'as' => 'apiController.api.intransitbikerbookingpickup',
       'uses' => 'apiController@intransitbikerbookingpickup',
   ]);
      $router->post('intransitbikerbookingdelivery', [
       'as' => 'apiController.api.intransitbikerbookingdelivery',
       'uses' => 'apiController@intransitbikerbookingdelivery',
   ]);
    $router->post('bikerdeliveredpickup', [
       'as' => 'apiController.api.bikerdeliveredpickup',
       'uses' => 'apiController@bikerdeliveredpickup',
   ]);
     $router->post('bikerdelivereddrop', [
       'as' => 'apiController.api.bikerdelivereddrop',
       'uses' => 'apiController@bikerdelivereddrop',
   ]);
       $router->post('pickupimageupload', [
       'as' => 'apiController.api.pickupimageupload',
       'uses' => 'apiController@pickupimageupload',
   ]);
       $router->post('bikerdeliverystore', [
       'as' => 'apiController.api.bikerdeliverystore',
       'uses' => 'apiController@bikerdeliverystore',
   ]);
         $router->post('billupload', [
       'as' => 'apiController.api.billupload',
       'uses' => 'apiController@billupload',
   ]);
           $router->post('service', [
       'as' => 'apiController.api.service',
       'uses' => 'apiController@service',
   ]);
         $router->post('bookingservice', [
       'as' => 'apiController.api.bookingservice',
       'uses' => 'apiController@bookingservice',
   ]);    
   $router->post('newbookingservicebikerpickup', [
       'as' => 'apiController.api.newbookingservicebikerpickup',
       'uses' => 'apiController@newbookingservicebikerpickup',
   ]);
    $router->post('myservicebookings', [
       'as' => 'apiController.api.myservicebookings',
       'uses' => 'apiController@myservicebookings',
   ]);
     $router->post('dropserviceaccept', [
       'as' => 'apiController.api.dropserviceaccept',
       'uses' => 'apiController@dropserviceaccept',
   ]);
       $router->post('deliveredservicebiker', [
       'as' => 'apiController.api.deliveredservicebiker',
       'uses' => 'apiController@deliveredservicebiker',
   ]);

     
    
     
      
 });
$router->group(['prefix' => '/service', 'middleware' => ['api.token']], function (Router $router) {
   $router->group(['prefix' => 'services'], function (Router $router) {
       $router->get('/profile', [
           'as' => 'apiController.api.profile',
           'uses' => 'apiController@profile'
      ]);

     });
 });