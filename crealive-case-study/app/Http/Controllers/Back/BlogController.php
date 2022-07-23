<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'p');
        return view("back.blogs.index", compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view("back.blogs.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->blogName = $this->security($request->blogName);
        $request->categoryId = $this->security($request->categoryId);
        $request->blogText = $this->security($request->blogText);
        $request->validate([
            "blogName" => "required|min:3",
            "categoryId" => "required|numeric|min:1|max:8",
            "blogText" => "required|min:3",
            "blogThumb" =>  "required|image|mimes:jpeg,jpg,png,webp|max:2048",
        ],
        [
            "blogName.required" => "Boş alan bırakmayınız.",
            "blogName.min" => "Başlık minimum 3 karaktere sahip olmalıdır.",
            "category-id.required" => "Boş alan bırakmayınız.",
            "categoryId.numeric" => "Geçerli bir kategori giriniz.",
            "categoryId.min" => "Geçerli bir kategori giriniz.",
            "categoryId.max" => "Geçerli bir kategori giriniz.",
            "blogText.required" => "Boş alan bırakmayınız.",
            "blogText.min" => "Metin minimum 3 karaktere sahip olmalıdır.",
            "blogThumb.required" => "Boş alan bırakmayınız.",
            "blogThumb.image" => "Lütfen bir görsel yükleyiniz.",
            "blogThumb.mimes" => "Görsel türü jpeg, jpg, png veya webp olmalıdır.",
            "blogThumb.max" => "Dosya boyutu maksimum 2048KB olmalıdır.",
        ]);
        $blog = new Blogs;
        $blog->name = $request->blogName;
        $blog->category_id = $request->categoryId;
        $blog->text = $request->blogText;
        $blog->name_seo = Str::slug($request->blogName);
        if($request->hasFile("blogThumb")){
            $ext = $request->blogThumb->getClientOriginalExtension();
            $imageName = substr(md5(uniqid(time())), 0, 25) . "." . $ext;
            $request->blogThumb->move(public_path('images'), $imageName);
            $blog->image = "images/" . $imageName;
            $blog->save();
            return redirect()->route('back.blogs.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blogs::findOrFail($id);
        $categories = Categories::all();
        return view("back.blogs.update", compact("blog", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->blogName = $this->security($request->blogName);
        $request->categoryId = $this->security($request->categoryId);
        $request->blogText = $this->security($request->blogText);
        $request->validate([
            "blogName" => "required|min:3",
            "categoryId" => "required|numeric|min:1|max:8",
            "blogText" => "required|min:3",
            "blogThumb" =>  "image|mimes:jpeg,jpg,png,webp|max:2048",
        ],
            [
                "blogName.required" => "Boş alan bırakmayınız.",
                "blogName.min" => "Başlık minimum 3 karaktere sahip olmalıdır.",
                "category-id.required" => "Boş alan bırakmayınız.",
                "categoryId.numeric" => "Geçerli bir kategori giriniz.",
                "categoryId.min" => "Geçerli bir kategori giriniz.",
                "categoryId.max" => "Geçerli bir kategori giriniz.",
                "blogText.required" => "Boş alan bırakmayınız.",
                "blogText.min" => "Metin minimum 3 karaktere sahip olmalıdır.",
                "blogThumb.image" => "Lütfen bir görsel yükleyiniz.",
                "blogThumb.mimes" => "Görsel türü jpeg, jpg, png veya webp olmalıdır.",
                "blogThumb.max" => "Dosya boyutu maksimum 2048KB olmalıdır.",
            ]);
        $blog = Blogs::findOrFail($id);
        $blog->name = $request->blogName;
        $blog->category_id = $request->categoryId;
        $blog->text = $request->blogText;
        $blog->name_seo = Str::slug($request->blogName);
        if($request->hasFile("blogThumb")){
            $ext = $request->blogThumb->getClientOriginalExtension();
            $imageName = substr(md5(uniqid(time())), 0, 25) . "." . $ext;
            $request->blogThumb->move(public_path('images'), $imageName);
            if(File::exists($blog->image)){
                File::delete(public_path($blog->image));
            }
            $blog->image = "images/" . $imageName;
        }
        $blog->save();
        return redirect()->route('back.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashBlogs(){
        $blogs = Blogs::onlyTrashed()->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'p');
        return view("back.blogs.trash", compact("blogs"));
    }

    public function recover($id){
        Blogs::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('back.blogs.index');
    }

    public function delete($id){
        Blogs::findOrFail($id)->delete();
        return redirect()->route("back.blogs.index");
    }

    public function hardDelete($id){
        $blog = Blogs::onlyTrashed()->findOrFail($id);
        if(File::exists($blog->image)){
            File::delete(public_path($blog->image));
        }
        $blog->forceDelete();
        return redirect()->route("back.trash.blog");
    }

    public function destroy($id)
    {
        //
    }

    public function security($text){
        $deleteSpace 	=	trim($text);
        $clearTags      =	strip_tags($deleteSpace);
        $clearSlash     =   stripslashes($clearTags);
        $result 	    =	htmlspecialchars($clearSlash, ENT_QUOTES);
        return $result;
    }

}
