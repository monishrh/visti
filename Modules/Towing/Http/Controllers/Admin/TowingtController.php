<?php

namespace Modules\Towing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Towing\Entities\Towingt;
use Modules\Towing\Http\Requests\CreateTowingtRequest;
use Modules\Towing\Http\Requests\UpdateTowingtRequest;
use Modules\Towing\Repositories\TowingtRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TowingtController extends AdminBaseController
{
    /**
     * @var TowingtRepository
     */
    private $towingt;

    public function __construct(TowingtRepository $towingt)
    {
        parent::__construct();

        $this->towingt = $towingt;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $towingts = $this->towingt->all();

        return view('towing::admin.towingts.index', compact('towingts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('towing::admin.towingts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTowingtRequest $request
     * @return Response
     */
    public function store(CreateTowingtRequest $request)
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
                 $request->merge(['ratecard' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
           if(isset($request->videos16) && $request->videos16){

              $file_name = $_FILES['videos16']['name'];
              $file_size =$_FILES['videos16']['size'];
              $file_tmp =$_FILES['videos16']['tmp_name'];
              $file_type=$_FILES['videos16']['type'];

              $expensions= array("jpg", "jpeg", "gif", "png");


              $newfile = "assets/media/".time().$file_name;

              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,$newfile);
                 $request->merge(['img' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
        $this->towingt->create($request->all());

        return redirect()->route('admin.towing.towingt.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::towingts.title.towingts')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Towingt $towingt
     * @return Response
     */
    public function edit(Towingt $towingt)
    {
        return view('towing::admin.towingts.edit', compact('towingt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Towingt $towingt
     * @param  UpdateTowingtRequest $request
     * @return Response
     */
    public function update(Towingt $towingt, UpdateTowingtRequest $request)
    {
        $this->towingt->update($towingt, $request->all());

        return redirect()->route('admin.towing.towingt.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('towing::towingts.title.towingts')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Towingt $towingt
     * @return Response
     */
    public function destroy(Towingt $towingt)
    {
        $this->towingt->destroy($towingt);

        return redirect()->route('admin.towing.towingt.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('towing::towingts.title.towingts')]));
    }
}
