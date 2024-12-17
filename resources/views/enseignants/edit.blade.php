@include('header')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Modifier votre profil</h6>
            </div>
            <div class="card-body">
                <!-- Formulaire de modification du profil -->
                <form action="/enseignants/edit" method="post" autocomplete="off" style="margin-bottom: 10px;" enctype="multipart/form-data">
                    @csrf

                    <!-- Input pour télécharger une image -->
                    <label for="upload-image" class="position-absolute" style="top: 50%; transform: translateY(-50%); right: 10px; cursor: pointer;">
                        <i class="fas fa-camera fa-2x"></i>
                    </label>
                    <input type="file" id="upload-image" accept="image/png, image/jpeg, image/jpg" style="display: none;" name="image" onchange="validateImage()">
                    
                    <!-- Image de profil -->
                    <div class="form-group row justify-content-center">
                        <img class="mb-3 rounded-pill shadow-sm mt-5" src="{{ asset('img/' . $enseignant->image) }}" alt="image" style="width: 300px; height: auto;">
                    </div>

                    <!-- Champs de formulaire -->
                    <div class="form-group row">
                        <label for="numcin" class="col-sm-3 col-form-label">Numéro CIN :</label>
                        <div class="col-sm-9">
                            <input type="text" name="numcin" id="numcin" value="{{ $enseignant->numcin }}" class="form-control" readonly pattern="[0-9]{8}" title="Le numéro CIN doit contenir exactement 8 chiffres">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">E-mail :</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" id="email" value="{{ $enseignant->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nom de famille :</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" value="{{ $enseignant->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Sexe :</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme" {{ $enseignant->sexe == 'homme' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="homme">Homme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme" {{ $enseignant->sexe == 'femme' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="femme">Femme</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="specialite_enseignant" class="col-sm-3 col-form-label">Spécialité :</label>
                        <div class="col-sm-9">
                            <input type="text" name="specialite_enseignant" id="specialite_enseignant" value="{{ $enseignant->specialite_enseignant }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">MODIFIER</span>
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
    <!-- Contenu du modal -->
</div>

<!-- Scripts JavaScript -->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="../../vendor/chart.js/Chart.min.js"></script>
<script src="../../js/demo/chart-area-demo.js"></script>
<script src="../../js/demo/chart-pie-demo.js"></script>
<script>
    function validateImage() {
        const input = document.getElementById('upload-image');
        const file = input.files[0];
        const validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];
        
        if (file && !validExtensions.includes(file.type)) {
            alert('Veuillez télécharger une image au format PNG, JPG ou JPEG seulement.');
            input.value = '';
        } else if (file) {
            // Code pour soumettre le formulaire ou traiter le fichier téléchargé
            alert('Image téléchargée avec succès !');
        }
    }
</script>

</body>
</html>