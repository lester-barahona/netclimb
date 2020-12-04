@extends('layouts.dashboard')



@section('content')
  <div>
    <project-config-component id="{{$project->id}}" title="{{$project->title}}" description="{{$project->description}}"></project-config-component>
  </div>
@endsection

@section('js')
    
@endsection