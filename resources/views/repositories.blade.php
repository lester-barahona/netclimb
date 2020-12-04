@extends('layouts.dashboard')

@section('head')

@endsection

@section('content')
  <repositories-component username='{{Auth()->user()->username}}' avatar='{{Auth()->user()->avatar}}' ></repositories-component>
@endsection

@section('js')
    
@endsection