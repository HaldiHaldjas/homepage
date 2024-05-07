<h2 class="text-center">Autorid</h2>
<?php

// sql lause, päring ja if lause

$sql = "SELECT * FROM authors";
$authors = $database->dbGetArray($sql); 

if ($authors !== false) {
    foreach ($authors as $author) {
        echo '<h2>' . $author['name'] . '</h2>';
        echo '<p>Tutvustus: ' . $author['introduction'] . '</p>';
        echo '<p>e-mail: ' . $author['email'] . '</p>';
        echo '<p>Telefon: ' . $author['phone'] . '</p>';
        echo '<p>Kodulehekülg: ' . $author['website'] . '</p>';
        echo '<hr>';
    }

} else {
    ?>
    <div class="alert alert-danger">Sobivaid kirjeid ei leitud</div>
    <?php
}
?>