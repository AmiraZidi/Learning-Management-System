@include('header')
<div class="container-fluid"> 
    <div class="row">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3 border-bottom-info" align="center">
                <h6 class="m-0 font-weight-bold text-primary">Partage du cours</h6>
            </div>
            <div class="card-body">
                <div class="tab-pane" id="cours" role="tabpanel" aria-labelledby="cours-tab">
                    <div class="bg-white p-4 h-120">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card mb-4 border border-primary shadow">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="mr-3">
                                                <i class="icofont-ui-home icofont-3x"></i>
                                            </div>
                                            <div class="media-body">
                                                <form action="{{ route('nvcourspost') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="courfile">Sélectionnez un fichier PDF à téléverser :</label>
                                                        <input type="file" id="courfile" name="courfile" accept=".pdf" class="form-control-file" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="titre">Titre</label>
                                                        <input type="text" class="form-control" id="titre" name="titre" title="Entrer le titre" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="affectationclassenseignant_id">Sélectionnez la matière :</label>
                                                        <select class="custom-select" id="affectationclassenseignant_id" name="affectationclassenseignant_id" required>
                                                            @foreach ($affectations as $affectation)
                                                                <option value="{{ $affectation->id }}">{{ $affectation->matiere->nom }} : {{ $affectation->classe->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-success btn-block" style="color:#28282B;">AJOUTER</button>
                                                </form>
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