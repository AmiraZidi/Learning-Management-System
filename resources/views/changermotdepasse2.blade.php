@include('header')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
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
                        <form action="{{ url('changermotdepassepost2') }}" method="post">
                            @csrf
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
                                Changer mot de passe
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
 <script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>
</body>
</html>
