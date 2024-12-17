@include('header')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste d'appel</h6>
                        </div>
                        <form method="post" action="{{ route('absencesenseignantpost') }}">
                        @csrf
                        <input type="hidden" name="affectationclassenseignant_id" value="{{ $affectationclassenseignant_id }}">

                        <div class="card-body">
                            <div class="table-responsive" width="100%">
                            <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nom et Prénom</th>
                                        <th colspan=2> Etat </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($etudiants as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->etudiant->name }}</td>
                                        <input type="hidden" name="etudiants[{{ $etudiant->etudiant->id }}][etudiant_id]" value="{{ $etudiant->etudiant->id }}">
                                        <td>
                                            <input type="radio" id="etat_present_{{ $etudiant->etudiant->id }}" name="etudiants[{{ $etudiant->etudiant->id }}][etat]" value="Present" checked>
                                            <label for="etat_present_{{ $etudiant->etudiant->id }}">Présent</label>
                                        </td>
                                        <td>
                                            <input type="radio" id="etat_absent_{{ $etudiant->etudiant->id }}" name="etudiants[{{ $etudiant->etudiant->id }}][etat]" value="Absent">
                                            <label for="etat_absent_{{ $etudiant->etudiant->id }}">Absent</label>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br><br>
                            <table align="right" cellspacing="20">
                                <tr>
                                    <td>
                                        <div type="submit" class="my-2"></div>
                                        <button class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text"> ENVOYER</span>
                                            <div type="submit" class="my-2"></div>
                                        </button>
                                    </td>
                                </tr>
                            </table>

                            </div>
                        </div>
                    </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="{{ url('logout') }}"class="btn btn-primary" >Déconnexion</a>                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>