<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Contracts\Repositories\CategoryRepository;
use Auth;

class NavbarComposer
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = $this->category->getAllRootCategories(['subCategories']);

        $view->with('categories', $categories);
    }
}
