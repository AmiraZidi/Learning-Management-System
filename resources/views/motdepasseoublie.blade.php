<!DOCTYPE html>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mot de passe oublié</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color:  #edf0fd" >

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="background-color: #9eafff;">
                            <img class="col-lg-6 d-lg-block" src="../img/login.jpg">
                            <div class="col-lg-6">
                                <br><br><br><br><br><br>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Mot de passe oublié</h1>
                                    </div>
                                    <form action="{{ url('motdepasseoubliepost') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" required name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter your email address...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" onclick="show('this')">
                                            Envoyer un email
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        </div>
        <script>
            function show () {
                showAlert("Veuillez vérifier votre e-mail");
            }

        function alerteEmail() {
            var email = document.getElementById("email").value;
            if (email === "") {
                showAlert("veuillez entrer votre email.");
            } else if (email !== "votre_email_correct") {
                showAlert("veuillez vérifier votre adresse email.");
            }
        }
        </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>