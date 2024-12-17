@include('header')

<div class="card shadow mb-2" align="center" style="margin: 40px; padding: 20px;">
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">Ajouter un nouveau Étudiant</h6>
    </div>
    <div class="card-body">
    <br>                        
        <div class="table-responsive">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/etudiant/new" method="post" autocomplete="off" style="margin-bottom: 10px; align-content:center;">
            @csrf
            <table align="center" cellspacing="20px" width="50%" height="100%">
                <tr>
                    <td>Numéro CIN :</td>
                    <td>
                        <input type="text" name="numcin" class="icon text-gray-600 btn btn-light form-control"
                            placeholder="Entrez le numéro CIN" required pattern="[0-9]{8}"
                            title="Le numéro CIN doit contenir exactement 8 chiffres">
                    </td>
                </tr>
                <tr>
                    <td>E-mail :</td>
                    <td>
                        <input type="email" name="email" class="icon text-gray-600 btn btn-light form-control"
                            placeholder="Entrer l'e-mail" required>
                    </td>
                </tr>
                <tr>
                    <td>E-mail Institutionnel:</td>
                    <td>
                        <input type="email" name="email_institutionnel" class="icon text-gray-600 btn btn-light form-control"
                            placeholder="Entrer l'e-mail institutionnel" required>
                    </td>
                </tr>
                <tr>
                    <td>Nom et Prénom :</td>
                    <td>
                        <input type="text" name="name" class="icon text-gray-600 btn btn-light form-control"
                            placeholder="Entrer le nom et prénom" required>
                    </td>
                </tr>
                
                <tr>
                    <td>Sexe :</td>
                    <td colspan="2" class="text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme" required>
                            <label class="form-check-label" for="homme">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme" required>
                            <label class="form-check-label" for="femme">Femme</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Spécialité :</td>
                    <td>
                        <select name="specialite_id" required class="icon text-gray-600 btn btn-light form-control">
                            <option disabled selected>Choisissez la spécialité</option>
                            @foreach($specialites as $specialite)
                            <option value="{{ $specialite->id }}">{{ $specialite->specialitem }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Semestre :</td>
                    <td>
                        <select name="semestre" required class="icon text-gray-600 btn btn-light form-control">
                            <option disabled selected>Choisissez le semestre actuel</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
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
                            <span class="text">AJOUTER</span>
                        </button>
                    </td>
                </tr>
            </table>
        </form></div>
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
