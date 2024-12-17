@include('header')

                <div class="card shadow mb-4" align="center" style="margin: 40px; padding: 20px;">
                    <div class="card-header py-3 border-bottom-info ">
                        <h6 class="m-0 font-weight-bold text-primary">Modifier la classe {{$class->nom}}</h6>
                    </div>
                    <div class="card-body">
                        <br>                        
                        <div class="table-responsive">
                        <form method="POST" action="/class/update/{{ $class->id }}" autocomplete="off" style="margin-bottom: 10px; align-content:center;"> 
                        @csrf
                            @method('PUT')  
                            <table align="center" cellspacing="5" width="50%" height="100%">
                            @csrf
                            <tr>
                            <td>Id de la classe :</td>
                                    <td>
                                     <input name="id" disabled value="{{ $class->id }}"class="icon text-gray-600 btn btn-light form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                
                                    
                                    <td>Nom :</td>
                                    <td>
                                        <input type="text" value="{{ $class->nom }}"class="icon text-gray-600 btn btn-light form-control" name="nom" placeholder="Entrez le nom de la classe" required>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>Spécialité :</td>
                                    <td>
                                        <select name="specialite_id"  value="{{ $class->specialite_id}}"required class="icon text-gray-600 btn btn-light form-control" >
                                            @foreach($specialites as $specialite)
                                                <option value="{{ $specialite->id }}" @if ( $specialite->id == $class->specialite_id) selected @endif>{{ $specialite->specialitem }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>Semestre :</td>
                                    <td>
                                        <select name="semestre" value="{{ $class->semestre }}"required class="icon text-gray-600 btn btn-light form-control">
                                            <option value="{{$class->semestre}}">{{$class->semestre}}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="4">5</option>
                                        </select>
                                    </td>
                                </tr>
                            </table> 
                            <br>
                            <table align="center" cellspacing="20">
                                <tr>
                                    <td>
                                        <div type="submit" class="my-2"></div>
                                        <button class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">MODIFIER</span>
                                            <div type="submit" class="my-2"></div>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div></div>
                </div>
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session actuelle.</div>
                                    <div class="modal-footer">
                                        <button   class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                                        <a href="{{ url('logout') }}"class="btn btn-primary" >Déconnexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>

        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../../js/sb-admin-2.min.js"></script>

    </body>

</html>