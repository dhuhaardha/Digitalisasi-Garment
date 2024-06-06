<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Add jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Add Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>


<body>
    <canvas id="canvas" width="300" height="150"></canvas>
    <br>
    <button onclick="clearSignature()">Clear Signature</button>
    <button onclick="saveSignature2()">Save Signature</button>
    <br>

    <script src="script_try_canvas.js">

    </script>

<div class="row mb-3">
    <label for="pengambilanDate" class="col-sm-2 col-form-label">Date Register</label>
    <div class="col-sm-10">
        <select class="form-control" name="person_office_recieved" id="security_select">
            <?php
            $sql = "SELECT tbls_nama FROM tb_list_security";
            $result = mysqli_query($koneksi, $sql);

            // Populate select options
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['tbls_nama'] . "''>" . $row['tbls_nama'] . "</option>";
                }
            } else {
                echo "<option value=''>No security available</option>";
            }
            // Close database connection
            ?>
        </select>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#security_select').select2();
    });
</script>

</body>

</html>
