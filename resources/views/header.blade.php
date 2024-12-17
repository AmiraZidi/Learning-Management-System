<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>PFE PROJET</title>
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href="/css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            #txt {
                font-size: 1.2rem;
                color: #858796;
                margin-right: 500px;
                text-align: right;
                align-items: right;
            }
        </style>
    </head>
    <body id="page-top">
        <div id="wrapper">
                @if (Auth::user()->usertype == 'admin')
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url ('admin/dashboard')}}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img class="img-profile rounded-circle " src="../../img/logoisetgb.jpg" width="60%"></i>
                    </div>
                    <div class="sidebar-brand-text mx-1" style="font-size: 15px;">Departement STIC</div>
                </a>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Menu
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesStudents"
                        aria-expanded="true" aria-controls="collapsePagesStudents">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Étudiants</span>
                    </a>
                    <div id="collapsePagesStudents" class="collapse" aria-labelledby="headingPagesStudents"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Pages principales :</h6>
                            <a class="collapse-item" href="{{url ('etudiant/new')}}">Nouveau étudiant</a>
                            <a class="collapse-item" href="{{url ('etudiant/list')}}">Liste des étudiants</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Autres</h6>
                            <a class="collapse-item" href="{{url ('/etudiant/affectationetudiant')}}">Affectation des étudiants</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePagesTeachers"
                        aria-expanded="true" aria-controls="collapsePagesTeachers">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Enseignants</span>
                    </a>
                    <div id="collapsePagesTeachers" class="collapse" aria-labelledby="headingPagesTeachers"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Pages principales :</h6>
                            <a class="collapse-item" href="{{url ('enseignant/new')}}">Nouveau enseignant</a>
                            <a class="collapse-item" href="{{url ('enseignant/list')}}">Liste des enseignants</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Autres</h6>
                            <a class="collapse-item" href="{{url ('enseignant/attribuerclasseenseignant')}}">Affectation des enseignants</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePagesClasses"
                        aria-expanded="true" aria-controls="collapsePagesClasses">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Classes</span>
                    </a>
                    <div id="collapsePagesClasses" class="collapse" aria-labelledby="headingPagesClasses"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Pages principales :</h6>
                            <a class="collapse-item" href="{{url ('class/new')}}">Nouvelle classe</a>
                            <a class="collapse-item" href="{{url ('class/list')}}">Liste des classes</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesSubjects"
                        aria-expanded="true" aria-controls="collapsePagesSubjects">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Matières</span>
                    </a>
                    <div id="collapsePagesSubjects" class="collapse" aria-labelledby="headingPagesSubjects"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pages principales :</h6>
                            <a class="collapse-item" href="{{url ('matiere/new')}}">Nouvelle matière</a>
                            <a class="collapse-item" href="{{url ('matiere/list')}}">Liste des matières</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Autres</h6>
                            <a class="collapse-item" href="{{url ('consultation/adminclasseabsences')}}">Consultation</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesSalles"
                        aria-expanded="true" aria-controls="collapsePagesSalles">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Salles</span>
                    </a>
                    <div id="collapsePagesSalles" class="collapse" aria-labelledby="headingPagesSalles"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('adminsalle')}}">Liste des salles</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesspecialite"
                        aria-expanded="true" aria-controls="collapsePagesspecialite">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Spécialités</span>
                    </a>
                    <div id="collapsePagesspecialite" class="collapse" aria-labelledby="headingPagesSubjects"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('adminspecialite')}}">Liste des spécialités</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesAbsences"
                        aria-expanded="true" aria-controls="collapsePagesAbsences">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Emploi de temps</span>
                    </a>
                    <div id="collapsePagesAbsences" class="collapse" aria-labelledby="headingPagesSubjects"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url ('emploi/adminclasse')}}">Liste des classes</a>
                        </div>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesAnnonces"
                        aria-expanded="true" aria-controls="collapsePagesAnnonces">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Annonces</span>
                    </a>
                    <div id="collapsePagesAnnonces" class="collapse" aria-labelledby="headingPagesSubjects"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pages principales :</h6>
                            <a class="collapse-item" href="{{url ('admin/adminnvannonce')}}">Partager une annonce</a>
                                <a class="collapse-item" href="{{url ('admin/adminhisannonce')}}">Consulter les annonces</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesdemande"
                        aria-expanded="true" aria-controls="collapsePagesdemande">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Demandes</span>
                    </a>
                    <div id="collapsePagesdemande" class="collapse" aria-labelledby="headingPagesdemande"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pages principales :</h6>
                            <a class="collapse-item" href="{{url ('admin/adminhisdemande')}}">Historique des demandes</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            
            
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <div id="txt" class="ml-auto" ><b></b></div>
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Rechercher..." aria-label="Rechercher"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            @php
                                $admindemandesEnAttente = \App\Models\Demande::where('etat', 'En attente')->get();
                                $admintotalDemandesEnAttente = $admindemandesEnAttente->count();
                            @endphp
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    @if($admintotalDemandesEnAttente > 0)
                                        <span class="badge badge-danger badge-counter">{{ $admintotalDemandesEnAttente }}</span>
                                    @endif
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Demandes reçus
                                    </h6>
                                    @foreach($admindemandesEnAttente as $demande)
                                        <a class="dropdown-item d-flex align-items-center" href="{{url ('admin/hisdemande')}}">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">{{ $demande->date }}</div>
                                                <span class="font-weight-bold">{{ $demande->user->name }}</span>
                                                <div>{{ $demande->sujet }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </li>


                            @php
                                $authUserId = Auth::id();
                                $adminannonces = \App\Models\Annonce::where('user_id', '!=', $authUserId)->orderBy('date', 'desc')->take(5)->get();
                                $admintotalAnnonces = $adminannonces->count();
                            @endphp
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>

                                    @if($admintotalAnnonces > 0)
                                        <span class="badge badge-danger badge-counter">{{ $admintotalAnnonces }}</span>
                                    @endif
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Annonces reçus
                                    </h6>
                                    @foreach($adminannonces as $annonce)
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-bullhorn text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">{{ $annonce->date }}</div>
                                                <span class="font-weight-bold">{{ $annonce->user->name }}</span>
                                                <div>{{ $annonce->titre }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ url('/logout') }}" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Déconnexion
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    
                @endif

                @if (Auth::user()->usertype == 'enseignant')
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url ('enseignants/dashboard')}}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img class="img-profile rounded-circle " src="../../img/logoisetgb.jpg" width="60%"></i>
                    </div>
                    <div class="sidebar-brand-text mx-1" style="font-size: 15px;">Departement STIC</div>
                </a>

                <hr class="sidebar-divider my-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{url ('enseignants/profile')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Menu
                </div>
                <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesCls"
                            aria-expanded="true" aria-controls="collapsePagesCls">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Mes classes</span>
                        </a>
                        <div id="collapsePagesCls" class="collapse" aria-labelledby="headingPagesCls"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('enseignants/classesenseignant')}}">Mes classes</a>
                                
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesSubjects"
                            aria-expanded="true" aria-controls="collapsePagesSubjects">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Mes matières</span>
                        </a>
                        <div id="collapsePagesSubjects" class="collapse" aria-labelledby="headingPagesSubjects"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('enseignants/matieresenseignant')}}">Liste des matières</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesemploi"
                            aria-expanded="true" aria-controls="collapsePagesemploi">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Mon Emploi</span>
                        </a>
                        <div id="collapsePagesemploi" class="collapse" aria-labelledby="headingPagesemploi"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('enseignants/emploienseignant')}}">Emploi de temps</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagescours"
                            aria-expanded="true" aria-controls="collapsePagescours">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Mes cours</span>
                        </a>
                        <div id="collapsePagescours" class="collapse" aria-labelledby="headingPagescours"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('enseignants/nvcours')}}">Partager un cours</a>
                                <a class="collapse-item" href="{{url ('enseignants/hiscours')}}">Consulter les cours</a>
                                <a class="collapse-item" href="{{url ('enseignants/nvannonce')}}">Partager une annonce</a>
                                <a class="collapse-item" href="{{url ('enseignants/hisannonce')}}">Consulter les annonces</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesdemande"
                            aria-expanded="true" aria-controls="collapsePagesdemande">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Demandes</span>
                        </a>
                        <div id="collapsePagesdemande" class="collapse" aria-labelledby="headingPagesdemande"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('enseignants/nvdemande')}}">Passer une demande</a>
                                <a class="collapse-item" href="{{url ('enseignants/hisdemande')}}">Historique des demandes</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesmsg"
                            aria-expanded="true" aria-controls="collapsePagesmsg">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Historique messages</span>
                        </a>
                        <div id="collapsePagesmsg" class="collapse" aria-labelledby="headingPagesmsg"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('enseignants/hismessage')}}">Consulter</a>
                            </div>
                        </div>
                    </li>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div id="txt" class="ml-auto" ><b></b></div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Rechercher..." aria-label="Rechercher"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            @php
                                $authUserId = Auth::id();
                                $enseignantannonces = \App\Models\Annonce::where('user_id', '!=', $authUserId)->get();
                                $enseignanttotalAnnonces = $enseignantannonces->count();
                            @endphp
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    @if($enseignanttotalAnnonces > 0)
                                        <span class="badge badge-danger badge-counter">{{ $enseignanttotalAnnonces }}</span>
                                    @endif
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Annonces reçus
                                    </h6>
                                    @foreach($enseignantannonces as $annonce)
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-bullhorn text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">{{ $annonce->date }}</div>
                                                <span class="font-weight-bold">{{ $annonce->user->name }}</span>
                                                <div>{{ $annonce->titre }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                           
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="{{ asset('img/' . Auth::user()->image) }}">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ url ('enseignants/profile')}}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profil
                                    </a>
                                    <div href="{{ url('auth/logout') }}" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('/logout') }}" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Déconnexion
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                @endif
                @if (Auth::user()->usertype == 'etudiant')
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url ('etudiants/dashboard')}}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img class="img-profile rounded-circle " src="../../img/logoisetgb.jpg" width="60%"></i>
                    </div>
                    <div class="sidebar-brand-text mx-1" style="font-size: 15px;">Departement STIC</div>
                </a>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Menu
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed"  href="{{url ('etudiants/profile')}}" >
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Profile</span>
                    </a>
                 </li>
                 <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagescours"
                            aria-expanded="true" aria-controls="collapsePagescours">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Cours </span>
                        </a>
                        <div id="collapsePagescours" class="collapse" aria-labelledby="headingPagescours"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('etudiants/matiereetudiant')}}">Mes cours</a>
                            </div>
                        </div>
                    </li>
                <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesnote"
                            aria-expanded="true" aria-controls="collapsePagesnote">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Note</span>
                        </a>
                        <div id="collapsePagesnote" class="collapse" aria-labelledby="headingPagesnote"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('etudiants/noteetudiant')}}">Mes notes</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesabs"
                            aria-expanded="true" aria-controls="collapsePagesabs">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Absences</span>
                        </a>
                        <div id="collapsePagesabs" class="collapse" aria-labelledby="headingPagesabs"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('etudiants/absenceetudiant')}}">Mes absences</a>
                            </div>
                        </div>
                    </li>
                <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesemploi"
                            aria-expanded="true" aria-controls="collapsePagesemploi">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Emploi du temps</span>
                        </a>
                        <div id="collapsePagesemploi" class="collapse" aria-labelledby="headingPagesemploi"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('etudiants/emploietudiant')}}">Mon Emploi</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesmessage"
                            aria-expanded="true" aria-controls="collapsePagesmessage">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Message </span>
                        </a>
                        <div id="collapsePagesmessage" class="collapse" aria-labelledby="headingPagesemploi"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pages principales :</h6>
                                <a class="collapse-item" href="{{url ('etudiants/messageetudiant')}}">Envoyer un message </a>
                                <a class="collapse-item" href="{{url ('etudiants/etudianthismessage')}}">Historique messages</a>
                            </div>
                        </div>
                    </li>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div id="txt" class="ml-auto" ><b></b></div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Rechercher..." aria-label="Rechercher"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                           
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('img/' .Auth::user()->image) }}">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <div href="{{ url('auth/logout') }}" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('/logout') }}" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Déconnexion
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                @endif
                <script>
                        function startTime() {
                            const today = new Date();
                            let h = today.getHours();
                            let m = today.getMinutes();
                            let s = today.getSeconds();
                            m = checkTime(m);
                            s = checkTime(s);
                            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
                            setTimeout(startTime, 1000);
                        }

                        function checkTime(i) {
                            if (i < 10) { i = "0" + i; }
                            return i;
                        }

                        document.addEventListener('DOMContentLoaded', (event) => {
                            startTime();
                        });
                    </script>
