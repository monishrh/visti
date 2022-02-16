<?php

namespace Modules\Bookings\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bookings\Entities\Newbookings;
use Modules\Bookings\Http\Requests\CreateNewbookingsRequest;
use Modules\Bookings\Http\Requests\UpdateNewbookingsRequest;
use Modules\Bookings\Repositories\NewbookingsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Bikers\Repositories\BikerRepository;
use Excel;
use DB;
class NewbookingsController extends AdminBaseController
{
    /**
     * @var NewbookingsRepository
     */
    private $newbookings;

    public function __construct(NewbookingsRepository $newbookings,BikerRepository $biker)
    {
        parent::__construct();

        $this->newbookings = $newbookings;
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
         $newbookings = $this->newbookings->getByAttributes(['status' => 0]); 
         $edit=1; 
         $role="";
         $edit1 =""; 
        }
          if($id==1){
         $newbookings = $this->newbookings->getByAttributes(['status' => 1]); 
          $edit=0; 
          $role=""; 
          $edit1 ="";  
        }
          if($id==2){
         $newbookings = $this->newbookings->getByAttributes(['status' => 2]); 
          $edit=0; 
          $role="";
          $edit1 =1; 
        }
          if($id==3){
         $newbookings = $this->newbookings->getByAttributes(['status' => 3]);   
        $edit=0;
        $role=""; 
        $edit1 =1; 
        }
          if($id==4){
         $newbookings = $this->newbookings->getByAttributes(['status' => 4]);   
        $edit=2;
        $role=""; 
        $edit1 =1; 
        }
          if($id==5){
         $newbookings = $this->newbookings->getByAttributes(['status' => 5]);   
         $edit=0;
         $role="";
         $edit1 =1;  
        }
          if($id==6){
         $newbookings = $this->newbookings->getByAttributes(['status' => 6]); 
           $edit=0;
           $role="";
           $edit1 =1;   
        }
          if($id==7){
         $newbookings = $this->newbookings->getByAttributes(['status' => 7]);
           $edit=0;
           $role="Admin"; 
           $edit1 =1;   
        }
         if($id==8){
         $newbookings = $this->newbookings->getByAttributes(['status' => 8]);
           $edit=0;

              $role=""; 
              $edit1 =1;    
        }
    }
    else{
    $newbookings = $this->newbookings->all();
           $edit=0; 
             $role=""; 
              $edit1 =""; 
       }
       return view('bookings::admin.newbookings.index', compact('newbookings','edit','role','edit1'));
    }
     public function export_data(Request $request)
    {
  $products = $this->newbookings->getByAttributes(['status' => 7,'date1'=>$request->fdate]);
    
            // $products = DB::table('bookings__newbookings')
            //             ->where('date1', ">=" , $request->fdate)
            //             ->where('date1', "<=", $request->tdate)
            //              ->where('status',7)
            //             ->get();

        foreach ($products as $product) {
            if($product->user_id != 1) {
                $data['Booking ID'] = $product->id;
                $data['Customer Name'] = $product->user['first_name'];
                $data['Phone'] = $product->user['phone'];
                $data['Email'] = $product->user['email'];
                $data['Gaurage Name'] = $product->store['gaurage_name'];
                $data['Brand'] =  $product->brand1['brand_name'];
                $data['Model'] = $product->model1['model_name'];
                $data['KM Reading Pickup'] =  $product->kmr;
                $data[' KM Reading Drop'] =   $product->kmrd;
                $data['Vehicle Number'] = $product->bike_number;
                $data['Biker Name Pickup'] =  $product->bikerpickup1['first_name']. $product->bikerpickup1['last_name'];
                $data['Biker Contact Pickup'] =  $product->bikerpickup1['phone'];
                 $data['Biker Name Drop'] =  $product->bikerdrop1['first_name']. $product->bikerdrop1['last_name'];
                $data['Biker Contact Drop'] =  $product->bikerdrop1['phone'];
               
               $data['Payment Before Commission'] =$product->payment;
            
               $data['Payment After Commission'] =$product->billpayment;

                if($product->payment_status==1){
                    $pan="PAID";
                }
                else{
                   $pan="NOT PAID"; 
                }

               $data['Payment Status'] =$pan;
            $data['Review'] = $product->review;
               $data['Rating'] =  $product->rating;
               
               
                $resultt[] = $data;
            }
        }
        if(isset($resultt)) {
            return \Excel::create('Order_report', function($excel) use ($resultt) {
                $excel->sheet('sheet name', function($sheet) use ($resultt)
                {
                    $sheet->fromArray($resultt);
                });
            })->download("csv");
        }

         if(isset($resultt)) {
            return \Excel::create('Order_report', function($excel) use ($resultt) {
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings::admin.newbookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNewbookingsRequest $request
     * @return Response
     */
    public function store(CreateNewbookingsRequest $request)
    {

       

        $this->newbookings->create($request->all());

        return redirect()->route('admin.bookings.newbookings.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bookings::newbookings.title.newbookings')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Newbookings $newbookings
     * @return Response
     */
    public function edit(Newbookings $newbookings)
    {
         $areas = DB::table('stores__stores')->where('id', '=',$newbookings->store_id)->get();
          $id=$areas[0]->area_id;
         $bikers =$this->biker->getByAttributes(['area_id' => $id]);
        
        return view('bookings::admin.newbookings.edit', compact('newbookings','bikers'));
    }
     public function view(Newbookings $newbookings)
    {
         $areas = DB::table('stores__stores')->where('id', '=',$newbookings->store_id)->get();
          $id=$areas[0]->area_id;
         $bikers =$this->biker->getByAttributes(['area_id' => $id]);
    return view('bookings::admin.newbookings.view', compact('newbookings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Newbookings $newbookings
     * @param  UpdateNewbookingsRequest $request
     * @return Response
     */
    public function update(Newbookings $newbookings, UpdateNewbookingsRequest $request)
    {
        $this->newbookings->update($newbookings, $request->all());

        return redirect()->route('admin.bookings.newbookings.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bookings::newbookings.title.newbookings')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Newbookings $newbookings
     * @return Response
     */
    public function destroy(Newbookings $newbookings)
    {
        print_r($newbookings->id);die();
        return redirect()->route('admin.bookings.newbookings.index')
            ->withSuccess(trans('Booking Cancelled Sucessfuly', ['name' => trans('bookings::newbookings.title.newbookings')]));
    }
     public function cancel(Request $request)
    {
        $userlist = DB::table('bookings__newbookings')
                          ->where('id', $request->id)
                          ->update(['status' => 8]);
        
        return redirect()->route('admin.bookings.newbookings.index')
            ->withSuccess(trans('Booking Cancelled Sucessfuly', ['name' => trans('bookings::newbookings.title.newbookings')]));
    }
}
