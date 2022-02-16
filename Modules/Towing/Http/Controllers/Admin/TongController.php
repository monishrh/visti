<?php

namespace Modules\Towing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Towing\Entities\Tong;
use Modules\Towing\Http\Requests\CreateTongRequest;
use Modules\Towing\Http\Requests\UpdateTongRequest;
use Modules\Towing\Repositories\TongRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TongController extends AdminBaseController
{
    /**
     * @var TongRepository
     */
    private $tong;

    public function __construct(TongRepository $tong)
    {
        parent::__construct();

        $this->tong = $tong;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$tongs = $this->tong->all();

        return view('towing::admin.tongs.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('towing::admin.tongs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTongRequest $request
     * @return Response
     */
    public function store(CreateTongRequest $request)
    {
        $this->tong->create($request->all());

        return redirect()->route('admin.towing.tong.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::tongs.title.tongs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tong $tong
     * @return Response
     */
    public function edit(Tong $tong)
    {
        return view('towing::admin.tongs.edit', compact('tong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Tong $tong
     * @param  UpdateTongRequest $request
     * @return Response
     */
    public function update(Tong $tong, UpdateTongRequest $request)
    {
        $this->tong->update($tong, $request->all());

        return redirect()->route('admin.towing.tong.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('towing::tongs.title.tongs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tong $tong
     * @return Response
     */
    public function destroy(Tong $tong)
    {
        $this->tong->destroy($tong);

        return redirect()->route('admin.towing.tong.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('towing::tongs.title.tongs')]));
    }
}
