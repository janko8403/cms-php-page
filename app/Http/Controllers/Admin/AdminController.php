<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Classes\Country;
use App;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function dashboard()
    {
        $users = $this->adminRepository->getAllUsers();
        $languages = $this->adminRepository->getAllLanguage();
        $pages = $this->adminRepository->getAllPages();
        $footers = $this->adminRepository->getAllFooters();
        $medias = $this->adminRepository->getAllMedia();

    	return view('admin.dashboard', compact('users', 'languages', 'pages', 'footers', 'medias'));
    }

    // Users 
    public function users()
    {
        $now = Carbon::now()->addDays(2);
        $users = $this->adminRepository->getAdminUsers();
    	return view('admin.users', compact('users', 'now'));
    }

    public function delete_user($id)
    {
        $this->adminRepository->deleteUser($id);
        $this->flashMsg('info', _('Poprawnie usunałeś użytkownika'));
        return redirect()->back();
    }

    public function add_user()
    {
        return view('admin.add_user');
    }

    public function create_user(Request $request)
    {

        $this->validate($request, [
            'name' => 'required', 'email' => 'required|unique:users'], [
            'required' => 'To pole jest wymagane', 'unique' => 'Taki e-mail juz istnieje w bazie']
        );


        if($request->isMethod('post'))
        {
            $this->adminRepository->createUser($request);
            $this->flashMsg('info', _('Poprawnie dodałeś użytkownka'));
            return redirect('admin/users');
        }
    }

    public function activate_user($id)
    {
        $this->adminRepository->activateByAdminUser($id);
         $this->flashMsg('info', _('Poprawnie aktywowałeś użytkownka'));
        return redirect()->back();
    }

    public function reactive_token($token)
    {
        $this->adminRepository->reactiveToken($token);
        $this->flashMsg('info', _('Poprawnie odswieżyłeś token'));
        return redirect()->back();
    }



    
    // Lang 
    public function language()
    {
        $languages = $this->adminRepository->getAllLanguage();
        return view('admin.language', compact('languages'));
    }

    public function add_language()
    {
        $gp = new Country;
        $countries = $gp->getAllCountry();

        return view('admin.add_language', compact('countries'));
    }

    public function create_language(Request $request)
    {
        if($request->isMethod('post')) {
            $this->adminRepository->createLanguage($request);
            $this->flashMsg('info', _('Poprawnie dodałeś język'));
            return redirect('admin/language');
        }
    }

    public function edit_language($id)
    {
        $languages = $this->adminRepository->getAllLanguage();
        $language = $this->adminRepository->getLanguageById($id);
        return view('admin.edit_language', compact('languages', 'language'));
    }

    public function update_language(Request $request, $id)
    {
        $this->adminRepository->updateLanguage($request, $id);
        $this->flashMsg('info', _('Poprawnie zapisałeś język'));
        return redirect('admin/language');
    }

    public function delete_language($id)
    {
        $this->adminRepository->deleteLanguage($id);
        $this->flashMsg('info', _('Poprawnie usunałeś język'));
        return redirect()->back();
    }
    

    // Pages 
    public function pages()
    {
        $pages = $this->adminRepository->getAllPages();
        return view('admin.pages', compact('pages'));
    }

    public function add_page()
    {
        $languages = $this->adminRepository->getAllLanguage();
        return view('admin.add_page', compact('languages'));
    }

    public function create_page(Request $request)
    {
        if($request->isMethod('post')) {
            $this->adminRepository->createPage($request);
            $this->flashMsg('info', _('Poprawnie dodałeś stronę'));
            return redirect('admin/pages');
        }
    }

    public function edit_page($id)
    {
        $languages = $this->adminRepository->getAllLanguage();
        $page = $this->adminRepository->getPage($id);
        return view('admin.edit_page', compact('page', 'languages'));
    }

    public function update_page(Request $request, $id)
    {
        $this->adminRepository->updatePage($request, $id);
        $this->flashMsg('info', _('Poprawnie edytowałeś stronę'));
        return redirect()->back();
    }

    public function delete_page($id)
    {
        $this->adminRepository->deletePage($id);
        $this->flashMsg('info', _('Poprawnie usunałeś stronę'));
        return redirect()->back();
    }

    public function clone_page($id)
    {
        $this->adminRepository->clonePage($id);
        $this->flashMsg('info', _('Poprawnie sklonowałeś stronę'));
        return redirect()->back();
    }

    // Footers 
    public function footers()
    {
        $languages = $this->adminRepository->getAllLanguage();
        $footers = $this->adminRepository->getAllFooters();
        return view('admin.footers', compact('footers'));
    }

    public function add_footer()
    {
        $languages = $this->adminRepository->getAllLanguage();
        return view('admin.add_footer', compact('languages'));
    }

    public function create_footer(Request $request)
    {
        if($request->isMethod('post')) {
            $this->adminRepository->createFooter($request);
            $this->flashMsg('info', _('Poprawnie dodałeś stopkę'));
            return redirect('admin/footers');
        }
    }

    public function edit_footer($id)
    {
        $footer = $this->adminRepository->getFooter($id);
        return view('admin.edit_footer', compact('footer'));
    }

    public function update_footer(Request $request, $id)
    {
        $this->adminRepository->updateFooter($request, $id);
        $this->flashMsg('info', _('Poprawnie edytowałeś stopkę'));
        return redirect()->back();
    }

    public function delete_footer($id)
    {
        $this->adminRepository->deleteFooter($id);
        $this->flashMsg('info', _('Poprawnie usunałeś stopkę'));
        return redirect()->back();
    }

    public function clone_footer($id)
    {
        $this->adminRepository->cloneFooter($id);
        $this->flashMsg('info', _('Poprawnie sklonowałeś stopkę'));
        return redirect()->back();
    }

    // Media 
    public function media()
    {
        $medias = $this->adminRepository->getAllMediaPagination();
        return view('admin.media', compact('medias'));
    }

    public function create_media(Request $request)
    {
        if($request->isMethod('post')) {
            $this->adminRepository->createMedia($request);
            $this->flashMsg('info', _('Poprawnie dodałeś plik'));
            return redirect('admin/media');
        }
    }

    public function delete_media($id)
    {
        $this->adminRepository->deleteMedia($id);
        $this->flashMsg('info', _('Poprawnie usunąłeś plik'));
        return redirect()->back();
    }
}
