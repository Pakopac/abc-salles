<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>abc-salles</title>
</head>
<body>
    <form enctype="multipart/form-data" action="recherche.php" method="post">
        <input name="prenom" placeholder="Prénom" type="text">
        <button>Rechercher</button>
    </form>
</body>
</html>
<?php
$link = mysqli_connect("db-mysql-ams3-63185-do-user-6583675-0.b.db.ondigitalocean.com:25060", "user", "zc0bexxy0extsom1", "abc-salles");

$dump_test =  "SELECT label,type,genre FROM ref_prenoms WHERE label = 'Aaren'";
foreach  ($link->query($dump_test) as $row) {
    var_dump('Nom: '. $row['label']);
    var_dump('Type: '. $row['type']);
    var_dump('Genre: '. $row['genre']);
}

$count = 0;

if($_POST['prenom']){
    $sql =  "SELECT * FROM ref_prenoms WHERE label LIKE '". $_POST['prenom'] . "%' ORDER BY label";
    echo '<ul>';
    foreach  ($link->query($sql) as $row) {
        $type = "";
        $color = "";
        $count ++;
        switch ($row['type']) {
            case 0:
                $type = "ambigü";
                $color = "white";
                break;
            case 1:
                $type = "masculin";
                $color = "lightskyblue";
                break;
            case 2:
                $type = "feminin";
                $color = "lightpink";
                break;
        }
        echo "<li style='background: " . $color . "'> ". $row['label'] . " " . $type . " ";
        switch ($row['genre']) {
            case 1:
                echo "masculin ";
                break;
            case 2:
                echo "feminin ";
                break;
        }
        echo nl2br ($row['origin'] . "\n");
        echo "</li>";
    }
    echo "</ul>";
    echo "Size: ". $count;
}