@include('header')

<div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;"> 
    <div class="card-header py-3 border-bottom-info">
        <h6 class="m-0 font-weight-bold text-primary">Liste des annonces</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="myTable2">
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">Titre</th>
                        <th onclick="sortTable(1)">Publié par</th>
                        <th onclick="sortTable(2)">Date</th>
                        <th colspan="3">Actions :</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annonces as $annonce)
                    <tr>
                        <td>{{ $annonce->titre }}</td>
                        <td>{{ $annonce->user->name }}</td>
                        <td>{{ $annonce->date }}</td>
                        <td>
                            <button class="btn btn-info btn-circle" onclick="showSingle('{{ $annonce->id }}')" title="Afficher">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-success btn-circle" onclick="edit('{{ $annonce->id }}')" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-circle" onclick="deleteSingle('{{ $annonce->id }}')" title="Supprimer">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function edit(id) {
        window.location.href = "{{ url('/admin/admineditannonce') }}/" + id;
    }

    function showSingle(id) {
        window.location.href = "{{ url('/admin/adminannonce') }}/" + id;
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

                if ((dir == "asc" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) ||
                    (dir == "desc" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())) {
                    shouldSwitch = true;
                    break;
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

    function deleteSingle(id) {
        var confirmed = confirm("Êtes-vous sûr de la suppression de la base de données ?");
        if (confirmed) {
            window.location.href = "{{ url('/admin/admideleteannonce') }}/" + id;
        } else {
            alert("Suppression annulée.");
        }
    }
</script>

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
