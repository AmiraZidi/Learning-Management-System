@include('header')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Enregistrement des Notes</h6>
                        </div>
                        <div class="card-body">
                        <form method="post" action="{{route('noteenseignantpost')}}">
                             @csrf
                            <div class="table-responsive" width="100%">
                            <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                <input type="hidden" name="affectationclassenseignant_id" value="{{$affectation_id}}" >

                                    <thead>
                                        <tr>
                                            <th>Nom et Prénom</th>
                                            <th>
                                                <select name="type" class="custom-select">
                                                    <option value="DC">DC</option>
                                                    <option value="DS">DS</option>
                                                </select>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($classeetudiants as $etudiant)
                                        <tr>
                                            <td>{{ $etudiant->etudiant->name }} </td>
                                            <td><input type="number" name="etudiants[{{ $loop->index }}][note]" class="form-control"  step="0.01"
                                                            pattern="[0-9]{2}" title="La note doit étre composé de 2 numéro"></td>
                                            <input type="hidden" name="etudiants[{{ $loop->index }}][etudiant_id]" value="{{ $etudiant->etudiant->id }}">
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
                            </form>
                            <br><br>
                            <h3>Les notes affectées : <h3>
                        <table class="table" id="myTable2" >
                        <thead>
                            <tr>
                                <th>Nom Etudiant :</th>
                                <th>Note DC :</th>
                                <th>Note DS :</th>
                                <th>Date :</th>
                            </tr>
                        </thead>
                            <tbody>
                                @forEach($notes as $note)
                                <tr>
                                    <td>{{$note->etudiant->name}}</td>
                                    <td>{{$note->note_examen}}</td>
                                    <td>{{$note->note_ds}}</td>
                                    <td>{{$note->date_note}}</td>
                                </tr>
                                @endforEach
                            </tbody>
                        </table>
                            </div>
                        </div>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
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