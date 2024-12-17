@include('header')
                <div class="card shadow mb-2" align="center" style="margin: 40px; padding: 20px;">
                    <div class="card-header py-3 border-bottom-info">
                        <h6 class="m-0 font-weight-bold text-primary">Créer une nouvelle matière</h6>
                    </div>
                    <div class="card-body">
                        <br>
                        <form action="/matiere/new" method="post" autocomplete="off" style="margin-bottom: 10px; align-content: center ;"> 
                        @csrf
                            <table align="center" cellspacing="5" width="50%" height="100%">
                            @csrf 
                            <tr>
                                        <td>Nom de la matière :</td>
                                        <td>
                                        <input type="text" name="nom" class="icon text-gray-600 btn btn-light form-control" placeholder="Entrer le nom de la matière" required>
                                        </td>
                                        </tr>
                                        <td></td> <td></td>
                                    <tr>
                                        <td>Coefficient :</td>
                                        <td>
                                        <input type="text" name="coeff" class="icon text-gray-600 btn btn-light form-control" placeholder="Entrer le coefficient" required>
                                        </td>
                                    </tr>
                                        <td></td> <td></td>
                                    <tr>
                                        <td>Nombre d'heures :</td>
                                        <td>
                                        <input type="text" name="nbrheure" class="icon text-gray-600 btn btn-light form-control" placeholder="Entrer le nombre d'heures" required>
                                        </td>
                                        </tr>
                                        <td></td> <td></td>
                                    <tr>
                                        <td>Unité d'enseignement :</td>
                                        <td>
                                        <input type="text" name="ue" class="icon text-gray-600 btn btn-light form-control" placeholder="Entrer l'unité educatif" required >
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                    <td>Spécialité :</td>
                                        <td>
                                        <select name="specialite_id" required class="icon text-gray-600 btn btn-light form-control" >
                                            <option disabled selected>Choisissez la spécialité</option>
                                            @foreach($specialites as $specialite)
                                                <option value="{{ $specialite->id }}">{{ $specialite->specialitem }}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                        
                                    </tr>
                                </td><td></td>
                                    <tr>
                                        <td>Code de l'unité educatif:</td>
                                        <td>
                                        <input type="text" name="codeue" class="icon text-gray-600 btn btn-light form-control" placeholder="Entrer le code de l'unité educatif" required>
                                        </td>

                                    </tr>
                                    <tr>
                                    <td>Semestre :</td>
                                        <td>
                                            <select name="semestre" required class="icon text-gray-600 btn btn-light form-control">
                                                <option disabled selected>Sélectionnez la semestre</option>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}" required>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <table align="center" cellspacing="10" width="40%" height="10%">
                                        <tr align="center" >
                                            <td></td>
                                            <td >
                                            <label for="cours">Cours</label>
                                            <input type="radio" id="cours" name="nature" value="cours" > </td>
                                            <td >
                                            <label for="tp">TP</label>
                                            <input type="radio" id="tp" name="nature" value="tp">
                                            </td>
                                        </tr>
                                </table>
                                <table align="center" cellspacing="10" width="40%" height="10%">
                                        <tr align="center">
                                            <td></td>
                                            <td >
                                            <label for="Optionnel">Optionnel</label>
                                            <input type="radio" id="Optionnel" name="type" value="Optionnel" > </td>
                                            <td >
                                            <label for="Obligatoire">Obligatoire</label>
                                            <input type="radio" id="Obligatoire" name="type" value="Obligatoire" >
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
