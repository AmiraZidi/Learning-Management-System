@include('header')
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="card shadow mb-4 w-100">
            <div class="card-header py-3 border-bottom-info text-center">
                <h6 class="m-0 font-weight-bold text-primary">Nouvelle Annonce</h6>
            </div>
            <div class="card-body">
                <div class="tab-pane" id="demandes" role="tabpanel" aria-labelledby="demandes-tab">
                    <form action="{{ route('nvannoncepost') }}" method="post">
                        @csrf
                        <div class="bg-white p-4 h-120">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="card mb-4 border border-primary shadow">
                                        <div class="gold-members p-4">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
                                                <div class="media-body">
                                                    <div class="modal-header modal-header-info">
                                                    <h6 class="text-primary"><b>Partager une Annonce</b></h6>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label" for="inputTo">Titre</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="titre" placeholder="Entrer le titre" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label" for="inputBody">Contenu</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" name="contenu" id="inputBody" rows="8" placeholder="Entrer le contenu" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Envoyer <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
