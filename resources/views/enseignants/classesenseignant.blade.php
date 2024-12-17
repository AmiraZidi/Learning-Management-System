@include('header')
<div class="container-fluid">
    <div class="row">
        <div class="card shadow mb-4" style="width: 100%;">
            <div class="card-header py-3 border-bottom-info text-center">
                <h6 class="m-0 font-weight-bold text-primary">Mes Classes</h6>
            </div>
            <div class="card-body">
                <div class="tab-pane active" id="classes" role="tabpanel" aria-labelledby="classes-tab">
                    <div class="row justify-content-center">
                        @foreach($classes as $classe)
                        <div class="col-md-6">
                            <div class="card border-primary mb-4 shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title">{{ $classe->nom }}</h5>
                                        </div>
                                        <div> <b>
                                            <a href="{{ route('etudlistenseignant', ['classe_id' => $classe->id]) }}" class="btn btn-primary">
                                                <i class="fas fa-list"></i> Voir la liste
                                            </a></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="../../vendor/chart.js/Chart.min.js"></script>
<script src="../../js/demo/chart-area-demo.js"></script>
<script src="../../js/demo/chart-pie-demo.js"></script>
</body>
</html>
