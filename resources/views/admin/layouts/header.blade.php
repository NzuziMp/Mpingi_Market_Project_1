
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mpingi Market | Free Online Marketplace Platform</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.ico') }}" />
    <link href="{{ asset('assets/plugin/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/mainstyles2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/css/placeholder-loading.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/js/toastr/toastr.min.css')}}">

    <script src="{{ asset('assets/plugin/jquery.min.js') }}"></script>
    <script type="text/javascript">
      $(window).on('load', function(){
        setTimeout(function(){
              $('.loader').fadeOut('slow');
          }, 1000);
      });
    </script>
</head>
