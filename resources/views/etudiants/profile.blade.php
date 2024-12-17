@include('header')

<div class="container-fluid"> 
    <div class="row">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media position-relative">
                        <img class="mb-3 rounded-pill shadow-sm mt-1" src="{{ asset('img/' .Auth::user()->image) }}" alt="image" style="width: 300px; height: auto;">
                            <div class="osahan-user-media-body">
                           <h6 class="mb-2">{{ $etudiant->name }}</h6>
                            <p class="mb-1">{{ $etudiant->specialite->specialitem}}</p>
                            <p>{{ $etudiant->email }}</p>
                            <a href="{{route('changermotdepasse2')}}" >Changer votre mot de passe</a>  <br><br>
                                <a href="{{url ('etudiants/edit')}}" class="btn btn-primary btn-block">Modifier votre profile</a> 
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>
                        <!-- Modal de déconnexion -->
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

                        <!-- Plugin JavaScript principal -->
                        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Scripts personnalisés pour toutes les pages -->
                        <script src="../../js/sb-admin-2.min.js"></script>

                        <!-- Plugins de niveau de page -->
                        <script src="../../vendor/chart.js/Chart.min.js"></script>

                        <!-- Scripts personnalisés de niveau de page -->
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