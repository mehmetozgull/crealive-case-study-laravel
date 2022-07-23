@if(isset($blogs))
    @foreach($blogs as $blog)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="{{ asset($blog->image) }}" class="img-fluid" />
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
