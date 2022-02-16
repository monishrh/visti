<?php

namespace Modules\Bikers\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bikers\Entities\Biker;
use Modules\Bikers\Http\Requests\CreateBikerRequest;
use Modules\Bikers\Http\Requests\UpdateBikerRequest;
use Modules\Bikers\Repositories\BikerRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;
use Modules\Region\Repositories\CityRepository;
class BikerController extends AdminBaseController
{
    /**
     * @var BikerRepository
     */
    private $biker;

    public function __construct(BikerRepository $biker,CityRepository $city, UserRepository $user,
        RoleRepository $role)
    {
        parent::__construct();

        $this->biker = $biker;
         $this->user = $user;
       $this->role = $role;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bikers = $this->biker->all();

        return view('bikers::admin.bikers.index', compact('bikers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $city = $this->city->all();

        return view('bikers::admin.bikers.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBikerRequest $request
     * @return Response
     */
    public function store(CreateBikerRequest $request)
    {
         if(isset($request->videos15) && $request->videos15){

              $file_name = $_FILES['videos15']['name'];
              $file_size =$_FILES['videos15']['size'];
              $file_tmp =$_FILES['videos15']['tmp_name'];
              $file_type=$_FILES['videos15']['type'];

              $expensions= array("jpg", "jpeg", "gif", "png");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['dl_img' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
            $role_type = $this->role->findByName(['name' => "biker"]);
       if(isset($role_type->name)){
           
           $user_detail = $this->user->createWithRoles($request->all(),$role_type->id,true);
            if(isset($user_detail->id))
           {
               $request->merge(['user_id' => $user_detail->id]);
            }
           
      }
        $this->biker->create($request->all());

        return redirect()->route('admin.bikers.biker.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bikers::bikers.title.bikers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Biker $biker
     * @return Response
     */
    public function edit(Biker $biker)
    {
        return view('bikers::admin.bikers.edit', compact('biker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Biker $biker
     * @param  UpdateBikerRequest $request
     * @return Response
     */
    public function update(Biker $biker, UpdateBikerRequest $request)
    {
        if(isset($request->videos15) && $request->videos15){

              $file_name = $_FILES['videos15']['name'];
              $file_size =$_FILES['videos15']['size'];
              $file_tmp =$_FILES['videos15']['tmp_name'];
              $file_type=$_FILES['videos15']['type'];

              $expensions= array("jpg", "jpeg", "gif", "png");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['dl_img' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
        $this->biker->update($biker, $request->all());

        return redirect()->route('admin.bikers.biker.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bikers::bikers.title.bikers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Biker $biker
     * @return Response
     */
    public function destroy(Biker $biker)
    {
        $this->biker->destroy($biker);

        return redirect()->route('admin.bikers.biker.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bikers::bikers.title.bikers')]));
    }
}
