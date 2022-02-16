<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Pickupd;
use Modules\Bookings\Http\Requests\CreatePickupdRequest;
use Modules\Bookings\Http\Requests\UpdatePickupdRequest;
use Modules\Bookings\Repositories\PickupdRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PickupdController extends AdminBaseController
{
    /**
     * @var PickupdRepository
     */
    private $pickupd;

    public function __construct(PickupdRepository $pickupd)
    {
        parent::__construct();

        $this->pickupd = $pickupd;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$pickupds = $this->pickupd->all();

        return view('bookings::admin.pickupds.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.pickupds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePickupdRequest $request
     * @return Response
     */
    public function store(CreatePickupdRequest $request)
    {
        $this->pickupd->create($request->all());

        return redirect()->route('admin.bookings.pickupd.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::pickupds.title.pickupds')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pickupd $pickupd
     * @return Response
     */
    public function edit(Pickupd $pickupd)
    {
        return view('bookings::admin.pickupds.edit', compact('pickupd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Pickupd $pickupd
     * @param  UpdatePickupdRequest $request
     * @return Response
     */
    public function update(Pickupd $pickupd, UpdatePickupdRequest $request)
    {
        $this->pickupd->update($pickupd, $request->all());

        return redirect()->route('admin.bookings.pickupd.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::pickupds.title.pickupds')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pickupd $pickupd
     * @return Response
     */
    public function destroy(Pickupd $pickupd)
    {
        $this->pickupd->destroy($pickupd);

        return redirect()->route('admin.bookings.pickupd.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bookings::pickupds.title.pickupds')]));
    }
}
