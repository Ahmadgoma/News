@extends('layouts.app')

@section('content')

    

<div class="container">
  <h2>All News with the the same title</h2>
  
  <div class="row">
      

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
             @foreach($search as $new)
              <tr>
                  <td> {{$new->id}} </td>
                  <td> {{$new->title}} </td>
                  <td> {{$new->author}} </td>
                  <td> {{$new->description}} </td>
              </tr>
             @endforeach
       </tbody>
    </table>
    </div>
</div>


    





</div>
@stop