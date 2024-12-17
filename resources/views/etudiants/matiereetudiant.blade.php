@include('header')
<div class="container my-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-info text-center">
            <h6 class="m-0 font-weight-bold text-primary">Vos classes</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-6 offset-lg-3">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher une classe">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-stripped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Enseignant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @if($affectations->isEmpty())
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center">Aucune matière attribuée.</td>
                            </tr>
                        </tbody>
                    @else
                    <tbody id="results">
                        @foreach ($affectations as $affectation)
                            <tr>
                                <td>{{ $affectation->matiere->nom }}</td>
                                <td>{{ $affectation->enseignant->name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{route('coursetudiant', $affectation->id)}}" >Mes cours</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bouton de retour en haut -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Modal de déconnexion -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a class="btn btn-primary" href="{{ url('logout') }}">Déconnexion</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
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
    function coursetudiant(affectation_id) {
        window.location.href = "{{ url('etudiants/coursetudiant') }}/" + affectation_id;
    }
</script>
</body>
</html>
