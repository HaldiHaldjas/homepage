<?php 
// Kas ids on ja kas on number
// kontroll, kas aadressireal on id ja kas see on number
if (isset($_GET["ids"]) && is_numeric($_GET["ids"])){
    $id = $_GET["ids"];
    if (is_numeric($id)){
        $sql = "SELECT * FROM table1_posts WHERE id = ".$id;
        $res = $database->dbGetArray($sql); // küsib andmeid 
        // $database->show($res); // TEST näitab tervet massiivi
    }
// vormis tuleb kontrollida, kas väärtus on sees. 
// kui name on olemas, näita vormis. 
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Muuda postitust</h3>

            <form action="<?php echo $_SERVER["PHP_SELF"];?>?page=change_posts" method="post">
                <div class="row mb-2">
                    <label for="title" class="col-sm-2 form-label mt-1 fw-bold">Pealkiri</label>
                    <div class="col">
                        <input type="text" name="title" value="<?php if(isset($res[1]["title"])) {echo $res[0]["title"];} ?>" id="title" class="form-control" required>
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
                        <textarea name="content" value="<?php if(isset($res[0]["content"])) {echo $res[0]["content"];} ?>" id="content" class="form-control">
                        </textarea> 
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
                        <input type="hidden" name="sid" value="<?php if(isset($res[0]["id"])) {echo $res[0]["id"];} ?>">
                        <input type="submit" name="submit" value="Muuda postitust" class="btn btn-warning form-control">                        
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-info form-control">Reseti vorm/Loobu muutmisest? Kustuta postitus!</button>
                    </div>

                </div>

            </form>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>