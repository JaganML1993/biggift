<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\HomeProducts;
use App\Models\admin\CompanyHomeDelivery;
use App\Models\admin\Brands;
use App\Models\admin\Colors;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\DB;

class HomeDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = HomeProducts::select('products_home.*','micro_enquiry.company','product_colors.color','product_colors.color_code','brands.name as brandname')
            ->join('micro_enquiry', 'micro_enquiry.id', '=', 'products_home.company_id')
            ->join('product_colors', 'product_colors.id', '=', 'products_home.color_id')
            ->join('brands', 'brands.id', '=', 'products_home.brand_id')
            ->where('products_home.deleted',0)
            ->get();

        $page = 'products_home';
        $subpage = 'product_home_delivery';
        $title = "Products";
        return view('admin.products.home_delivery.index',compact('page','subpage','title','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brands::where('status',1)->get();
        $colors = Colors::where('status',1)->get();
        $products = HomeProducts::where('status',1)->get();
        $company = CompanyHomeDelivery::where('status',1)->where('approval',1)->get();

        $page = 'products_home';
        $subpage = 'product_home_delivery';
        $title = "Products";
        return view('admin.products.home_delivery.create',compact('page','subpage','title','brands','colors','products','company'));
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

        $folder = 'uploads/productsHome';
        $save_name = $this->saveFile($folder,$request->thumbnail);

        $insert_data = array(
            'name' => $request->name,
            'url_key' => $url_key,
            'sku' => 'BG-'.time(),
            'company_id' => $request->company_id,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'price' => $request->price,
            'thumbnail' => '/'.$save_name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'specification' => $request->specification,
        );

        $products = HomeProducts::create($insert_data);
        if($products){
            $product_id = $products->id;

            if($request->hasfile('product_images'))
            {
                $folder = 'uploads/productsHome/'.$product_id;
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
                        'image_for' => 'home',
                    ]);
                   $i++;
               }
            }
            $msg = 'Product created successfully';
        }else{
            $msg = 'Something went wrong, please try again';
        }
       
        return redirect("admin/products-home_delivery-index")->withSuccess($msg);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brands::where('status',1)->get();
        $colors = Colors::where('status',1)->get();
        $company = CompanyHomeDelivery::where('status',1)->where('approval',1)->get();

        $product_edit = HomeProducts::select('products_home.*','micro_enquiry.company','product_colors.color','product_colors.color_code','brands.name as brandname')
            ->join('micro_enquiry', 'micro_enquiry.id', '=', 'products_home.company_id')
            ->join('product_colors', 'product_colors.id', '=', 'products_home.color_id')
            ->join('brands', 'brands.id', '=', 'products_home.brand_id')
            ->where('products_home.id',$id)
            ->first();

        $product_images = DB::table('product_images')->select('product_images.*')
            ->where('product_images.product_id',$id)
            ->where('product_images.image_for','home')
            ->orderBy('product_images.position','asc')
            ->get();
        
        $page = 'products_home';
        $subpage = 'product_home_delivery';
        $title = "Products";
        return view('admin.products.home_delivery.edit',compact('page','subpage','title','product_edit','brands','colors','product_images','company'));
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
        $update_data = array(
            'name' => $request->name,
            'company_id' => $request->company_id,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'status' => $request->status,
            'price' => $request->price,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'specification' => $request->specification,
        );

        if($request->thumbnail){
            
            $thumbnail_path = HomeProducts::select('thumbnail')->where('id', $request->id)->first();
            $file_path = public_path('').$thumbnail_path->thumbnail;
            unlink($file_path);

            $folder = 'uploads/productsHome/'.$request->id;
            $save_name = $this->saveFile($folder,$request->thumbnail);
            $update_data['thumbnail'] = '/'.$save_name;
        }

        HomeProducts::where('id', $request->id)
            ->update($update_data);

        $product_id = $request->id;

        if($request->hasfile('product_images'))
        {
            $folder = 'uploads/productsHome/'.$product_id;
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
                    'image_for' => 'home',
                ]);
            }
        }

        $msg = 'Product updated successfully';
        return redirect("admin/products-home_delivery-index")->withSuccess($msg);
    }

    public function delete($id)
    {
        HomeProducts::where('id', $id)
            ->update(['deleted' => 1]);

        $msg = 'Product deleted successfully';
        return redirect("admin/products-home_delivery-index")->withSuccess($msg);
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
            ->where('product_images.image_for','home')
            ->first();

        $deleted = DB::table('product_images')->where('id', $request->id)->where('image_for','home')->delete();
        if($deleted){
            $file_path = public_path('').$product_images->path;
            unlink($file_path);
            return redirect()->back()->with('success', 'Product Image Deleted Successfully');
        }
    }
}
