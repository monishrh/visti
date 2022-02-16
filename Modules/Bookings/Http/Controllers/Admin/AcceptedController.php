<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Accepted;
use Modules\Bookings\Http\Requests\CreateAcceptedRequest;
use Modules\Bookings\Http\Requests\UpdateAcceptedRequest;
use Modules\Bookings\Repositories\AcceptedRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AcceptedController extends AdminBaseController
{
    /**
     * @var AcceptedRepository
     */
    private $accepted;

    public function __construct(AcceptedRepository $accepted)
    {
        parent::__construct();

        $this->accepted = $accepted;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$accepteds = $this->accepted->all();

        return view('bookings::admin.accepteds.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.accepteds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAcceptedRequest $request
     * @return Response
     */
    public function store(CreateAcceptedRequest $request)
    {
        $this->accepted->create($request->all());

        return redirect()->route('admin.bookings.accepted.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::accepteds.title.accepteds')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Accepted $accepted
     * @return Response
     */
    public function edit(Accepted $accepted)
    {
        return view('bookings::admin.accepteds.edit', compact('accepted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Accepted $accepted
     * @param  UpdateAcceptedRequest $request
     * @return Response
     */
    public function update(Accepted $accepted, UpdateAcceptedRequest $request)
    {
        $this->accepted->update($accepted, $request->all());

        return redirect()->route('admin.bookings.accepted.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::accepteds.title.accepteds')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Accepted $accepted
     * @return Response
     */
    public function destroy(Accepted $accepted)
    {
        $this->accepted->destroy($accepted);

        return redirect()->route('admin.bookings.accepted.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bookings::accepteds.title.accepteds')]));
    }
}
