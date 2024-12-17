@include('header')

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="card shadow mb-4 w-100">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-edit"></i> Modifier votre profil
                </h6>
            </div>
            <div class="card-body">
                <form action="/etudiants/edit" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <!-- Input pour télécharger une image -->
                    <div class="form-group row justify-content-center position-relative">
                        <img class="mb-3 rounded-pill shadow-sm mt-5" src="{{ asset('img/' . $etudiant->image) }}" alt="image" style="width: 300px; height: auto;">
                        <label for="upload-image" class="position-absolute" style="top: 50%; transform: translateY(-50%); right: 10px; cursor: pointer;">
                            <i class="fas fa-camera fa-2x"></i>
                        </label>
                        <input type="file" id="upload-image" accept="image/png, image/jpeg, image/jpg" style="display: none;" name="image" onchange="validateImage()">
                    </div>

                    <!-- Autres champs de formulaire -->
                    <div class="form-group row">
                        <label for="numcin" class="col-sm-2 col-form-label">Numéro CIN :</label>
                        <div class="col-sm-10">
                            <input type="text" name="numcin" id="numcin" value="{{ $etudiant->numcin }}" class="form-control" readonly pattern="[0-9]{8}" title="Le numéro CIN doit contenir exactement 8 chiffres">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail :</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" value="{{ $etudiant->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nom de famille :</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{ $etudiant->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sexe" class="col-sm-2 col-form-label">Sexe :</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme" @if($etudiant->sexe == 'homme') checked @endif required>
                                <label class="form-check-label" for="homme">Homme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme" @if($etudiant->sexe == 'femme') checked @endif required>
                                <label class="form-check-label" for="femme">Femme</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="specialite_id" class="col-sm-2 col-form-label">Spécialité :</label>
                        <div class="col-sm-10">
                            <select name="specialite_id" id="specialite_id" class="form-control" required>
                                @foreach($specialites as $specialite)
                                <option value="{{ $specialite->id }}" @if($specialite->id == $etudiant->specialite_id) selected @endif>
                                    {{ $specialite->specialitem }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i> Modifier
                        </button>
                    </div>
                </form>
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
            <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session actuelle.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a href="{{ url('logout') }}" class="btn btn-primary">Déconnexion</a>
            </div>
        </div>
    </div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>
<script>
    function validateImage() {
        const input = document.getElementById('upload-image');
        const file = input.files[0];
        const validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];
        
        if (file && !validExtensions.includes(file.type)) {
            alert('Veuillez télécharger une image au format PNG, JPG ou JPEG seulement.');
            input.value = '';
        } else if (file) {
            alert('Image téléchargée avec succès !');
        }
    }
</script>
</body>
</html>
