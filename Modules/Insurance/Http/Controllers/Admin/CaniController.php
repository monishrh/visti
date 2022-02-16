<?php

namespace Modules\Insurance\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Insurance\Entities\Cani;
use Modules\Insurance\Http\Requests\CreateCaniRequest;
use Modules\Insurance\Http\Requests\UpdateCaniRequest;
use Modules\Insurance\Repositories\CaniRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CaniController extends AdminBaseController
{
    /**
     * @var CaniRepository
     */
    private $cani;

    public function __construct(CaniRepository $cani)
    {
        parent::__construct();

        $this->cani = $cani;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$canis = $this->cani->all();

        return view('insurance::admin.canis.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('insurance::admin.canis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCaniRequest $request
     * @return Response
     */
    public function store(CreateCaniRequest $request)
    {
        $this->cani->create($request->all());

        return redirect()->route('admin.insurance.cani.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('insurance::canis.title.canis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cani $cani
     * @return Response
     */
    public function edit(Cani $cani)
    {
        return view('insurance::admin.canis.edit', compact('cani'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Cani $cani
     * @param  UpdateCaniRequest $request
     * @return Response
     */
    public function update(Cani $cani, UpdateCaniRequest $request)
    {
        $this->cani->update($cani, $request->all());

        return redirect()->route('admin.insurance.cani.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('insurance::canis.title.canis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cani $cani
     * @return Response
     */
    public function destroy(Cani $cani)
    {
        $this->cani->destroy($cani);

        return redirect()->route('admin.insurance.cani.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('insurance::canis.title.canis')]));
    }
}
