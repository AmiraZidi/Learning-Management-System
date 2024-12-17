@include('header')
<div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">La classe : {{$affectation->classe->nom}}</h6>
        <h6 class="m-0 font-weight-bold text-primary">La matiére : {{$affectation->matiere->nom}}</h6>

    </div>
     
    <div class="card-body">
    <br>
    </div>
    <div class="card-body">
        <h3>Les absences de cette séance : <h3>
        <table class="table" id="myTable2" >
        <thead>
            <tr>
                <th>Nom Etudiant :</th>
                <th>Présence :</th>
                <th>Date :</th>
                <th>Total d'absence de cette matiére :</th>
            </tr>
        </thead>
            <tbody>
                @forEach($absences_pour_seances as $absence)
                <tr>
                    <td>{{$absence->etudiant->name}}</td>
                    <td>{{$absence->presence}}</td>
                    <td>{{$absence->date}}</td>
                    <td>{{ $total_absences_par_etudiant[$absence->etudiant_id] ?? 0 }}</td> <!-- Afficher le total des absences -->
                </tr>
                @endforEach
            </tbody>
        </table>
        <a href="/emploi/adminclasseabsences" class="btn btn-danger btn-icon-split"> <!-- Ajoutez l'URL cible ici -->
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">ANNULER</span>
        </a>
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
