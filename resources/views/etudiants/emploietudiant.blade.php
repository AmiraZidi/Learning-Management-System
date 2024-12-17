@include('header')

<div class="card shadow mb-2" align="center" style="margin: 40px; padding: 20px;">
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">Emploi du temps</h6>
    </div>
    <div class="card-body">
        <table align="left" class="table table-bordered"  cellspacing="0">
            <tr>
                <td></td>
                <!-- Boucle sur les séances -->
                @foreach($seances as $seance)
                    <td>Seance {{ $seance->heure }}</td>
                @endforeach
            </tr>
            <!-- Boucle sur les jours -->
            @foreach($jours as $jour)
                <tr>
                    <td>{{ $jour->jour }}</td>
                    @foreach($seances as $seance)
                        <td>
                            @php
                                // Trouver l'emploi du temps correspondant à ce jour et à cette séance
                                $emploi = $emplois->where('jour_id', $jour->id)->where('seance_id', $seance->id)->first();
                            @endphp
                            @if($emploi)
                                Enseignant: {{ $emploi->affectationClassEnseignant->enseignant->name }} <br>
                                Matière: {{ $emploi->affectationClassEnseignant->matiere->nom }} <br>
                                Salle: {{ $emploi->salle->nom }}
                            @else
                                Pas de séance pour le moment
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
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
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../../js/sb-admin-2.min.js"></script>

    </body>

</html>