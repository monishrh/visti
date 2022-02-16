<?php

namespace Modules\Vehiclem\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Vehiclem\Entities\Bmodel;
use Modules\Vehiclem\Http\Requests\CreateBmodelRequest;
use Modules\Vehiclem\Http\Requests\UpdateBmodelRequest;
use Modules\Vehiclem\Repositories\BmodelRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Vehiclem\Repositories\BrandRepository;
class BmodelController extends AdminBaseController
{
    /**
     * @var BmodelRepository
     */
    private $bmodel;

    public function __construct(BmodelRepository $bmodel,BrandRepository $brand)
    {
        parent::__construct();

        $this->bmodel = $bmodel;
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bmodels = $this->bmodel->all();

        return view('vehiclem::admin.bmodels.index', compact('bmodels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $brand = $this->brand->all();
        return view('vehiclem::admin.bmodels.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBmodelRequest $request
     * @return Response
     */
    public function store(CreateBmodelRequest $request)
    {
        $this->bmodel->create($request->all());

        return redirect()->route('admin.vehiclem.bmodel.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('vehiclem::bmodels.title.bmodels')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bmodel $bmodel
     * @return Response
     */
    public function edit(Bmodel $bmodel)
    {
         $brand = $this->brand->all();
        return view('vehiclem::admin.bmodels.edit', compact('bmodel','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Bmodel $bmodel
     * @param  UpdateBmodelRequest $request
     * @return Response
     */
    public function update(Bmodel $bmodel, UpdateBmodelRequest $request)
    {
        $this->bmodel->update($bmodel, $request->all());

        return redirect()->route('admin.vehiclem.bmodel.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('vehiclem::bmodels.title.bmodels')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bmodel $bmodel
     * @return Response
     */
    public function destroy(Bmodel $bmodel)
    {
        $this->bmodel->destroy($bmodel);

        return redirect()->route('admin.vehiclem.bmodel.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('vehiclem::bmodels.title.bmodels')]));
    }
}
