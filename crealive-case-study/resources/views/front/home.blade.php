@extends("front.layouts.master")
@section("title") Case Crealive Stduy @endsection
@section("body")
<main>
    <div class="container">
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
                                    <li><a class="dropdown-item" href="{{ $category->name_seo }}">{{ $category->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                @include("front.widgets.blog")
            </div>
        </section>
    </div>
</main>
@endsection


