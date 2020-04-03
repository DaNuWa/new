@extends('layouts.admin')

@section('content')

<table class="table">
       <thead>
         <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Name</th>
             <th>Created</th>
             <th>Updated</th>
             
          </tr>
        </thead>
        <tbody>

          @if($photos)

            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td> <img height="50" src="{{URL::asset($photo->file ? $photo->file : 'http://placehold.it/400x400')}}" alt="" ></td>
                    <td>{{$photo->file}}</td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>{{$photo->updated_at->diffForHumans()}}</td>
               <td>     
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediasController@destroy', $photo->id]]) !!}

                      <div class="form-group">
                          {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                      </div>
                    {!! Form::close() !!}




</td>
                </tr>

               @endforeach
             @endif   

       </tbody>
     </table>

@stop