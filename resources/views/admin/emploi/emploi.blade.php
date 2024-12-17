@include('header')

<div class="container mt-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-info text-center">
            <h6 class="m-0 font-weight-bold text-primary">Gérer l'emploi du temps</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('Emploiparclasse') }}" method="post">
                @csrf  

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="width: 100%; font-size: 0.9em;" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach($seances as $seance)
                                    <th style="color:#4e73df;">Séance {{ $seance->heure }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jours as $jour)
                                <tr>
                                    <td style="color:#4e73df;"><b>{{ $jour->jour }}</b></td>
                                    @foreach($seances as $seance)
                                        @php
                                            $emploi = null;
                                            foreach ($emplois as $item) {
                                                if ($item->jour_id == $jour->id && $item->seance_id == $seance->id) {
                                                    $emploi = $item;
                                                    break;
                                                }
                                            }
                                            $affectation_id = $emploi ? $emploi->affectationclassenseignant_id : null;
                                            $salle_id = $emploi ? $emploi->salle_id : null;
                                        @endphp
                                        <td>
                                            <div class="form-group">
                                                <label for="matiere_{{ $jour->id }}_{{ $seance->id }}">Enseignant/Matière :</label>
                                                <select name="matiere[{{ $jour->id }}][{{ $seance->id }}]" class="form-control form-control-sm" required>
                                                    <option disabled {{ is_null($affectation_id) ? 'selected' : '' }}>Choisissez une matière</option>
                                                    @foreach($affectations as $affectation)
                                                        <option value="{{ $affectation->id }}" {{ $affectation->id == $affectation_id ? 'selected' : '' }}>
                                                            {{ $affectation->enseignant->name }} : {{ $affectation->matiere->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="salle_{{ $jour->id }}_{{ $seance->id }}">Salle :</label>
                                                <select name="salle[{{ $jour->id }}][{{ $seance->id }}]" class="form-control form-control-sm" required>
                                                    <option disabled {{ is_null($salle_id) ? 'selected' : '' }}>Choisissez une salle</option>
                                                    @foreach($salles as $salle)
                                                        <option value="{{ $salle->id }}" {{ $salle->id == $salle_id ? 'selected' : '' }}>
                                                            {{ $salle->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Enregistrer</span>
                    </button>
                </div>
            </form>                            
        </div>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a href="{{ url('logout') }}" class="btn btn-primary">Déconnexion</a>
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
