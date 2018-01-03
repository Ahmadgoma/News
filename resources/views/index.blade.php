@extends('layouts.app')

@section('content')

    

<div class="container">
  <h2>List All News</h2>
  
  <div class="row">
      
 @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
  <a type="button" class="btn btn-success" href="{{url('/news/create')}}" >Create New</a>
    <table class="table ">
        <thead>
            <tr>
                <th> id</th>
                <th> title</th>
                <th> Author name  </th>
                <th> description </th>
                <th> Actions</th>
                
            </tr>
        </thead>
        <tbody>
             @foreach($news as $new)
              <tr>
                  <td> {{$new->id}} </td>
                  <td> {{$new->title}} </td>
                  <td> {{$new->author}} </td>
                  <td>{{$new->description}} </td> 
                  
                  <td>
                      <a type="button" class="btn btn-primary" href="{{url('/news/'.$new->id)}}"> View </a>
                      <a type="button" class="btn btn-info" href="{{url('/news/'.$new->id.'/edit')}}">Edit</a>
                      <a type="button" class="btn btn-danger" href="{{url('/news/'.$new->id.'/delet')}}">Delete</a>
                  </td>
                  
                  
              </tr>
             @endforeach
       </tbody>
    </table>
    </div>
</div>


    {{ $news->links() }}






@stop