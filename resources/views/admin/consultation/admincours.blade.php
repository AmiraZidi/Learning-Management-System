@include('header')
<div class="container-fluid"> 
    <div class="row">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3 border-bottom-info" align="center">
                <h6 class="m-0 font-weight-bold text-primary">Historique des cours</h6>
            </div>
            <div class="card-body">
                <div class="tab-pane active" id="classes" role="tabpanel" aria-labelledby="classes-tab">
                        <div class="row" align="center" style="align-content: center; align-items: center;">
                            <div class="col-md-8">
                                <div class="bg-white card addresses-item mb-4 border border-primary shadow">
                                    <div class="gold-members p-4">
                                        <div class="media">
                                            <table class="table-responsive" style="width: 100%; align-content: center;" cellspacing="10" align="center">
                                            <thead>
                                                <tr>
                                                    <th>Classe</th>
                                                    <th>Matière</th>
                                                    <th>Titre</th>
                                                    <th>Fichier</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cours as $cour)
                                                <tr>
                                                    <td>{{ $cour->affectationclassenseignant->classe->nom }}</td>
                                                    <td>{{ $cour->affectationclassenseignant->matiere->nom }}</td>
                                                    <td>{{ $cour->titre }}</td>
                                                    <td><a href="{{ asset('cours/' . $cour->courfile) }}" target="_blank">{{ $cour->courfile }}</a></td>
                                                    <td>{{ $cour->date }}</td>
                                                    <td>
                                                        <a href="{{ asset('cours/' . $cour->courfile) }}" class="btn btn-success btn-block" download="{{ $cour->courfile }}">Télécharger</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

                        <script src="../../vendor/jquery/jquery.min.js"></script>
                        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <!-- Plugin JavaScript principal -->
                        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>                        <!-- Scripts personnalisés pour toutes les pages -->
                        <script src="../../js/sb-admin-2.min.js"></script>
                        <!-- Plugins de niveau de page -->
                        <script src="../../vendor/chart.js/Chart.min.js"></script>
                        <!-- Scripts personnalisés de niveau de page -->
                        <script src="../../js/demo/chart-area-demo.js"></script>
                        <script src="../../js/demo/chart-pie-demo.js"></script>
    </body> 
</html>s