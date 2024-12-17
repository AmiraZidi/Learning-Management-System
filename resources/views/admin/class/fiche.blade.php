@include('header')

                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
                    <div class="card-header py-3 border-bottom-info">
                        <h6 class="m-0 font-weight-bold text-primary">Fiche class {{$classe->nom}}</h6>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="width:100% ; height:100% ;">
                            <tbody> 
                            <tr>
                                <td><h6 class="collapse-header">Nom :</h6></td>
                                <td>{{$classe->nom}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Semestre :</h6></td>
                                <td>{{$classe->semestre}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Spécialité :</h6></td>
                                <td>{{$classe->specialite->specialitem}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Nombre des étudiant :</h6></td>
                                <td>{{ $nombreEtudiants }}</td>
                            </tr>
                             
                            </tbody>
                        </table>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesens" aria-expanded="true" aria-controls="collapsePagesens">
                                <span>Liste des étudiants</span>
                            </a>
                            <div id="collapsePagesens" class="collapse" aria-labelledby="headingPagesens" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <div class="collapse-divider"></div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($etudiants as $etudiant)
                                                <tr>
                                                    <td>{{ $etudiant->etudiant->name }}</td>
                                                    <td>{{ $etudiant->etudiant->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        
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