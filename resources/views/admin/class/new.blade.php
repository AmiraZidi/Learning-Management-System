@include('header')

                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;">
                    <div class="card-header py-3 border-bottom-info ">
                        <h6 class="m-0 font-weight-bold text-primary">Créer une nouvelle classe</h6>
                    </div>
                    <div class="card-body">
                        <br>
                        <form action="/class/new" method="post" autocomplete="off" style="margin-bottom: 10px; align-content: center;">
                        @csrf
                            <table align="center" cellspacing="5" width="50%" height="100%">
                                <td></td><td></td>
                                <tr>
                                    <td>Spécialité :</td>
                                    <td>
                                    <select name="specialite_id" required class="icon text-gray-600 btn btn-light form-control" id="specialite_id">
                                        <option disabled selected>Choisissez la spécialité</option>
                                        @foreach($specialites as $specialite)
                                            <option value="{{ $specialite->id }}" data-specialite-type="{{ $specialite->specialitem }}">{{ $specialite->specialitem }}</option>
                                        @endforeach
                                    </select>

                                    </td>
                                    
                                </tr>
                                </td><td></td>
                                <tr>
                                    <td>Semestre :</td>
                                    <td>
                                        <select name="semestre" required class="icon text-gray-600 btn btn-light form-control" id="semestre">
                                            <option disabled selected>Choisissez le semestre actuel</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nom :</td>
                                    <td>
                                        <input type="text" class="icon text-gray-600 btn btn-light form-control" name="nom" id="nom" placeholder="Entrez le nom de la classe" required>
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
                                            <span class="text"> AJOUTER</span>
                                            <div type="submit" class="my-2"></div>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
document.getElementById('specialite_id').addEventListener('change', function() {
        var specialiteSelect = document.getElementById('specialite_id');
        var semestreSelect = document.getElementById('semestre');
        var specialiteType = specialiteSelect.options[specialiteSelect.selectedIndex].getAttribute('data-specialite-type');

        // Effacer les options précédentes
        semestreSelect.innerHTML = '<option disabled selected>Choisissez le semestre actuel</option>';

        // Ajouter les options appropriées en fonction du type de spécialité
        if (specialiteType === 'TC') {
            for (var i = 1; i <= 3; i++) {
                var option = document.createElement('option');
                option.text = i;
                option.value = i;
                semestreSelect.appendChild(option);
            }
        } else if (specialiteType === 'SR' || specialiteType === 'RST') {
            for (var i = 4; i <= 5; i++) {
                var option = document.createElement('option');
                option.text = i;
                option.value = i;
                semestreSelect.appendChild(option);
            }
        }
    });
</script>

<script>
    // Fonction pour générer le nom de la classe en fonction de la spécialité et du semestre sélectionnés
    function generateClassName() {
        var specialiteSelect = document.getElementById('specialite_id');
        var semestreSelect = document.getElementById('semestre');
        var nomInput = document.getElementById('nom');

        var specialiteType = specialiteSelect.options[specialiteSelect.selectedIndex].getAttribute('data-specialite-type');
        var semestreValue = semestreSelect.value;

        var nomClasse = "";

        // Générer le nom de la classe en fonction du type de spécialité et du semestre
        if (specialiteType === 'TC') {
            nomClasse = "LAT" + semestreValue;
        } else if ((specialiteType === 'SR' || specialiteType === 'RST')) {
            nomClasse = specialiteType + semestreValue;
        }

        // Mettre à jour la valeur du champ "Nom"
        nomInput.value = nomClasse;
    }

    // Écouter les changements dans la spécialité et le semestre pour générer automatiquement le nom de la classe
    document.getElementById('specialite_id').addEventListener('change', generateClassName);
    document.getElementById('semestre').addEventListener('change', generateClassName);

    // Appeler la fonction une fois au chargement pour initialiser le nom de la classe
    generateClassName();
</script>
    </body>

</html>