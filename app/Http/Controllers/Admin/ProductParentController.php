<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductParent\ProductParentResource;
use App\Models\ProductParent;
use App\Services\ProductParentService;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductParent\StoreRequest;
use App\Http\Requests\Admin\ProductParent\UpdateRequest;
use Illuminate\Http\Response;

class ProductParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_parents = ProductParent::all();
        $product_parents = ProductParentResource::collection($product_parents)->resolve();

        return inertia('Admin/ProductParent/Index', compact('product_parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/ProductParent/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $product_parent = ProductParentService::store($data);

        return ProductParentResource::make($product_parent)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductParent $product_parent)
    {
        $product_parent = ProductParentResource::make($product_parent)->resolve();

        return inertia('Admin/ProductParent/Show', compact('product_parent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductParent $product_parent)
    {
        $product_parent = ProductParentResource::make($product_parent)->resolve();

        return inertia('Admin/ProductParent/Edit', compact('product_parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ProductParent $product_parent)
    {
        $data = $request->validated();
        $product_parent = ProductParentService::update($data);

        return ProductParentResource::make($product_parent)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductParent $product_parent)
    {
        $product_parent->delete();

        return response()->json([
            'message' => 'Товар удален успешно'
        ], Response::HTTP_OK);
    }
}
