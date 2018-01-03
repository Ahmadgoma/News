@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                <ul>
               <li>ID : {{ Auth::user()->id }} </li>   
               <li>Username : {{ Auth::user()->name }} </li>
               <li>Email : {{ Auth::user()->email }} </li>
              </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
