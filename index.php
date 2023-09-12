<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestore Corse</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .main-container{
            display: flex; 
            width: 100%;
            height: 100vh;
        }

        .sidebar{
            padding-top: 20px;
            width: 25%;
            height: 100%;
            background-color: #000000;
            padding: 1rem;
        }

        .sidebar li a, .sidebar li{
            color: white;
            text-decoration: none;
            font-size: 25px;
        }

        .sidebar li{
            padding: .5rem 1rem;
            border-bottom: 1px solid white;
            list-style-type: none;
        }

        .preview{
            width: 75%;
            height: 100%;
            background-color: white;
            padding: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Main -->
    <main>
        <div class="main-container">
            <div class="sidebar">
                <?php require 'partials/sidebar.php'; ?>
            </div>
            <div class="preview">
                this is the preview
            </div>
        </div>
    </main>

    <script src="/assets/js/jquery.min.js"></script>
</body>
</html>