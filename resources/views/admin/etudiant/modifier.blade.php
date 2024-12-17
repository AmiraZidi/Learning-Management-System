@include('header')

<div class="card shadow mb-2" align="center" style="margin: 40px; padding: 20px;">
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">Modifier les données de l'Étudiant {{$etudiant->name}}</h6>
    </div>
    <div class="card-body">
        <br>                       
        <div class="table-responsive">
        <form method="POST" action="/etudiant/modifier/{{ $etudiant->id }}" autocomplete="off" style="margin-bottom: 10px; text-align: center;"> 
            @csrf 
            @method('PUT')                   
            <table align="center" cellspacing="5" width="50%" height="100%">
                <input type="hidden" name="put" value="PUT">
                <tr>
                    <td>Numéro CIN :</td>
                    <td>
                        <input type="text" name="numcin" value="{{ $etudiant->numcin }}" class="icon text-gray-600 btn btn-light form-control"
                        pattern="[0-9]{8}" placeholder="Entrer le numéro CIN" required>
                    </td>
                </tr>
                <tr>
                    <td>E-mail :</td>
                    <td>
                        <input type="email" name="email" value="{{ $etudiant->email }}" class="icon text-gray-600 btn btn-light form-control"
                            placeholder="Entrer l'e-mail" required>
                    </td>
                </tr>
                <tr>
                    <td>E-mail Institutionnel:</td>
                    <td>
                        <input type="email" name="email_institutionnel" value="{{ $etudiant->email_institutionnel }}" class="icon text-gray-600 btn btn-light form-control"
                            placeholder="Entrer l'e-mail institutionnel" required>
                    </td>
                </tr>
                <tr>
                    <td>Nom et Prénom de l'étudiant :</td>
                    <td>
                        <input type="text" name="name" value="{{ $etudiant->name }}" class="icon text-gray-600 btn btn-light form-control"
                            placeholder="Entrer le nom et le prénom" required>
                    </td>                                    
                </tr>
                <tr>
                    <td>Sexe :</td>
                    <td class="text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme" {{ $etudiant->sexe == 'homme' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="homme">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme" {{ $etudiant->sexe == 'femme' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="femme">Femme</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Spécialité :</td>
                    <td>
                        <select name="specialite_id" value="{{ $etudiant->specialite_id }}" required class="icon text-gray-600 btn btn-light form-control">
                            @foreach($specialites as $specialite)
                                <option value="{{ $specialite->id }}" @if($specialite->id == $etudiant->specialite_id) selected @endif>{{ $specialite->specialitem }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>Semestre :</td>
                    <td>
                        <select name="semestre" value="{{$etudiant->semestre}}" required class="icon text-gray-600 btn btn-light form-control">
                            <option value="{{$etudiant->semestre}}">{{$etudiant->semestre}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br><br>
            <div class="text-center">
                <button class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">MODIFIER</span>
                </button>
            </div>
        </form></div>
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

<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>

</body>
</html>
