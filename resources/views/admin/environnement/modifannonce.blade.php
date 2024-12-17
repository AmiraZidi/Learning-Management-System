@include('header')
<div class="container-fluid"> 
    <div class="row">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3 border-bottom-info" align="center">
                <h6 class="m-0 font-weight-bold text-primary">Modifier Annonce</h6>
            </div>
            <div class="card-body">  
            <div class="tab-pane " id="demandes" role="tabpanel" aria-labelledby="demandes-tab">
                <form action="{{route('admineditannoncepost')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$annonce->id}}">
                                    <div class=" bg-white p-4 h-120">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="bg-white card addresses-item mb-4 border border-primary shadow">
                                                    <div class="gold-members p-4">
                                                    <div class="media">
                                                        <div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
                                            
                                                            <div class="media-body">
                                                                <div class="modal-header modal-header-info">
                                                                    <h6  align="left" class="text-primary"><b>Modifier Annonce </b></h6>
                                                                </div>
                                                                <div class="modal-body">
                                                                   
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2" for="inputTo" align="left"><span class="glyphicon glyphicon-user"></span>Titre</label>
                                                                        <div class="col-sm-10"> <input type="text" class="form-control" name="titre" value="{{$annonce->titre}}" title="Entrer le titre" required> </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2" for="inputBody" align="left"><span class="glyphicon glyphicon-list"></span>Contenu</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control" name="contenu" id="inputBody" rows="8" required>{{$annonce->contenu}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Modifier <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                                                                </div>
                                                            </div>
                                                            </form>
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

                        <!-- Plugin JavaScript principal -->
                        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Scripts personnalisés pour toutes les pages -->
                        <script src="../../js/sb-admin-2.min.js"></script>

                        <!-- Plugins de niveau de page -->
                        <script src="../../vendor/chart.js/Chart.min.js"></script>

                        <!-- Scripts personnalisés de niveau de page -->
                        <script src="../../js/demo/chart-area-demo.js"></script>
                        <script src="../../js/demo/chart-pie-demo.js"></script>
    </body> 
</html>