<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link href="{{asset('css/app.css') }}" rel="stylesheet">
  <link href="{{asset('css/modal.css') }}" rel="stylesheet">
  <link href="{{asset('css/select.css') }}" rel="stylesheet">
  <link href="{{asset('css/select2.css') }}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-select.css') }}" rel="stylesheet">
  <link href="{{asset('css/multiple-select.css') }}" rel="stylesheet">
  <link href="{{asset('css/datatable.css')}}" rel="stylesheet" />
  <link href="{{asset('css/toastr.css')}}" rel="stylesheet" />
  <link href="{{asset('css/vue-fullscreen.css')}}" rel="stylesheet" />
  <link href="{{asset('css/ladda.css')}}" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

  @routes

  <div id="vue">
    <index></index>
  </div>


  <script src="{{asset('js/jquery.js') }}"></script>
  <script src="{{asset('js/select2.js') }}"></script>
  <script src="{{asset('js/bootstrap-select.js') }}"></script>
  <script src="{{asset('js/modal.js') }}"></script>
  <script src="{{asset('js/bootstrap.js') }}"></script>
  <script src="{{asset('js/select.js') }}"></script>
  <script src="{{asset('js/multiple-select.js') }}"></script>
  <script src="{{asset('js/vue.min.js') }}"></script>
  <script src="{{asset('js/datatable.js') }}"></script>
  <script src="{{asset('js/toastr.js') }}"></script>
  <script src="{{asset('js/vue-fullscreen.js') }}"></script>
  <script src="{{asset('js/ladda.js') }}"></script>
  <script src="{{asset('js/ladda.min.js') }}"></script>

</body>

</html>
