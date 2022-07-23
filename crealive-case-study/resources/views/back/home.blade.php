@extends("back.layouts.master")
@section("body")
<main style="">
    <div class="container">
        <!--Section: Content-->
        <section>
            <h4 class="mb-5"><strong>Hoş geldin {{ Auth::user()->name }} :)</strong></h4>
            <h5 class="mb-5"><strong>Dashboard</strong></h5>
            <div class="row">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header h6">Bloglar</div>
                    <div class="card-body">
                        <ul style="list-style-type: none; padding-left: 0;">
                            <li>
                                <a href="{{ route("back.blogs.create") }}" class="card-title">Blog Ekle</a>
                            </li>
                            <li>
                                <a href="{{ route("back.blogs.index") }}" class="card-title">Tüm Blogları Görüntüle</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
