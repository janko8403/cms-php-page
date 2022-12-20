<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use App\Repositories\Interfaces\AdminRepositoryInterface;
 
class LangComposer
{
   
    protected $languages;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\AdminRepositoryInterface  $users
     * @return void
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $languages = $this->adminRepository->getAllLanguage();
        // View::share('languages', $languages);

        $view->with('languages', $languages);
    }
}