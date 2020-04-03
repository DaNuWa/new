@extends('layouts.admin')

@section('content')



{!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store','files'=>true]) !!}


<div class="form-group">
       {!! Form::label('name', 'Name:') !!}
       {!! Form::text('name', null, ['class'=>'form-control'])!!}
 </div>


 <div class="form-group">
      {!! Form::submit('Add category', ['class'=>'btn btn-primary']) !!}
   </div>


 {!! Form::close() !!}

<table class="table">
       <thead>
         <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Created</th>
             <th>Updated</th>
             
          </tr>
        </thead>
        <tbody>
@if($category)

    @foreach($category as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    
                </tr>
               @endforeach

    @endif


@stop


