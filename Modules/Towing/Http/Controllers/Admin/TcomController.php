<?php

namespace Modules\Towing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Towing\Entities\Tcom;
use Modules\Towing\Http\Requests\CreateTcomRequest;
use Modules\Towing\Http\Requests\UpdateTcomRequest;
use Modules\Towing\Repositories\TcomRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TcomController extends AdminBaseController
{
    /**
     * @var TcomRepository
     */
    private $tcom;

    public function __construct(TcomRepository $tcom)
    {
        parent::__construct();

        $this->tcom = $tcom;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$tcoms = $this->tcom->all();

        return view('towing::admin.tcoms.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('towing::admin.tcoms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTcomRequest $request
     * @return Response
     */
    public function store(CreateTcomRequest $request)
    {
        $this->tcom->create($request->all());

        return redirect()->route('admin.towing.tcom.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::tcoms.title.tcoms')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tcom $tcom
     * @return Response
     */
    public function edit(Tcom $tcom)
    {
        return view('towing::admin.tcoms.edit', compact('tcom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Tcom $tcom
     * @param  UpdateTcomRequest $request
     * @return Response
     */
    public function update(Tcom $tcom, UpdateTcomRequest $request)
    {
        $this->tcom->update($tcom, $request->all());

        return redirect()->route('admin.towing.tcom.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('towing::tcoms.title.tcoms')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tcom $tcom
     * @return Response
     */
    public function destroy(Tcom $tcom)
    {
        $this->tcom->destroy($tcom);

        return redirect()->route('admin.towing.tcom.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('towing::tcoms.title.tcoms')]));
    }
}
