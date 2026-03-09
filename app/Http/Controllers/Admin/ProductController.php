<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductManager;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Models\Product;
class ProductController extends Controller
{
    public function __construct(protected ProductManager $productManager)
    {}

    public function index()
    {
        $products = $this->productManager->getAdminProducts();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $this->productManager->createProduct($request->validated());
        return redirect()->route('admin.products.index')->with('success', 'تم إضافة المنتج بنجاح.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $this->productManager->updateProduct($product, $request->validated());
        return redirect()->route('admin.products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    public function destroy(Product $product)
    {
        $this->productManager->deleteProduct($product);
        return redirect()->route('admin.products.index')->with('success', 'تم حذف المنتج بنجاح.');
    }
}
