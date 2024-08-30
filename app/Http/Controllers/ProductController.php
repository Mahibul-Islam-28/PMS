<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('index')
                ->withProducts($products);
    }
    function details($id)
    {
        $product = Product::find($id);
        return view('product.details')
                ->withProduct($product);
    }
    function create()
    {
        $categorys = Category::all();
        return view('product.create')
                ->withCategorys($categorys);
    }
    function store(Request $request)
    {
        $path = "images/products";
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif,svg',
            'title' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'feature' => 'required',
            'category' => 'required',
        ]);

        $category = '';
        if($request->category != null)
        {
            foreach($request->category as $c)
            {
                $category .= $c.', ';
            }
        }

        $feature = '';
        if($request->feature != null)
        {
            foreach($request->feature as $f)
            {
                $feature .= $f.', ';
            }
        }


        $imgName = $request->image->getClientOriginalName();
        $imgName = time().random_int(0,1000) ."." . $request->image->getClientOriginalExtension();
        $request->image->move(public_path($path), $imgName);

        $product = new Product;
        $product->title = $request->title;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->image = $imgName;
        $product->category_id = $category;
        $product->feature = $feature;
        $product->save();

        return redirect(route('index'))
            ->with('success', 'Product Created Successfully.');
    }
    function edit($id)
    {
        $product = Product::find($id);
        if($product)
        {
            return view('product.edit')
                    ->withProduct($product);
        }
        else
        {
            return back()
                    ->with('error', 'Product Not Found');
        }
        
    }
    function update(Request $request, $id)
    {
        $path = "images/products";
        $product = Product::find($id);

        if($product)
        {
            $request->validate([
                'title' => 'required',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric'
            ]);
    
    
            if($request->image)
            {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,jfif,svg'
                ]);
                $imgName = $request->image->getClientOriginalName();
                $imgName = time().random_int(0,1000) ."." . $request->image->getClientOriginalExtension();
                $request->image->move(public_path($path), $imgName);
                $imgPath = $path . $product->image;
                if(File::exists($imgPath)) {

                    unlink($imgPath);
                }
                $product->image = $imgName;
            }

            $product->title = $request->title;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->update();
    
            return redirect(route('index'))
                    ->with('success', 'Product Updated Successfully.');
        }
        else
        {
            return back()
                    ->with('error', 'Product Not Found');
        }
    }
}
