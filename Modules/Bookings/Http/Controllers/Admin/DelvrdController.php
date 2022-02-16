<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Delvrd;
use Modules\Bookings\Http\Requests\CreateDelvrdRequest;
use Modules\Bookings\Http\Requests\UpdateDelvrdRequest;
use Modules\Bookings\Repositories\DelvrdRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DelvrdController extends AdminBaseController
{
    /**
     * @var DelvrdRepository
     */
    private $delvrd;

    public function __construct(DelvrdRepository $delvrd)
    {
        parent::__construct();

        $this->delvrd = $delvrd;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$delvrds = $this->delvrd->all();

        return view('bookings::admin.delvrds.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.delvrds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDelvrdRequest $request
     * @return Response
     */
    public function store(CreateDelvrdRequest $request)
    {
        $this->delvrd->create($request->all());

        return redirect()->route('admin.bookings.delvrd.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::delvrds.title.delvrds')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Delvrd $delvrd
     * @return Response
     */
    public function edit(Delvrd $delvrd)
    {
        return view('bookings::admin.delvrds.edit', compact('delvrd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Delvrd $delvrd
     * @param  UpdateDelvrdRequest $request
     * @return Response
     */
    public function update(Delvrd $delvrd, UpdateDelvrdRequest $request)
    {
        $this->delvrd->update($delvrd, $request->all());

        return redirect()->route('admin.bookings.delvrd.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::delvrds.title.delvrds')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Delvrd $delvrd
     * @return Response
     */
    public function destroy(Delvrd $delvrd)
    {
        $this->delvrd->destroy($delvrd);

        return redirect()->route('admin.bookings.delvrd.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bookings::delvrds.title.delvrds')]));
    }
}
