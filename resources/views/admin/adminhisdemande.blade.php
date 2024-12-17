@include('header')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card shadow mb-4 w-100">
            <div class="card-header py-3 border-bottom-info text-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-history"></i> Historique de mes Demandes
                </h6>
            </div>
            <div class="card-body">
                <div class="tab-pane active" id="classes" role="tabpanel" aria-labelledby="classes-tab">
                    <div class="row justify-content-center">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Sujet</th>
                                                    <th>Message</th>
                                                    <th>État</th>
                                                    <th>Date</th>
                                                    <th>Salle</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($demandes as $demande)
                                                <tr>
                                                    <td>
                                                        <span class="badge badge-info">{{ $demande->sujet }}</span>
                                                    </td>
                                                    <td>{{ $demande->message }}</td>
                                                    <td>
                                                        @if($demande->etat == 'accepté')
                                                        <span class="badge badge-success">Accepté</span>
                                                        @elseif($demande->etat == 'refusé')
                                                        <span class="badge badge-danger">Refusé</span>
                                                        @else
                                                        <span class="badge badge-warning">En attente</span>
                                                        @endif
                                                    </td>
                                                    
                                                    <td>{{ $demande->date }}</td>
                                                    <td>
                                                        @if($demande->etat == 'accepté')
                                                        <span class="badge badge-success">{{ $demande->salle->nom }}</span>
                                                        @elseif($demande->etat == 'refusé')
                                                        <span class="badge badge-danger">Aucune salle disponible</span>
                                                        @else
                                                        <span class="badge badge-danger">Pas encore</span>
                                                        @endif
                                                    </td>
                                                    <td><a class="btn btn-info btn-sm" href="{{route('adminreponsedemande', $demande->id)}}" >Répondre</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Pagination (if necessary) -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center mt-3">
                                            <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>
</body>
</html>
