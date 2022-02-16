<?php
namespace Modules\Region\Http\Controllers\Api;
use Modules\Core\Http\Controllers\BasePublicController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\LoginRequest;
use Illuminate\Http\Response;
use Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Modules\User\Repositories\UserRepository;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Contracts\Authentication;
use Modules\User\Entities\UserToken;
use Modules\User\Repositories\UserTokenRepository;
use Modules\User\Transformers\ApiKeysTransformer;
use Modules\User\Transformers\UserProfileTransformer;
use Modules\Appusers\Repositories\AppuserRepository;
use Modules\Region\Repositories\CityRepository;
use Modules\Region\Repositories\AreaRepository;
use Modules\Stores\Repositories\StoresRepository;
use Modules\Appusers\Repositories\uservehiRepository;
use Modules\Bookings\Repositories\NewbookingsRepository;
use Modules\Vehiclem\Repositories\BrandRepository;
use Modules\Vehiclem\Repositories\BmodelRepository;
use Modules\Bikers\Repositories\BikerRepository;
use Modules\Stores\Repositories\reviewsRepository;
use Modules\Banner\Repositories\BannerRepository;
use Modules\Worktimings\Repositories\TimingRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Services\Repositories\BookingnewRepository;
use Modules\Towing\Repositories\TnewRepository;
use Modules\Towing\Repositories\TowingtRepository;
use Modules\Insurance\Repositories\NewiRepository;
use Modules\Appusers\Repositories\walletRepository;
use DB;
use Carbon;

