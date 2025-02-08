<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @foreach ($getuser as $row)
    @if(is_null($row->first_name)|| is_null($row->gender) || is_null($row->date) || is_null($row->month) || is_null($row->year)
    || is_null($row->country) || is_null($row->state_id) || is_null($row->mobile) || is_null($row->address_1))
        <title>Hi, Guest</title>
      @else
        <title>Mpingi Market | Free Online Marketplace Platform</title>
      @endif
    @endforeach

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon ok.png') }}" />
    <link href="{{ asset('assets/plugin/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/mainstyles2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/css/placeholder-loading.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.gritter.css') }}" />
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/js/toastr/toastr.min.css')}}">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/nicelabel/css/jquery-nicelabel.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(window).on('load', function(){
        setTimeout(function(){
              $('.loader').fadeOut('slow');
          }, 1000);
      });
    </script>
</head>
