<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="blog2/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
   
                
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" style="font-size:25px" href="/">Leo G-07</a>
          
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="{{url ('/about')}}">About</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="{{url ('/admin/posts')}}">Post</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="{{url ('/contact')}}">Contact</a></li><?php
                        if (Session::get('name') != null) { ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="{{url ('/admin')}}">Admin</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="{{url ('/logout')}}">Logout</a></li>
                        <?php } else { ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="{{url ('/login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-size:15px" href="{{url ('/register')}}">Register</a></li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
      
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('blog2/assets/img/home-bg3.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <!-- <div class="row gx-4 gx-lg-5 justify-content-center"> -->
                    <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1 style="text-align:left">Solusi Masalah Teknologi Anda</h1>
                            <span class="subheading" style = "text-align:left;font-size:18px;font-family: Helvetica">Leo G-07 merupakan perusahaan yang bergerak di bidang Teknologi & Perangkat ​Elektronik dengan karakteristik jasa & layanan.</span>
                            <div style="text-align:left;">
                                
<button type="button" class="btn btn-dark" style="margin-top:35px">
<a href="{{url ('/about')}}" style="color:white;" >Hubungi Kami</a>
</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <!-- Main Content-->

        <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
        <h1 style="text-align:left">Articles</h1>
    </div>
</div>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <!-- Post preview-->
                    @foreach ($posts as $post) 

<!-- <td>{{ $post->title }}</td> 
<td>{{ $post->content }}</td> 
   -->
<!-- </td> 
</tr>  -->


                    <div class="post-preview">
                        <a href="blog/{{ $post->id }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                             </a>
                           
                            <!-- <h3 class="post-subtitle">{{ $post->content }}</h3> -->
                           <!--  <p><?php echo $post->content ; ?></p> -->
                           <p><?php echo Str::limit($post->content, 297); ?></p>
                            <a href="blog/{{ $post->id }}">
                            <button type="button" class="btn btn-primary">
                            <span >Read >></span>
                            </button>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $post->name }}</a>
                            {{ $post->created_at }}
                        </p>
 <hr class="my-4" />
                    </div>
                    @endforeach              
                    <!-- Divider-->
                   {!! $posts->links() !!}
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4">Text</div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="blog2/js/scripts.js"></script>
    </body>
</html>
