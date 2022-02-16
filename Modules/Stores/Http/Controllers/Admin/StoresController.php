<?php

namespace Modules\Stores\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Stores\Entities\Stores;
use Modules\Stores\Http\Requests\CreateStoresRequest;
use Modules\Stores\Http\Requests\UpdateStoresRequest;
use Modules\Stores\Repositories\StoresRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Region\Repositories\AreaRepository;
use Modules\Region\Repositories\CityRepository;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;
use Modules\Worktimings\Repositories\TimingRepository;
class StoresController extends AdminBaseController
{
    /**
     * @var StoresRepository
     */
    private $stores;

    public function __construct(StoresRepository $stores,AreaRepository $area,CityRepository $city, UserRepository $user,
        RoleRepository $role,TimingRepository $timing)
    {
        parent::__construct();

        $this->stores = $stores;
        $this->area = $area;
        $this->city = $city;
        $this->user = $user;
        $this->role = $role;
        $this->timing = $timing;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $stores = $this->stores->all();
        $areas = $this->area->all();
         $city = $this->city->all();
        return view('stores::admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $areas = $this->area->all();
         $city = $this->city->all();
        return view('stores::admin.stores.create', compact('areas','city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStoresRequest $request
     * @return Response
     */
    public function store(CreateStoresRequest $request)
    {
         if(isset($request->videos13) && $request->videos13){

              $file_name = $_FILES['videos13']['name'];
              $file_size =$_FILES['videos13']['size'];
              $file_tmp =$_FILES['videos13']['tmp_name'];
              $file_type=$_FILES['videos13']['type'];

              $expensions= array("jpg", "jpeg", "gif", "png");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['icon' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
          if(isset($request->videos14) && $request->videos14){

              $file_name = $_FILES['videos14']['name'];
              $file_size =$_FILES['videos14']['size'];
              $file_tmp =$_FILES['videos14']['tmp_name'];
              $file_type=$_FILES['videos14']['type'];

              $expensions= array("jpg", "jpeg", "gif", "png");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['banner' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
          
            }
        }
         if(isset($request->videos15) && $request->videos15){

              $file_name = $_FILES['videos15']['name'];
              $file_size =$_FILES['videos15']['size'];
              $file_tmp =$_FILES['videos15']['tmp_name'];
              $file_type=$_FILES['videos15']['type'];

              $expensions= array("pdf", "jpeg", "gif", "png","jpg");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['price' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
              $role_type = $this->role->findByName(['name' => "vendor"]);
       if(isset($role_type->name)){
           
           $user_detail = $this->user->createWithRoles($request->all(),$role_type->id,true);
           
            if(isset($user_detail->id))
             {
               $request->merge(['vendor_id' => $user_detail->id]);
              
             }
           
      }

        $store=$this->stores->create($request->all());
 if(isset($store->id))
             {
               $request->merge(['store_id' => $store->id]);
              
             }
             $this->timing->create($request->all());
        return redirect()->route('admin.stores.stores.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('stores::stores.title.stores')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Stores $stores
     * @return Response
     */
    public function edit(Stores $stores)
    {
         $areas = $this->area->all();
         $city = $this->city->all();
        return view('stores::admin.stores.edit', compact('stores','areas','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Stores $stores
     * @param  UpdateStoresRequest $request
     * @return Response
     */
    public function update(Stores $stores, UpdateStoresRequest $request)
    {
         if(isset($request->videos13) && $request->videos13){

              $file_name = $_FILES['videos13']['name'];
              $file_size =$_FILES['videos13']['size'];
              $file_tmp =$_FILES['videos13']['tmp_name'];
              $file_type=$_FILES['videos13']['type'];

              $expensions= array("jpg", "jpeg", "gif", "png");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['icon' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
          if(isset($request->videos14) && $request->videos14){

              $file_name = $_FILES['videos14']['name'];
              $file_size =$_FILES['videos14']['size'];
              $file_tmp =$_FILES['videos14']['tmp_name'];
              $file_type=$_FILES['videos14']['type'];

              $expensions= array("jpg", "jpeg", "gif", "png");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['banner' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
        if(isset($request->videos15) && $request->videos15){

              $file_name = $_FILES['videos15']['name'];
              $file_size =$_FILES['videos15']['size'];
              $file_tmp =$_FILES['videos15']['tmp_name'];
              $file_type=$_FILES['videos15']['type'];

              $expensions= array("pdf", "jpeg", "gif", "png","jpg");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['price' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
        $this->stores->update($stores, $request->all());

        return redirect()->route('admin.stores.stores.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('stores::stores.title.stores')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Stores $stores
     * @return Response
     */
    public function destroy(Stores $stores)
    {
        $this->stores->destroy($stores);

        return redirect()->route('admin.stores.stores.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('stores::stores.title.stores')]));
    }
       public function points1(Request $request)
    {
       
        if($request->ajax()){
            $blocks = $this->area->getByAttributes(['city_id' => $request->v_id, 'status' => 1]); 
            
            $data = view('stores::admin.stores.branch1',compact('blocks'))->render();
            return response()->json(['options'=>$data]);
        }
    }
}
