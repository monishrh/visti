<?php

namespace Modules\Towing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Towing\Entities\tvendors;
use Modules\Towing\Http\Requests\CreatetvendorsRequest;
use Modules\Towing\Http\Requests\UpdatetvendorsRequest;
use Modules\Towing\Repositories\tvendorsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Region\Repositories\CityRepository;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;
class tvendorsController extends AdminBaseController
{
    /**
     * @var tvendorsRepository
     */
    private $tvendors;

    public function __construct(tvendorsRepository $tvendors,CityRepository $city, UserRepository $user,
        RoleRepository $role)
    {
        parent::__construct();

        $this->tvendors = $tvendors;
        $this->user = $user;
        $this->role = $role;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tvendors = $this->tvendors->all();

        return view('towing::admin.tvendors.index', compact('tvendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $city = $this->city->all();
        return view('towing::admin.tvendors.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatetvendorsRequest $request
     * @return Response
     */
    public function store(CreatetvendorsRequest $request)
    {
       $role_type = $this->role->findByName(['name' => "towingvendor"]);
       if(isset($role_type->name)){
           
           $user_detail = $this->user->createWithRoles($request->all(),$role_type->id,true);
            if(isset($user_detail->id))
           {
               $request->merge(['user_id' => $user_detail->id]);
            }
           
      }
        $this->tvendors->create($request->all());

        return redirect()->route('admin.towing.tvendors.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::tvendors.title.tvendors')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  tvendors $tvendors
     * @return Response
     */
    public function edit(tvendors $tvendors)
    {
        $city = $this->city->all();
        return view('towing::admin.tvendors.edit', compact('tvendors','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  tvendors $tvendors
     * @param  UpdatetvendorsRequest $request
     * @return Response
     */
    public function update(tvendors $tvendors, UpdatetvendorsRequest $request)
    {
        $this->tvendors->update($tvendors, $request->all());

        return redirect()->route('admin.towing.tvendors.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('towing::tvendors.title.tvendors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  tvendors $tvendors
     * @return Response
     */
    public function destroy(tvendors $tvendors)
    {
        $this->tvendors->destroy($tvendors);

        return redirect()->route('admin.towing.tvendors.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('towing::tvendors.title.tvendors')]));
    }
}
