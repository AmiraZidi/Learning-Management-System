@include('header')

                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
                    <div class="card-header py-3 border-bottom-info">
                        <h6 class="m-0 font-weight-bold text-primary">Annonce</h6>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="width:100% ; height:100% ;">
                            <tbody>
                            <tr>
                                <td><h6 class="collapse-header">Titre :</h6></td>
                                <td>{{ $annonce->titre }}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Contenu :</h6></td>
                                <td>{{ $annonce->contenu }}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Publiée par :</h6></td>
                                <td>{{$annonce->user->name}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Publiée l</h6></td>
                                <td>{{ $annonce->date }}</td>
                            </tr>
                            
                            </tbody>
                        </table>
                        
                    </div></div>

                </div>

            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a href="{{ url('logout') }}"class="btn btn-primary" >Déconnexion</a>
                        </div>
                </div>
            </div>
        </div>

        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../../js/sb-admin-2.min.js"></script>

    </body>
    </html>