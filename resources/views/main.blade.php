<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="path/to/jQuery-sidebar.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="../resources/css/style.css">
    <title>ProtuctX</title>
</head>
<body>
<div class="flex space-between col mainDiv">
        @yield("content")
    <div class="footer flex col w-max bgs2">
        <div class="flex wrap space-between gap5 padL10rem padR10rem" id ="footer-content">
            <div class="flex col">
                <h1>Contact:</h1>
                <p>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    25464789
                </p>
                <p>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    ip20.matiss.balisn@vtdt.edu.lv
                </p>        
            </div>
            <div class="flex col">
                <h1>Social:</h1>
                <p>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    mat1ssb
                </p>
                <p>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    Matiss Balins
                </p>            
            </div>
            <div class="flex col">
                <h1>Credentials:</h1>
                <p>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Krišjānis Klāvs Kantāns
                </p>
                <p>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Andris Lapsiņš
                </p>                  
            </div>
        </div>
        <div class="flex footer-logo alignCenter w-max justifyCenter gap1">
            <h1>ProductX</h1>
        </div>
    </div>
</div>
<script src ="../resources/js/script.js"></script>
</body>
</html>