<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Instructor;

use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use Crypt;
use Hash;
use Auth;
// use DB;
class InstructorLoginController extends Controller
{
    public function UserLogin()
    {
        $user = Auth::guard('instructors')->user();
        if($user)
            return redirect('/');
        $new_session_id = \Session::getId();
        return view('front.login');
    }

    public function LoginUser(Request $request)
    {
        $this->validate(request(),[
            'email'    => 'required',
            'password' => 'required',
            ],
            [
                'email.required'=>' البريد  الإلكتروني مطلوب',
                'password.required'=>' كلمة المرور مطلوبة',
            ]
        );
        $credentials = $request -> only(['email','password']);
        $checkinstructor = Instructor::where("email" , $request->email)->first();
        if($checkinstructor){
            if($checkinstructor->is_activated ==0)
            {
                return redirect('user-login')->with("errorss", 'الحساب غير مفعل');
            }else{
                $good = Auth::guard('instructors') -> attempt($credentials);
                if($good) {
                    if($checkinstructor->type='instructor'){
                        return redirect('instructor/courses');
                    }else{
                        return redirect('home');
                    }
                }else{
                    return redirect('user-login')->with("errorss", 'بيانات الدخول غير صحيحةة');
                }
            }
        }else{
            return redirect('user-login')->with("errorss", 'بيانات الدخول غير صحيحة');
        }
    }



    public function instructorSignup()
    {
        $user = Auth::guard('instructors')->user();
        if($user)
            return redirect('/');
        return view('front.instructor-signup');
    }
    public function studentSignup()
    {
        $user = Auth::guard('instructors')->user();
        if($user)
            return redirect('/');
        return view('front.student-signup');
    }
    public function registerNewUser(Request $request)
    {

        $user = Auth::guard('instructors')->user();
        if($user)
            return redirect('/');

        // if($request->type !="instructor"){
            $this->validate(request(),[
                    'first_name'    => 'required|min:3',
                    'last_name'    => 'required|min:3',
                    'email'    => 'required|email',
                    'password' => 'required|min:3',
                    'confirm_password' => 'required|same:password',
                    'mobile' => 'required',
                ],
                [
                    'first_name.required'=>'الاسم الاول مطلوب',
                    'last_name.required'=>'الاسم الثاني مطلوب',
                    'email.required'=>' البريد  الإلكتروني مطلوب',
                    'email.email'=>'يجب أن يكون من نوع بريد إلكتروني',
                    'password.required'=>' كلمة المرور مطلوبة',
                    'confirm_password.required'=>' يرجى إعادة كلمة المرور ',
                    'mobile.required'=>'رقم الهاتف مطلوب',
                ]
            );
        // }
        // dd('dd');
        $checkemail = Instructor::where("email" , $request->email)->first();
        if($checkemail){
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return back()->with("errorss", 'Email already exists');
            }else{
                return back()->with("errorss", 'البريد الإلكتروني موجود مسبقا');
            }
        }else{
            $add = new Instructor();
            $add->name  = $request->first_name .' '. $request->last_name;     
            $add->first_name  = $request->first_name;
            $add->last_name  = $request->last_name;
            $add->email  = $request->email;
            $add->password  = bcrypt($request->password);
            $add->mobile  = $request->mobile;
            $add->type  = 'student';
            $add->save();
            return redirect('user-login')->with("message", 'تم التسجيل بنجاح');
        }


    }
    public function instructorActivation($token){
        $check = DB::table('user_activations')->where('token',$token)->first();
        if(!is_null($check)){
            $user = Instructor::find($check->id_user);
            if ($user->is_activated ==1){
                return redirect()->to('user-login')->with('message'," الحساب مفعل ");
            }
            $user->update(['is_activated' => 1]);
            DB::table('user_activations')->where('token',$token)->delete();
            return redirect()->to('user-login')->with('message',"تم تفعيل حسابك");
        }
        return redirect()->to('user-login')->with('errorss',"رمز التفعيل غير صالح");
    }

    public function resetUserPasswordGet($token) {
         return view('auth.forgetpasswordlink', ['token' => $token]);
    }
    public function resetUserPasswordPost(Request $request)
    {
          // $request->validate([
          //     // 'email' => 'required|email|exists:users',
          //     'password' => 'required|string|min:3|confirmed',
          //     'password_confirmation' => 'required'
          // ]);
          $this->validate(request(),[
                  'password' => 'required|string|min:3|confirmed',
                  'password_confirmation' => 'required'
              ],
              [
                  'password.required'=>'Neues Kennwort',
                  'password.min'=>'Nicht weniger als drei Buchstaben und Zahlen',
                  'password_confirmation.required'=>' Bestätige das Passwort',
              ]
          );

          $updatePassword = DB::table('password_resets')->where([
                                // 'email' => $request->email,
                                'token' => $request->token
                              ])->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user = User::where('email', $updatePassword->email)->first();
          // $user->email  = $request->email;
          $user->password  = bcrypt($request->password);
          $user-> save();

          DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
          if(session()->get('locale')){
              $langg=session()->get('locale');
          }else{
              $langg=app()->getLocale();
          }

            return redirect('/')->with('message', 'Ihr Passwort wurde geändert! ');

    }

## start reset for api
    public function resetPasswordGetApi($token) {
        return view('auth.forgetpasswordlink_api', ['token' => $token]);
   }
   public function resetPasswordPostApi(Request $request)
   {
         // $request->validate([
         //     // 'email' => 'required|email|exists:users',
         //     'password' => 'required|string|min:3|confirmed',
         //     'password_confirmation' => 'required'
         // ]);
         $this->validate(request(),[
                 'password' => 'required|string|min:3|confirmed',
                 'password_confirmation' => 'required'
             ],
             [
                 'password.required'=>'Neues Kennwort',
                 'password.min'=>'Nicht weniger als drei Buchstaben und Zahlen',
                 'password_confirmation.required'=>' Bestätige das Passwort',
             ]
         );

         $updatePassword = DB::table('password_resets')->where([
                               // 'email' => $request->email,
                               'token' => $request->token
                             ])->first();

         if(!$updatePassword){
             return back()->withInput()->with('errorss', __('Invalid token'));
         }
         $user = Instructor::where('email', $updatePassword->email)->first();
         // $user->email  = $request->email;
         $user->password  = bcrypt($request->password);
         $user-> save();

         DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
        //  if(session()->get('locale')){
        //      $langg=session()->get('locale');
        //  }else{
        //      $langg=app()->getLocale();
        //  }
        //  dd($langg);
           return redirect('user-login')->with('message', __('Your password has been changed'));

   }
## end for api

    public function signOutInstructors() {
        $user = Auth::guard('instructors')->user();
        if(!$user)
            return redirect('user-login');
        Auth::guard('instructors')->logout();
        return redirect('user-login');
    }
}
