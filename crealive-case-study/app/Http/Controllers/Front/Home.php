<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Categories;
use App\Models\Blogs;

class Home extends Controller
{
    public function index(){
        $data["categories"] = Categories::get();
        $data["blogs"] = Blogs::orderBy("updated_at", "DESC")->paginate(9, ['*'], 'p');
        return view("front.home", $data);
    }

    public function blogDetail($category, $name_seo){
        $category = Categories::where("name_seo", $category)->first() ?? abort(404, "Böyle bir sayfa bulunamadı.");
        $data["blog"] = Blogs::where("name_seo", $name_seo)->where("category_id", $category->id)->first() ?? abort(404, "Böyle bir sayfa bulunamadı.");
        return view("front.blog-detail", $data);
    }

    public function category($category){
        $category = Categories::where("name_seo", $category)->first() ?? abort("404", "Böyle bir sayfa bulunamadı.");
        $blogs = Blogs::where("category_id", $category->id)->orderBy("updated_at", "DESC")->paginate(9, ['*'], 'p');
        $data["categories"] = Categories::get();
        $data["category"] = $category;
        $data["blogs"] = $blogs;
        return view("front.category", $data);
    }

    public function login(){
        if (Auth::check()) {
            return redirect()->route('back.home');
        }else{
            return view("back.auth.login");
        }
    }
}
