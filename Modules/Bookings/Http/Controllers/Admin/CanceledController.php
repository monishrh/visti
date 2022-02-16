<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Canceled;
use Modules\Bookings\Http\Requests\CreateCanceledRequest;
use Modules\Bookings\Http\Requests\UpdateCanceledRequest;
use Modules\Bookings\Repositories\CanceledRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CanceledController extends AdminBaseController
{
    /**
     * @var CanceledRepository
     */
    private $canceled;

    public function __construct(CanceledRepository $canceled)
    {
        parent::__construct();

        $this->canceled = $canceled;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$canceleds = $this->canceled->all();

        return view('bookings::admin.canceleds.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.canceleds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCanceledRequest $request
     * @return Response
     */
    public function store(CreateCanceledRequest $request)
    {
        $this->canceled->create($request->all());

        return redirect()->route('admin.bookings.canceled.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::canceleds.title.canceleds')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Canceled $canceled
     * @return Response
     */
    public function edit(Canceled $canceled)
    {
        return view('bookings::admin.canceleds.edit', compact('canceled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Canceled $canceled
     * @param  UpdateCanceledRequest $request
     * @return Response
     */
    public function update(Canceled $canceled, UpdateCanceledRequest $request)
    {
        $this->canceled->update($canceled, $request->all());

        return redirect()->route('admin.bookings.canceled.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::canceleds.title.canceleds')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Canceled $canceled
     * @return Response
     */
    public function destroy(Canceled $canceled)
    {
        $this->canceled->destroy($canceled);

        return redirect()->route('admin.bookings.canceled.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bookings::canceleds.title.canceleds')]));
    }
}
