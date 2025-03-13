<!DOCTYPE html>
<html>
    <head>
        <title> GSB Group </title>
    </head>
<body>
    <h1> Nos Medicaments </h1>
<?php 
for ($i = 0; $i < count($string_decode); $i++)
    {
        echo ' <form action="index.php" method="post">';
        echo '<input type="hidden" id="id" name="id" value="'.$string_decode[$i]["id"].'">';
        echo '<label for ="nom"> nom : </label> <input type="text" id="nom" name="nom" value="'.$string_decode[$i]["nom"].'">';
        echo '<input type="submit" name="action" value="afficher">';
        echo "</form>";
    }   
    echo '</br> </br>'
    ?>
</body>
</html>