@include('header')
                            <!-- Fin de la barre de navigation -->

                            <!-- Contenu de la page -->
                            <div class="container-fluid">

                                <!-- En-tête de la page -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Générer un rapport</a>
                                </div>

                                <!-- Ligne de contenu -->
                                <div class="row">

                                    <!-- Carte des gains (mensuels) -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Gains (mensuels)</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Carte des gains (annuels) -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                            Gains (annuels)</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Carte des tâches -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-info shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tâches
                                                        </div>
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-auto">
                                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="progress progress-sm mr-2">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Carte des demandes en attente -->
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-warning shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                            Demandes en attente</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ligne de contenu -->

                                <div class="row">

                                    <!-- Graphique de zone -->
                                    <div class="col-xl-8 col-lg-7">
                                        <div class="card shadow mb-4">
                                            <!-- En-tête de la carte - Menu déroulant -->
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Aperçu des gains</h6>
                                                <div class="dropdown no-arrow">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <div class="dropdown-header">En-tête du menu déroulant :</div>
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Corps de la carte -->
                                            <div class="card-body">
                                                <div class="chart-area">
                                                    <canvas id="myAreaChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Graphique en secteurs -->
                                    <div class="col-xl-4 col-lg-5">
                                        <div class="card shadow mb-4">
                                            <!-- En-tête de la carte - Menu déroulant -->
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Sources de revenus</h6>
                                                <div class="dropdown no-arrow">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <div class="dropdown-header">En-tête du menu déroulant :</div>
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Corps de la carte -->
                                            <div class="card-body">
                                                <div class="chart-pie pt-4 pb-2">
                                                    <canvas id="myPieChart"></canvas>
                                                </div>
                                                <div class="mt-4 text-center small">
                                                    <span class="mr-2">
                                                        <i class="fas fa-circle text-primary"></i> Direct
                                                    </span>
                                                    <span class="mr-2">
                                                        <i class="fas fa-circle text-success"></i> Social
                                                    </span>
                                                    <span class="mr-2">
                                                        <i class="fas fa-circle text-info"></i> Référence
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ligne de contenu -->
                                <div class="row">

                                    <!-- Colonne de contenu -->
                                    <div class="col-lg-6 mb-4">

                                        <!-- Exemple de carte de projet -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Projets</h6>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="small font-weight-bold">Migration du serveur <span
                                                        class="float-right">20%</span></h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small font-weight-bold">Suivi des ventes <span
                                                        class="float-right">40%</span></h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small font-weight-bold">Base de données clients <span
                                                        class="float-right">60%</span></h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small font-weight-bold">Détails de paiement <span
                                                        class="float-right">80%</span></h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="small font-weight-bold">Configuration du compte <span
                                                        class="float-right">Terminée !</span></h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Système de couleurs -->
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                        Primaire
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                        Succès
                                        <div class="text-white-50 small">#1cc88a</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-info text-white shadow">
                                    <div class="card-body">
                                        Info
                                        <div class="text-white-50 small">#36b9cc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-warning text-white shadow">
                                    <div class="card-body">
                                        Alerte
                                        <div class="text-white-50 small">#f6c23e</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-danger text-white shadow">
                                    <div class="card-body">
                                        Danger
                                        <div class="text-white-50 small">#e74a3b</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-secondary text-white shadow">
                                    <div class="card-body">
                                        Secondaire
                                        <div class="text-white-50 small">#858796</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-light text-black shadow">
                                    <div class="card-body">
                                        Clair
                                        <div class="text-black-50 small">#f8f9fc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-dark text-white shadow">
                                    <div class="card-body">
                                        Foncé
                                        <div class="text-white-50 small">#5a5c69</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="../img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Ajoutez des illustrations de qualité à votre projet grâce à <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, une collection constamment mise à jour d'images
                                        SVG magnifiques que vous pouvez utiliser entièrement gratuitement et sans attribution !</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Parcourir les illustrations sur unDraw &rarr;</a>
                                </div>
                            </div>

                            <!-- Approche -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Approche de développement</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 utilise largement les classes utilitaires de Bootstrap 4 afin de réduire le
                                        gonflement du CSS et d'améliorer les performances de la page. Des classes CSS personnalisées sont utilisées pour créer
                                        des composants et des classes utilitaires personnalisées.</p>
                                    <p class="mb-0">Avant de travailler avec ce thème, vous devriez vous familiariser avec le
                                        framework Bootstrap, en particulier les classes utilitaires.</p>
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