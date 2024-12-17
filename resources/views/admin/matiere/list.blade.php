@include('header')
                <div class="container-fluid">
                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
                    <div class="card-header py-3 border-bottom-info ">
                        <h6 class="m-0 font-weight-bold text-primary">Liste des matières</h6>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped " id="myTable2" >
                        <thead>
                            <tr>
                                <th>ID de la matière</th>
                                <th onclick="sortTable(1)">Nom de la matière</th>
                                <th onclick="sortTable(2)">Spécialité</th>
                                <th onclick="sortTable(3)">Semestre</th>
                                <th colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forEach($matieres as $matiere)
                            <tr>
                                <td>{{$matiere->id}}</td>
                                <td>{{$matiere->nom}}</td>
                                <td>{{$matiere->semestre}}</td>
                                
                                <td><button class="btn btn-info btn-circle btn-lg" onclick="showSingle('{{$matiere->id}}')" style="font-size: 0.5em;">AFFICHER</button></td>
                                <td><button class="btn btn-success btn-circle btn-lg"  onclick="edit('{{$matiere->id}}')" style="font-size: 0.5em;">MODIFIER</button></td>
                                <td><button class="btn btn-danger btn-circle btn-lg" onclick="deleteSingle('{{$matiere->id}}')" style="font-size: 0.5em;">SUPPRIMER</button></td>
                            </tr>
                            @endforEach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>

                <script>
                    function edit(id) {
                        window.location.href = "{{ url('matiere/modifier') }}/" + id;
                    }

                    function showSingle(id) {
                        window.location.href = "{{ url('matiere/fiche') }}/" + id;
                    }

                    function deleteSingle(id) {
                        var confirmed = confirm("Êtes-vous sûr de vouloir supprimer cette matière de la base de données ?");
                        if (confirmed) {
                            window.location.href = "{{ url('matiere/delete') }}/" + id;
                        } else {
                            alert("Suppression annulée.");
                        }
                    }
                    function filterBy(specialite) {
                        console.log("Filtrer par " + specialite);
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
                                    if (n === 1 || n === 2 || n === 3) {
                                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                            shouldSwitch = true;
                                            break;
                                        }
                                    }
                                } else if (dir == "desc") {
                                    if (n === 1 || n === 2 || n === 3) {
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
            <!-- Fin du contenu principal -->

            <!-- Pied de page -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        &middot;
                    </div>
                </div>
            </footer>

        </div>
        <!-- Fin du contenu principal -->

    </div>
    <!-- Fin de l'enveloppe de la page -->

    <!-- Scroll vers le haut -->
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

    <!-- Scripts JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
    
</script>
</body>

</html>
