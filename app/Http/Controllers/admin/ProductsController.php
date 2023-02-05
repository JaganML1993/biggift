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
        $products = Products::select('products.*','categories.name as categoryname','sub_categories.name as subcategoryname','product_colors.color','product_colors.color_code','brands.name as brandname')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.subcategory_id')
            ->join('product_colors', 'product_colors.id', '=', 'products.color_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.deleted',0)
            ->get();
        
        $page = 'products';
        $subpage = 'product_ecom';
        $title = "Products";
        return view('admin.products.ecom.index',compact('page','subpage','title','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        $subCategory = SubCategory::where('status',1)->get();
        $brands = Brands::where('status',1)->get();
        $colors = Colors::where('status',1)->get();
        $products = Products::where('status',1)->get();

        $page = 'products';
        $subpage = 'product_ecom';
        $title = "Products";
        return view('admin.products.ecom.create',compact('page','subpage','title','category','subCategory','brands','colors','products'));
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

        $related_products = implode(',',$request->related_products);

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
            'related_products' => $related_products,
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('status',1)->get();
        $subCategory = SubCategory::where('status',1)->get();
        $brands = Brands::where('status',1)->get();
        $colors = Colors::where('status',1)->get();
        $products = Products::where('status',1)->get();

        $product_edit = Products::select('products.*','categories.name as categoryname','sub_categories.name as subcategoryname','product_colors.color','product_colors.color_code','brands.name as brandname')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.subcategory_id')
            ->join('product_colors', 'product_colors.id', '=', 'products.color_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.id',$id)
            ->first();

        $product_images = DB::table('product_images')->select('product_images.*')
            ->where('product_images.product_id',$id)
            ->orderBy('product_images.position','asc')
            ->get();
        
        $page = 'products';
        $subpage = 'product_ecom';
        $title = "Products";
        return view('admin.products.ecom.edit',compact('page','subpage','title','product_edit','products','category','subCategory','brands','colors','product_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $related_products = implode(',',$request->related_products);

        $update_data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'status' => $request->status,
            'price' => $request->price,
            'browse_by' => $request->browse_by,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'specification' => $request->specification,
            'related_products' => $related_products,
        );

        if($request->thumbnail){
            
            $thumbnail_path = Products::select('thumbnail')->where('id', $request->id)->first();
            $file_path = public_path('').$thumbnail_path->thumbnail;
            unlink($file_path);

            $folder = 'uploads/products/'.$request->id;
            $save_name = $this->saveFile($folder,$request->thumbnail);
            $update_data['thumbnail'] = '/'.$save_name;
        }

        Products::where('id', $request->id)
            ->update($update_data);

        $product_id = $request->id;

        if($request->hasfile('product_images'))
        {
            $folder = 'uploads/products/'.$product_id;
            $path = public_path($folder);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            foreach($request->file('product_images') as $key => $file)
            {
                $save_name = $this->saveFile($folder,$file);
                DB::table('product_images')->insert([
                    'path' => '/'.$save_name,
                    'product_id' => $product_id,
                    'position' => 1,
                ]);
            }
        }

        $msg = 'Product updated successfully';
        return redirect("admin/products-ecom-index")->withSuccess($msg);
    }

    public function delete($id)
    {
        Products::where('id', $id)
            ->update(['deleted' => 1]);

        $msg = 'Product deleted successfully';
        return redirect("admin/products-ecom-index")->withSuccess($msg);
    }


    public function saveFile($folder,$request_image)
    {
        $path = public_path($folder);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $fileName = time().'_'.random_int(100000, 999999).'.'.$request_image->extension();  
        $request_image->move($path, $fileName);
        return $folder.'/'.$fileName;
    }

    public function delete_image(Request $request)
    {
        $product_images = DB::table('product_images')->select('product_images.path')
            ->where('product_images.id',$request->id)
            ->first();

        $deleted = DB::table('product_images')->where('id', $request->id)->delete();
        if($deleted){
            $file_path = public_path('').$product_images->path;
            unlink($file_path);
            return redirect()->back()->with('success', 'Product Image Deleted Successfully');
        }
    }
}
