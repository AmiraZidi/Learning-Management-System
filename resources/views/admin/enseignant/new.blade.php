@include('header')

            <div class="card shadow mb-2" align="center" style="margin: 40px; padding: 20px;">
                <div class="card-header py-3 border-bottom-info">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter un nouveau enseignant</h6>
                </div>
                <div class="card-body">
                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="/enseignant/new" method="post" autocomplete="off" style="margin-bottom: 10px; align-content: center ;">
                        @csrf 
                        <table align="center" cellspacing="5" width="50%" height="100%">
                            @csrf
                        <tr>
                            <td>Numéro CIN :</td>
                            <td>
                                <input type="text" name="numcin" class="icon text-gray-600 btn btn-light form-control"
                                    placeholder="Entrez le numéro CIN" required 
                                    pattern="[0-9]{8}" title="Le numéro CIN doit contenir exactement 8 chiffres">
                            </td>
                        </tr>
                        
                        <td></td>
                        <td></td>
                        <tr>
                                <td>E-mail :</td>
                                <td>
                                    <input type="email" name="email" class="icon text-gray-600 btn btn-light form-control"
                                        placeholder="Entrez l'e-mail" required>
                                </td>
                        </tr>
                        <td></td>
                        <td></td>
                            <tr>
                                <td>Nom et Prénom  :</td>
                                <td>
                                    <input type="text" name="name" class="icon text-gray-600 btn btn-light form-control"
                                        placeholder="Entrez le nom et le prénom" required>
                                </td>
                            </tr>
                            <td></td>
                            <td></td>
                            <tr>
                                <td>Sexe :</td>
                                <td colspan="2" class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme" required>
                                        <label class="form-check-label" for="homme">Homme</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme" required>
                                        <label class="form-check-label" for="femme">Femme</label>
                                    </div>
                                </td>
                            </tr>
                            <td></td>
                            <td></td>
                            
                            <tr>
                                <td>Spécialité :</td>
                                <td>
                                    <input type="text" name="specialite_enseignant"  placeholder="Entrez la spécialité" class="icon text-gray-600 btn btn-light form-control" >
                                </td>
                                
                            </tr>
                            <td></td>
                            <td></td>

                            
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
                                            <span class="text"> AJOUTER</span>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                    </form>
                </div>
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