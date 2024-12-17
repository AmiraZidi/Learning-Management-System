@include('header')
<div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">La classe : {{$affectation->classe->nom}}</h6>
        <h6 class="m-0 font-weight-bold text-primary">La matiére : {{$affectation->matiere->nom}}</h6>
    </div>
    <div class="card-body">
        <div class="container">
            
        </div>
        <div class="card-header py-3 border-bottom-info">
            <button class="btn btn-success" onclick="addabsences('{{$affectation->id}}')"  style="font-size: 0.5em;">Ajouter une séance</button>
        </div>
        <table class="table" style="width: 100%;">
        <h6 class="m-0 font-weight-bold text-primary">Séances disponibles</h6>
            <thead>
                <tr>
                    <th>Séance : </th>
                    <th>Date : </th>
                    <th colspan="3">Actions :</th>
                </tr>
            </thead>
            <tbody id="results">
                @if ($seances->isEmpty())
                    <tr>
                        <td colspan="4">Aucune séance trouvée pour cette affectation.</td>
                    </tr>
                @else
                    @foreach ($seances as $seance)
                        <tr>
                            <td>Seance num : {{ $seance->seance }}</td>
                            <td>{{ $seance->date }}</td>
                            <td><button class="btn btn-info btn-circle btn-lg" onclick="addabsences('{{$affectation->id}}', '{{ $seance->seance }}')"   style="font-size: 0.5em;">Attribuer des absences</button></td>
                        </tr>
                    @endforeach
                @endif
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
                    
    function addabsences(affectation_id, seance = 0) {
        window.location.href = "{{ url('enseignants/addabsences') }}/" + affectation_id + "/" + seance;
    } 

</script>

<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
</body>
</html>
