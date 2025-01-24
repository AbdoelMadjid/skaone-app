<!-- Favicon -->
<link rel="shortcut icon"
    href="{{ $profileApp->app_icon ? URL::asset('build/images/' . $profileApp->app_icon) : URL::asset('build/images/icon-blue.png') }}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Barlow:300,400,400i,500,700%7CAlegreya:400" rel="stylesheet">

<!-- CSS Global Compulsory -->
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/bootstrap/bootstrap.min.css') }}">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/icon-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/icon-line-pro/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/icon-hs/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/icon-material/material-icons.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/animate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/hamburgers/hamburgers.min.css') }}">

@yield('css')

<!-- CSS Unify Theme -->
<link rel="stylesheet" href="{{ URL::asset('build/assets/css/styles.multipage-education.css') }}">

<!-- CSS Customization -->
<link rel="stylesheet" href="{{ URL::asset('build/assets/css/custom.css') }}">
