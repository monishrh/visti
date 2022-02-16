<?php

namespace Modules\Appusers\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Appusers\Entities\Appuser;
use Modules\Appusers\Http\Requests\CreateAppuserRequest;
use Modules\Appusers\Http\Requests\UpdateAppuserRequest;
use Modules\Appusers\Repositories\AppuserRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;
use Excel;
class AppuserController extends AdminBaseController
{
    /**
     * @var AppuserRepository
     */
    private $appuser;

    public function __construct(AppuserRepository $appuser,UserRepository $user,
        RoleRepository $role)
    {
        parent::__construct();

        $this->appuser = $appuser;
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $appusers = $this->appuser->all();

        return view('appusers::admin.appusers.index', compact('appusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('appusers::admin.appusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAppuserRequest $request
     * @return Response
     */
    public function store(CreateAppuserRequest $request)
    {
           $role_type = $this->role->findByName(['name' => "user"]);
       if(isset($role_type->name))
        {
          
          $user_detail = $this->user->createWithRoles($request->all(),$role_type->id,true);
            if(isset($user_detail->id))
            {
               $request->merge(['user_id' => $user_detail->id]);
            }
           
        }
        $this->appuser->create($request->all());

        return redirect()->route('admin.appusers.appuser.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('appusers::appusers.title.appusers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Appuser $appuser
     * @return Response
     */
    public function edit(Appuser $appuser)
    {
        return view('appusers::admin.appusers.edit', compact('appuser'));
    }
  public function export_data(Request $request)
    {
  $products =$this->appuser->all();
    
            // $products = DB::table('bookings__newbookings')
            //             ->where('date1', ">=" , $request->fdate)
            //             ->where('date1', "<=", $request->tdate)
            //              ->where('status',7)
            //             ->get();

        foreach ($products as $product) {
            if($product->user_id != 1) {
                $data['SL No'] = $product->id;
                $data['Customer Name'] = $product->first_name;
                $data['Phone'] = $product->phone;
                $data['Email'] = $product->email;
               
               
                $resultt[] = $data;
            }
        }
        if(isset($resultt)) {
            return \Excel::create('App_user', function($excel) use ($resultt) {
                $excel->sheet('sheet name', function($sheet) use ($resultt)
                {
                    $sheet->fromArray($resultt);
                });
            })->download("csv");
        }

         if(isset($resultt)) {
            return \Excel::create('App_user', function($excel) use ($resultt) {
                $excel->sheet('sheet name', function($sheet) use ($resultt)
                {
                    $sheet->fromArray($resultt);
                });
            })->download("csv");
        }
      return redirect()->route('admin.bookings.newbookings.index')
            ->withError(trans('No Reports Available', ['name' => trans('bookings::newbookings.title.newbookings')]));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Appuser $appuser
     * @param  UpdateAppuserRequest $request
     * @return Response
     */
    public function update(Appuser $appuser, UpdateAppuserRequest $request)
    {
        $this->appuser->update($appuser, $request->all());

        return redirect()->route('admin.appusers.appuser.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('appusers::appusers.title.appusers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Appuser $appuser
     * @return Response
     */
    public function destroy(Appuser $appuser)
    {
        $this->appuser->destroy($appuser);

        return redirect()->route('admin.appusers.appuser.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('appusers::appusers.title.appusers')]));
    }
}
