<?php

require_once 'config/connection.php';

// kontroll, kas aadressireal on id ja kas see on number
if (isset($_GET["ids"]) && is_numeric($_GET["ids"])){
    $id = $_GET["ids"];
    if (is_numeric($id)){

    $sql = "SELECT * FROM table1_posts WHERE id = ".$id;
    $res = $database->dbGetArray($sql); // küsib db andmeid 
    echo $sql; // testiks
    $database->show($res); // TEST näitab tervet massiivi

    
    } 
    // Kas submit on vajutatud
    if (isset($_POST["submit"])){
        $title = htmlspecialchars(trim($_POST["title"]));
        $author = htmlspecialchars(trim($_POST["author"]));
        $content = htmlspecialchars(trim($_POST["content"]));
        $img_link = filter_var($_POST["img_link"], FILTER_SANITIZE_URL); 

        // prepare the SQL statement
        $updateSql = "UPDATE table1_posts 
            SET 
            title = ?,
            author = ?,
            content = ?,
            img_link = ?,
            modified = NOW()
            WHERE 
            id = ?";

        try {
            $stmt = $database->dbQuery($updateSql);
            $stmt->bindParam(1, $title, PDO::PARAM_STR);
            $stmt->bindParam(2, $author, PDO::PARAM_STR);
            $stmt->bindParam(3, $content, PDO::PARAM_STR);
            $stmt->bindParam(4, $img_link, PDO::PARAM_STR);
            $stmt->bindParam(5, $id, PDO::PARAM_INT); // Bind ID as well

            $stmt->execute();
            $success = true;
            $_POST = array();
        } catch (PDOException $e) {
            $success = false;
            echo "Error updating post: " . $e->getMessage();
        }
        
    }
        // Prepare the SQL statement
        // $updateSql = "UPDATE table1_posts 
        //     SET 
        //     title = '" . $title . "',
        //     author = '" . $author . "',
        //     content = '" . $content . "',
        //     img_link = '" . $img_link . "',
        //     modified = NOW()
        //     WHERE 
        //     id = '?'";
            // id = " . $id;

            // $sql = "INSERT INTO table1_posts 
            // (title, author, content, img_link, added, modified)
            // VALUES (" . $database->dbFix($title) . ", " . $database->dbFix($author) . ", " . $database->dbFix($content) . ", " . $database->dbFix($image) . ", NOW(), NOW())";
            // // kontrolliks echo $sql;
            
            // if ($database->dbQuery($sql)) {
            //     $success = true;
            //     // kuna laeb uuesti lehe, kustutame posti sisu ära
            //     $_POST = array();
            //     // php enda funktsioon 
            // } else {
            //     $success = false;
            // }

    // teeb andmebaasi päringu ja kontroll
    // if($database->dbQuery($updateSql)) {
    //     $success = true;
    //     $_POST = array();
    //     $database->show($res); // TEST näitab tervet massiivi
    // } else {
    //     $success = false;
    //     echo error_log("no luck");
    // }
    
    echo $sql; // testiks
    $res = $database->dbGetArray($sql);
    } 


?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Muuda postitust</h3>

            <form action="<?php echo $_SERVER["PHP_SELF"];?>?page=change_posts_by_id" method="post">
                <div class="row mb-2">
                    <label for="title" class="col-sm-2 form-label mt-1 fw-bold">Pealkiri</label>
                    <div class="col">
                        <input type="text" name="title" value="<?php if(isset($res[0]["title"])) {echo $res[0]["title"];} ?>" id="title" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="author" class="col-sm-2 form-label mt-1 fw-bold">Autor</label>
                    <div class="col">
                        <input type="text" name="author" value="<?php if(isset($res[0]["author"])) {echo $res[0]["author"];} ?>" id="author" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="content" class="col-sm-2 form-label mt-1 fw-bold">Sisu</label>
                    <div class="col">
                        <textarea name="content" id="content" class="form-control"><?php if(isset($res[0]["content"])) {echo $res[0]["content"];} ?></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="image" class="col-sm-2 form-label mt-1 fw-bold">Pildi link</label>
                    <div class="col">
                        <input type="text" name="img_link" value="<?php if(isset($res[0]["img_link"])) {echo $res[0]["img_link"];} ?>" id="image" class="form-control">
                    </div>
                </div>
            
                <div class="row mb-2">
                <div class="col">
                    <input type="submit" name="submit" value="Muuda postitust" class="btn btn-warning form-control">                        
                </div>
<!--                     <div class="col">
                        <input type="hidden" name="sid" value="<?php if(isset($res[0]["id"])) {echo $res[0]["id"];} ?>">
                        <input type="submit" name="submit" value="Muuda postitust" class="btn btn-warning form-control">                        
                    </div> -->
                    <!-- <div class="col">
                        <button type="reset" class="btn btn-info form-control">Loobu muutmisest? Kustuta postitus!</button>
                    </div> -->

                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
