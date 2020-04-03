@extends('layouts.admin')


@section('styles')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css"> 

@stop


@section('content')

  <h1>Upload</h1>


  {!! Form::open(['method'=>'POST', 'action'=> 'AdminMediasController@store', 'class'=>'dropzone']) !!}




{!! Form::close() !!}



@stop


@section('footer')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

@stop