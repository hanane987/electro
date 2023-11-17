<?php
include('connection.php');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Utilisez des requêtes préparées pour éviter les injections SQL
    $sql = "SELECT * FROM user WHERE User = ? AND Pass = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->store_result();

        // Vérifiez le nombre de lignes retournées
        $count = $stmt->num_rows;

        // Fermez la déclaration préparée
        $stmt->close();

        // Affichez un message en fonction du résultat
        if ($count == 1) {
            echo "Les informations existent dans la base de données.";
            header("Location: products.php");
            exit();
           
        } else {
            echo "Login unsuccessful.";
        }
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }

    // Fermez la connexion à la base de données (optionnel, PHP le fermera automatiquement à la fin du script)
    $conn->close();
}
?>
