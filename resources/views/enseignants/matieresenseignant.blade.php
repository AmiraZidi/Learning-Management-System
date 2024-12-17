@include('header')
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="card shadow mb-4 w-100">
            <div class="card-header py-3 border-bottom-info text-center">
                <h6 class="m-0 font-weight-bold text-primary">Liste des matières</h6>
            </div> 
            <div class="card-body">          
                <div class="tab-pane" id="matières" role="tabpanel" aria-labelledby="matières-tab">
                    <div class="container text-center"> 
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <table class="table table-striped" cellspacing="5" style="width:100%;" align="center">
                                    <thead>
                                        <tr>
                                            <th>Nom Matière</th>
                                            <th>Classe</th>
                                            <th>Nombre d'Heures</th>
                                            <th>Nature</th>
                                            <th>Type</th>
                                            <th colspan="3">Actions</th>
                                        </tr>
                                    </thead> 
                                    <tbody align="center"> 
                                        @foreach($affectations as $affectation) 
                                        <tr>
                                            <td>{{ $affectation->matiere->nom }}</td>
                                            <td>{{ $affectation->classe->nom }}</td>
                                            <td>{{ $affectation->matiere->nbrheure }}</td>
                                            <td>{{ $affectation->matiere->nature }}</td>
                                            <td>{{ $affectation->matiere->type }}</td>
                                            <td class="d-flex justify-content-around">
                                                <button class="btn btn-success btn-sm mr-2" onclick="noteenseignant('{{ $affectation->id }}')">
                                                    <i class="fas fa-clipboard-list"></i> Attribuer des notes
                                                </button>
                                                <button class="btn btn-info btn-sm mr-2" onclick="abs('{{ $affectation->id }}')">
                                                    <i class="fas fa-history"></i> Historique des absences
                                                </button>
                                                <button class="btn btn-warning btn-sm" onclick="appel('{{ $affectation->id }}')">
                                                    <i class="fas fa-history"></i> Liste d'appel
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <script>
                                    function noteenseignant(id) { 
                                        window.location.href = "{{ url('enseignants/noteenseignant') }}/" + id;
                                    }
                                    function abs(id) {
                                        window.location.href = "{{ url('enseignants/hisabs') }}/" + id;
                                    }
                                    function appel(id) {
                                        window.location.href = "{{ url('enseignants/absencesenseignant') }}/" + id;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
                    <a class="btn btn-primary" href="{{ url('logout') }}">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../js/sb-admin-2.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../../js/demo/datatables-demo.js"></script>
</body>

</html>
