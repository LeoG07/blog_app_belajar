@extends('admin.master') 
@section('content') 
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Create New Post</h2> 
</div> 
<div class="float-right"> 
<a class="btn btn-secondary" href="{{ url('admin/posts') }}"> Back</a> 
</div> 
</div> 
</div> 
@if ($errors->any()) 
<div class="alert alert-danger"> 
<strong>peringatan!</strong> There were some problems with your input.<br><br> 
<ul> 
@foreach ($errors->all() as $error) 
<li>{{ $error }}</li> 
@endforeach 
</ul> 
</div> 
@endif 

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"> 
@csrf 
<div class="row"> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Title:</strong> 
<?php $id = Session::get ('id'); ?>
<input type="text" name="user_id" value="<?=$id?>" hidden> 
<input type="text" name="title" class="form-control" placeholder="Title">
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Content:</strong> 
<textarea class="form-control tinymce" style="height:100px" name="content" placeholder="Content"></textarea> 
</div> 
</div>
            <div class="col-md-12">
                <div class="form-group"> 
                    <strong>Image:</strong> 
                    <input type="file" name="file" id="chooseFile" class="form-control" id="chooseFile">
                <input type="text" name="post_id" value="<?php $last_id;?>" hidden>
                </div>
            </div>
               
             
             
<div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
<button type="submit" class="btn btn-primary">Submit</button> 
</div> 
</div> 
</form> 
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js"></script>
<script>
   tinymce.init({
     selector: 'textarea.tinymce', // Replace this CSS selector to match the placeholder element for TinyMCE
     
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script>
@endsection