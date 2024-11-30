<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <title>CDMS | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <link href="{{asset('backend-assets/css/vendor.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend-assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend-assets/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet">

    <!-- Dropzone.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">




    <style>
      .bg-soft-success{background-color:rgba(26,188,156,.25)!important}
      .bg-soft-danger {background-color: rgba(240, 101, 72, .18)!important}
      .db-card-title {font-size: 1.7em;}
      .menu-text {font-size: 1.2em;}
      .fullWidth {
        margin-left: 0%;
        transition: .5s;
      }
      @media only screen and (max-width: 768px) {
        #sidebar {
          margin-top: 52px;
        }
      }
    </style>
    @stack('style')
  </head>
  
  <body>
    <div id="app" class="app">
        
        @include('backend.layouts.topbar')

        @include('backend.layouts.sidebar')
        