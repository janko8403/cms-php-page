<?php

namespace App\Http\Controllers\User;
use App\Classes\MainPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App;
use Config;
use Session;
use App\Models\{User, Role, Language, Page};
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    // Set Lang 
    public function set_lng(Request $request)
    {
        $pg = new MainPage;
        $locale = $request['setlng'];
        App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect($pg->getMainPage());
    }

    // Set Password By User 
    public function activate($token)
    {
        $token = $this->adminRepository->getToken($token);
        if(is_null($token)) {
            $text = 'Wrong token';
            return view('auth.wrong_token', compact('text'));
        } else {
            if($token->expire_date >= Carbon::now()->addDays(2)) {
                $text = 'Token expired';
                return view('auth.wrong_token', compact('text'));
            }
            $token = $token->active_token;
            return view('auth.set_password', compact('token'));
        }
    }

    public function update_password(Request $request) {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed', 'password_confirmation' => 'required'], [
            'required' => 'This field is required', 'min' => 'The password must be at least 8 characters long', 'confirmed' => 'Passwords do not match']
        );

        $this->adminRepository->updatePassword($request);
        return redirect('login');
    }

    // Pages 
    public function test()
    {
        $pg = new MainPage;
        dd($pg->getMainPage());
        // return view('contact');
    }

    public function under_construction()
    {
        return view('under-construction');
    }

    public function page($slug)
    {
        $page = $this->adminRepository->getPageBySlug($slug);
        $footer = $this->adminRepository->getFooterByLng();
        return view('page', compact('page', 'footer'));
    }

    public function create_api(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
    }
}
