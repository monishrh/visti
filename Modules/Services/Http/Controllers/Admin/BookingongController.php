<?php

namespace Modules\Services\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Services\Entities\Bookingong;
use Modules\Services\Http\Requests\CreateBookingongRequest;
use Modules\Services\Http\Requests\UpdateBookingongRequest;
use Modules\Services\Repositories\BookingongRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BookingongController extends AdminBaseController
{
    /**
     * @var BookingongRepository
     */
    private $bookingong;

    public function __construct(BookingongRepository $bookingong)
    {
        parent::__construct();

        $this->bookingong = $bookingong;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$bookingongs = $this->bookingong->all();

        return view('services::admin.bookingongs.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('services::admin.bookingongs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBookingongRequest $request
     * @return Response
     */
    public function store(CreateBookingongRequest $request)
    {
        $this->bookingong->create($request->all());

        return redirect()->route('admin.services.bookingong.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('services::bookingongs.title.bookingongs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bookingong $bookingong
     * @return Response
     */
    public function edit(Bookingong $bookingong)
    {
        return view('services::admin.bookingongs.edit', compact('bookingong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Bookingong $bookingong
     * @param  UpdateBookingongRequest $request
     * @return Response
     */
    public function update(Bookingong $bookingong, UpdateBookingongRequest $request)
    {
        $this->bookingong->update($bookingong, $request->all());

        return redirect()->route('admin.services.bookingong.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('services::bookingongs.title.bookingongs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bookingong $bookingong
     * @return Response
     */
    public function destroy(Bookingong $bookingong)
    {
        $this->bookingong->destroy($bookingong);

        return redirect()->route('admin.services.bookingong.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('services::bookingongs.title.bookingongs')]));
    }
}
