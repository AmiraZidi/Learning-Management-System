@include('header')

                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
                    <div class="card-header py-3 border-bottom-info">
                        <h6 class="m-0 font-weight-bold text-primary">Fiche enseignant {{ $enseignant->name}}</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center" style="width:100%;" align="center">
                            <tbody>
                            <tr>
                                <td><h6 class="collapse-header">Nom et Prénom:</h6></td>
                                <td>{{$enseignant->name}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Numcin :</h6></td>
                                <td> {{$enseignant->numcin}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Spécialité :</h6></td>
                                <td> {{$enseignant->specialite_enseignant}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">E-mail :</h6></td>
                                <td> {{$enseignant->email}}</td>
                            </tr>
                            <tr>
                                <td><h6 class="collapse-header">Sexe :</h6></td>
                                <td> {{$enseignant->sexe}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesmatcls"aria-expanded="true" aria-controls="collapsePagesmatcls">
                                <span>Liste des matières par classe</span>
                            </a>
                            <div id="collapsePagesmatcls" class="collapse" aria-labelledby="headingPagesmatcls" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <div class="collapse-divider"></div>
                                    <table class="table table-striped text-center" style="width:100%;" align="center">
                                        @foreach($affectations as $affectation)
                                            <tr>
                                                <td>{{ $affectation->classe->nom }}</td>
                                                <td>{{ $affectation->matiere->nom }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </li>
                    </div>

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
                                        <h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session actuelle.</div>
                                    <div class="modal-footer">
                                        <button   class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
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