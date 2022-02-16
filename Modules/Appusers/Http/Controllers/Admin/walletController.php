<?php

namespace Modules\Appusers\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Appusers\Entities\wallet;
use Modules\Appusers\Http\Requests\CreatewalletRequest;
use Modules\Appusers\Http\Requests\UpdatewalletRequest;
use Modules\Appusers\Repositories\walletRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Appusers\Repositories\AppuserRepository;
class walletController extends AdminBaseController
{
    /**
     * @var walletRepository
     */
    private $wallet;

    public function __construct(walletRepository $wallet,AppuserRepository $appuser)
    {
        parent::__construct();

        $this->wallet = $wallet;
         $this->appuser = $appuser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $wallets = $this->wallet->all();

        return view('appusers::admin.wallets.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user= $this->appuser->all();
        return view('appusers::admin.wallets.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatewalletRequest $request
     * @return Response
     */
    public function store(CreatewalletRequest $request)
    {
        $this->wallet->create($request->all());
      $service = $this->appuser->findByAttributes(['user_id' => $request->user_id]);
        $walletmoney=$service->wallet+$request->amount;
        $userlist = DB::table('appusers__appusers')
                          ->where('user_id', $request->user_id)
                          ->update(['wallet' => $walletmoney]);
        return redirect()->route('admin.appusers.wallet.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('appusers::wallets.title.wallets')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  wallet $wallet
     * @return Response
     */
    public function edit(wallet $wallet)
    {
        return view('appusers::admin.wallets.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  wallet $wallet
     * @param  UpdatewalletRequest $request
     * @return Response
     */
    public function update(wallet $wallet, UpdatewalletRequest $request)
    {
        $this->wallet->update($wallet, $request->all());

        return redirect()->route('admin.appusers.wallet.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('appusers::wallets.title.wallets')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  wallet $wallet
     * @return Response
     */
    public function destroy(wallet $wallet)
    {
        $this->wallet->destroy($wallet);

        return redirect()->route('admin.appusers.wallet.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('appusers::wallets.title.wallets')]));
    }
}
