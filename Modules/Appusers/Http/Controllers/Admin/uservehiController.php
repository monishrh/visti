<?php

namespace Modules\Appusers\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Appusers\Entities\uservehi;
use Modules\Appusers\Http\Requests\CreateuservehiRequest;
use Modules\Appusers\Http\Requests\UpdateuservehiRequest;
use Modules\Appusers\Repositories\uservehiRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class uservehiController extends AdminBaseController
{
    /**
     * @var uservehiRepository
     */
    private $uservehi;

    public function __construct(uservehiRepository $uservehi)
    {
        parent::__construct();

        $this->uservehi = $uservehi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $uservehis = $this->uservehi->all();

        return view('appusers::admin.uservehis.index', compact('uservehis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('appusers::admin.uservehis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateuservehiRequest $request
     * @return Response
     */
    public function store(CreateuservehiRequest $request)
    {
        $this->uservehi->create($request->all());

        return redirect()->route('admin.appusers.uservehi.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('appusers::uservehis.title.uservehis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  uservehi $uservehi
     * @return Response
     */
    public function edit(uservehi $uservehi)
    {
        return view('appusers::admin.uservehis.edit', compact('uservehi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  uservehi $uservehi
     * @param  UpdateuservehiRequest $request
     * @return Response
     */
    public function update(uservehi $uservehi, UpdateuservehiRequest $request)
    {
        $this->uservehi->update($uservehi, $request->all());

        return redirect()->route('admin.appusers.uservehi.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('appusers::uservehis.title.uservehis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  uservehi $uservehi
     * @return Response
     */
    public function destroy(uservehi $uservehi)
    {
        $this->uservehi->destroy($uservehi);

        return redirect()->route('admin.appusers.uservehi.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('appusers::uservehis.title.uservehis')]));
    }
}
