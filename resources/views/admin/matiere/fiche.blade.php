@include('header')

                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
                    <div class="card-header py-3 border-bottom-info">
                        <h6 class="m-0 font-weight-bold text-primary">Fiche matière {{$matiere->nom}}</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center" style="width:100%;" align="center">
                            <tbody>
                                <tr>
                                    <td><h6 class="collapse-header">Nom :</h6></td>
                                    <td>{{$matiere->nom}}</td>
                                </tr>
                                <tr>
                                    <td><h6 class="collapse-header">Spécialité :</h6></td>
                                    <td>{{$matiere->specialite->specialitem }}</td>
                                </tr>
                                <tr>
                                    <td><h6 class="collapse-header">Coefficient :</h6></td>
                                    <td>{{$matiere->coeff }}</td>
                                </tr>
                                <tr>
                                    <td><h6 class="collapse-header">Nombre d'heure:</h6></td>
                                    <td>{{$matiere->nbrheure}}</td>
                                </tr>
                                <tr>
                                    <td><h6 class="collapse-header">Seméstre :</h6></td>
                                    <td>{{$matiere->semestre }}</td>
                                </tr>
                                <tr>
                                    <td><h6 class="collapse-header">Unité éducatif :</h6></td>
                                    <td>{{$matiere->ue }}</td>
                                </tr>
                                <tr>
                                    <td><h6 class="collapse-header">Code de l'unité éducatif :</h6></td>
                                    <td>{{$matiere->codeue }}</td>
                                </tr>
                                <tr>
                                    <td><h6 class="collapse-header">Nature :</h6></td>
                                    <td>{{$matiere->nature  }} et  {{$matiere->type  }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesens" aria-expanded="true" aria-controls="collapsePagesens">
                                <span>Liste des enseignants</span>
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
                                            @foreach($enseignants as $enseignant)
                                                <tr>
                                                    <td>{{ $enseignant->enseignant->name }}</td>
                                                    <td>{{ $enseignant->enseignant->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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