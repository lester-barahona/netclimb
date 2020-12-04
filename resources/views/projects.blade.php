@extends('layouts.dashboard')

@section('head')
<link href="{{asset('css/dropzone/dropzone.min.css')}}" type="text/css" rel="stylesheet" />
<script src="{{asset('js/dropzone/dropzone.min.js')}}"></script>
@endsection

@section('content')
  <projects-component></projects-component>
@endsection

@section('js')
    
@endsection