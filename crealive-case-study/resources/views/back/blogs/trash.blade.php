@extends('back.layouts.master')
@section('body')
    <main>
        <div class="container">
            <!--Section: Content-->
            <section>
                <h4 class="mb-5"><strong>Hoş geldin {{ Auth::user()->name }} :)</strong></h4>
                <div class="d-flex flex-row bd-highlight mb-3 justify-content-between">
                    <div class="py-2 bd-highlight flex-grow-1 align-self-end">
                        <h5><strong>Silinen Bloglar</strong></h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="{{ route("back.blogs.create") }}" class="btn btn-success my-btn">Blog Ekle</a>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="{{ route("back.blogs.index") }}" class="btn btn-primary my-btn">Aktif Bloglar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover caption-top">
                            <caption class="font-weight-bold">{{ $blogs->count() }} blog mevcut.</caption>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kategori Adı</th>
                                <th scope="col">Blog Adı</th>
                                <th scope="col">Oluşturulma Tarihi</th>
                                <th scope="col">Güncellenme Tarihi</th>
                                <th scope="col" class="text-center">Geri Yükle</th>
                                <th scope="col" class="text-end">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($blogs)
                                @foreach($blogs as $blog)
                                    <tr>
                                        <th scope="row">#</th>
                                        <td>{{ $blog->getCategory->name }}</td>
                                        <td>{{ $blog->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($blog->created_at)->format("d.m.Y H:i:s") }}</td>
                                        <td>{{ \Carbon\Carbon::parse($blog->updated_at)->format("d.m.Y H:i:s") }}</td>
                                        <td class="text-center">
                                            <a href="{{ route("back.recover.blog", $blog->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                                    <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <a class="" style="cursor: pointer" href="{{ route("back.hard.delete.blog", $blog->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">{{ $blogs->links('pagination::bootstrap-5') }}</div>
                    </div>
                </div>
            </section>
            <!--Section: Content-->
        </div>
    </main>
@endsection
