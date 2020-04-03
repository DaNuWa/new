@extends('layouts.admin')


@section('content')


  
{!! Form::model($category,['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update',$category->id],'files'=>true]) !!}


<div class="form-group">
       {!! Form::label('name', 'Name:') !!}
       {!! Form::text('name', $category->name, ['class'=>'form-control'])!!}
 </div>


 <div class="form-group">
      {!! Form::submit('Add category', ['class'=>'btn btn-primary']) !!}
   </div>


 {!! Form::close() !!}


@stop
