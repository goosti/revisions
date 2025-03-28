<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <!-- Style du header -->
    <style>

        /* Le reset */
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Le style de la bannière */
        header {
            background-color: #33058C;
            color: white;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Conteneur pour mettre le logo à gauche */
        .container-left {
            width: 100%;
            max-width: 1500px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Logo */
        .logo-header {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Redimentionner l'image par rapport à la bannière */
        img{
            width: 200px;
            height: 100px;
        }

        /* La navigation */
        .nav-header{
            display: flex;
            gap: 20px;
        }

        /* Liens du menu */
        .nav-header a {
            color: #33058C;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            padding: 8px 15px;
            transition: 0.3s ease;
            border-radius: 5px;
            background-color: white;
        }

        .nav-header a #trombinoscope{
            align-items: start;
        }

    </style>
</head>
<body>
    <header>
        <div class="container-left">
            <div class="logo-header">
                <a href="../pages/index.php"><img src="../assets/img/logo-manu.png" alt="Logo"></a>
            </div>
            <nav class="nav-header">
                <a href="../pages/register.php" id="formulaire-inscription">Formulaire d'inscription</a>
            </nav>
        </div>
    </header>
</body>
</html>