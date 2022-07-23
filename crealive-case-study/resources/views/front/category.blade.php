@extends("front.layouts.master")
@section("title") {{ $category->name }} | Case Crealive Stduye @endsection
@section("body")
<main>
    <div class="container">
        <!--Section: Content-->
        <section>
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-5"><strong>Bloglar</strong></h4>
                </div>
                <div class="col-4 text-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="categories" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategoriler
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="categories">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item @if(Request::segment(1) == $category->name_seo) active @endif" @if(Request::segment(1) != $category->name_seo) href="{{ $category->name_seo }}" @endif >{{ $category->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                 @isset($blogs)
                     @if(count($blogs) > 0)
                        @foreach($blogs as $blog)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="{{ $blog->image }}" class="img-fluid" />
                                        <a href="{{ route("blog-detail", [$blog->getCategory->name_seo, $blog->name_seo]) }}">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $blog->name }}</h5>
                                        <p class="card-text pb-0 mb-1">
                                            Kategori: <a href="{{ route("category", $blog->getCategory->name_seo) }}">{{ $blog->getCategory->name }}</a>
                                        </p>
                                        <p class="card-text">
                                            Tarih: {{ \Carbon\Carbon::parse($blog->updated_at)->format("d.m.Y") }}
                                        </p>
                                        <p class="card-text">
                                            {{ \Illuminate\Support\Str::limit($blog->text, 100) }}
                                        </p>
                                        <a href="{{ route("blog-detail", [$blog->getCategory->name_seo, $blog->name_seo]) }}" class="btn btn-primary">Read</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="d-flex justify-content-center">{{ $blogs->links('pagination::bootstrap-5') }}</div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Bu kategoride blog bulunmamaktadır.
                        </div>
                    @endif
                @endisset
            </div>
        </section>
    </div>
</main>
@endsection


