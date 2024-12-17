@include('header')

            <div class="card shadow mb-2" align="center" style="margin: 40px; padding: 20px;">
                <div class="card-header py-3 border-bottom-info">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter une nouvelle salle</h6>
                </div>
                <br>
                <div class="card-body">
                <form action="{{route('adminaddsallepost')}}" method="post" autocomplete="off" style="margin-bottom: 10px; align-content: center ;">
                        @csrf 
                        <table align="center" cellspacing="5" width="50%" height="100%">
                            @csrf
                        <tr>
                            <td>Nom de la Salle</td>
                            <td>
                                <input type="text" name="nom" class="icon text-gray-600 btn btn-light"
                                    placeholder="Entrez le nom de la salle" required  >
                            </td>
                        </tr>
                        
                        <td></td>
                        <td></td>
                            <tr>
                                <td>Position :</td>
                                <td>
                                    <input type="text" name="position"  class="icon text-gray-600 btn btn-light" >
                                </td>
                                
                            </tr>
                            <td></td>
                            <td></td>

                            
                        </table>
                        <br><br>
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