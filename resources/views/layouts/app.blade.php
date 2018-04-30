<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <?php $random = rand(1, 9999) ?>
    <head>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-53468797-20"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-53468797-20');
        </script>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CheckLister') }}</title>

        <!-- COMMON TAGS -->

        <!-- Search Engine -->
        <meta name="description" content="Create simple, beautiful checklists and then use them on your own, or share and use collaboratively">
        <!-- Schema.org for Google -->
        <meta itemprop="name" content="CheckLister">
        <meta itemprop="description" content="Create simple, beautiful checklists and then use them on your own, or share and use collaboratively">
        <!-- Twitter -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="CheckLister">
        <meta name="twitter:description" content="Create simple, beautiful checklists and then use them on your own, or share and use collaboratively">
        <!-- Open Graph general (Facebook, Pinterest & Google+) -->
        <meta name="og:title" content="CheckLister">
        <meta name="og:description" content="Create simple, beautiful checklists and then use them on your own, or share and use collaboratively">
        <meta name="og:url" content="https://checklister.xyz">
        <meta name="og:site_name" content="Checklister">
        <meta name="og:locale" content="en_GB">
        <meta name="og:type" content="website">


        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->


        {{--<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">--}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
              crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
                crossorigin="anonymous"></script>

        <link href="{{ secure_asset('css/main.css?r=') }}{{$random}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Assistant:200" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
              crossorigin="anonymous">
    </head>
    <body>

        <?php
        if (isset($_GET{'ref'}) && $_GET{'ref'} == "producthunt") {
        ?>
        <div class='ph-banner'>
            <div class='container py-1'>
                <div class='row'>
                    <div class='col-12 text-center'>

                        <h4>Welcome fellow Hunter. Go forth and CheckList!</h4>
                    </div>
                </div>
            </div>
        </div>
        <script>
            gtag("event", "click", {"event_category": "PH-Visitor"});
        </script>
        <?php } ?>

        <nav class="navbar navbar-dark bg-dark">
            @guest
                <a class="navbar-brand" href="/">CheckLister</a>
                @else
                    <a class="navbar-brand" href="/home">CheckLister</a>
                    @endguest
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="navbarsExample01" style="">
                        <ul class="navbar-nav mr-auto">
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                @else
                                    <li><a class="nav-link" a href="{{ url('/logout') }}">Logout</a></li>

                                    @endguest


                        </ul>

                    </div>
        </nav>
        <div class='container'>


            @yield('content')


        </div>


    </body>

    <footer class="footer">
        <div class='container'>
            <span class="text-muted">This product is part of the <a href='http://songbox.rocks' target='_blank' onclick='gtag("event", "click",
                        {"event_category":"footer-songbox-link"});'>SongBox</a> family</span>
        </div>
    </footer>
</html>
