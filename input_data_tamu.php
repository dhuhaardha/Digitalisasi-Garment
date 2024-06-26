<?php
include "koneksi.php";

date_default_timezone_set('Asia/Jakarta');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php require_once "templates/header.php" ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once "templates/sidebar.php" ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once "templates/topbar.php" ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Container Data Karyawan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h3 class="m-0 text-dark">Visitor Register</h3>
                        </div>

                        <div class="card-body">
                                <form method="POST" action="aksi_security.php">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Tipe Visitor</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_nama_buku">
                                                    <option value="0" selected>PILIH TIPE...</option>

                                                        <?php
                                                            $queryBuku = mysqli_query($koneksi,"SELECT * FROM tb_list_buku WHERE tblu_jns_buku LIKE 'TAMU' ORDER BY tblu_nm_buku");

                                                            while ($tabelBuku = mysqli_fetch_array($queryBuku)){
                                                        ?>

                                                        <option value="<?php echo $tabelBuku['tblu_kd_buku']; ?>"><?php echo $tabelBuku['tblu_nm_buku']; ?></option>

                                                        <?php
                                                            }
                                                        ?>

                                                </select>

                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nomer Kartu</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_nomor_kartu">
                                                    <option value="0" selected>PILIH CARD NUMBER...</option>

                                                        <?php
                                                            $queryKartu = mysqli_query($koneksi,"SELECT * FROM tb_list_card WHERE tblic_jns_kartu LIKE 'PELAMAR KERJA' AND tblic_status LIKE 'READY'");

                                                            while ($tabelKartu = mysqli_fetch_array($queryKartu)){
                                                        ?>

                                                        <option value="<?php echo $tabelKartu['tblic_uid']; ?>"><?php echo $tabelKartu['tblic_no_id']; ?></option>

                                                        <?php
                                                            }
                                                        ?>

                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Identitas Visitor</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="input_nomor_identitas" placeholder="NO IDENTITAS">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Nama Visitor</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="input_nama_pengunjung" placeholder="NAMA TAMU">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Alamat Visitor</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="input_alamat_pengunjung" placeholder="ALAMAT TAMU">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Janji Bertemu</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="input_janji_bertemu" placeholder="JANJI BERTEMU">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Tujuan Kunjungan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" name="input_tujuan_kunjungan" placeholder="TUJUAN KUNJUNGAN"></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Metal Detector</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_cek_metal">
                                                    <option selected>YES</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="unit">Under Mirror</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="input_cek_mirror">
                                                    <option selected>YES</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature</label>
                                                <style>
                                                    canvas {
                                                        border: 1px solid #000;
                                                    }
                                                </style>
                                                <div class="col-sm-10">
                                                        <canvas id="signatureCanvas" width="300" height="150"></canvas>
                                                    <input type="hidden" class="form-control" id="signatureFilename" name="signatureFilename">
                                                </div>
                                            </div>


                                    </br>

                                    <div class="form-group row">
                                        <div class="col-sm-10 text-center">
                                            <button type="submit" class="btn btn-success" name="tombol_register_tamu" id="saveSignatureBtn">
                                                        <i class="fa-solid fa-square-plus">&nbsp</i>
                                                            Add Visitor
                                            </button>
                                            <button class="btn btn-primary" id="clear_signature" type="button">Clear Signature</button>
                                        </div>
                                    </div>
                                </form>
                                <script src="signature_pad.umd.min.js"></script>
                                <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Signature Pad
        var canvas = document.getElementById('signatureCanvas');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // set background color
        });

        // Clear Signature function
        document.getElementById('clear_signature').addEventListener('click', function() {
            signaturePad.clear(); // Clear the signature pad
        });

        // Form submission
        document.getElementById('saveSignatureBtn').addEventListener('click', function() {
            // Get the data URL of the signature
            var dataURL = signaturePad.toDataURL();

            // Set the data URL to the hidden input field
            document.getElementById('signatureFilename').value = dataURL;
        });
    });
