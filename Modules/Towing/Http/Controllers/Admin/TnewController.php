<?php

namespace Modules\Towing\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Towing\Entities\Tnew;
use Modules\Towing\Http\Requests\CreateTnewRequest;
use Modules\Towing\Http\Requests\UpdateTnewRequest;
use Modules\Towing\Repositories\TnewRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Towing\Repositories\tvendorsRepository;
use DB;
class TnewController extends AdminBaseController
{
    /**
     * @var TnewRepository
     */
    private $tnew;

    public function __construct(TnewRepository $tnew,tvendorsRepository $tvendors)
    {
        parent::__construct();

        $this->tnew = $tnew;
        $this->tvendors = $tvendors;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   if(isset($_GET['id'])){
        $id=$_GET['id'];
        if($id==0){
         $tnews = $this->tnew->getByAttributes(['status' => 0]); 
        
        }
         if($id==1){
         $tnews = $this->tnew->getByAttributes(['status' => 1]); 
          
        }
          if($id==2){
         $tnews = $this->tnew->getByAttributes(['status' => 2]); 
          
        }
         if($id==4){
         $tnews = $this->tnew->getByAttributes(['status' => 4]); 
          
        }

    }
        else{
        $tnews = $this->tnew->all();
    return view('towing::admin.tnews.index', compact('tnews'));
        }
       

        return view('towing::admin.tnews.index', compact('tnews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('towing::admin.tnews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTnewRequest $request
     * @return Response
     */
    public function store(CreateTnewRequest $request)
    {
        $this->tnew->create($request->all());

        return redirect()->route('admin.towing.tnew.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::tnews.title.tnews')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tnew $tnew
     * @return Response
     */
    public function edit(Tnew $tnew)
    {
        $vendor= $this->tvendors->all();
        return view('towing::admin.tnews.edit', compact('tnew','vendor'));
    }

public function cancel(Request $request)
    {
        $userlist = DB::table('towing__tnews')
                          ->where('id', $request->id)
                          ->update(['status' => 4]);
        
      return redirect()->route('admin.towing.tnew.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::tnews.title.tnews')]));
    }
public function change(Request $request)
    {
        $userlist = DB::table('towing__tnews')
                          ->where('id', $request->id)
                          ->update(['status' => 2]);
        
      return redirect()->route('admin.towing.tnew.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('towing::tnews.title.tnews')]));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Tnew $tnew
     * @param  UpdateTnewRequest $request
     * @return Response
     */
    public function update(Tnew $tnew, UpdateTnewRequest $request)
    {
        $this->tnew->update($tnew, $request->all());

        return redirect()->route('admin.towing.tnew.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('towing::tnews.title.tnews')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tnew $tnew
     * @return Response
     */
    public function destroy(Tnew $tnew)
    {
        $this->tnew->destroy($tnew);

        return redirect()->route('admin.towing.tnew.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('towing::tnews.title.tnews')]));
    }
}
