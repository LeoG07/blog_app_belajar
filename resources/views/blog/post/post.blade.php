@extends ('blog.post.master')
@section ('konten') 
<!-- Page Header-->
<?php foreach ($image as $row) {?>
        <header class="masthead" style="background-image: url('{{asset('')}}<?php echo $row->file_path;?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                        <?php }?>
                            <?php foreach ($posts as $row) { ?>
                                <h1>
                                <?php echo $row->title; ?></h1>
                            
                                                        <span class="meta">
                        <?php }?>
                            <?php foreach ($user as $users) { ?>
                                Posted by
                                <a href="#!"><?php echo $users->name; ?></a>
                                on October 04, 2022
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center" style="text-align:justify" >
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h2 style="text-align:left"><?php echo $row->title;  ?></h2>
                            <p><?php echo $row->content ; ?></p>
                           <!--  <p><?php echo $row->id; ?></p> -->
                            <br>
                            <?php } ?>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">LeoG07 Berita-man</a>
                            &middot; Images by
                            <a href="https://pict.sindonews.net/size/640/salsabila/slider/2022/08/17697/ilmuwan-umumkan-dugong-telah-punah-di-china-wxb.jpg">Del Esshole on The Commons</a>
                            <br><br>
                          <h4>Display Comments</h4>
<section >
    <?php foreach ($comments as $comment) { ?>
                                
                                
  
          <div class="card-body p-4">
            
            <p class="fw-light mb-4 pb-2">Latest Comments section by <?php echo $comment->name; ?></p>

            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1"><?php echo $comment->name; ?></h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    <?php echo $comment->created_at; ?>
                    <span class="badge bg-primary">Approved</span>
                  </p>
               <!--    <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a> -->
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                <p class="mb-0">
                  <?php echo $comment->comment; ?>
                </p>
              </div>
            </div>
          </div>
 <?php } ?>
   
          

      

         
   
</section>




                   
                            <br><br><br><br>
                            <h1>Komentar</h1>
                            <form action="{{ route('comment') }}" method="POST">
                                @csrf
           <br> <textarea class="form-control" style="height:150px" name="comment" placeholder="Komentar"></textarea> <br>
                            <form class="user">
                                <div class="form-group ">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}"
                                            placeholder="Name">
                                    <!-- </div> -->
                                <div class="form-group ">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="post_id" value="<?= $post;?>" 
                                            placeholder="Name" hidden>
                                    <!-- </div> -->

                                </div>
                                    <div class="form-group ">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="created_at" value="{{ date('Y-m-d H:i:s') }}" 
                                            placeholder="created_at" hidden>
                                    <!-- </div> -->

                                </div>
                                <div class="form-group ">
                                    <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}"
                                        placeholder="Email Address">
                                </div>
                                
                                
                                <button type ="submit" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                                <hr>
                                
                            </form>
               

                        </p>
                    </div>
                </div>
            </div>
        </article>
@endsection   