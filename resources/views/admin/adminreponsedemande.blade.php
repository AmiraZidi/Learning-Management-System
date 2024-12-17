@include('header')
<div class="container-fluid">
    <div class="row">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3 border-bottom-info text-center">
                <h6 class="m-0 font-weight-bold text-primary">Répondre à la demande de l'enseignant {{$demande->user->name}}</h6>
            </div>
            <div class="card-body">
                <div class="tab-pane" id="demandes" role="tabpanel" aria-labelledby="demandes-tab">
                    <form action="{{ route('adminreponsedemandepost') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$demande->id}}">
                        <div class="bg-white p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-white card addresses-item mb-4 border border-primary shadow">
                                        <div class="gold-members p-4">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
                                                <div class="media-body">
                                                    <div class="modal-header modal-header-info">
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 align-left" for="inputFrom"><span class="glyphicon glyphicon-user"></span> Envoyé par{{$demande->user->name}}</label>
                                                            <div class="col-sm-10">
                                                            </div>
                                                        </div>
                                                         <option value="événement">Événement</option>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 align-left" for="sujet"><span class="glyphicon glyphicon-list-alt"></span> Sujet : </label>
                                                            <div class="col-sm-10">
                                                                {{$demande->sujet}}
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 align-left" for="inputBody"><span class="glyphicon glyphicon-list"></span> Message : </label>
                                                            <div class="col-sm-10">
                                                                {{$demande->message}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-sm-2 align-left" for="response">
                                                                <span class="glyphicon glyphicon-ok-circle"></span> Répondre
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <select name="etat" class="form-control" id="responseSelect">
                                                                    <option>Prendre une décision</option>
                                                                    <option value="accepté">Accepté</option>
                                                                    <option value="refusé">Refusé</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mt-3" id="salleGroup" style="display: none;">
                                                            <label class="col-sm-2 align-left" for="salle_id">
                                                                <span class="glyphicon glyphicon-ok-circle"></span> Salle
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <select name="salle_id" class="form-control">
                                                                    <option value="">Choisissez une salle</option>
                                                                    @foreach($salles as $salle)
                                                                        <option value="{{ $salle->id }}" >
                                                                            {{ $salle->nom }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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

<script>
    document.getElementById('responseSelect').addEventListener('change', function() {
        var salleGroup = document.getElementById('salleGroup');
        if (this.value === 'accepté') {
            salleGroup.style.display = 'flex';
        } else {
            salleGroup.style.display = 'none';
        }
    });
</script>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>
</body>
</html>