<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

use File;
class SliderController extends Controller
{
    use ImageUploadTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.sliders.all',compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        // $file_extension = $request -> file('image') -> getClientOriginalExtension();
        // $file_name = time().'.'.$file_extension;
        // $file_nameone = $file_name;
        // $path = 'img/sliders';
        // $request-> file('image') ->move($path,$file_name);

        $file_name = $this->upload($request, 'image', 'img/sliders');
        $add = new Slider;
        $add->title_ar   =  $request->title_ar;
        $add->title_en =  $request->title_en;
        $add->description_ar    =  $request->description_ar;
        $add->description_en    =  $request->description_en;

        // $ghgth->title_en  = $request->title_en;
        // $ghgth->description_ar    = $request->description_ar;
        // $ghgth->description_en  = $request->description_en;

        $add->image    = $file_name;
        $add->save();
        return redirect()->back()->with("message",'تمت الإضافة بنجاح');
    }


    public function edit(Slider $article)
    {
        return view('admin.sliders.edit',compact('article'));
    }

    public function update(Request $request)
    {
         $edit = Slider::findOrFail($request->id);
         $edit->title_ar    = $request->title_ar;
         $edit->title_en    = $request->title_en;
         $edit->description_ar    = $request->description_ar;
         $edit->description_en    =  $request->description_en;
        // dd($request -> file('image'));
        // if($file=$request->file('image'))
        // {
        //     $file_extension = $request -> file('image') -> getClientOriginalExtension();
        //     $file_name = time().'.'.$file_extension;
        //     $file_nameone = $file_name;
        //     $path = 'img/sliders';
        //     $request-> file('image') ->move($path,$file_name);

        //     $edit->image  =$file_nameone;
        // }else{
        //     $edit->image  = $edit->image;
        // }

         if($file=$request->file('image'))
         {
            $file_name = $this->upload($request, 'image', 'img/sliders');

            $edit->image  = $file_name;
         }else{
            $edit->image  = $edit->image;
         }
         $edit->save();
        // $category = Speciality::findOrFail($request->id);
        // $category->update($request->all());

        return redirect()->route('sliders.index')->with("message", 'تم التعديل بنجاح');
    }

    // public function destroy(Request $request)
    // {
    //     // dd($request->id);
    //     $delete = Slider::findOrFail($request->id);
    //     $delete->delete();
    //         return redirect()->route('sliders.index')->with("message",'تم الحذف بنجاح');
    // }

    public function destroy(Request $request)
    {
        $delete             = Slider::findOrFail($request->id);
        $image_path         = base_path("assets_admin/img/sliders/") .$delete->image;

        if(File::exists($image_path)) {
            // unlink($image_path);
            File::delete($image_path);
        }
        else{
            $delete->delete();
        }

        $delete->delete();
        return redirect()->route('sliders.index')->with("message",'تم الحذف بنجاح');
        // return response()->json(['success'=>'Slider deleted successfully!']);
    }
}
