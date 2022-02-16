<?php

namespace Modules\Insurance\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Insurance\Entities\Newi;
use Modules\Insurance\Http\Requests\CreateNewiRequest;
use Modules\Insurance\Http\Requests\UpdateNewiRequest;
use Modules\Insurance\Repositories\NewiRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use DB;
class NewiController extends AdminBaseController
{
    /**
     * @var NewiRepository
     */
    private $newi;

    public function __construct(NewiRepository $newi)
    {
        parent::__construct();

        $this->newi = $newi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(isset($_GET['id'])){
        $id=$_GET['id'];
        if($id==0){
         $newis = $this->newi->getByAttributes(['status' => 0]); 
         }
          if($id==1){
         $newis = $this->newi->getByAttributes(['status' => 1]); 
         }
          if($id==2){
         $newis = $this->newi->getByAttributes(['status' => 2]); 
         }
          if($id==3){
         $newis = $this->newi->getByAttributes(['status' => 3]); 
         }
        }
        else{
        $newis = $this->newi->all();
         }
        return view('insurance::admin.newis.index', compact('newis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('insurance::admin.newis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNewiRequest $request
     * @return Response
     */
    public function store(CreateNewiRequest $request)
    {
        $this->newi->create($request->all());

        return redirect()->route('admin.insurance.newi.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('insurance::newis.title.newis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Newi $newi
     * @return Response
     */
    public function edit(Newi $newi)
    {
        return view('insurance::admin.newis.edit', compact('newi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Newi $newi
     * @param  UpdateNewiRequest $request
     * @return Response
     */
    public function update(Newi $newi, UpdateNewiRequest $request)
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
                 $request->merge(['doc' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }


        $this->newi->update($newi, $request->all());

        return redirect()->route('admin.insurance.newi.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('insurance::newis.title.newis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Newi $newi
     * @return Response
     */
    public function destroy(Newi $newi)
    {
        $this->newi->destroy($newi);

        return redirect()->route('admin.insurance.newi.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('insurance::newis.title.newis')]));
    }
  public function cancel(Request $request)
    {
        $userlist = DB::table('insurance__newis')
                          ->where('id', $request->id)
                          ->update(['status' => 3]);
        
      return redirect()->route('admin.insurance.newi.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('insurance::newis.title.newis')]));
    }
}
