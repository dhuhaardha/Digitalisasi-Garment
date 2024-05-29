<!DOCTYPE html>
<html>

<head>
    <title>Form with Signature Pad | E-Signature Pad using Jquery UI and PHP
        - bootstrapfriendly</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="vendor/signature/jquery.signature.min.js"></script>
    <link rel="stylesheet" type="text/css" href="vendor/signature/jquery.signature.css">

    <style>
        .kbw-signature {
            width: 400px;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>

</head>

<body class="bg-light">

    <div class="container p-4">

        <div class="row">
            <div class="col-md-5 border p-3  bg-white">
                <form method="POST" action="upload.php">
                    <h1>PHP Signature Pad</h1>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-12">
                        <label class="" for="">Signature:</label>
                        <br />
                        <div id="sig"></div>
                        <br />

                        <textarea id="signature64" name="signature" style="display: none"></textarea>
                        <div class="col-12">
                            <button class="btn btn-sm btn-warning" id="clear">&#x232B;Clear Signature</button>
                        </div>
                    </div>

                    <br />
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>

    </div>


    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>

</body>

</html>