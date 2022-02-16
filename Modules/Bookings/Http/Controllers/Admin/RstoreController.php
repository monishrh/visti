<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Rstore;
use Modules\Bookings\Http\Requests\CreateRstoreRequest;
use Modules\Bookings\Http\Requests\UpdateRstoreRequest;
use Modules\Bookings\Repositories\RstoreRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class RstoreController extends AdminBaseController
{
    /**
     * @var RstoreRepository
     */
    private $rstore;

    public function __construct(RstoreRepository $rstore)
    {
        parent::__construct();

        $this->rstore = $rstore;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$rstores = $this->rstore->all();

        return view('bookings::admin.rstores.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.rstores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRstoreRequest $request
     * @return Response
     */
    public function store(CreateRstoreRequest $request)
    {
        $this->rstore->create($request->all());

        return redirect()->route('admin.bookings.rstore.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::rstores.title.rstores')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rstore $rstore
     * @return Response
     */
    public function edit(Rstore $rstore)
    {
        return view('bookings::admin.rstores.edit', compact('rstore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Rstore $rstore
     * @param  UpdateRstoreRequest $request
     * @return Response
     */
    public function update(Rstore $rstore, UpdateRstoreRequest $request)
    {
        $this->rstore->update($rstore, $request->all());

        return redirect()->route('admin.bookings.rstore.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::rstores.title.rstores')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Rstore $rstore
     * @return Response
     */
    public function destroy(Rstore $rstore)
    {
        $this->rstore->destroy($rstore);

        return redirect()->route('admin.bookings.rstore.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bookings::rstores.title.rstores')]));
    }
}
