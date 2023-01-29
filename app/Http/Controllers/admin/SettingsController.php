<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\SubCategory;
use App\Models\admin\Brands;
use Illuminate\Http\Request;
use File;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::get();
        $page = 'settings';
        $subpage = 'category';
        $title = "Category";
        return view('admin.settings.categories.index',compact('page','subpage','title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'settings';
        $subpage = 'category';
        $title = "Category";
        return view('admin.settings.categories.create',compact('page','subpage','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $folder = 'uploads/category';
        
        $save_name = $this->saveFile($folder,$request->image);

        $insert_data = array(
            'name' => $request->name,
            'image' => $save_name,
            'status' => $request->status,
        );

        $category = Category::create($insert_data);
        if($category){
            $msg = 'Category saved successfully';
        }else{
            $msg = 'Something went wrong, please try again';
        }

        return redirect("admin/category-settings")->withSuccess($msg);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::where('id',$id)->first();
        $page = 'settings';
        $subpage = 'category';
        $title = "Category";
        return view('admin.settings.categories.edit',compact('page','subpage','title','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $folder = 'uploads/category';
        $save_name = $this->saveFile($folder,$request->image);

        $update_data = array(
            'name' => $request->name,
            'image' => $save_name,
            'status' => $request->status,
        );

        Category::where('id', $request->id)
        ->update($update_data);

        return redirect("admin/category-settings")->withSuccess("Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Category::where('id', $id)->delete();
        return redirect("admin/category-settings")->withSuccess("Category Deleted Successfully");
    }

    public function index_subcategory()
    {
        $data = SubCategory::select('sub_categories.*','categories.name as categoryname')->join('categories', 'categories.id', '=', 'sub_categories.category_id')->get();
        $page = 'settings';
        $subpage = 'subcategory';
        $title = "Sub Category";
        return view('admin.settings.subCategories.index',compact('page','subpage','title','data'));
    }

    public function create_subcategory()
    {
        $data = Category::where('status', 1)->get();
        $page = 'settings';
        $subpage = 'subcategory';
        $title = "Sub Category";
        return view('admin.settings.subCategories.create',compact('page','subpage','title','data'));
    }

    public function store_subcategory(Request $request)
    {
        $insert_data = array(
            'category_id' => $request->category_id,
            'name' => $request->name,
            'status' => $request->status,
        );

        $subcategory = SubCategory::create($insert_data);
        if($subcategory){
            $msg = 'Sub Category saved successfully';
        }else{
            $msg = 'Something went wrong, please try again';
        }

        return redirect("admin/subcategory-settings")->withSuccess($msg);
    }

    public function edit_subcategory($id)
    {
        $data = SubCategory::where('id',$id)->first();
        $categories = Category::where('status', 1)->get();
        $page = 'settings';
        $subpage = 'subcategory';
        $title = "Sub Category";
        return view('admin.settings.subCategories.edit',compact('page','subpage','title','data','categories'));
    }

    public function update_subcategory(Request $request)
    {
        $update_data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'status' => $request->status,
        );

        SubCategory::where('id', $request->id)
        ->update($update_data);

        return redirect("admin/subcategory-settings")->withSuccess("Sub Category Updated Successfully");
    }

    public function destroy_subcategory($id)
    {
        $deleted = SubCategory::where('id', $id)->delete();
        return redirect("admin/subcategory-settings")->withSuccess("Sub Category Deleted Successfully");
    }
}
