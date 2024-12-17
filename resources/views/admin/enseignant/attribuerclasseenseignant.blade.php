@include('header')
                    <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
                        <div class="card-header py-3 border-bottom-info ">
                            <h6 class="m-0 font-weight-bold text-primary">Affectation enseignants-classes-matiéres</h6>
                        </div>
                        <div class="card-body">
                            <table align="left">
                            <form action="/enseignant/store"  method="post" autocomplete="off" style="margin-bottom: 10px; align-content: center ;">
                                    @csrf 
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            
                                                <table class="table" style="width: 100% ;">
                                                    <thead>
                                                        <tr>
                                                            <th>Classes :</th>
                                                            <th>Matières :</th>
                                                            <th>Enseignants :</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <!-- Sélection des classes -->
                                                                <select name="classe_id" id="classe_id" required class="btn btn-light">
                                                                    <option selected>Choisissez une classe</option>
                                                                    @foreach ($classes as $classe)
                                                                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </td>

                                                            <td>
                                                            <select name="matiere_id" id="matiere_id" required class="btn btn-light">
                                                                <option selected disabled>Choisissez une matière</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                                <!-- Sélection des enseignants non affectés -->
                                                                <select name="enseignant_id" id="enseignant_id"  class="btn btn-light" required>
                                                                    <option  selected>Choisissez un enseignant</option>
                                                                    @foreach ($enseignants as $enseignant)
                                                                        <option value="{{ $enseignant->id }}">{{ $enseignant->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            
                                                    </tbody>
                                                </table>
                                                <br>
                                                <div class="text-center" align="center">
                                                    <button type="submit" class="btn btn-success btn-icon-split from-control">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">ENVOYER</span>
                                                    </button>
                                                </div> 
                                                <br>
                                                <h3>Les classes affectées aux enseignants <h3>
                                                <table class="table table-striped text-center" id="myTable2" >
                                                <thead>
                                                    <tr>
                                                        <th>Enseignant :</th>
                                                        <th>Classe :</th>
                                                        <th>Matière :</th>
                                                        <th>Action :</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        @forEach($affectations as $affectation)
                                                        <tr>
                                                            <td>{{$affectation->enseignant->name}}</td>
                                                            <td>{{$affectation->classe->nom}}</td>
                                                            <td>{{$affectation->matiere->nom}}</td>
                                                            <td><button class="btn btn-danger btn-circle btn-lg" onclick="deleteSingle('{{$affectation->id}}')" style="font-size: 0.5em;">SUPPRIMER</button></td>
                                                        </tr>
                                                        @endforEach
                                                    </tbody>
                                                </table> 
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br>
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

            <script>                  
                function deleteSingle(id) { 
                    var confirmed = confirm("Êtes-vous sûr de vouloir supprimer cette affectation d'enseignant de la base de données ?");
                    if (confirmed) {
                        window.location.href = "{{ url('/enseignant/attribuerclasseenseignant') }}/" + id;
                    } else { 
                        alert("Suppression annulée.");
                    }
                }
            </script> 

    
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../../js/sb-admin-2.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#classe_id').on('input', function() {
            var classeId = $(this).val();
            updateMatiereList(classeId);
        });

        $('#classe_id').change(function() {
            var classeId = $(this).val();
            updateMatiereList(classeId);
        });

        function updateMatiereList(classeId) {
            if (classeId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('getMatieresByClasse') }}",
                    data: {
                        classe_id: classeId
                    },
                    success: function(data) {
                        $('#matiere_id').empty();
                        $('#matiere_id').append('<option selected disabled>Choisissez une matière</option>');
                        $.each(data, function(key, value) {
                            $('#matiere_id').append('<option value="' + value.id + '">' + value.nom + '</option>');
                        });
                    }
                });
            } else {
                $('#matiere_id').empty();
                $('#matiere_id').append('<option selected disabled>Choisissez une matière</option>');
            }
        }
    });
</script>
    </body>
</html>
