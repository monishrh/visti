<?php

namespace Modules\Services\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Services\Entities\Bookingcom;
use Modules\Services\Http\Requests\CreateBookingcomRequest;
use Modules\Services\Http\Requests\UpdateBookingcomRequest;
use Modules\Services\Repositories\BookingcomRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BookingcomController extends AdminBaseController
{
    /**
     * @var BookingcomRepository
     */
    private $bookingcom;

    public function __construct(BookingcomRepository $bookingcom)
    {
        parent::__construct();

        $this->bookingcom = $bookingcom;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$bookingcoms = $this->bookingcom->all();

        return view('services::admin.bookingcoms.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('services::admin.bookingcoms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBookingcomRequest $request
     * @return Response
     */
    public function store(CreateBookingcomRequest $request)
    {
        $this->bookingcom->create($request->all());

        return redirect()->route('admin.services.bookingcom.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('services::bookingcoms.title.bookingcoms')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bookingcom $bookingcom
     * @return Response
     */
    public function edit(Bookingcom $bookingcom)
    {
        return view('services::admin.bookingcoms.edit', compact('bookingcom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Bookingcom $bookingcom
     * @param  UpdateBookingcomRequest $request
     * @return Response
     */
    public function update(Bookingcom $bookingcom, UpdateBookingcomRequest $request)
    {
        $this->bookingcom->update($bookingcom, $request->all());

        return redirect()->route('admin.services.bookingcom.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('services::bookingcoms.title.bookingcoms')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bookingcom $bookingcom
     * @return Response
     */
    public function destroy(Bookingcom $bookingcom)
    {
        $this->bookingcom->destroy($bookingcom);

        return redirect()->route('admin.services.bookingcom.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('services::bookingcoms.title.bookingcoms')]));
    }
}
