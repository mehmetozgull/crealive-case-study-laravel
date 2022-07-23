<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield("title", "Crealive Case Study")</title>
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset(('template/')) }}/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('template/') }}/css/style.css" />
</head>
<body>
<header>
    <!-- Intro settings -->
    <style>
        #intro {
            /* Margin to fix overlapping fixed navbar */
            margin-top: 58px;
        }
        @media (max-width: 991px) {
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 45px;
            }
        }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="{{ route("front.home") }}" style="margin-top: -3px;">
                Crealive Blog Case
            </a>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                @guest
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item me-3 me-lg-0">
                        <a class="btn btn-outline-primary" href="{{ route("login") }}">
                            Giriş Yap
                        </a>
                    </li>
                </ul>
                @else
                    <ul class="navbar-nav d-flex flex-row">
                        <li class="nav-item me-3 me-lg-0">
                            <a class="btn btn-outline-success" href="{{ route("back.home") }}">
                                Panele Git
                            </a>
                        </li>
                    </ul>
                @endguest
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</header>
