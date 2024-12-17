<html lang="fr">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>PFE PROJET CHANGER MOT DE PASSE</title>
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href="/css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            #txt {
                font-size: 1.2rem;
                color: #858796;
                margin-right: 500px;
                text-align: left;
                align-items: left;
            }
        </style>
    </head>
    <body id="page-top">
 
        <div id="wrapper">

            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div id="txt" class="ml-auto" ><b></b></div>
                    </nav>
                    <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;">
                    <div class="card-header py-3 border-bottom-info">
                        <h6 class="m-0 font-weight-bold text-primary">Changer votre mot de passe</h6>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif  
                        <form action="{{ url('changermotdepassepost') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Adresse E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="Entrervotre adresse email" required>
                            </div>
                            <div class="form-group">
                                <label>Mot de passe actuel</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Entrer le mot de passe actuel" required>
                            </div>
                            <div class="form-group">
                                <label>Nouveau mot de passe</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Entrer le nouveau mot de passe" required>
                            </div>
                            <div class="form-group">
                                <label>Confirmer le nouveau mot de passe</label>
                                <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirmer le nouveau mot de passe" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" >
                                Changer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
                        function startTime() {
                            const today = new Date();
                            let h = today.getHours();
                            let m = today.getMinutes();
                            let s = today.getSeconds();
                            m = checkTime(m);
                            s = checkTime(s);
                            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
                            setTimeout(startTime, 1000);
                        }

                        function checkTime(i) {
                            if (i < 10) { i = "0" + i; }
                            return i;
                        }

                        document.addEventListener('DOMContentLoaded', (event) => {
                            startTime();
                        });
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