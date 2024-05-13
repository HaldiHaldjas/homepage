<h2 class="text-center">Autorid</h2>
<?php

require_once 'config/connection.php';

// sql lause, päring ja if lause

$sql = "SELECT * FROM authors";
$stmt = $database->dbQuery($sql); 
// $authors = $database->dbGetArray($sql); 

$stmt->execute();

$authors = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($authors) {
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
<?php
// Lisa uus autor

if (isset($_POST["submit"])) {
    // võtame vormi sisestatud andmed ja paneme muutujatesse - 2 moodi 
    $name = $_POST["name"];
    $introduction = $_POST["introduction"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $website = $_POST["website"];

    $sql = "INSERT INTO authors 
    (name, introduction, email, phone, website)
    VALUES (" . $database->dbFix($name) . ", " . $database->dbFix($introduction) . ", " . $database->dbFix($email) . ", " . $database->dbFix($phone) . ", " . $database->dbFix($website) . ");";
    
    if ($database->dbQuery($sql)) {
        $success = true;
        // kuna laeb uuesti lehe, kustutame posti sisu ära
        $_POST = array();
        // php enda funktsioon 
    } else {
        $success = false;
    }
}
?>
<div>
<div class="row">
    <div class="col-md-8 mx-auto">
        <h2 class="text-center">Lisa uus autor</h2>

        <?php
        // Siia tuleb kas roheline või punane teavituskast lisamise kohta
        // if lause, kas läks andmebaasi kirjutamine läbi
        // kas muutuja on olemas ja kas success on true
        // kas läks andmebaasi või ei läinud 
        if (isset($success) && $success) {
            ?> 
            <div class="alert alert-success">
                Autori lisamine õnnestus! 
            </div>
            <?php

        } else if(isset($success) && !$success) {
            ?> 
            <div class="alert alert-danger">
                Autori lisamine ei õnnestunud! 
            </div>
            <?php

        }

        ?>

        <form action="#" method="post">
            <div class="row mb-2">
                <label for="name" class="col-sm-2 form-label mt-1 fw-bold">Nimi</label>
                <div class="col">
                    <input type="text" name="name" value="" id="name" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="introduction" class="col-sm-2 form-label mt-1 fw-bold">Tutvustus</label>
                <div class="col">
                    <input type="text" name="introduction" value="" id="introduction" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-sm-2 form-label mt-1 fw-bold">e-mail</label>
                <div class="col">
                    <input type="text" name="email" value="" id="email" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone" class="col-sm-2 form-label mt-1 fw-bold">Telefon</label>
                <div class="col">
                    <input type="text" name="phone" value="" id="image" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
            <label for="website" class="col-sm-2 form-label mt-1 fw-bold">Kodulehekülg</label>
            <div class="col">
                <input type="text" name="website" value="" id="website" class="form-control">
            </div>
            
        </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="submit" name="submit" value="Lisa" class="btn btn-success form-control">
                </div>
                <div class="col">
                    <button type="reset" class="btn btn-warning form-control">Loobu</button>
                </div>

            </div>
        </form>
    </div>
    </form>
</div>
</div>