@extends('layouts.app')

@section('content')

<span><b>Edit News</b></span>




<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase"></span>
        </div>
    </div>

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
        <form action="update" class="form-horizontal"  role="form" method="post" id='FormSubmit'  enctype="multipart/form-data" >
        
            {{ csrf_field() }}
              <div class="form-body" >



                
               
                    <div class="form-group form-md-line-input form-md-floating-label has-success col-md-9">
                        <label for="form_control_2" class="col-md-3">Title</label>
                        <input class="form-control" id="form_control_2" type="text"  name="title" value="{{$new->title}}">
                        
                    </div>

               
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_1" class="col-md-9">New Description</label>
                        <textarea  style="color:red; " class="form-control" id="form_control_1" rows="3" required="required"  name="description" >{{$new->description}}</textarea>
                        
                    </div>
               
              
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_3">Auter Name</label>
                        <input class="form-control" id="form_control_3" required="required" type="text" name="author" value="{{$new->author}}">
                        
                        
                    </div>
              
                    <div class="form-group">

                        <div class="col-md-9">
                            <input name="images[]" multiple accept="image/*" required="required" type="file">

                        </div>
                    </div>
                    @foreach($new_images as $image)
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_3">images </label>
                   <img src="{{ URL::to('uploads/' . $image->image) }}" width="100" height="100">
                   <a href="/news/{{$image->id}}/delete" >Delete</a> 
                    </div>
                    @endforeach

                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" value="update" name="submit" >

                            <a href="{{url('/news')}}" type="button" class="btn default">Cancel</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</form>



</div>
@stop