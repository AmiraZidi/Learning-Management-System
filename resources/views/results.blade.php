@include('header')
<div class="container-fluid"> 
    <div class="row">
        <div class="card shadow mb-4" style="width: 99%;">
            <div class="card-header py-3 border-bottom-info" align="center">
                <h6 class="m-0 font-weight-bold text-primary">Résultats de la recherche pour "{{ $query }}"</h6>
            </div>
            <div class="card-body">
                @foreach($results as $key => $resultGroup)
                    @if($resultGroup->isNotEmpty())
                        <div class="tab-pane active" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-white card addresses-item mb-4 border border-primary shadow">
                                        <div class="gold-members p-4">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h2 class="mt-0 mb-2 text-primary">{{ ucfirst($key) }}</h2>
                                                    <ul>
                                                        @foreach($resultGroup as $result)
                                                            <li>{{ $result->nom ?? $result->titre ?? $result->name ?? 'Aucun résultat' }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                @if(collect($results)->flatten()->isEmpty())
                    <p class="text-center">Aucun résultat trouvé.</p>
                @endif
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
