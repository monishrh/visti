<?php

namespace Modules\Insurance\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Insurance\Entities\Comi;
use Modules\Insurance\Http\Requests\CreateComiRequest;
use Modules\Insurance\Http\Requests\UpdateComiRequest;
use Modules\Insurance\Repositories\ComiRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ComiController extends AdminBaseController
{
    /**
     * @var ComiRepository
     */
    private $comi;

    public function __construct(ComiRepository $comi)
    {
        parent::__construct();

        $this->comi = $comi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$comis = $this->comi->all();

        return view('insurance::admin.comis.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('insurance::admin.comis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateComiRequest $request
     * @return Response
     */
    public function store(CreateComiRequest $request)
    {
        $this->comi->create($request->all());

        return redirect()->route('admin.insurance.comi.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('insurance::comis.title.comis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comi $comi
     * @return Response
     */
    public function edit(Comi $comi)
    {
        return view('insurance::admin.comis.edit', compact('comi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Comi $comi
     * @param  UpdateComiRequest $request
     * @return Response
     */
    public function update(Comi $comi, UpdateComiRequest $request)
    {
        $this->comi->update($comi, $request->all());

        return redirect()->route('admin.insurance.comi.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('insurance::comis.title.comis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comi $comi
     * @return Response
     */
    public function destroy(Comi $comi)
    {
        $this->comi->destroy($comi);

        return redirect()->route('admin.insurance.comi.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('insurance::comis.title.comis')]));
    }
}
