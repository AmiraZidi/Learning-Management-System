@include('header')
<div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">La classe : {{$affectation->classe->nom}}</h6>
        <h6 class="m-0 font-weight-bold text-primary">La matiére : {{$affectation->matiere->nom}}</h6>

    </div>
     
    <div class="card-body">
    <br>
    <form action="/enseignants/addnotepost" method="post" autocomplete="off" style="margin-bottom: 10px; align-content: center;">
    @csrf
        <input type="hidden" name="affectationclassenseignant_id" value="{{$affectation_id}}" >
        <table align="center" cellspacing="5" width="50%" height="100%">
            <tr>
                <td>Nom et Email de l'etudiant:</td>
                <td>
                <select name="etudiant_id" required class="icon text-gray-600 btn btn-light" >
                    <option disabled selected>Choisissez un etudiant</option>
                    @foreach($classeetudiants as $classeetudiant)
                        <option value="{{ $classeetudiant->etudiant->id}}">{{ $classeetudiant->etudiant->name}} : {{ $classeetudiant->etudiant->email}}</option>
                    @endforeach
                </select>
                </td>
            </tr>
            <td></td><td></td>
            <tr>
                <td>Note DS :</td>
                <td>
                    <input type="float" class="icon text-gray-600 btn btn-light" name="note_ds" placeholder="Entrez la note de DS" required>
                </td>
            </tr> 
            <td></td><td></td>
            <tr>
                <td>Note Examen :</td>
                <td>
                    <input type="float" class="icon text-gray-600 btn btn-light" name="note_examen" placeholder="Entrez la note d'Exament" required>
                </td>
            </tr>   
            
            </table>
            <br><br>
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
                    <td></td>
                    <td>
                        <div class="my-2"></div>
                        <a href="/enseignants/classe" class="btn btn-danger btn-icon-split"> <!-- Ajoutez l'URL cible ici -->
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">ANNULER</span>
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="card-body">
        <h3>Les notes affectées : <h3>
        <table class="table" id="myTable2" >
        <thead>
            <tr>
                <th>Nom Etudiant :</th>
                <th>Note DS :</th>
                <th>Note Examen :</th>
                <th>Date :</th>
            </tr>
        </thead>
            <tbody>
                @forEach($notes as $note)
                <tr>
                    <td>{{$note->etudiant->name}}</td>
                    <td>{{$note->note_ds}}</td>
                    <td>{{$note->note_examen}}</td>
                    <td>{{$note->date_note}}</td>
                </tr>
                @endforEach
            </tbody>
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
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('#results tr').each(function() {
                var classeName = $(this).find('td:first').text().toLowerCase();
                if (classeName.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
<script>
                    
    function addnote(classe_id, etudiant_id) {
        window.location.href = "{{ url('enseignants/addnote') }}/" + classe_id + "/" + etudiant_id;
    }
</script>

<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
</body>
</html>
