<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Pickup;
use Modules\Bookings\Http\Requests\CreatePickupRequest;
use Modules\Bookings\Http\Requests\UpdatePickupRequest;
use Modules\Bookings\Repositories\PickupRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PickupController extends AdminBaseController
{
    /**
     * @var PickupRepository
     */
    private $pickup;

    public function __construct(PickupRepository $pickup)
    {
        parent::__construct();

        $this->pickup = $pickup;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$pickups = $this->pickup->all();

        return view('bookings::admin.pickups.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.pickups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePickupRequest $request
     * @return Response
     */
    public function store(CreatePickupRequest $request)
    {
        $this->pickup->create($request->all());

        return redirect()->route('admin.bookings.pickup.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::pickups.title.pickups')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pickup $pickup
     * @return Response
     */
    public function edit(Pickup $pickup)
    {
        return view('bookings::admin.pickups.edit', compact('pickup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Pickup $pickup
     * @param  UpdatePickupRequest $request
     * @return Response
     */
    public function update(Pickup $pickup, UpdatePickupRequest $request)
    {
        $this->pickup->update($pickup, $request->all());

        return redirect()->route('admin.bookings.pickup.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::pickups.title.pickups')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pickup $pickup
     * @return Response
     */
    public function destroy(Pickup $pickup)
    {
        $this->pickup->destroy($pickup);

        return redirect()->route('admin.bookings.pickup.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bookings::pickups.title.pickups')]));
    }
}
