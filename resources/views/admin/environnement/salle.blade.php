@include('header')

                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;">
                    <div class="card-header py-3 border-bottom-info">
                        <h6 class="m-0 font-weight-bold text-primary">Liste des salles</h6>
                    </div>
                    <div class="card-body">
                    <button class="btn btn-primary btn-lg form-control" onclick="ajout()" >Ajouter une nouvelle salle</button> <br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable2">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">Salle</th>
                                    <th onclick="sortTable(1)">Position</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salles as $salle)
                                <tr>
                                    <td>{{$salle->nom}}</td>
                                    <td>{{$salle->position}}</td>
                                    <td><button class="btn btn-success btn-circle btn-lg" onclick="edit('{{$salle->id}}')" style="font-size: 0.5em;">MODIFIER</button></td>
                                    <td><button class="btn btn-danger btn-circle btn-lg" onclick="deleteSingle('{{$salle->id}}')" style="font-size: 0.5em;">SUPPRIMER</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div></div>
                </div>

                <script>
                    function edit(id) {
                        let url = "{{ route('adminmodifsalle', ['id' => ':id']) }}";
                        url = url.replace(':id', id);
                        window.location.href = url;
                    }
                    function ajout() {
                        window.location.href = "{{ route('adminaddsalle') }}";
                    }

                    function deleteSingle(id) {
                        var confirmed = confirm("Êtes-vous sûr de vouloir supprimer cette salle de la base de données ?");
                        if (confirmed) {
                            window.location.href = "{{ url('/admin/admideletesalle') }}/" + id;
                        } else { 
                            alert("Suppression annulée.");
                        }
                    }
                    function sortTable(n) {
                        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                        table = document.getElementById("myTable2");
                        switching = true;
                        dir = "asc";

                        while (switching) {
                            switching = false;
                            rows = table.rows;

                            for (i = 1; i < (rows.length - 1); i++) {
                                shouldSwitch = false;
                                x = rows[i].getElementsByTagName("td")[n];
                                y = rows[i + 1].getElementsByTagName("td")[n];

                                if (dir == "asc") {
                                    if (n === 1 || n === 3) { 
                                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                            shouldSwitch = true;
                                            break;
                                        }
                                    }
                                } else if (dir == "desc") {
                                    if (n === 1 || n === 3) { 
                                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                            shouldSwitch = true;
                                            break;
                                        }
                                    }
                                }
                            }

                            if (shouldSwitch) {
                                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                switching = true;
                                switchcount++;
                            } else {
                                if (switchcount == 0 && dir == "asc") {
                                    dir = "desc";
                                    switching = true;
                                }
                            }
                        }
                    }
                </script>
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

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../js/sb-admin-2.min.js"></script>

    

</body>

</html>
