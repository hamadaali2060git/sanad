<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:specialities', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

    }
     public function index()
    {
        $categories=Category::all();
        return view('admin.categories.all',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }



    public function store(Request $request)
    {
        $this->validate( $request,[
                'title_ar'=>'required',
                'title_en'=>'required',

            ],
            [
                'title_ar.required'=>'التخصص عربي',
                'title_en.required'=>'التخصص انجليزي',

            ]
        );
        $add = new Category;
        $add->title_ar= $request->title_ar;
        $add->title_en= $request->title_en;
        $add->slug_ar =Str::slug($request->title_ar, '-', Null);
        $add->slug_en =Str::slug($request->title_en, '-', Null);
        $add->save();
        return redirect()->back()->with("message", 'تم الإضافة بنجاح');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request)
    {

        $edit = Category::findOrFail($request->id);

        if($request->title_ar !=''){
            $edit->title_ar    = $request->title_ar;
            $edit->slug_ar =Str::slug($request->title_ar, '-', Null);
         }else{
            $edit->title_ar    = $edit->title_ar;
        }
        if($request->title_en !=''){
            $edit->title_en    = $request->title_en;
            $edit->slug_en =Str::slug($request->title_en, '-', Null);
         }else{
            $edit->title_en    = $edit->title_en;
        }
        $edit->save();
        return redirect()->route('categories.index')->with("message", 'تم التعديل بنجاح');
    }

    public function destroy(Request $request )
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->route('categories.index')->with("message",'تم الحذف بنجاح');
    }
}
