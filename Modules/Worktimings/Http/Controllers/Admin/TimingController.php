<?php

namespace Modules\Worktimings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Worktimings\Entities\Timing;
use Modules\Worktimings\Http\Requests\CreateTimingRequest;
use Modules\Worktimings\Http\Requests\UpdateTimingRequest;
use Modules\Worktimings\Repositories\TimingRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TimingController extends AdminBaseController
{
    /**
     * @var TimingRepository
     */
    private $timing;

    public function __construct(TimingRepository $timing)
    {
        parent::__construct();

        $this->timing = $timing;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $timings = $this->timing->all();

        return view('worktimings::admin.timings.index', compact('timings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('worktimings::admin.timings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTimingRequest $request
     * @return Response
     */
    public function store(CreateTimingRequest $request)
    {
        $this->timing->create($request->all());

        return redirect()->route('admin.worktimings.timing.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('worktimings::timings.title.timings')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Timing $timing
     * @return Response
     */
    public function edit(Timing $timing)
    {
        return view('worktimings::admin.timings.edit', compact('timing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Timing $timing
     * @param  UpdateTimingRequest $request
     * @return Response
     */
    public function update(Timing $timing, UpdateTimingRequest $request)
    {
        $this->timing->update($timing, $request->all());

        return redirect()->route('admin.worktimings.timing.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('worktimings::timings.title.timings')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Timing $timing
     * @return Response
     */
    public function destroy(Timing $timing)
    {
        $this->timing->destroy($timing);

        return redirect()->route('admin.worktimings.timing.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('worktimings::timings.title.timings')]));
    }
}
