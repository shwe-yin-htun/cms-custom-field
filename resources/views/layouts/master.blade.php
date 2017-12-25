<!DOCTYPE html>
<html>
  <head>
    <meta charset="en">
    <title>Custom Field Groups</title>
    <title>Group List</title>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/post.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/acf.js')}}"></script>
    <link href="{{asset('editor_md/css/editormd.min.css')}}" rel="stylesheet">
    <script src="{{asset('editor_md/editormd.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
    <script src="{{asset('editor_md/languages/en.js')}}" type="text/javascript"></script>
    <style media="screen">
         body{
              width:800px;
              margin: 50px 0 0 300px;
         }

         button,a{
           margin-bottom: 20px;
         }
    </style>
  </head>
  <body>
            @yield('content')
  </body>
</html>
