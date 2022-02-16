<?php

namespace Modules\Services\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Services\Entities\Service;
use Modules\Services\Http\Requests\CreateServiceRequest;
use Modules\Services\Http\Requests\UpdateServiceRequest;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ServiceController extends AdminBaseController
{
    /**
     * @var ServiceRepository
     */
    private $service;

    public function __construct(ServiceRepository $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = $this->service->all();

        return view('services::admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('services::admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateServiceRequest $request
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $this->service->create($request->all());

        return redirect()->route('admin.services.service.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('services::services.title.services')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Service $service
     * @return Response
     */
    public function edit(Service $service)
    {
        return view('services::admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Service $service
     * @param  UpdateServiceRequest $request
     * @return Response
     */
    public function update(Service $service, UpdateServiceRequest $request)
    {
        $this->service->update($service, $request->all());

        return redirect()->route('admin.services.service.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('services::services.title.services')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Service $service
     * @return Response
     */
    public function destroy(Service $service)
    {
        $this->service->destroy($service);

        return redirect()->route('admin.services.service.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('services::services.title.services')]));
    }
}
