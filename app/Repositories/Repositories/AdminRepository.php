<?php

namespace App\Repositories\Repositories;

use App\Models\{User, Role, Language, Page, Footer, Media};
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Notifications\DatabaseNotification;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Classes\Country;
use App\Classes\GeneratePass;
use App\Mail\EmailVerification;
use URL;
use Session;
use Storage;
use Carbon\Carbon;

class AdminRepository implements AdminRepositoryInterface {

	private $model;

    // Users
	public function getAllUsers()
	{
		return User::all();
	}

	public function getAdminUsers()
	{
		return User::whereHas(
            'roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();
	}

	public function getUnActiveUsers()
	{
		$unActive = User::WhereNull('email_verified_at')->get();

		return $unActive;
	}

	public function getUser($id)
	{
		return User::find($id);
	}

    public function createUser($request)
	{
        $gp = new GeneratePass;
        $pass = $gp->randomPassword();
        $token = md5($gp->rememberToken());

        $role_user = Role::where('name', 'Admin')->first();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($pass),
            'active_token' => $token,
            'expire_date' => date("Y-m-d H:i:s")
        ]);

        $user->roles()->attach($role_user);
        return $user;
	}

    public function deleteUser($id)
	{
		return User::where('id', $id)->delete();
	}

    public function activateByAdminUser($id)
	{
		return User::where('id', $id)->update([
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);
	}

    public function activateUser($id)
	{
		return User::where('active_token', $id)->update([
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);
	}
    
    public function getToken($token)
	{
        if( Auth::check()) {
            Auth::logout();
        }
		return User::where('active_token', $token)->first();
	}

    public function reactiveToken($token)
	{
        $gp = new GeneratePass;
        $gen_token = md5($gp->rememberToken());

		return User::where('active_token', $token)->update([
            'expire_date' => date("Y-m-d H:i:s"),
            'active_token' => $gen_token
        ]);
	}

    // Change Password
	public function updatePassword($request)
	{
		return User::where('active_token', $request['active_token'])->update([
            'password' => Hash::make($request['password']),
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);
	}

	// Lang
    public function getAllLanguage()
    {
        return Language::all();
    }

    public function createLanguage($request)
    {
        $gp = new Country;
        $lng = $gp->getCountryByLowerCase($request['lng']);

        $language = new Language;
        $language->lng = strtolower($request['lng']);
        $language->long_lng = $lng;
        $language->sort = $request['sort'];

        $language->save();
    }

    public function getLanguageById($id)
    {
        return Language::find($id);
    }

    public function updateLanguage($request, $id)
    {
        $lng = Language::findOrFail($id);
        $lng->lng = strtolower($request->lng);
        $lng->sort = $request->sort;
        $lng->save();
    }

    public function deleteLanguage($id)
    {
        return Language::where('id', $id)->delete();
    }

    public function getLng($lng)
    {
        return Language::where('lng', $lng)->first();
    }

    // Pages 
    public function getAllPages()
    {
        return Page::all();
    }

    public function createPage($request)
    {
        $page = new Page;
        $page->lng = strtolower($request['lng']);
        $page->name = $request['name'];
        $page->slug = Str::slug($request['name'], '-');
        $page->sort = $request['sort'];
        $page->main_page = (($request['main_page'] == 'on') ? '1' : '0');
        $page->header_title = $request['header_title'];
        $page->header_desc = $request['header_desc'];
        $page->arrow = (($request['arrow'] == 'on') ? '1' : '0');
        $page->disable_header = (($request['disable_header'] == 'on') ? '1' : '0');
        $page->buttons = (($request['buttons'] == 'on') ? '1' : '0');
        $page->left_button = $request['left_button'];
        $page->left_button_link = $request['left_button_link'];
        $page->right_button = $request['right_button'];
        $page->right_button_link = $request['right_button_link'];
        $page->button_yellow = (($request['button_yellow'] == 'on') ? '1' : '0');
        $page->button_blue = (($request['button_blue'] == 'on') ? '1' : '0');
        $page->content = $request['content'];
        $page->additional_options = (($request['additional_options'] == 'on') ? '1' : '0');
        $page->info_refugees = (($request['info_refugees'] == 'on') ? '1' : '0');

        if ($request->file('header_img')) {
            $path = $request->file('header_img')->storeAs(
                'public/images/header', $request->file('header_img')->getClientOriginalName()
            );
            $page->header_img =  $path;
        }

        $page->save();
    }

    public function getPage($id)
    {
        return Page::find($id);
    }

    public function updatePage($request, $id)
    {
        $page = Page::findOrFail($id);
        $page->lng = strtolower($request->lng);
        $page->name = $request->name;
        $page->sort = $request->sort;
        $page->slug = Str::slug( $request->slug, '-');
        $page->main_page = (($request->main_page == 'on') ? '1' : '0');
        $page->header_title = $request->header_title;
        $page->header_desc = $request->header_desc;
        $page->arrow = (($request->arrow == 'on') ? '1' : '0');
        $page->disable_header = (($request->disable_header == 'on') ? '1' : '0');
        $page->buttons = (($request->buttons == 'on') ? '1' : '0');
        $page->left_button = $request->left_button;
        $page->left_button_link = $request->left_button_link;
        $page->right_button = $request->right_button;
        $page->right_button_link = $request->right_button_link;
        $page->button_yellow = (($request->button_yellow == 'on') ? '1' : '0');
        $page->button_blue = (($request->button_blue == 'on') ? '1' : '0');
        $page->content = $request->content;
        $page->additional_options = (($request->additional_options == 'on') ? '1' : '0');
        $page->info_refugees = (($request->info_refugees == 'on') ? '1' : '0');

        if ($request->file('header_img')) {
            $path = $request->file('header_img')->storeAs(
                'public/images/header', $request->file('header_img')->getClientOriginalName()
            );
            $page->header_img =  $path;
        }

        $page->save();
    }

    public function deletePage($id)
    {
        return Page::where('id', $id)->delete();
    }

    public function clonePage($id)
    {
        $page = Page::find($id);
        $newPage = $page->replicate();
        $newPage->name = $page->name . '-' . date('Y-m-d');
        $newPage->slug = Str::slug( $page->slug . '-' . date('Y-m-d'), '-');
        $newPage->created_at = Carbon::now();
        $newPage->save();
    }

    // Get Page 
    public function getPageBySlug($slug)
    {
        return Page::where(['slug' => $slug, 'lng' => Session::get('locale')])->first();
    }

    // Footers 
    public function getAllFooters()
    {
        return Footer::all();
    }

    public function createFooter($request)
    {
        $page = new Footer;
        $page->lng = strtolower($request['lng']);
        $page->copyright = $request['copyright'];
        $page->address = $request['address'];
        $page->contact = $request['contact'];
        $page->info = $request['info'];
        $page->contact_info = $request['contact_info'];

        $page->save();
    }

    public function getFooter($id)
    {
        return Footer::find($id);
    }

    public function updateFooter($request, $id)
    {
        $footer = Footer::findOrFail($id);
        $footer->lng = strtolower($request->lng);
        $footer->copyright = $request->copyright;
        $footer->address = $request->address;
        $footer->contact = $request->contact;
        $footer->info = $request->info;
        $footer->contact_info = $request->contact_info;
        $footer->save();
    }

    public function deleteFooter($id)
    {
        return Footer::where('id', $id)->delete();
    }

    public function cloneFooter($id)
    {
        $footer = Footer::find($id);
        $newFooter = $footer->replicate();
        $newFooter->lng = '';
        $newFooter->created_at = Carbon::now();
        $newFooter->save();
    }

    // Get Footer 
    public function getFooterByLng()
    {
        return Footer::where(['lng' => Session::get('locale')])->first();
    }

    // Media 
    public function getAllMedia()
    {
        return Media::all();
    }

    public function getAllMediaPagination()
    {
        return Media::orderBy('created_at', 'desc')->paginate(10);
    }

    public function createMedia($request)
    {
        $file = new Media;
        if ($request->file('file')) {
            // if(file_exists('storage/images/library/'.$request->file('file')->getClientOriginalName())) {
            if(file_exists('/var/www/html/cph.focusmedia.pl/storage/app/public/images/library/'.$request->file('file')->getClientOriginalName())) {
                $fileName = date('d-m-Y-H-i') . '-' . $request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs(
                    'public/images/library', $fileName
                );
                $file->file =  $path;
            } else {
                $path = $request->file('file')->storeAs(
                    'public/images/library', $request->file('file')->getClientOriginalName()
                );
                $file->file =  $path;
            }
        }
        $file->save();
    }

    public function deleteMedia($id)
    {
        return Media::where('id', $id)->delete();
    }
}
