<?php 
require_once "../includes/header.php"; 
include_once "../config/database.php";
?>

<?php 
$id = "";
if (isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    header('Location: index.php');
}

// Récupérer les événements depuis la base de données
$query1 = "SELECT * FROM evenement WHERE Id_Evenement=$id";
$data = $db->query($query1);
$results = $data->fetchAll(PDO::FETCH_ASSOC);

if($data->rowCount() <= 0){
    header('Location: index.php');
}
?>

<a href="../pages/events.php"><button class="detail">Retour</button></a>
<div class="evenements-container">
    <h2 class="evenements-title">Détails de l'événement</h2>
    
    <?php 
    foreach ($results as $result) {
        // Affichage des informations des événements
        echo '
        <div class="evenement">
            <div class="evenement-image">
                <img src="../assets/image/' . $result['Image'] . '" alt="' . htmlspecialchars($result['Nom']) . '" />
            </div>
            <div class="evenement-details">
                <h3 class="evenement-nom">' . htmlspecialchars($result['Nom']) . '</h3>
                <p class="evenement-description">' . nl2br(htmlspecialchars($result['Description'])) . '</p>
                <div class="evenement-info">
                    <p><strong>Date :</strong> ' . htmlspecialchars($result['Date']) . '</p>
                    <p><strong>Heure :</strong> ' . htmlspecialchars($result['Heure']) . '</p>
                    <p><strong>Lieu :</strong> ' . htmlspecialchars($result['Lieu']) . '</p>
                    <p><strong>Capacité Max :</strong> ' . htmlspecialchars($result['Capacite_Max']) . '</p>
                    <p><strong>Créé par :</strong> ' . htmlspecialchars($result['Cree_par']) . '</p>
                </div>
                <a href="../pages/my-reservation.php"><button class="detail">Réserver</button></a>
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
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .evenements-title {
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 40px;
        color: #2c3e50;
    }

    /* Style pour chaque événement */
    .evenement {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .evenement:hover {
        transform: scale(1.03);
    }

    /* Ajustement des images pour les rendre plus grandes */
    .evenement-image img {
        max-width: 400px;
        max-height: 300px;
        object-fit: cover;
        border-radius: 8px;
        width: 100%;
        height: 100%;
    }

    .evenement-details {
        flex-grow: 1;
        padding-left: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .evenement-nom {
        font-size: 2rem;
        font-weight: bold;
        color: #33058C;
        margin: 0 0 15px;
    }

    .evenement-description {
        font-size: 1.2rem;
        color: #7f8c8d;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .evenement-info p {
        font-size: 1.1rem;
        color: #34495e;
        margin: 8px 0;
    }

    .evenement-info strong {
        color: #2c3e50;
    }

    .detail {
        padding: 10px 20px;
        background-color: rgb(51, 5, 140);
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 1.1rem;
        margin: 20px;
        cursor: pointer;
        text-align: center;
    }

    .detail:hover {
        background-color: rgb(76, 12, 238);
        text-decoration: underline;
    }
</style>
