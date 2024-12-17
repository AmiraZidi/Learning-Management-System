@include('header')
<div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">Mes Absences</h6>
    </div>
    <div class="card-body">
    <h1>Mes Absences pour la Matière</h1>
    <p>Nombre total d'absences : {{ $totalAbsences }}</p>
        <table class="table" style="width: 100%;">
            @if($absences->isEmpty())
                <p>Aucune absence enregistrée.</p>
            @else
                <thead>
                    <tr>
                        <th>Nom matière</th>
                        <th>Nombre d'absences</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absences as $absence)
                        <tr>
                            <td>{{ $absence->affectationclassenseignant->matiere->nom }}</td>
                            <td>{{ $absence->presence }}</td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
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
                                        <a href="{{ url('logout') }}"class="btn btn-primary" >Déconnexion</a>
                                    </div>
                                </div>
                            </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
</body>
</html>