class apiController extends BasePublicController
{
   protected $guard;
   public function __construct(Response $response, Guard $guard, UserRepository $user,RoleRepository $role,Authentication $auth, UserTokenRepository $userToken,AppuserRepository $appuser,CityRepository $city,AreaRepository $area,StoresRepository $stores,uservehiRepository $uservehi,NewbookingsRepository $newbookings,BrandRepository $brand,BmodelRepository $bmodel,BikerRepository $biker,reviewsRepository $reviews,BannerRepository $banner,ServiceRepository $service,BookingnewRepository $bookingnew,TnewRepository $tnew,TowingtRepository $towingt,NewiRepository $newi,walletRepository $wallet)
   {
     parent::__construct();
       $this->response = $response;
       $this->guard = $guard;
       $this->user = $user;
       $this->role = $role;
       $this->auth = $auth;
       $this->userToken = $userToken;
       $this->appuser = $appuser;
       $this->city = $city;
       $this->area = $area;
       $this->stores = $stores;
       $this->uservehi = $uservehi;
       $this->newbookings = $newbookings;
       $this->brand = $brand;
       $this->bmodel = $bmodel;
       $this->biker = $biker;
       $this->reviews = $reviews;
       $this->banner = $banner;
       $this->service = $service;
       $this->bookingnew = $bookingnew;
       $this->tnew = $tnew;
       $this->towingt = $towingt;
       $this->newi = $newi;
       $this->wallet = $wallet;
    
   }
 public function otp(Request $request,Client $http)
 {

  $validator = Validator::make($request->all(), [
       'phone' => 'required|regex:/^([0-9]*)$/|min:10|max:10'
     ]);

  if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
              if(Auth::attempt(['phone' => $request->phone])) 
              {
                $userAuth = $this->auth->user();
                 if($this->user->find($userAuth->id)->isActivated() && isset($userAuth->roles[0]->slug) && $userAuth->roles[0]->slug == 'user'){
                     $token = $this->userToken->generateFor($userAuth->id);
                     
		     $phone = $request->phone;
		     $otp = "7123";
                      //$otp = rand ( 1000 , 9999);
                          $text = "Your verification code is: " .$otp;
                          $url = "http://www.91sms.in/api/sendhttp.php?authkey=346971AaVMsySd5fad14b5P1&mobiles=".$phone."&message=".$text."&sender=default&route=4&country=91";
                         
                          $return = file($url);
                          return response()->json([
                           'errors' => false,
                           'message' => trans('Otp sent successfully'),
                           'data' => $otp,$token,
                         ]);
                   }
                
                 }
                      else
                   {

                     $phone = $request->phone;
		     //$otp = rand ( 1000 , 9999);
		     $otp = "7123";
                          $text = "Your verification code is: " .$otp;
                          $url = "http://www.91sms.in/api/sendhttp.php?authkey=346971AaVMsySd5fad14b5P1&mobiles=".$phone."&message=".$text."&sender=default&route=4&country=91";
                          $return = file($url);
                          return response()->json([
                           'errors' => false,
                           'message' => trans('Otp sent successfully'),
                           'data' => $otp,
                         ]);

                   }
 
     }

 }

 public function register(Request $request,Client $http)
 {
     $validator = Validator::make($request->all(), [
       'email' => 'required|unique:users',
       'phone' => 'required',
       'password' => 'required',
       'first_name' => 'required',
       'last_name' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return response()->json([
                 'errors' => true,
                 'message' => trans('email alredy exist'),
               ]);;
     } else {

  $role_type = $this->role->findByName(['name' => "user"]);
       if(isset($role_type->name))
        {
          
          $user_detail = $this->user->createWithRoles($request->all(),$role_type->id,true);
            if(isset($user_detail->id))
            {
                 $token = $this->userToken->generateFor($user_detail->id);
               $request->merge(['user_id' => $user_detail->id]);
            }
          $this->appuser->create($request->all());  
        }
       
            else
     {
       $this->response->setContent(array('errors' => true,'message'=>'Email or Password is invalid'));
       return $this->response->setStatusCode(401,'Email or Password is invalid');
     }
       return response()->json([
                           'errors' => false,
                           'message' => trans('Registred'),
                           'data' => $user_detail,$token
                         ]);
      }
     
   }
   public function city(Request $request,Client $http){


     $city = $this->city->getByAttributes(['status' => 1]);
      
     
     return response()->json([
     'errors' => false,
     'message' => trans('cities'),
     'data' => $city,
   ]);

 }
   public function banner(Request $request,Client $http){


     $banner = $this->banner->getByAttributes(['status' => 1]);
      
     
     return response()->json([
     'errors' => false,
     'message' => trans('banner'),
     'data' => $banner,
   ]);

 }
  public function brand(Request $request,Client $http){

 $brands = $this->brand->getByAttributes(['status' => 1]);
   
      
     
     return response()->json([
     'errors' => false,
     'message' => trans('brands'),
     'data' => $brands,
   ]);

 }
  public function model(Request $request,Client $http)
  {
  $validator = Validator::make($request->all(), [
       'brand_id' => 'required'
     ]);

  if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
     $bmodels = $this->bmodel->getByAttributes(['brand_id' => $request->brand_id, 'status' => 1]); 
     
     return response()->json([
     'errors' => false,
     'message' => trans('model'),
     'data' => $bmodels,
   ]);

 }
}
 public function profile()
 {
   $userId = $this->auth->id();
   $profile = new UserProfileTransformer($this->auth->user());
   return response()->json([
     'errors' => false,
     'message' => trans('User Profile'),
     'data' => $profile,
   ]);
 }
  public function area(Request $request,Client $http)
  {
  $validator = Validator::make($request->all(), [
       'city_id' => 'required'
     ]);

  if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {

    $area = $this->area->getByAttributes(['city_id' => $request->city_id, 'status' => 1]); 
     
     return response()->json([
     'errors' => false,
     'message' => trans('Areas'),
     'data' => $area,
   ]);

 }
}


 public function current_location(Request $request,Client $http)
 {

    $validator = Validator::make($request->all(), [
       'latitude' => 'required',
       'longitude' => 'required',
    ]);  
if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
    
      $data = DB::select('SELECT *,( 6371* acos( cos( radians('.$request->latitude.') ) * cos( radians( lat ) ) * cos( radians( longi ) - radians('.$request->longitude.') )+ sin( radians('.$request->latitude.') ) * sin( radians( lat ) ) ) ) AS distance FROM stores__stores   HAVING distance < 8 ORDER BY distance LIMIT 0 , 100');
       
          foreach ($data as  $value) {
            $review = $this->reviews->getByAttributes(['store_id' => $value->id]);
            $rating=0;
            $count=0;
            foreach ($review as  $value1) {
             $rating=$value1->rating+$rating;
             $count=$count+1;
            }
            if($rating==0){
              $value->rating=0;
            }
            else{
               $value->rating=$rating/$count;
            }
           
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Vendor Stores'),
           'data' => $data
         ]);
   }
 }
  public function stores1(Request $request,Client $http)
  {

    $validator = Validator::make($request->all(), [
      'area_id' => 'required',

     ]);
   if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->stores->getByAttributes(['area_id' => $request->area_id]);
        
          
          foreach ($stores as  $value) {
            $review = $this->reviews->getByAttributes(['store_id' => $value->id]);
            $rating=0;
            $count=0;
            foreach ($review as  $value1) {
             $rating=$value1->rating+$rating;
             $count=$count+1;
            }
            if($rating==0){
              $value->rating=0;
            }
            else{
               $value->rating=$rating/$count;
            } 
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Stores'),
           'data' => $stores

         ]);
   }
 }
  public function review(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->reviews->getByAttributes(['store_id' => $request->store_id]);
  foreach ($stores as $value) {
            $value->user;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Review Details'),
           'data' => $stores,
         ]);
   }
 }

  public function store_details(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->stores->getByAttributes(['id' => $request->store_id]);
 foreach ($stores as  $value) {
            $review = $this->reviews->getByAttributes(['store_id' => $value->id]);
            $rating=0;
            $count=0;
            foreach ($review as  $value1) {
             $rating=$value1->rating+$rating;
             $count=$count+1;
            }
            if($rating==0){
              $value->rating=0;
            }
            else{
               $value->rating=$rating/$count;
            } 
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Store Details'),
           'data' => $stores,
         ]);
   }
 }
   public function myvehicles(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->uservehi->getByAttributes(['user_id' => $request->user_id]);
            foreach ($stores as $value) {
          
              $value->brand1;
               $value->model1;
               

          }
          return response()->json([
           'errors' => false,
           'message' => trans('Vehicle Details'),
           'data' => $stores,
         ]);
   }
 }
  public function owner_profile(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->stores->getByAttributes(['vendor_id' => $request->user_id]);
           
          return response()->json([
           'errors' => false,
           'message' => trans('owner Details'),
           'data' => $stores,
         ]);
   }
 }
   public function biker_profile(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->biker->getByAttributes(['user_id' => $request->user_id]);
           
          return response()->json([
           'errors' => false,
           'message' => trans('biker Details'),
           'data' => $stores,
         ]);
   }
 }
  public function myprofile(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->appuser->getByAttributes(['user_id' => $request->user_id]);
           
          return response()->json([
           'errors' => false,
           'message' => trans('user Details'),
           'data' => $stores,
         ]);
   }
 }
  public function profileupdate(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'first_name' => 'required',
       'pimage1'=>''
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
         if(isset($request->pimage1) && $request->pimage1){

                    $file_name = $_FILES['pimage1']['name'];
                    $file_size =$_FILES['pimage1']['size'];
                    $file_tmp =$_FILES['pimage1']['tmp_name'];
                    $file_type=$_FILES['pimage1']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                       $userlist1 = DB::table('appusers__appusers')
                          ->where('user_id', $request->user_id)
                          ->update(['pimage' => $newfile,'first_name' =>  $request->first_name]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
               $userlist = DB::table('users')
                          ->where('id', $request->user_id)
                          ->update(['first_name' =>  $request->first_name]);
          return response()->json([
           'errors' => false,
           'message' => trans('user updated Details'),
           'data' => $userlist,$userlist1
         ]);
   }
 }
 public function review_post(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'store_id'=> 'required',
       'review'=> 'required',
       'rating'=> 'required',
       'bid'=>'required'
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores =  $this->reviews->create($request->all());
             $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->bid)
                          ->update(['ostatus' => 1]);
          return response()->json([
           'errors' => false,
           'message' => trans('Reviews Submitted'),
           'data' => $stores,
         ]);
   }
 }
 public function order_cancel(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
       $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->id)
                          ->update(['status' => 8]);
          return response()->json([
           'errors' => false,
           'message' => trans('Order Cancelled'),
           'data' => $userlist,
         ]);
   }
 }
  public function timingsupdate(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
        'monstart'=> 'required',
        'monend'=> 'required',
        'tuestart'=> 'required',
        'tueend'=> 'required',
        'wedstart'=> 'required',
        'wedend'=> 'required',
        'thustart'=> 'required',
        'thuend'=> 'required',
        'fristart'=> 'required',
        'friend'=> 'required',
        'satstart'=> 'required',
         'satend'=> 'required',
        'sunstart'=> 'required',
         'sunend'=> 'required',
        'monstatus'=> 'required',
        'tuestatus'=> 'required',
        'wedstatus'=> 'required',
        'thustatus'=> 'required',
         'fristatus'=> 'required',
        'satstatus'=> 'required',
         'sunstatus'=> 'required'
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $stores = $this->stores->findByAttributes(['vendor_id' => $request->store_id]);
       $userlist = DB::table('worktimings__timings')
                          ->where('store_id', $stores->id)
                          ->update(['monstart' => $request->monstart,'monend' => $request->monend,'tuestart' => $request->tuestart,'tueend' => $request->tueend,'wedstart' => $request->wedstart,'wedend' => $request->wedend,'thustart' => $request->thustart,'thuend' => $request->thuend,'fristart' => $request->fristart,'friend' => $request->friend,'satstart' => $request->satstart,'satend' => $request->satend,'sunstart' => $request->sunstart,'sunend' => $request->sunend,'monstatus' => $request->monstatus,'tuestatus' => $request->tuestatus,'wedstatus' => $request->wedstatus,'thustatus' => $request->thustatus,'fristatus' => $request->fristatus,'satstatus' => $request->satstatus,'sunstatus' => $request->sunstatus]);
          return response()->json([
           'errors' => false,
           'message' => trans('Work timings Updated'),
           'data' => $userlist,
         ]);
   }
 }
   public function timingsdisplay(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $stores = $this->stores->findByAttributes(['vendor_id' => $request->store_id]);
       $userlist = DB::table('worktimings__timings')
                          ->where('store_id', $stores->id)
                          ->get();
          return response()->json([
           'errors' => false,
           'message' => trans('work timings'),
           'data' => $userlist,
         ]);
   }
 }
  public function timingsdisplayuser(Request $request,Client $http)
  {

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
       $userlist = DB::table('worktimings__timings')
                          ->where('store_id', $request->store_id)
                          ->get();
          return response()->json([
           'errors' => false,
           'message' => trans('work timings'),
           'data' => $userlist,
         ]);
   }
 }
  public function applycoupon(Request $request,Client $http)
  {

    $validator = Validator::make($request->all(), [
       'code' => 'required',
        'price'=>'required'
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
       $userlist = DB::table('coupons__coupons')
                          ->where('c_name', $request->code)
                          ->count();
                   if($userlist==1){
                     $areas = DB::table('coupons__coupons')->where('c_name', '=',  $request->code)->get();
                         
                          $price1=$request->price *$areas[0]->c_discount/100;
                           $price=$request->price-$price1;
                            return response()->json([
           'errors' => false,
           'message' => trans('Code Applied'),
           'data' => $price,
         ]);
                          }
                          else{
                           $price=$request->price;
                                    return response()->json([
           'errors' => false,
           'message' => trans('Code Invalid'),
           'data' => $price,
         ]);
                          }
         
   }
 }
  public function paymentupdate(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'bid'=>'required'
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
         
             $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->bid)
                          ->update(['payment_status' => 1]);
          return response()->json([
           'errors' => false,
           'message' => trans('Payment Updated'),
           'data' => $userlist
         ]);
   }
 }
  public function add_vehicle(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'brand_id'=> 'required',
       'model_id'=> 'required',
       'bike_number'=> 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores =  $this->uservehi->create($request->all());
          return response()->json([
           'errors' => false,
           'message' => trans('Vehicle Added'),
           'data' => $stores,
         ]);
   }
 }
  public function remove_vehicle(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'id' => 'required',
     ]);
    
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $cart = DB::table('appusers__uservehis')->where('id', '=', $request->id)->delete();
          return response()->json([
           'errors' => false,
           'message' => trans('Removed succesfully'),
           'data' => $cart,
         ]);
   }
 }
   public function booking(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'store_id' => 'required',
       'brand'=> 'required',
       'model'=> 'required',
       'bike_number'=> 'required',
       'date1'=> 'required',
       'time1'=> 'required',
       'address'=>'required',
       'lat'=>'',
       'long'=>'',
       'sinstruction'=>''
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->newbookings->create($request->all());
          return response()->json([
           'errors' => false,
           'message' => trans('Booking Done'),
           'data' => $stores,
         ]);
   }
 }
  public function mybookings(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->newbookings->getByAttributes(['user_id' => $request->user_id],'id','desc');
           foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Booking Details'),
           'data' => $stores,
         ]);
   }
 }
   public function newstorebookings(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
         $stores1 = $this->stores->findByAttributes(['vendor_id' => $request->store_id]);
          $stores = $this->newbookings->getByAttributes(['store_id' => $stores1->id,'status' => 3]);
          foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
                $value->bikerpickup1;

          }
          return response()->json([
           'errors' => false,
           'message' => trans('Store Booking Details'),
           'data' => $stores,
         ]);
   }
 }
 public function pickupimageupload(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'image11' => 'required',
       'image21' => 'required',
       'image31' => 'required',
       'image41' => 'required',
       'kmr' => 'required',
       'order_id'=> 'required',
           ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
           if(isset($request->image11) && $request->image11){

                    $file_name = $_FILES['image11']['name'];
                    $file_size =$_FILES['image11']['size'];
                    $file_tmp =$_FILES['image11']['tmp_name'];
                    $file_type=$_FILES['image11']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                       $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['image1' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
                   if(isset($request->image21) && $request->image21){

                    $file_name = $_FILES['image21']['name'];
                    $file_size =$_FILES['image21']['size'];
                    $file_tmp =$_FILES['image21']['tmp_name'];
                    $file_type=$_FILES['image21']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                       $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['image2' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
                     if(isset($request->image31) && $request->image31){

                    $file_name = $_FILES['image31']['name'];
                    $file_size =$_FILES['image31']['size'];
                    $file_tmp =$_FILES['image31']['tmp_name'];
                    $file_type=$_FILES['image31']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                       $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['image3' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
                  if(isset($request->image41) && $request->image41){

                    $file_name = $_FILES['image41']['name'];
                    $file_size =$_FILES['image41']['size'];
                    $file_tmp =$_FILES['image41']['tmp_name'];
                    $file_type=$_FILES['image41']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                       $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['image4' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
           $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['kmr' =>  $request->kmr,'status' => 2]);
          return response()->json([
           'errors' => false,
           'message' => trans('pickup Done'),
           'data' => $userlist,
         ]);
   }
 }
   public function billupload(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
       'image11' => 'required',
       'spares' => 'required' ,
       'labour' => 'required'
           ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
            if(isset($request->image11) && $request->image11){

                    $file_name = $_FILES['image11']['name'];
                    $file_size =$_FILES['image11']['size'];
                    $file_tmp =$_FILES['image11']['tmp_name'];
                    $file_type=$_FILES['image11']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                       $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['billimage' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
                  $otp = rand ( 1000 , 9999);
                $amount=$request->spares+$request->labour;
                $billpayment=20/100*$amount;
                $billpayment1= $amount+$billpayment;
		$userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['payment' =>  $amount,'status' => 4,'billpayment' =>  $billpayment1,'otp'=>$otp ]);
          	return response()->json([
           		'errors' => false,
           		'message' => trans('Booking Details updated'),
           		'data' => $userlist,
         	]);
   }
 }
  public function bikerdeliverystore(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['status' => 3]);
          return response()->json([
           'errors' => false,
           'message' => trans('Delivered at store'),
           'data' => $userlist,
         ]);
   }
 }
 public function locationupdateservice(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
         'llat' => 'required',
           'llong' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['llat' => $request->llat,'llong'=> $request->llong]);
          return response()->json([
           'errors' => false,
           'message' => trans('Location Upadated'),
           'data' => $userlist,
         ]);
   }
 }
 public function locationupdatefuel(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
         'llat' => 'required',
           'llong' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['llat' => $request->llat,'llong'=> $request->llong]);
          return response()->json([
           'errors' => false,
           'message' => trans('Location Upadated'),
           'data' => $userlist,
         ]);
   }
 }
   public function dropaccept(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['status' => 6]);
          return response()->json([
           'errors' => false,
           'message' => trans('Drop accepted'),
           'data' => $userlist,
         ]);
   }
 }
  public function dropdeliveredforpaymentnotdone(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
       'otp'=>'required',
       'payment'=>'required',
       'kmrd'=>'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
    //   $stores1 = $this->stores->findByAttributes(['id' => $request->order_id]);
       $stores1 = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->get();
       
       if($stores1[0]->otp == $request->otp){
         $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['status' => 7,'payment_status'=>1,'kmrd'=>$request->kmrd]);
                            $status="valid";
       }
       else{
           $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['status' => 6 ,'payment_status'=>0,'kmrd'=>$request->kmrd]);
                          $status="invalid";
       }
       
          return response()->json([
           'errors' => false,
           'message' => trans('Drop details '),
           'data' => $userlist,$status
         ]);
   }
 }
  public function dropdeliveredforpaymentdone(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
       'otp'=>'required',
       'kmrd'=>'required'
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
    //   $stores1 = $this->stores->findByAttributes(['id' => $request->order_id]);
       $stores1 = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->get();
       
       if($stores1[0]->otp == $request->otp){
         $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['status' => 7,'kmrd'=>$request->kmrd]);
                            $status="valid";
       }
       else{
           $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->order_id)
                          ->update(['status' => 6,'kmrd'=>$request->kmrd]);
                          $status="invalid";
       }
       
          return response()->json([
           'errors' => false,
           'message' => trans('Drop details '),
           'data' => $userlist,$status
         ]);
   }
 }
 

   public function readystorebookings(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      $stores1 = $this->stores->findByAttributes(['vendor_id' => $request->store_id]);

          $stores = $this->newbookings->getByAttributes(['store_id' => $stores1->id,'status' => 4]);
           foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
                $value->bikerpickup1;
                $value->bikerdrop1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Store Booking Details'),
           'data' => $stores,
         ]);
   }
 }
   public function readystorebookings1(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      $stores1 = $this->stores->findByAttributes(['vendor_id' => $request->store_id]);
      
          $stores = $this->newbookings->getByAttributes(['store_id' => $stores1->id,'status' => 5]);
           foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
                $value->bikerpickup1;
                $value->bikerdrop1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Store Booking Details'),
           'data' => $stores,
         ]);
   }
 }
  public function readystorebookings2(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      $stores1 = $this->stores->findByAttributes(['vendor_id' => $request->store_id]);
      
          $stores = $this->newbookings->getByAttributes(['store_id' => $stores1->id,'status' => 6]);
           foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
                $value->bikerpickup1;
                $value->bikerdrop1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Store Booking Details'),
           'data' => $stores,
         ]);
   }
 }
   public function deliveredstorebookings(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'store_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
 $stores1 = $this->stores->findByAttributes(['vendor_id' => $request->store_id]);
          $stores = $this->newbookings->getByAttributes(['store_id' =>$stores1->id,'status' => 7]);
           foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
                $value->bikerpickup1;
                $value->bikerdrop1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Store Booking Details'),
           'data' => $stores,
         ]);
   }
 }
   public function newbookingbikerpickup(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      
  $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->newbookings->getByAttributes(['bikerpickup' =>$stores1->id,'status' => 1]);
     foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('pickup  Details'),
           'data' => $stores,
         ]);
   }
 }
  
    public function newbookingbikerdelivery(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->newbookings->getByAttributes(['bikerdrop' =>$stores1->id,'status' => 5]);
 
   foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('delivery Details'),
           'data' => $stores,
         ]);
   }
 }
  public function bikerdeliveredpickup(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->newbookings->getByAttributes(['bikerpickup' =>$stores1->id,'status' => 3]);
 
   foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('delivery Details'),
           'data' => $stores,
         ]);
   }
 }
  public function bikerdelivereddrop(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
$stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->newbookings->getByAttributes(['bikerdrop' =>$stores1->id,'status' => 7]);

   foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('delivery Details'),
           'data' => $stores,
         ]);
   }
 }
  public function intransitbikerbookingpickup(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->newbookings->getByAttributes(['bikerpickup' =>$stores1->id,'status' => 2]);

   foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Intransit Details'),
           'data' => $stores,
         ]);
   }
 }
   
    public function intransitbikerbookingdelivery(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->newbookings->getByAttributes(['bikerdrop' =>$stores1->id,'status' => 6]);

   foreach ($stores as $value) {
            $value->user;
             $value->store;
              $value->brand1;
               $value->model1;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Intransit Details'),
           'data' => $stores,
         ]);
   }
 }
  public function alogin(Request $request,Client $http)
 {
     $validator = Validator::make($request->all(), [
       'user_name' => 'required',
       'password' => 'required'
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
     if(Auth::attempt(['email' => $request->user_name, 'password' => $request->password])) {
        $userAuth = $this->auth->user();
         if($this->user->find($userAuth->id)->isActivated() && isset($userAuth->roles[0]->slug) && $userAuth->roles[0]->slug == 'vendor'){
             $token = $this->userToken->generateFor($userAuth->id);
             return response()->json([
                 'errors' => false,
                 'message' => trans('user::users.token generated'),
                 'data' => $token,
             ]);
           }
           else
           {
             // $this->response->setContent(array('errors' => true,'message'=>'Invalid User'));
             // return $this->response->setStatusCode(401,'Invalid User');

             return response()->json([
                 'errors' => true,
                 'message' => trans('Invalid Phone Number or Password')
             ]);
           }
     }
     else
     {
       // $this->response->setContent(array('errors' => true,'message'=>'Phone Number or Password is invalid'));
       // return $this->response->setStatusCode(401,'Phone Number or Password is invalid');
       return response()->json([
                 'errors' => true,
                 'message' => trans('Invalid Phone Number or Password')
             ]);
     }
   }
 }
 public function blogin(Request $request,Client $http)
 {
     $validator = Validator::make($request->all(), [
       'user_name' => 'required',
       'password' => 'required'
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
     if(Auth::attempt(['email' => $request->user_name, 'password' => $request->password])) {
        $userAuth = $this->auth->user();
         if($this->user->find($userAuth->id)->isActivated() && isset($userAuth->roles[0]->slug) && $userAuth->roles[0]->slug == 'biker'){
             $token = $this->userToken->generateFor($userAuth->id);
             return response()->json([
                 'errors' => false,
                 'message' => trans('user::users.token generated'),
                 'data' => $token,
             ]);
           }
           else
           {
             // $this->response->setContent(array('errors' => true,'message'=>'Invalid User'));
             // return $this->response->setStatusCode(401,'Invalid User');

             return response()->json([
                 'errors' => true,
                 'message' => trans('Invalid Phone Number or Password')
             ]);
           }
     }
     else
     {
       // $this->response->setContent(array('errors' => true,'message'=>'Phone Number or Password is invalid'));
       // return $this->response->setStatusCode(401,'Phone Number or Password is invalid');
       return response()->json([
                 'errors' => true,
                 'message' => trans('Invalid Phone Number or Password')
             ]);
     }
   }
 }
 public function service(Request $request,Client $http)
  {
  $validator = Validator::make($request->all(), [
       'service_id' => 'required'
     ]);

  if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
     $service = $this->service->findByAttributes(['id' => $request->service_id]);
     
            
          $stores = $this->bookingnew->getByAttributes(['service_id' => $request->service_id]);
            $rating=0;
            $count=0; 
      foreach ($stores as  $value)
          {
              $rating=$value->rating+$rating;
             $count=$count+1;
            
            if($rating==0)
            {
              $rating=0;
            }
            else
            {
               $rating=$rating;
            }

          }
           $rating=$rating/$count;
     return response()->json([
     'errors' => false,
     'message' => trans('model'),
     'data' => $service,$rating
   ]);

 }
}
  public function bookingservice(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'service_id' => 'required',
       'stime'=> 'required',
       'sdate'=>'required',
       'address'=>'required',
       'lat'=>'required',
       'long'=>'required',
       'payment'=>'required',
       ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->bookingnew->create($request->all());
          return response()->json([
           'errors' => false,
           'message' => trans('Booking Done'),
           'data' => $stores,
         ]);
   }
 }
 
     public function newbookingservicebikerpickup(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      
  $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->bookingnew->getByAttributes(['bikerpickup' =>$stores1->id,'status' => 1]);
     foreach ($stores as $value) {
            $value->user;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('petrol  Details'),
           'data' => $stores,
         ]);
   }
 }
   public function myservicebookings(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
     ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->bookingnew->getByAttributes(['user_id' => $request->user_id],'id','desc');
           foreach ($stores as $value) {
            $value->user;
          
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Booking Details'),
           'data' => $stores,
         ]);
   }
 }
    public function servicepaymentupdate(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
      
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['payment_status' => 1]);
          return response()->json([
           'errors' => false,
           'message' => trans('Payment Updated'),
           'data' => $userlist,
         ]);
   }
 }
  public function servicereview(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
       'rating'=>'required',
       'review'=>'required'
      
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['rating' => $request->rating,
                            'review' => $request->review,'status'=>5]);
          return response()->json([
           'errors' => false,
           'message' => trans('Review Posted'),
           'data' => $userlist,
         ]);
   }
 }
 public function wallettransactiondisplay(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      

      $service = $this->wallet->getByAttributes(['user_id' => $request->user_id]);
      
          return response()->json([
           'errors' => false,
           'message' => trans('Wallet Details'),
           'data' => $service,
         ]);
   }
 }
 public function wallettransaction(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'type'=>'required',
       'amount'=>'required'
      
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      $this->wallet->create($request->all());

           $service = $this->appuser->findByAttributes(['user_id' => $request->user_id]);
        $walletmoney=$service->wallet-$request->amount;
        $userlist = DB::table('appusers__appusers')
                          ->where('user_id', $request->user_id)
                          ->update(['wallet' => $walletmoney]);
          return response()->json([
           'errors' => false,
           'message' => trans('Wallet Updated'),
           'data' => $userlist,
         ]);
   }
 }
  public function addmoneywallet(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'type'=>'required',
       'amount'=>'required'
      
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      $this->wallet->create($request->all());

           $service = $this->appuser->findByAttributes(['user_id' => $request->user_id]);
        $walletmoney=$service->wallet+$request->amount;
        $userlist = DB::table('appusers__appusers')
                          ->where('user_id', $request->user_id)
                          ->update(['wallet' => $walletmoney]);
          return response()->json([
           'errors' => false,
           'message' => trans('Money Added to Wallet'),
           'data' => $userlist,
         ]);
   }
 }
    public function dropserviceaccept(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
       'distance' =>'required',
       'plat'=>'required',
       'plong'=>'required',
       'service_id'=>'required'
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
         $service = $this->service->findByAttributes(['id' => $request->service_id]);
        $price=$service->service_charge*$request->distance;
        $otp = rand ( 1000 , 9999);

          $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['status' => 2,'distance' =>$request->distance,'plat'=> $request->plat,'plong'=> $request->plong,'otp'=>$otp,'s_charge'=>$price]);
          return response()->json([
           'errors' => false,
           'message' => trans('Drop accepted'),
           'data' => $userlist,
         ]);
   }
 }
