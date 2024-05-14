<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Introduction;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

use File;
class IntroductionController extends Controller
{
    use ImageUploadTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $introductions=Introduction::all();
        return view('admin.introductions.all',compact('introductions'));
    }

    public function create()
    {
        return view('admin.introductions.create');
    }

    public function store(Request $request)
    {
        $add = new Introduction;
        $add->title_ar   =  $request->title_ar;
        $add->title_en =  $request->title_en;
        $add->save();
        return redirect()->back()->with("message",'تمت الإضافة بنجاح'); 
    }

    
    public function edit(Introduction $article)
    {
        return view('admin.sliders.edit',compact('article'));
    }

    public function update(Request $request)
    {
         // $userId = 1;
         $edit = Introduction::findOrFail($request->id);
         $edit->title    = ['ar' => $request->title_ar, 'en' => $request->title_en];;
         $edit->description    = ['ar' => $request->description_ar, 'en' => $request->description_en];
        
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
            $file_extension = $request -> file('image') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'assets_admin/img/sliders';
            $request-> file('image') ->move($path,$file_name);
            $edit->image  = $file_nameone;
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
