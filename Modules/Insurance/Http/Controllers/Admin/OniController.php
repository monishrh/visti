<?php

namespace Modules\Insurance\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Insurance\Entities\Oni;
use Modules\Insurance\Http\Requests\CreateOniRequest;
use Modules\Insurance\Http\Requests\UpdateOniRequest;
use Modules\Insurance\Repositories\OniRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class OniController extends AdminBaseController
{
    /**
     * @var OniRepository
     */
    private $oni;

    public function __construct(OniRepository $oni)
    {
        parent::__construct();

        $this->oni = $oni;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$onis = $this->oni->all();

        return view('insurance::admin.onis.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('insurance::admin.onis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOniRequest $request
     * @return Response
     */
    public function store(CreateOniRequest $request)
    {
        $this->oni->create($request->all());

        return redirect()->route('admin.insurance.oni.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('insurance::onis.title.onis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Oni $oni
     * @return Response
     */
    public function edit(Oni $oni)
    {
        return view('insurance::admin.onis.edit', compact('oni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Oni $oni
     * @param  UpdateOniRequest $request
     * @return Response
     */
    public function update(Oni $oni, UpdateOniRequest $request)
    {
        $this->oni->update($oni, $request->all());

        return redirect()->route('admin.insurance.oni.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('insurance::onis.title.onis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Oni $oni
     * @return Response
     */
    public function destroy(Oni $oni)
    {
        $this->oni->destroy($oni);

        return redirect()->route('admin.insurance.oni.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('insurance::onis.title.onis')]));
    }
}
