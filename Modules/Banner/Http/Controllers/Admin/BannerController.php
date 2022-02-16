<?php

namespace Modules\Banner\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Banner\Entities\Banner;
use Modules\Banner\Http\Requests\CreateBannerRequest;
use Modules\Banner\Http\Requests\UpdateBannerRequest;
use Modules\Banner\Repositories\BannerRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BannerController extends AdminBaseController
{
    /**
     * @var BannerRepository
     */
    private $banner;

    public function __construct(BannerRepository $banner)
    {
        parent::__construct();

        $this->banner = $banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $banners = $this->banner->all();

        return view('banner::admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('banner::admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBannerRequest $request
     * @return Response
     */
    public function store(CreateBannerRequest $request)
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
                 $request->merge(['image1' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
        $this->banner->create($request->all());

        return redirect()->route('admin.banner.banner.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('banner::banners.title.banners')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Banner $banner
     * @return Response
     */
    public function edit(Banner $banner)
    {
        return view('banner::admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Banner $banner
     * @param  UpdateBannerRequest $request
     * @return Response
     */
    public function update(Banner $banner, UpdateBannerRequest $request)
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
                 $request->merge(['image1' => $newfile]);
                 //echo "Success";
              }else{
                 //print_r($errors);
              }
        }
        $this->banner->update($banner, $request->all());

        return redirect()->route('admin.banner.banner.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('banner::banners.title.banners')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner $banner
     * @return Response
     */
    public function destroy(Banner $banner)
    {
        $this->banner->destroy($banner);

        return redirect()->route('admin.banner.banner.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('banner::banners.title.banners')]));
    }
}
