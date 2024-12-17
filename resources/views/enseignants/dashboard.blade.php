@include('header')

                            <!-- Contenu de la page -->
                            <div class="container-fluid">
                                <!-- Ligne de contenu -->
                                <div class="row" >
                                    <div class="card shadow mb-4" style="width: 99%;">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Bienvenue cher(e) enseignant(e)!</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p align="left">
                                                        Bienvenue sur la plateforme LMS de l'Institut Supérieur des Études Technologiques (ISET) de Gabès, dédiée à l'accompagnement des enseignants du département Sciences et Technologies de l'Information et de la Télécommunication (STIC) dans leur mission éducative. Ensemble, nous nous engageons à fournir une expérience d'apprentissage de qualité et à préparer les étudiants pour un avenir prometteur.
                                                    </p>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <img class="img-profile img-fluid" src="../img/enseignant.png" style="max-width: 80%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </div>
                        <!-- /.container-fluid -->

                        </div>
                        <!-- Fin du contenu principal -->


                    </div>
                        <!-- Fin de l'enveloppe du contenu -->

                </div>
                        <!-- Fin du wrapper de la page -->

                        <!-- Bouton de retour en haut -->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>

                        <!-- Modal de déconnexion -->
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

                        <!-- JavaScript de base Bootstrap -->
                        <script src="../vendor/jquery/jquery.min.js"></script>
                        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Plugin JavaScript principal -->
                        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Scripts personnalisés pour toutes les pages -->
                        <script src="../js/sb-admin-2.min.js"></script>

                        <!-- Plugins de niveau de page -->
                        <script src="../vendor/chart.js/Chart.min.js"></script>

                        <!-- Scripts personnalisés de niveau de page -->
                        <script src="../js/demo/chart-area-demo.js"></script>
                        <script src="../js/demo/chart-pie-demo.js"></script>
</body>
</html>