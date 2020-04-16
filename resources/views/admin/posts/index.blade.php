@extends('layouts.admin')


@section('content')
   <h1>Posts</h1>


   @if(Session::has('deleted_post'))
<p class="bg-danger">{{session('deleted_post')}}</p>
@endif

   <table class="table table-dark">
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
            <th>View Post</th>
            <th>View Comments</th>

         </tr>
       </thead>
       <tbody>

         @if($posts)

           @foreach($posts as $post)
               <tr>
                   <td>{{$post->id}}</td>
                   <td>{{$post->category?$post->category->name:"No category"}}</td>
                   <td> <img height="50" src="{{URL::asset($post->photo?$post->photo->file:'http://placehold.it/400')}}" alt=""> </td>
                   <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                   <td>{{$post->title}}</td>
                   <td>{{$post->body}}</td>
                   <td>{{$post->created_at->diffForhumans()}}</td>
                   <td>{{$post->updated_at->diffForhumans()}}</td>
                   <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
                   <td><a href="{{route('admin.comments.show',$post->id)}}">View comment</a></td>

               </tr>
              @endforeach
            @endif

      </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>
    </div>
@stop
