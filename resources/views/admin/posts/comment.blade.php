@extends('admin.master') 
@section('content')
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Komentar</h2> 
</div> 
<div class="float-right"> 
<a class="btn btn-success" href="{{ route('posts.create') }}"> Create Post</a> 
</div> 
</div> 
</div> 
@if ($message = Session::get('success')) 
<div class="alert alert-success"> 
<p>{{ $message }}</p> 
</div> 
@endif 
<table class="table table-bordered"> 
<tr> 
<th width="200px" class="text-center">Nama Komentar</th> 
<th class="text-center">Isi Komentar</th> 
<th width="280px"class="text-center">Judul Artikel</th> 
<th class="text-center">Action</th>

</tr> 0

<?php foreach ( array_merge ($posts,$comments as $post)){ ?>
<tr> 
<!-- -->
<td>{{ $post->name }}</td> 
<td>{{ $post->comment }}</td> 
<td>{{ $post->title }} ({{ $comment->id }}) </td> 
<td class="text-center"> 
	
	<form action="{{ url('') }}/admin/comments/<?php echo $post->id ?>" method="POST"> 
@csrf 
<div class="row"> 
<div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
<input type="text" name="comment_approve" value="<?php echo $post->id ?>" class="form-control" placeholder="Title" hidden> 

<button type="submit" class="btn btn-primary">Approve</button> 
</div> 
</div> 
</form> 

<form action="{{ route('posts.destroy',$post->id) }}" method="POST"> 
<!-- <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Approve</a> --> 
<!--  ---------------------------------- -->
@csrf 
@method('DELETE') 
<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Deny</button> 
</form> 
</td> 
</tr> 
<?php }; ?> 

</table> 

{!! $posts->links() !!} 
@endsection