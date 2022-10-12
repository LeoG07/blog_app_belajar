<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="admin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.action') }}" method="POST">
            @csrf
                            <form class="user">
                                <div class="form-group ">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}"
                                            placeholder="Name">
                                    <!-- </div> -->

                                </div>
                                <div class="form-group ">
                                    <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group ">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Password">
                                    <!-- </div> -->
                                </div>
                                <div class="form-group ">
                                    <!-- <div class="col-sm-6"> -->
                                        <input type="password" class="form-control form-control-user"
                                            name="password_confirm" placeholder="Repeat Password">
                                    <!-- </div> -->
                                </div>
                                
                                <button type ="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin2/vendor/jquery/jquery.min.js"></script>
    <script src="admin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin2/js/sb-admin-2.min.js"></script>

</body>

</html>