public function dropservicedeliverypaymentdone(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
       'otp' =>'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
              $stores1 = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->get();
       
       if($stores1[0]->otp == $request->otp){
         $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['status' => 3]);
                            $status="valid";
       }
       else{
           $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['status' => 2]);
                          $status="invalid";
       }
       
          return response()->json([
           'errors' => false,
           'message' => trans('Drop details'),
           'data' => $userlist,$status
         ]);
   }
 }
public function dropservicedeliverypaymentnotdone(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
       'otp' =>'required',
        'amount' =>'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
              $stores1 = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->get();
       
       if($stores1[0]->otp == $request->otp){
         $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['status' => 3,'payment_status'=>1]);
                            $status="valid";
       }
       else{
           $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->order_id)
                          ->update(['status' => 2]);
                          $status="invalid";
       }
       
          return response()->json([
           'errors' => false,
           'message' => trans('Drop details'),
           'data' => $userlist,$status
         ]);
   }
 }
 public function intransitservicebiker(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->bookingnew->getByAttributes(['bikerpickup' =>$stores1->id,'status' => 2]);
     foreach ($stores as $value) {
            $value->user;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('intransit fuel Details'),
           'data' => $stores,
         ]);
   }
 }
 public function deliveredservicebiker(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'biker_id' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores1 = $this->biker->findByAttributes(['user_id' => $request->biker_id]);
  $stores = $this->bookingnew->getByAttributes(['bikerpickup' =>$stores1->id,'status' => 3]);
     foreach ($stores as $value) {
            $value->user;
          }
          return response()->json([
           'errors' => false,
           'message' => trans('Delivered Details'),
           'data' => $stores,
         ]);
   }
 }
  public function towingtype(Request $request,Client $http){


     $banner = $this->towingt->all();
      
     
     return response()->json([
     'errors' => false,
     'message' => trans('Towing Types'),
     'data' => $banner,
   ]);

 }
   public function towingpayment(Request $request,Client $http){

 $validator = Validator::make($request->all(), [
       'distance' => 'required',
       'tid'=> 'required',
       
       ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
           $stores = $this->towingt->findByAttributes(['id' => $request->tid]);

           if($request->distance<=10){
            $price=$stores->price1_10;
           }
           elseif($request->distance>=10 && $request->distance<=15){
             $price=$stores->price10_15;
           }
           elseif($request->distance>=15 && $request->distance<=20){
             $price=$stores->price15_20;
           }
           elseif($request->distance>=20 && $request->distance<=25){
             $price=$stores->price20_25;
           }
           else{
            $dis=$request->distance-25;
             $price=$stores->price20_25+$dis*$stores->price25;
           }
          return response()->json([
           'errors' => false,
           'message' => trans('price '),
           'data' => $price,
         ]);
   }

 }
   public function towingbooking(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'type' => 'required',
       'dtime'=> 'required',
       'bdate'=>'required',
       'paddress'=>'required',
        'daddress'=>'required',
       'plat'=>'required',
       'plong'=>'required',
       'dlat'=>'required',
       'dlong'=>'required',
       'payment'=>'required',
       'rc1'=>'required'
       ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
      if(isset($request->rc1) && $request->rc1){

                    $file_name = $_FILES['rc1']['name'];
                    $file_size =$_FILES['rc1']['size'];
                    $file_tmp =$_FILES['rc1']['tmp_name'];
                    $file_type=$_FILES['rc1']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                        $request->merge(['rc' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
          $stores = $this->tnew->create($request->all());
          return response()->json([
           'errors' => false,
           'message' => trans('Booking Done'),
           'data' => $stores,
         ]);
   }
 }
  public function towingbookingsuser(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->tnew->getByAttributes(['user_id' => $request->user_id]);
 
     
          return response()->json([
           'errors' => false,
           'message' => trans('Towing Booking Details'),
           'data' => $stores,
         ]);
   }
 }
   public function insurancebooking(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
       'vehicletype' => 'required',
       'atime'=> 'required',
       'adate'=>'required',
       'rc1'=>'required',
        'i_status'=>'required',
       'pinsurance1'=>'',
       ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        if(isset($request->rc1) && $request->rc1){

                    $file_name = $_FILES['rc1']['name'];
                    $file_size =$_FILES['rc1']['size'];
                    $file_tmp =$_FILES['rc1']['tmp_name'];
                    $file_type=$_FILES['rc1']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                        $request->merge(['rc' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
                   if(isset($request->pinsurance1) && $request->pinsurance1){

                    $file_name = $_FILES['pinsurance1']['name'];
                    $file_size =$_FILES['pinsurance1']['size'];
                    $file_tmp =$_FILES['pinsurance1']['tmp_name'];
                    $file_type=$_FILES['pinsurance1']['type'];
                    //$file_ext=strtolower(end(explode('.',$_FILES['prophoto']['name'])));
                    
                    $expensions= array("jpeg","jpg","png");

                    $newfile = "assets/media/".time().$file_name;

                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,$newfile);
                        $request->merge(['pinsurance' => $newfile]);
                       // $request->merge(['photo' => $newfile]);
                       //echo "Success";
                    }else{
                       //print_r($errors);
                    }
                  }
          $insurance = $this->newi->create($request->all());
          return response()->json([
           'errors' => false,
           'message' => trans('Booking Done'),
           'data' => $insurance,
         ]);
   }
 }
   public function insurancebookingsuser(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'user_id' => 'required',
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
          $stores = $this->newi->getByAttributes(['user_id' => $request->user_id]);
 
     
          return response()->json([
           'errors' => false,
           'message' => trans('Insurance Booking Details'),
           'data' => $stores,
         ]);
   }
 }
   public function insurancepaymentupdate(Request $request,Client $http){

    $validator = Validator::make($request->all(), [
       'order_id' => 'required',
      
      ]);
     if ($validator->fails()) {
       $errors = $validator->errors();
         foreach ($errors->all() as $message) {
           $meserror =$message;
         }
         return $this->response->setStatusCode(401,$meserror);
     } else {
        $userlist = DB::table('insurance__newis')
                          ->where('id', $request->order_id)
                          ->update(['pstatus' => 1]);
          return response()->json([
           'errors' => false,
           'message' => trans('Payment Updated'),
           'data' => $userlist,
         ]);
   }
 }

}
