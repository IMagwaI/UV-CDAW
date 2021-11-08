<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prenom = "Pierre";
            $age = 28; 
            
            echo "La variable \$age contient : ";
            echo $age;
            echo "<br>";
            
            $age = 29; 
            echo "La variable \$age contient : ";
            echo $age;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>