@extends('admin.master') 
@section('content')
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Komentar</h2> 
</div>
<div><br><br></div> 
<div class="float-middle"> 
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" class="btn btn-info" href="#pending">Pending </a></li>
    <li><a data-toggle="tab" class="btn btn-primary" href="#approved"> Approved</a></li>
    <li><a data-toggle="tab" class="btn btn-danger" href="#reject"> Decline</a></li>
  </ul>
</div> 
</div> 
</div> 
@if ($message = Session::get('success')) 
<div class="alert alert-success"> 
<p>{{ $message }}</p> 
</div> 
@endif 
  <div class="tab-content">
    <div id="pending" class="tab-pane fade in active">
<table class="table table-bordered"> 
<tr> 
<th width="200px" class="text-center">Nama Komentar</th> 
<th class="text-center">Isi Komentar</th> 
<th width="340px"class="text-center">Judul Artikel</th> 
<th class="text-center">Action</th>

</tr> 

@foreach($posts as $post)
<tr> 
<!-- -->
<td>{{ $post->name }}</td> 
<td>{{ $post->comment }}</td> 
<td>{{ $post->title }} ({{ $post->id }} comment.id) </td> 
<td class="text-center"> 
	
	<form action="{{ url('') }}/admin/comments/<?php echo $post->id ?>/approve" method="POST"> 
@csrf 
<input type="text" name="comment_approve" value="<?php echo $post->id ?>" class="form-control" placeholder="Title" hidden> 
<button type="submit" class="btn btn-primary">Approve</button> 
</form> 

<form action="{{ url('') }}/admin/comments/<?php echo $post->id ?>/reject" method="POST"> 
<!-- <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Approve</a> --> 
<!--  ---------------------------------- -->
@csrf 
<input type="text" name="comment_approve" value="<?php echo $post->id ?>" class="form-control" placeholder="Title" hidden> 
<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak komentar ini?')"> Decline</button> 
</form> 

<form action="{{ url('') }}/admin/comments/<?php echo $post->id ?>/delete" method="GET"> 
@csrf 
@method('DELETE') 
<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> 
</form> 

</td> 
</tr> 
@endforeach 
</table> 
    </div>
<!-- -----------------------------------------------------------------------------------------------
-------------------------
--------------------------------- -->
    <div id="approved" class="tab-pane fade">
    <table class="table table-bordered"> 
<tr> 
<th width="200px" class="text-center">Nama Komentar</th> 
<th class="text-center">Isi Komentar</th> 
<th width="340px"class="text-center">Judul Artikel</th> 
<th class="text-center">Action</th>

</tr> 

@foreach($posts2 as $post2)
<tr> 
<!-- -->
<td>{{ $post2->name }}</td> 
<td>{{ $post2->comment }}</td> 
<td>{{ $post2->title }} ({{ $post2->id }} comment.id) </td> 
<td class="text-center"> 
	
	<form action="{{ url('') }}/admin/comments/<?php echo $post2->id ?>/approve" method="POST"> 
@csrf 
<div class="row"> 
<div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
<input type="text" name="comment_approve" value="<?php echo $post2->id ?>" class="form-control" placeholder="Title" hidden> 

<div class="btn btn-primary disabled">Approved</div>
</div> 
</div> 
</form> 

<form action="{{ url('') }}/admin/comments/<?php echo $post2->id ?>/reject" method="POST"> 
<!-- <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Approve</a> --> 
<!--  ---------------------------------- -->
@csrf 
<input type="text" name="comment_approve" value="<?php echo $post2->id ?>" class="form-control" placeholder="Title" hidden> 
<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak komentar ini?')"> Declined</button> 
</form> 
</td> 
</tr> 
@endforeach 
</table> 
    </div>
<!-------------------------------------------------------------------------------------------------
-------------------------
--------------------------------- -->
    <div id="reject" class="tab-pane fade">
    <table class="table table-bordered"> 
<tr> 
<th width="200px" class="text-center">Nama Komentar</th> 
<th class="text-center">Isi Komentar</th> 
<th width="340px"class="text-center">Judul Artikel</th> 
<th class="text-center">Action</th>

</tr> 

@foreach($posts3 as $post3)
<tr> 
<!-- -->
<td>{{ $post3->name }}</td> 
<td>{{ $post3->comment }}</td> 
<td>{{ $post3->title }} ({{ $post3->id }} comment.id) </td> 
<td class="text-center"> 
	
		<form action="{{ url('') }}/admin/comments/<?php echo $post3->id ?>/pending" method="POST"> 
@csrf 
<input type="text" name="comment_approve" value="<?php echo $post3->id ?>" class="form-control" placeholder="Title" hidden> 
<button type="submit" class="btn btn-info">Pending</button> 
</form> 

<form action="{{ url('') }}/admin/comments/<?php echo $post3->id ?>/reject" method="POST"> 

@csrf 
<input type="text" name="comment_approve" value="<?php echo $post3->id ?>" class="form-control" placeholder="Title" hidden> 
<div class="btn btn-danger disabled">Declined</div>
</form> 
</td> 
</tr> 
@endforeach 
</table> 
    </div>



{!! $posts->links() !!} 
@endsection