<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Rdel;
use Modules\Bookings\Http\Requests\CreateRdelRequest;
use Modules\Bookings\Http\Requests\UpdateRdelRequest;
use Modules\Bookings\Repositories\RdelRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class RdelController extends AdminBaseController
{
    /**
     * @var RdelRepository
     */
    private $rdel;

    public function __construct(RdelRepository $rdel)
    {
        parent::__construct();

        $this->rdel = $rdel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$rdels = $this->rdel->all();

        return view('bookings::admin.rdels.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.rdels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRdelRequest $request
     * @return Response
     */
    public function store(CreateRdelRequest $request)
    {
        $this->rdel->create($request->all());

        return redirect()->route('admin.bookings.rdel.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::rdels.title.rdels')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rdel $rdel
     * @return Response
     */
    public function edit(Rdel $rdel)
    {
        return view('bookings::admin.rdels.edit', compact('rdel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Rdel $rdel
     * @param  UpdateRdelRequest $request
     * @return Response
     */
    public function update(Rdel $rdel, UpdateRdelRequest $request)
    {
        $this->rdel->update($rdel, $request->all());

        return redirect()->route('admin.bookings.rdel.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::rdels.title.rdels')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Rdel $rdel
     * @return Response
     */
    public function destroy(Rdel $rdel)
    {
        $this->rdel->destroy($rdel);

        return redirect()->route('admin.bookings.rdel.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bookings::rdels.title.rdels')]));
    }
}
