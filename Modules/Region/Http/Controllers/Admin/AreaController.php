<?php

namespace Modules\Region\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Region\Entities\Area;
use Modules\Region\Http\Requests\CreateAreaRequest;
use Modules\Region\Http\Requests\UpdateAreaRequest;
use Modules\Region\Repositories\AreaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Region\Repositories\CityRepository;

class AreaController extends AdminBaseController
{
    /**
     * @var AreaRepository
     */
    private $area;

    public function __construct(AreaRepository $area,CityRepository $city)
    {
        parent::__construct();

        $this->area = $area;
         $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $areas = $this->area->all();

        return view('region::admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $city = $this->city->all();
        return view('region::admin.areas.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAreaRequest $request
     * @return Response
     */
    public function store(CreateAreaRequest $request)
    {
        $this->area->create($request->all());

        return redirect()->route('admin.region.area.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('region::areas.title.areas')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Area $area
     * @return Response
     */
    public function edit(Area $area)
    {
         $city = $this->city->all();
        return view('region::admin.areas.edit', compact('area','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Area $area
     * @param  UpdateAreaRequest $request
     * @return Response
     */
    public function update(Area $area, UpdateAreaRequest $request)
    {
        $this->area->update($area, $request->all());

        return redirect()->route('admin.region.area.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('region::areas.title.areas')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Area $area
     * @return Response
     */
    public function destroy(Area $area)
    {
        $this->area->destroy($area);

        return redirect()->route('admin.region.area.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('region::areas.title.areas')]));
    }
}
