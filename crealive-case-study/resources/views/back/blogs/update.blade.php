@extends('back.layouts.master')
@section('body')
    <main>
        <div class="container">
            <section>
                <h4 class="mb-5"><strong>Hoş geldin {{ Auth::user()->name }} :)</strong></h4>
                <div class="d-flex flex-row bd-highlight mb-3 justify-content-between">
                    <div class="py-2 bd-highlight align-self-end">
                        <h5>Blog Güncelle</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="{{ route("back.blogs.create") }}" class="btn btn-success my-btn">Blog Ekle</a>
                    </div>
                </div>
                <div class="row">
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul style="margin: 0">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route("back.blogs.update", $blog->id) }}" method="post" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="mb-4 col-lg-3">
                            <select class="form-select my-input" name="categoryId" required>
                                <option selected>Blog Kategorisi Seçin</option>
                                @foreach($categories as $category)
                                    <option @if($blog->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="blog-name" class="form-label my-label">Blog Adı</label>
                            <input type="text" class="form-control my-input" id="blog-name" name="blogName" value="{{ $blog->name }}" required>
                        </div>
                        <div class="mb-4 thumbnail-upload">
                            <div class="thumbnail-preview img-fluid" style="display: inherit">
                                <div id="thumbnailImagePreview" style="background-image: url({{ asset($blog->image) }});">
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="blog-thumb" class="form-label my-label">Blog Thumbnail</label>
                                <input class="form-control my-input" type="file" id="blog-thumb" name="blogThumb" accept=".png, .jpeg, .jpg, .webp">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="blog-text" class="form-label my-label">Blog Text</label>
                            <textarea class="form-control my-input" name="blogText" id="blogText" rows="15" required>{{ $blog->text }}</textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-success">Güncelle</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
