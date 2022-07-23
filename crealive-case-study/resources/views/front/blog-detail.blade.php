@extends("front.layouts.master")
@section("title") {{ $blog->name }} | Crealive Blog Case @endsection
@section("body")
<main>
        <div class="container">
            <section class="text-center">
                <h4 class="mb-4 text-center"><strong>{{ $blog->name }}</strong></h4>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->name }}" class="img-fluid" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">
                                    Kategori: <a href="{{ route("category", $blog->getCategory->name_seo) }}">{{ $blog->getCategory->name }}</a>
                                </p>
                                <p class="card-text">
                                    Tarih: {{ \Carbon\Carbon::parse($blog->updated_at)->format("d.m.Y") }}
                                </p>
                                <p class="card-text">
                                    {{ $blog->text }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection


