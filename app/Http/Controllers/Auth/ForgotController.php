<?php

namespace App\Http\Controllers\Auth;

use App\User;
use System\Session\Session;
use App\Http\Services\MailService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;

class ForgotController extends Controller
{
    private $redirectTo = '/home';

    public function view()
    {
        return view('auth.forgot');
    }
    public function forgot()
    {
        if (Session::get('forgot.time') != false && Session::get('forgot.time') > time()) {
            error('forgot', 'please wait 2 min and try again');
        } else {
            Session::set('forgot.time', time() + 120);
            $request = new ForgotRequest();
            $inputs = $request->all();
            $user = User::where('email', $inputs['email'])->get();
            if (empty($user)) {
                error('forgot', 'کاربری وجود ندارد ');
                return back();
            }
            $user = $user[0];
            $user->remember_token = generateToken();
            $user->remember_token_expire = date("Y-m-d H:i:s", strtotime(' + 10 min'));
            $user->save();

            User::create($inputs);
            $message = '
      <h2>ایمیل بازیابی رمز عبور </h2>
          <p>کاربر گرامی برای بازیابی رمز عبور خود اینجا کلیک کنید </p>
          <p style="text-align: center">
          <a href="' . route('auth.reset-password.view', [$user->remember_token]) . '">بازایابی رمز عبور</a>
          </p>
          ';
            $mailService = new MailService();
            $mailService->send($inputs['email'], 'ایمیل بازیابی', $message);
         flash('forgot', 'ایمیل بازیابی با موفقست ازسال شد ');
       
            return redirect($this->redirectTo);
        }
    }
}
