<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\MenuItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\Mention\Mention;

class LanguageController extends Controller
{


    function RemoveSpecialChar($str)
    {

        // Using str_replace() function
        // to replace the word
        $res = str_replace(array(
            '\'', '"', '/',
            ',', ';', '<', '>', "'",
        ), ' ', $str);

        // Returning the result
        return $res;
    }

    public function switchLanguage($language)
    {
        //    dd($language);

        $codes = Language::pluck('code')->toArray();
        // dd($codes);
        if (in_array($language, $codes)) {
            Session::put('applocale', $language);
            App::setLocale($language);
        }
        // dd(App::getLocale());
        return Redirect::back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //getCurrentMenuId used from helpers.php
        $menu_id = getCurrentMenuId($request);

        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);

        return view("languages.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "languages"  => Language::get(),
        ];

        return view('languages.create', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $filter = $request->keyword;

        if (!empty($filter)) {
            $data = Language::where('id', 'like', '%' . $filter . '%')
                ->orwhere('name', 'like', '%' . $filter . '%')
                ->latest()->paginate(10);
            return $data;
        } else {
            $data = Language::latest()->paginate(10);
            return $data;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request;
        $request->validate(
            [
                'code'     =>   'required|max:2|unique:languages,code,NULL,id,deleted_at,NULL',
                'name'        =>   'required',
                'file'        =>   'nullable|file|mimes:jpg,png',
            ],
            [
                'code.required' => 'Code is required.',
                'name.required' => 'Name is required.',
            ]
        );

        $fileName = null;
        if ($request->file('file')) {
            $file = $request->file('file');
            $date = now()->format('Y-m-d_H-i-s');
            $fileName = $file->storeAs(
                '',
                $date . "_" . $request->user()->id . "." . $file->getClientOriginalExtension(),
                'project'
            );
        }

        $language                 = new Language();
        $language->code           = strtolower($request->code);
        $language->name           = $request->name;
        $language->icon           = $fileName ?? null;
        $language->save();

        //  $codes = Language::pluck('code')->toArray();

        $code = strtolower($request->code);

        // foreach ($codes as $code) {

        Storage::disk('resource_language')->makeDirectory($code);
        $code_dir = resource_path() . "/lang/" . $code;
        copy(resource_path('messages.php'), $code_dir . '/' . 'messages.php');
        // }



        //notification

        //
        Session::flash("success", __('messages.languages_created'));
        return redirect()->route('languages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        $data = [
            'language'     => $language,
        ];

        return view('languages.edit', $data);
    }


    public function menutranslate()
    {
        $menus = MenuItems::get();

        $data = [
            'menus'     => $menus,
        ];

        return view('languages.menu-translate', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function translate(Language $language)
    {


        if ($language->save == 1) {
            $file_dir = resource_path() . "/lang/" . $language->code . "/messages.php";
        } else {

            if ($language->code == 'ar') {

                $file_dir = resource_path('messages_ar.php');
            } else {
                $file_dir = resource_path('messages.php');
            }
        }

        // return $file_dir;

        $file = File::get($file_dir);
        $file = str_replace("<?php", '', $file);
        $file = str_replace("return", '', $file);
        $file = str_replace("[", '', $file);
        $file = str_replace("]", '', $file);
        $file = str_replace(";", '', $file);
        $file = str_replace("=>", ',', $file);
        $file = str_replace("'", '', $file);
        // $file = str_replace(" ", '', $file);


        $data = str_getcsv($file);

        $arr = [];

        for ($i = 0; $i < count($data) - 1; $i++) {
            $arr[$data[$i]] = $data[$i + 1];

            $i = $i + 1;
        }



        $data1 = [
            'language'     => $language,
            'labels_array' => $arr,
        ];


        return view('languages.translate', $data1);
    }

    public function translateMenuUpdate(Language $language, Request $request)
    {

        for ($i = 0; $i < count($request->name); $i++) {

            try {

                $update = MenuItems::find($request->key[$i]);
                $update->title_ar = $request->name[$i];
                $update->save();
            } catch (\Throwable $e) {
            }
        }

        Session::flash("success", __('messages.languages_updated'));
        return redirect()->route('languages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function translateUpdate(Language $language, Request $request)
    {




        $text = "<?php \r\n return  [ \r\n";


        for ($i = 0; $i < count($request->name); $i++) {


            $text = $text . "\r\n" . "'" . $request->key[$i] . "'" . ' => ' . "'" .  $this->RemoveSpecialChar($request->name[$i]) . "'" . ', ';
        }

        $text = $text . ' ' . "\r\n ];";



        $code_dir = resource_path() . "/lang/" . $language->code;

        // file_put_contents($code_dir . '/' . 'messages.php', $text);

        $f = fopen($code_dir . '/' . 'messages.php', 'w');
        fwrite($f, $text);
        fclose($f);


        $language_update = $language;
        $language_update->save = 1;
        $language_update->save();


        Session::flash("success", __('messages.languages_translated'));
        return redirect()->route('languages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //  return $request;
        $request->validate(
            [
                'code'     =>   'required|max:2',
                'name'        =>   'required',
                'file'        =>   'nullable|file|mimes:jpg,png',
            ],
            [
                'code.required' => 'Code is required.',
                'name.required' => 'Name is required.',
            ]
        );

        $fileName = null;
        if ($request->file('file')) {
            $file = $request->file('file');
            $date = now()->format('Y-m-d_H-i-s');
            $fileName = $file->storeAs(
                '',
                $date . "_" . $request->user()->id . "." . $file->getClientOriginalExtension(),
                'project'
            );
        }

        $update_language                 = $language;
        $update_language->code           = $request->code;
        $update_language->name           = $request->name;
        $update_language->icon           = $fileName ?? null;
        $update_language->save();
        //notification

        //
        Session::flash("success", __('messages.languages_updated'));
        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();

        Session::flash("success", __('messages.languages_deleted'));

        return redirect()->route('languages.index');
    }
}
