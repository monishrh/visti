<?php

namespace Modules\Towing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Towing\Entities\Tcan;
use Modules\Towing\Http\Requests\CreateTcanRequest;
use Modules\Towing\Http\Requests\UpdateTcanRequest;
use Modules\Towing\Repositories\TcanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TcanController extends AdminBaseController
{
    /**
     * @var TcanRepository
     */
    private $tcan;

    public function __construct(TcanRepository $tcan)
    {
        parent::__construct();

        $this->tcan = $tcan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$tcans = $this->tcan->all();

        return view('towing::admin.tcans.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('towing::admin.tcans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTcanRequest $request
     * @return Response
     */
    public function store(CreateTcanRequest $request)
    {
        $this->tcan->create($request->all());

        return redirect()->route('admin.towing.tcan.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::tcans.title.tcans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tcan $tcan
     * @return Response
     */
    public function edit(Tcan $tcan)
    {
        return view('towing::admin.tcans.edit', compact('tcan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Tcan $tcan
     * @param  UpdateTcanRequest $request
     * @return Response
     */
    public function update(Tcan $tcan, UpdateTcanRequest $request)
    {
        $this->tcan->update($tcan, $request->all());

        return redirect()->route('admin.towing.tcan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('towing::tcans.title.tcans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tcan $tcan
     * @return Response
     */
    public function destroy(Tcan $tcan)
    {
        $this->tcan->destroy($tcan);

        return redirect()->route('admin.towing.tcan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('towing::tcans.title.tcans')]));
    }
}
