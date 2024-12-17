@include('header')
<div class="container my-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-info text-center text-primary">
            <h6 class="m-0 font-weight-bold">Historique de vos Annonces</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable2">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Titre</th>
                            <th onclick="sortTable(1)">Contenu</th>
                            <th>Publiée le</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($annonces as $annonce)
                        <tr>
                            <td class="text-info">{{ $annonce->titre }}</td>
                            <td>{{ $annonce->contenu }}</td>
                            <td><small class="text-muted"> {{ $annonce->date }}</small></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
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
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];

                if ((dir === "asc" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (dir === "desc" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount === 0 && dir === "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>

<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
</body>
</html>
