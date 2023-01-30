<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Products;
use App\Models\admin\Category;
use App\Models\admin\SubCategory;
use App\Models\admin\Brands;
use App\Models\admin\Colors;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        $subCategory = SubCategory::get();
        $brands = Brands::get();
        $colors = Colors::get();
        $page = 'products';
        $subpage = 'product_ecom';
        $title = "Products";
        return view('admin.products.ecom.index',compact('page','subpage','title','category','subCategory','brands','colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        $subCategory = SubCategory::get();
        $brands = Brands::get();
        $colors = Colors::get();
        $page = 'products';
        $subpage = 'product_ecom';
        $title = "Products";
        return view('admin.products.ecom.create',compact('page','subpage','title','category','subCategory','brands','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url_key =  strtolower(str_replace(' ', '-', $request->name));
        $url_key = preg_replace('/[^A-Za-z0-9\-]/', '', $url_key);

        $folder = 'uploads/products';
        $save_name = $this->saveFile($folder,$request->thumbnail);

        $insert_data = array(
            'name' => $request->name,
            'url_key' => $url_key,
            'sku' => 'BG-'.time(),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'price' => $request->price,
            'thumbnail' => '/'.$save_name,
            'browse_by' => $request->browse_by,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'specification' => $request->specification,
            'related_products' => $request->related_products,
        );

        $products = Products::create($insert_data);
        if($products){
            $product_id = $products->id;

            if($request->hasfile('product_images'))
            {
                $folder = 'uploads/products/'.$product_id;
                $path = public_path($folder);
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
    
                $i = 0;
               foreach($request->file('product_images') as $key => $file)
               {
                    $save_name = $this->saveFile($folder,$file);
                    DB::table('product_images')->insert([
                        'path' => '/'.$save_name,
                        'product_id' => $product_id,
                        'position' => $i,
                    ]);
                   $i++;
               }
            }
            $msg = 'Product created successfully';
        }else{
            $msg = 'Something went wrong, please try again';
        }
       
        return redirect("admin/products-ecom-index")->withSuccess($msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

    public function saveFile($folder,$request_image){

        $path = public_path($folder);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $fileName = time().'_'.random_int(100000, 999999).'.'.$request_image->extension();  
        $request_image->move($path, $fileName);
        return $folder.'/'.$fileName;
    }
}
