

<!--/**-->
<!-- * 1. Importez le fichier SQL se trouvant dans le dossier SQL.-->
<!-- * 2. Connectez vous à votre base de données avec PHP-->
<!-- * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css-->
<!-- *    ex:  <div class="classe-css-utilisateur">-->
<!-- *              utilisateur 1, données ( nom, prenom, etc ... )-->
<!-- *         </div>-->
<!-- *         <div class="classe-css-utilisateur">-->
<!-- *              utilisateur 2, données ( nom, prenom, etc ... )-->
<!-- *         </div>-->
<!-- * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.-->
<!-- * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.-->
<!-- */-->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>194 exo</title>
</head>
<body>
    <?php
        try {

            $server = 'localhost';
            $db = 'exo_194';
            $user = 'root';
            $pass = '';

            $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8",$user,$pass);
            $stmt = $bdd->prepare("SELECT nom,prenom,ville,code_postal,mail from user");
            $state= $stmt->execute();
            if($state) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $ligne){
                    echo "<div class='utilisateur'>";
                    echo $ligne['nom']." ".$ligne['prenom']."<br>";
                    echo $ligne['ville']." ".$ligne['code_postal']."<br>";
                    echo $ligne['mail'];
                    echo "</div>" ."<br>";
                }
            }

            else {
                echo "quelque chose c'est mal passé !!!";
            }

            $stmt = $bdd->prepare("SELECT * from user ORDER BY id DESC ");
            $state= $stmt->execute();
            if($state) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $ligne){
                    echo "<div class='utilisateur'>";
                    echo $ligne['nom']." ".$ligne['prenom']."<br>";
                    echo $ligne['ville']." ".$ligne['code_postal']."<br>";
                    echo $ligne['mail'];
                    echo "</div>";
                }
            }

            else {
                echo "quelque chose c'est mal passé !!!";
            }

            $stmt = $bdd->prepare("SELECT * from user ORDER BY id DESC ");
            $state= $stmt->execute();
            if($state) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $ligne){
                    echo "<div class='utilisateur'>";
                    echo $ligne['nom']." ".$ligne['prenom']."<br>";
                    echo "</div>";
                }
            }

            else {
                echo "quelque chose c'est mal passé !!!";
            }

        }
        catch (PDOException $exception){
            echo $exception->getMessage();
        }
    ?>
</body>
</html>