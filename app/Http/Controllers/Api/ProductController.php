<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private Product $product;

    public function __construct(Product $product)
    {

        $this->product = $product;
    }

    public function index(Request $request) {
        $products = $this->product;

        if($request->has('conditions')) {
            // Istância o repository e chama função para conditions.
            $products = (new ProductRepository($products, $request))
                            ->selectConditions($request->get('conditions'));
        }

        if($request->has('fields')) {
            // Outra maneira de instanciar o repository.
            $products = new ProductRepository($products, $request);
            $products = $products->selectFilter($request->get('fields'));
        }

        // return response()->json($products);
        return new ProductCollection($products->paginate(10));
    }

    public function show($id) {
        $product = $this->product->find($id);

//        return response()->json($product);
        return new ProductResource($product);
    }

    public function save(Request $request) {
        $data = $request->all();
        $product = $this->product->create($data);
        return response()->json($product);
    }

    public function update(Request $request) {
        $data = $request->all();
        $product = $this->product->find($data['id']);
        $product->update($data);
        return response()->json($product);
    }

    public function delete($id) {
        $product = $this->product->find($id);
        $product->delete();

        return response()->json(['data' => ['msg' => 'Produto foi removido com sucesso!']]);
    }
}
