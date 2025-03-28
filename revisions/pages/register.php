<?php

require_once '../includes/header.php';

$errors = [];
$nom = $prenom = $email = $password = $photoProfil = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom']??'';
    $prenom = $_POST['prenom']??'';
    $email = $_POST['email']??'';
    $password = $_POST['password']??'';
    $photoProfil = $_POST['photo_profil']??'';

    if (empty($nom)){
        $errors['nom']='le nom est obligatoire';
    }elseif (strlen($nom) < 2) {
        $errors['nom'] = 'Le nom doit comporter au moins 2 caractères';
    }elseif (is_numeric($nom)) {
        $errors['nom'] = 'Le nom doit comporter uniquement des lettres';
    }

    if (empty($prenom)){
        $errors['prenom']='le prenom est obligatoire';
    }elseif (strlen($prenom) < 2) {
        $errors['prenom'] = 'Le nom doit comporter au moins 2 caractères';
    }elseif (is_numeric($prenom)) {
        $errors['prenom'] = 'Le nom doit comporter uniquement des lettres';
    }

    if(empty($email)){
        $errors['email']='le mail est obligatoire';
    }

    if(empty($password)){
        $errors['password']='le mot de passe est obligatoire';
    }elseif (strlen($password) < 4) {
        $errors['password'] = 'La mot de passe doit comporter au moins 4 caractères';
    }

    if (empty($errors)) {
        $sql = "INSERT INTO `utilisateur` (`Email`, `Mot_de_passe`, `Nom`, `Prénom`, `Photo_profil`, `Role`) VALUES (:email, :password, :nom, :prenom, :photo_profil, :role)";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .error-message{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Formulaire d'inscription</h1>

    <form action="" method="post">
            <input type="text" name="nom" placeholder="Nom">
            <p class="error-message"><?php echo $errors['nom'] ?? '' ?></p>

            <input type="text" name="prenom" placeholder="Prénom">
            <p class="error-message"><?php echo $errors['prenom'] ?? '' ?></p>

            <input type="email" name="email" placeholder="Email">
            <p class="error-message"><?php echo $errors['email'] ?? '' ?></p>

            <input type="password" name="password" placeholder="Mot de passe">
            <p class="error-message"><?php echo $errors['password'] ?? '' ?></p>

            <input type="image" name="photo_profil" placeholder="Photo de profil">
            <p class="error-message"><?php echo $errors['photo_profil'] ?? '' ?></p>
            <br>

            <button type="submit">S'inscrire</button>
        </form>
</body>
</html>