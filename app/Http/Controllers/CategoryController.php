<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class CategoryController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function showAll(): View
    {
        $categories = DB::table('categories')->get();

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show all category modules
     * 
     * @param int $id
     */
    public function getCategoryModules(int $id): View
    {
        $modules = DB::table('modules')->where('category_id', $id)->get();

        return view('category.modules', [
            'category_id' => $id,
            'modules' => $modules
        ]);
    }
}