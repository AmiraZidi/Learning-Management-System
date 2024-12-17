@include('header')
<div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">Vos classes</h6>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <table align="left"> 
                        <tr>
                            <td>Rechercher une classe :</td>
                            <td>
                                <input type="text" id="searchInput" class="form-control" placeholder="Rechercher une classe">
                            </td> 
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <table class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Classe</th>
                    <th>Matiere</th>
                    <th colspan="3">Actions :</th>
                </tr>
            </thead>
            <tbody id="results">
                @if ($affectations)
                    @foreach ($affectations as $affectation)
                        <tr>
                            <td>{{ $affectation->classe->nom }}</td>
                            <td>{{ $affectation->matiere->nom }}</td>
                            <td><button class="btn btn-info btn-circle btn-lg" onclick="seancesabsences('{{$affectation->id}}')" style="font-size: 0.5em;">Attribuer des absences</button></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Aucune classe trouvée</td>
                    </tr>
                @endif
            </tbody>
        </table>
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
                                        <a href="{{ url('logout') }}"class="btn btn-primary" >Déconnexion</a>                                </div>
                                </div>
                            </div>
                        </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('#results tr').each(function() {
                var classeName = $(this).find('td:first').text().toLowerCase();
                if (classeName.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

<script>
                    
    function seancesabsences(id) {
        window.location.href = "{{ url('enseignants/seancesabsences') }}/" + id;
    }
    
</script>

<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
</body>
</html>
