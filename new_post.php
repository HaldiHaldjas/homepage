<?php
// Kas submit nuppu on vajutatud

if (isset($_POST["submit"])) {
    // võtame vormi sisestatud andmed ja paneme muutujatesse - 2 moodi 
    $title = $_POST["title"];
    $author = $_POST["author"];
    $content = $_POST["content"];
    $image = $_POST["img_link"];
    $added = $database->getVar("added");
    $modified = $database->getVar("modified");
    if (empty($image)) {
        $image = "NULL";
    }

    $sql = "INSERT INTO table1_posts 
    (title, author, content, img_link, added, modified)
    VALUES (" . $database->dbFix($title) . ", " . $database->dbFix($author) . ", " . $database->dbFix($content) . ", " . $database->dbFix($image) . ", NOW(), NOW())";
    // kontrolliks echo $sql;
    
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
<div class="row">
    <div class="col-md-8 mx-auto">
        <h2 class="text-center">Loo uus postitus</h2>

        <?php
        // Siia tuleb kas roheline või punane teavituskast lisamise kohta
        // if lause, kas läks andmebaasi kirjutamine läbi
        // kas muutuja on olemas ja kas success on true
        // kas läks andmebaasi või ei läinud 
        if (isset($success) && $success) {
            ?> 
            <div class="alert alert-success">
                Postitus õnnestus! 
            </div>
            <?php

        } else if(isset($success) && !$success) {
            ?> 
            <div class="alert alert-danger">
                Postitamine ei õnnestunud! 
            </div>
            <?php

        }

        ?>

        <form action="#" method="post">
            <div class="row mb-2">
                <label for="title" class="col-sm-2 form-label mt-1 fw-bold">Pealkiri</label>
                <div class="col">
                    <input type="text" name="title" value="" id="title" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="author" class="col-sm-2 form-label mt-1 fw-bold">Autor</label>
                <div class="col">
                    <input type="text" name="author" value="" id="author" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="content" class="col-sm-2 form-label mt-1 fw-bold">Sisu</label>
                <div class="col">
                    <textarea name="content" value="" id="content" class="form-control" rows="10" cols="50" required>
                    </textarea>    
                </div>
            </div>

            <div class="row mb-2">
                <label for="image" class="col-sm-2 form-label mt-1 fw-bold">Pildi link</label>
                <div class="col">
                    <input type="text" name="img_link" value="" id="image" class="form-control">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="submit" name="submit" value="Avalda postitus" class="btn btn-success form-control">
                </div>
                <div class="col">
                    <button type="reset" class="btn btn-warning form-control">Tühjenda</button>
                </div>

            </div>
        </form>
    </div>
</div>