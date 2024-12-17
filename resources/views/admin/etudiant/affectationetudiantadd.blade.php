@include('header')
                    <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
                        <div class="card-header py-3 border-bottom-info ">
                            <h6 class="m-0 font-weight-bold text-primary">Affectation des étudiants dans la classe {{ $classe->nom }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <h5> <b>Les etudiants non-affectées </b></h5>
                            <form id="form-etudiants" action="/etudiant/affectationetudiantpost" method="post" autocomplete="off" style="margin-bottom: 10px; align-content: center;">
                            @csrf  
                            @method('post')
                            <table class="table table-striped text-center" align="center" cellspacing="20px" width="50%" height="100%">
                            @csrf
                            <input type="hidden" name="classe_id" value="{{$classe_id}}">

                                    <thead align="center">
                                        <tr>
                                            <th>Nom et Prénom</th>
                                            <th>Select</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($etudiants_non_affectes as $etudiant)
                                        <tr>
                                            <td>{{ $etudiant->name }} : {{ $etudiant->email }}</td>
                                            <td><input type="checkbox" class="custom-control-input" name="etudiant_id[]" id="checkbox{{$etudiant->id}}" value="{{$etudiant->id}}">
                                                <label class="custom-control-label" for="checkbox{{$etudiant->id}}"></label>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            <br>
                            <table align="center" cellspacing="20">
                                <tr>
                                    <td>
                                        <div type="submit" class="my-2"></div>
                                        <button class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">AFFECTER </span>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div class="card-body">
                            <h5> <b>Les etudiants affectées au classe {{$classe->nom}} </b></h5>
                                <table class="table" id="myTable2" >
                                <thead>
                                    <tr>
                                        <th>Nom Etudiant :</th>
                                        <th>Email Etudiant :</th>
                                        <th>Action</th>                                        
                                    </tr>
                                </thead>
                                    <tbody>
                                        @forEach($affectationsetudiants as $affectationsetudiant)
                                        <tr>
                                            <td>{{$affectationsetudiant->etudiant->email}}</td>
                                            <td>{{$affectationsetudiant->etudiant->name}}</td>
                                            <td>
                                            <form action="{{ route('affectationetudiant.delete', ['id' => $affectationsetudiant->id]) }}" method="post" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="font-size: 0.5em;" class="btn btn-danger btn-circle btn-lg" >SUPPRIMER</button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforEach
                                    </tbody>
                                </table></div>
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
                    </div>


            <script>                
                function confirmDelete() {
                    return confirm("Êtes-vous sûr de vouloir supprimer cette affectation d'étudiant ?");
                }
            </script>

        <script>
            document.getElementById('classe').addEventListener('change', function() {
                var semestre = this.options[this.selectedIndex].getAttribute('data-semestre');
                var specialite = this.options[this.selectedIndex].getAttribute('data-specialite');

                // Mettre à jour la valeur de semestre et specialite dans les champs cachés du formulaire
                document.getElementById('semestre').value = semestre;
                document.getElementById('specialite').value = specialite;

                // Soumettre automatiquement le formulaire
                document.getElementById('form-etudiants').submit();
            });
        </script>

        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../../js/sb-admin-2.min.js"></script>
    </body>
</html>