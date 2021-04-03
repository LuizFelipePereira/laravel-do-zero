<!DOCTYPE html>
<html lang="pt-BR">
@include("panel.template.head")

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>{{ $title ?? "DashBoard"}}</title>


     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <link rel="stylesheet" href=" {{ asset("Auth-Panel/plugins/fontawesome-free/css/all.min.css") }}">
     <link rel="stylesheet" href="{{ asset("Auth-Panel/dist/css/ionicons.min.css")}}">
     <link rel="stylesheet" href=" {{ asset("Auth-Panel/dist/css/adminlte.min.css")}}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition">
     <div class="wrapper">
          @include("panel.template.navbar")
          @include("panel.template.aside-left")
          @yield('content')
          @include("panel.template.aside-right")
          @include("panel.template.footer")
     </div>
     @include('panel.template.javascripts')
</body>

</html>
