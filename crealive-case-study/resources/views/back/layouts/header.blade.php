<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield("title", "Admin Panel | Crealive Case Stduy")</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" >
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="{{ route("back.home") }}" style="margin-top: -3px;">
                @yield("title", "Admin Panel | Crealive Case Stduy")
            </a>
            @auth
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item me-3 me-lg-0">
                        <a class="btn btn-outline-primary" href="{{ route("logout") }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </nav>
    <!-- Navbar -->
</header>
