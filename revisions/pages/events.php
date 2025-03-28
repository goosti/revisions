<?php 
require_once "../includes/header.php"; 
include_once "../config/database.php";
?>

<?php 
// Récupérer les événements depuis la base de données
$query1 = 'SELECT * FROM evenement';
$data = $db->query($query1);
$results = $data->fetchAll(PDO::FETCH_ASSOC);





if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    $id = htmlspecialchars(trim($_GET['id'] ?? ''));


    if ($id == 1) {

        ?>
        <img src="../assets/image/basketball.web" alt="Ballon de basket">
        <p>test</p>
        <div>
            <a href="../pages/events.php"><button class="submit">Retour</button></a>
        </div>
        <?php
    } 
}




?>

<div class="evenements-container">
    <h2 class="evenements-title">Événements à venir :</h2>
    
    <?php 
    foreach ($results as $result) {
        // Affichage des informations des événements
        $id = $result['Id_Evenement'];
        echo '
        <div class="evenement">
            <div class="evenement-image">
                <img src="../assets/image/' . $result['Image'] . '" alt="' . htmlspecialchars($result['Nom']) . '" />
            </div>
            <div class="evenement-details">
                <h3 class="evenement-nom">' . htmlspecialchars($result['Nom']) . '</h3>
                <p class="evenement-description">' . nl2br(htmlspecialchars($result['Description'])) . '</p>
                <p class="evenement-date">Date: ' . htmlspecialchars($result['Date']) . '</p>
                <p class="evenement-heure">Heure: ' . htmlspecialchars($result['Heure']) . '</p>
                <p class="evenement-lieu">Lieu: ' . htmlspecialchars($result['Lieu']) . '</p>
                <p class="evenement-capacite">Capacité Max: ' . htmlspecialchars($result['Capacite_Max']) . '</p>
                <p class="evenement-cree-par">Créé par: ' . htmlspecialchars($result['Cree_par']) . '</p>
                <a href="./event-details.php?id=' . $id . '"><button class="detail">Plus de détail</button></a>
            </div>
        </div>';
    }
    ?>
</div>

<style>
    /* Style global pour la section des événements */
    .evenements-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 10px;
    }

    .evenements-title {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Style pour chaque événement */
    .evenement {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        padding: 15px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .evenement-image img {
        max-width: 200px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 8px;
        width: 100%;
        height: 100%;
    }

    .evenement-details {
        flex-grow: 1;
        padding-left: 20px;
    }

    .evenement-nom {
        font-size: 1.5rem;
        font-weight: bold;
        color: #33058C;
        margin: 0 0 10px;
    }

    .evenement-description {
        font-size: 1rem;
        color: #7f8c8d;
        margin-bottom: 10px;
    }

    .evenement-date,
    .evenement-heure,
    .evenement-lieu,
    .evenement-capacite,
    .evenement-cree-par {
        font-size: 1rem;
        color:rgb(30, 30, 30);
        margin: 5px 0;
    }

    .detail{
        padding: 7px;
        background-color:rgb(51, 5, 140);
        border: none;
        border-radius: 10px;
        color: white;
    }

    .detail:hover{
        background-color:rgb(76, 12, 238);
        cursor: pointer;
        text-decoration: underline;
    }
</style>