</script>
                            </div>

                    </div>
                    <!-- /.container-fluid -->

                    <!-- Modal Cetak PDF -->
                    <div class="modal fade" id="modalPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Export to PDF pada Tanggal</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">X</span>
                                    </button>
                                </div>
                                <form method="POST" action="print_kontrol_pagar.php" target="_blank">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="input_print_pdf" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Shift</label>
                                            <div class="col-sm-10">
                                            <select id="inputState" class="form-select" name="shift">
                                                    <option selected disabled>Choose POS...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" target="_blank" class="btn btn-success">Export</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modalCheckoutUraian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Kontrol Pagar</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">X</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div id="pengambilanFields">
                                        <input type="hidden" id="InputID" class="form-control" name="id_opr_kontrol_pagar" placeholder="Selected Date">
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Uraian</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="" name="uraian" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Selesai</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time" name="time_kontrol_finished" value="<?php echo date('H:i:s'); ?>" readonly>
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_update_waktu_selesai_kontrol_pagar" class="btn btn-success">Add</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <!-- Modal Tambah Uraian -->
                    <div class="modal fade" id="modalTambahUraian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Operasional Kontrol Pagar</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form method="POST" action="aksi_security.php">
                                    <div class="modal-body">
                                        <div id="pengambilanFields">
                                        <input type="hidden" class="form-control" id="" name="date" value="<?php echo date('Y-m-d'); ?>">
                                            <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Dibuat pada</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="time" name="time_kontrol_created" value="<?php echo date('H:i:s'); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Shift</label>
                                                <div class="col-sm-10">
                                                <select id="inputState" class="form-select" name="shift">
                                                    <option selected disabled>Choose Shift...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                </div>
                                            </div>
                                            <!-- Add other fields related to pengambilan here -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="tombol_tambah_uraian_kontrol_pagar" class="btn btn-success">Add</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

        


                    





                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; IT Department 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <!-- Script Button -->
    <script>
        $(document).ready(function () {

            $('.showButton').on('click', function () {
                $('#viewmodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#show_uid').val(data[0]);
                $('#show_type').val(data[1]);
                $('#show_name').val(data[3]);
            });

        });
    </script>

        <!-- Cek Session -->
        <?php
        if (@$_SESSION['sukses']) {
        ?>
            <script>
                Swal.fire({
                    title: 'SUCCESS!',
                    text: '<?php echo $_SESSION['sukses']; ?>',
                    icon: 'success',
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
        <?php
            unset($_SESSION['sukses']);
        } elseif (@$_SESSION['gagal']) {
        ?>
            <script>
                Swal.fire({
                    title: 'FAILED!',
                    text: '<?php echo $_SESSION['gagal']; ?>',
                    icon: 'error',
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>


        <?php
            unset($_SESSION['gagal']);
        }
        ?>
        
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalCheckoutUraian"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var IDValue = button.value;

                    // Set the value to the input field
                    document.getElementById("InputID").value = IDValue;
                });
            });
        </script>
        <script>
            // Get all elements with the data-target attribute
            var buttons = document.querySelectorAll(
                '[data-target="#modalGantiSerahTerima"]');

            // Loop through each button
            buttons.forEach(function(button) {
                // Add click event listener to the button
                button.addEventListener("click", function() {
                    // Get the value from the button
                    var dateValue = button.value;

                    // Set the value to the input field
                    document.getElementById("IDInput").value = dateValue;
                });
            });
        </script>
        <script>
    var canvas = document.getElementById('signatureCanvas');
    var ctx = canvas.getContext('2d');
    var isDrawing = false;

    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('touchstart', startDrawingTouch);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('touchmove', drawTouch);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('touchend', stopDrawing);

    function startDrawing(event) {
        isDrawing = true;
        draw(event);
    }

    function startDrawingTouch(event) {
        event.preventDefault();
        isDrawing = true;
        var touch = event.touches[0];
        var offsetX = touch.pageX - canvas.offsetLeft;
        var offsetY = touch.pageY - canvas.offsetTop;
        draw({
            offsetX,
            offsetY
        });
    }

    function draw(event) {
        if (!isDrawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(event.offsetX, event.offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(event.offsetX, event.offsetY);
    }

    function drawTouch(event) {
        event.preventDefault();
        if (!isDrawing) return;
        var touch = event.touches[0];
        var offsetX = touch.pageX - canvas.offsetLeft;
        var offsetY = touch.pageY - canvas.offsetTop;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(offsetX, offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(offsetX, offsetY);
    }

    function stopDrawing() {
        isDrawing = false;
        ctx.beginPath();
    }

    var clearButton = document.getElementById('clear_signature');

    clearButton.addEventListener('click', function() {
        clearSignature();
    });

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }


    // Function to convert canvas to data URL and store it in hidden input field
    function saveSignature() {
        var dataURL = canvas.toDataURL("image/png");
        document.getElementById('signatureData').value = dataURL;
    }

    // Call saveSignature() when the form is submitted
    document.querySelector('form').addEventListener('submit', saveSignature);
    </script>
        
        <?php require_once "templates/footer.php" ?>
</body>

</html>