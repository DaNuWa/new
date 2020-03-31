@extends('layouts.admin')


@section('content')
   <h1>Posts</h1> 

   <table class="table">
      <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Author name</th>
            <th>Post Name</th>
            <th>Content</th>
            <th>Created</th>
            <th>updated</th>
            
         </tr>
       </thead>
       <tbody>

         @if($posts)

           @foreach($posts as $post)
               <tr>
                   <td>{{$post->id}}</td>
                   <td>{{$post->category?$post->category->name:"No category"}}</td>
                   <td> <img height="50" src="{{$post->photo?$post->photo->file:'http://placehold.it/400'}}" alt=""> </td>
                   <td>{{$post->user->name}}</td>
                   <td>{{$post->title}}</td>
                   <td>{{$post->body}}</td>
                   <td>{{$post->created_at->diffForhumans()}}</td>
                   <td>{{$post->updated_at->diffForhumans()}}</td>
                   
               </tr>
              @endforeach
            @endif   

      </tbody>
    </table>
@stop