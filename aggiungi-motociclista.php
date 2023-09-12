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

        .preview-content{
            margin-top: 50px;
        }

        .form-container input{
            padding: .5rem;
            border-radius: 10px;
            border: 0;
            background-color: #00000030;
            margin-top: 1rem;
        }

        .form-container form{
            display: flex; 
            flex-direction: column;
        }

        .form-container form input[type="submit"]{
            display: block;
            background-color: #00000080;
        }

        .hidden{
            opacity: 0;
        }

        .feedback-popup{
            transition: all .5s;
            color: white;
            padding: 1rem;
        }

        .success{
            background-color: #1b8f1b;
        }

        .error{
            background-color: red;
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
                <div class="preview-title">
                    <h1>Aggiungi un nuovo Motociclista</h1>
                </div>
                <div class="preview-content">
                    <div class="form-container">
                        <form id="add-biker-form" method="post">
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="number" name="numero" placeholder="Numero">
                            <input type="text" name="motoclub" placeholder="Motoclub">
                            <input type="text" name="moto" placeholder="Moto">
                            <input type="hidden" name="id_categoria" value="1">
                            <input type="submit" value="Inserisci">
                        </form>
                    </div>
                    <div class="feedback-popup hidden">

                    </div>
                </div>
            
            </div>
        </div>
    </main>

    <script src="/assets/js/jquery.min.js"></script>

    <script>
        var $ = jQuery;

        $('#add-biker-form').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serializeArray();
            addBiker(formData)
        })

        function addBiker(data){
            console.log(data);
            $.ajax({
                url: '/core/ajax.php',
                type: 'POST',
                data: {
                    action : 'add_biker',
                    data : data
                },
                success: function(response){
                    let popup = $('.feedback-popup');
                    popup.removeClass('hidden').addClass('success');
                    popup.html('Motociclista Registrato con successo')
                },
                error: function(e){
                    let popup = $('.feedback-popup');
                    popup.removeClass('hidden').addClass('error');
                    popup.html('Purtroppo durante la registrazione del motociclista è avvenuto un errore. Ricontrolla i dati inseriti e riprova')
                }
            });
        }
    </script>
</body>
</html>