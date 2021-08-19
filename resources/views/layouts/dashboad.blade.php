<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset('starlight_dashboad/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('starlight_dashboad/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('starlight_dashboad/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('starlight_dashboad/css/starlight.css') }}">
  </head>

<body>

    @yield('content')

    <script src="{{ asset('starlight_dashboad/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('starlight_dashboad/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('starlight_dashboad/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('starlight_dashboad/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('starlight_dashboad/js/starlight.js') }}"></script>
</body>
</html>
