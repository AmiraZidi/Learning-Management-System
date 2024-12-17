@include('header')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3 border-bottom-info text-center">
                <h6 class="m-0 font-weight-bold text-primary">Nouveau demande</h6>
            </div>
            <div class="card-body">
                <div class="tab-pane" id="demandes" role="tabpanel" aria-labelledby="demandes-tab">
                    <form action="{{ route('nvdemandepost') }}" method="post">
                        @csrf
                        <div class="bg-white p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-white card addresses-item mb-4 border border-primary shadow">
                                        <div class="gold-members p-4">
                                            <div class="media">
                                                <div class="mr-3">
                                                    <i class="icofont-ui-home icofont-3x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="modal-header modal-header-info">
                                                        <h6 class="text-left" style="color:#4e73df;"><b>Passer une demande</b></h6>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="inputTo" class="col-sm-2 col-form-label">
                                                                <span class="glyphicon glyphicon-user"></span> à
                                                            </label>
                                                            <div class="col-sm-10">Admin</div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="sujet" class="col-sm-2 col-form-label">
                                                                <span class="glyphicon glyphicon-list-alt"></span> Sujet
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <select name="sujet" id="sujet" class="form-control">
                                                                    <option value="événement">événement</option>
                                                                    <option value="Avis de rattrappage">Avis de rattrappage</option>
                                                                    <option value="Avis d'avancement">Avis d'avancement</option>
                                                                    <option value="Formation">Formation</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputBody" class="col-sm-2 col-form-label">
                                                                <span class="glyphicon glyphicon-list"></span> Message
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" name="message" id="inputBody" rows="8"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                            Envoyer <i class="fa fa-arrow-circle-right fa-lg"></i>
                                                        </button>
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
