@extends('layouts.app')

@section('content')

<span><b>Create News</b></span>




<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase"></span>
        </div>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="portlet-body form">
        <form action="store" class="form-horizontal"  role="form" method="post" id='FormSubmit'  enctype="multipart/form-data" >
        
            {{ csrf_field() }}
              <div class="form-body" >



                
               
                    <div class="form-group form-md-line-input form-md-floating-label has-success col-md-9">
                        <label for="form_control_2" class="col-md-3">Title</label>
                        <input class="form-control" id="form_control_2" type="text"  name="title" >
                        
                    </div>

               
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_1" class="col-md-9">New Description</label>
                        <textarea class="form-control" rows="3" required="required"  name="description"></textarea>
                        
                    </div>
               
              
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_3">Author Name</label>
                        <input class="form-control" id="form_control_3" required="required" type="text" name="author">
                        
                        
                    </div>
              
                    <div class="form-group">

                        <div class="col-md-9">
                            <input name="images[]" multiple accept="image/*" required="required" type="file">

                        </div>
                    </div>


                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" value="Add" name="submit" >

                            <a href="" type="button" class="btn default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</form>



</div>
@stop