@extends('layouts.app')

@section('content')

<span><b>View News</b></span>




<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase"></span>
        </div>
    </div>


    <div class="portlet-body form">
        <form action="store" class="form-horizontal"  role="form" method="post" id='FormSubmit'  enctype="multipart/form-data" >
        
            {{ csrf_field() }}
              <div class="form-body" >



                    
               
                    <div class="form-group form-md-line-input form-md-floating-label has-success col-md-9">
                        <label for="form_control_2" class="col-md-3">Title</label>
                        <input class="form-control" id="form_control_2" type="text" value="{{$new->title}}"  name="title" >
                        
                    </div>

               
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_1" class="col-md-9">New Description</label>
                        <textarea class="form-control" rows="3" required="required"  name="description">{{$new->description}}</textarea>
                        
                    </div>
               
              
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_3">Auter Name</label>
                        <input class="form-control" id="form_control_3" value="{{$new->author}}" type="text" name="author">
                        
                        
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_3">Views </label>
                        <label for="form_control_3">{{$new->views}}</label>
                        
                        
                        
                    </div>
                     
                    @foreach($new_images as $image)
                    <div class="form-group form-md-line-input form-md-floating-label col-md-9">
                        <label for="form_control_3">images </label>
                   <img src="{{asset('/uploads/').'/'.$image->image}}" width="100" height="100"> 
                    </div>
                    @endforeach
                    
              


                
            </div>
    </div>

</form>



</div>
@stop