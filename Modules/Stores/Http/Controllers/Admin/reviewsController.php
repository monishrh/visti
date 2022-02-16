<?php

namespace Modules\Stores\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Stores\Entities\reviews;
use Modules\Stores\Http\Requests\CreatereviewsRequest;
use Modules\Stores\Http\Requests\UpdatereviewsRequest;
use Modules\Stores\Repositories\reviewsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class reviewsController extends AdminBaseController
{
    /**
     * @var reviewsRepository
     */
    private $reviews;

    public function __construct(reviewsRepository $reviews)
    {
        parent::__construct();

        $this->reviews = $reviews;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reviews = $this->reviews->all();

        return view('stores::admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('stores::admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatereviewsRequest $request
     * @return Response
     */
    public function store(CreatereviewsRequest $request)
    {
        $this->reviews->create($request->all());

        return redirect()->route('admin.stores.reviews.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('stores::reviews.title.reviews')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  reviews $reviews
     * @return Response
     */
    public function edit(reviews $reviews)
    {
        return view('stores::admin.reviews.edit', compact('reviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  reviews $reviews
     * @param  UpdatereviewsRequest $request
     * @return Response
     */
    public function update(reviews $reviews, UpdatereviewsRequest $request)
    {
        $this->reviews->update($reviews, $request->all());

        return redirect()->route('admin.stores.reviews.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('stores::reviews.title.reviews')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  reviews $reviews
     * @return Response
     */
    public function destroy(reviews $reviews)
    {
        $this->reviews->destroy($reviews);

        return redirect()->route('admin.stores.reviews.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('stores::reviews.title.reviews')]));
    }
}
