<?php

namespace Modules\Services\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Services\Entities\Bookingnew;
use Modules\Services\Http\Requests\CreateBookingnewRequest;
use Modules\Services\Http\Requests\UpdateBookingnewRequest;
use Modules\Services\Repositories\BookingnewRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Bikers\Repositories\BikerRepository;
class BookingnewController extends AdminBaseController
{
    /**
     * @var BookingnewRepository
     */
    private $bookingnew;

    public function __construct(BookingnewRepository $bookingnew,BikerRepository $biker)
    {
        parent::__construct();

        $this->bookingnew = $bookingnew;
           $this->biker = $biker;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         if(isset($_GET['id'])){
        $id=$_GET['id'];
        if($id==0){
         $bookingnews = $this->bookingnew->getByAttributes(['status' => 0]); 
        
        }
         if($id==1){
         $bookingnews = $this->bookingnew->getByAttributes(['status' => 1]); 
          
        }
          if($id==2){
         $bookingnews = $this->bookingnew->getByAttributes(['status' => 2]); 
          
        }
         if($id==3){
         $bookingnews = $this->bookingnew->getByAttributes(['status' => 3]); 
          
        }

    }
        else{
          $bookingnews = $this->bookingnew->all();
   
        }
      return view('services::admin.bookingnews.index', compact('bookingnews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('services::admin.bookingnews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBookingnewRequest $request
     * @return Response
     */
    public function store(CreateBookingnewRequest $request)
    {
        $this->bookingnew->create($request->all());

        return redirect()->route('admin.services.bookingnew.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('services::bookingnews.title.bookingnews')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bookingnew $bookingnew
     * @return Response
     */
    public function edit(Bookingnew $bookingnew)
    {
        $bikers = $this->biker->all();
        return view('services::admin.bookingnews.edit', compact('bookingnew','bikers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Bookingnew $bookingnew
     * @param  UpdateBookingnewRequest $request
     * @return Response
     */
    public function update(Bookingnew $bookingnew, UpdateBookingnewRequest $request)
    {
        $this->bookingnew->update($bookingnew, $request->all());

        return redirect()->route('admin.services.bookingnew.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('services::bookingnews.title.bookingnews')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bookingnew $bookingnew
     * @return Response
     */
    public function destroy(Bookingnew $bookingnew)
    {
        $this->bookingnew->destroy($bookingnew);

        return redirect()->route('admin.services.bookingnew.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('services::bookingnews.title.bookingnews')]));
    }
     public function cancel(Request $request)
    {
        $userlist = DB::table('services__bookingnews')
                          ->where('id', $request->id)
                          ->update(['status' => 3]);
        
        return redirect()->route('admin.services.bookingnew.index')
            ->withSuccess(trans('Booking Cancelled Sucessfuly', ['name' => trans('Booking Cancelled Sucessfuly')]));
    }
}
