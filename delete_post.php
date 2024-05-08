<?php
// Kas ids on olemas ja kas see on number
if (isset($_GET["ids"]) && is_numeric($_GET["ids"])) {
    // kui aadressiribalt teade, tuleb sql lause delete teha
    $sql = "DELETE FROM table1_posts WHERE id=".$_GET["ids"];
    // kustutab sql põhjal andmebaasist 
    if ($database->dbQuery($sql)) {
        $success = true;
        // kui urlil id=22 asendada teise numbriga, kustutab ära selle numbriga kande. 
        // selle vältimiseks tuleb ümber suunata 
        $url = $_SERVER["PHP_SELF"]."?page=delete_post";
        // header("Location: index.php?page=delete");
        header("Location: ".$url);

    } else {
        $success = false;
        header("Location: index.php?page=delete_post");
    }

}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Kustuta postitus</h3>
            <?php
            // Kui toimus kustutamine (faili alguses olev if lause on tõene!)
            if (isset($success) && $success) {
                ?> 
                <div class="alert alert-success">
                    Postitus on kustutatud! 
                </div>
                <?php
    
            } else if(isset($success) && !$success) {
                ?> 
                <div class="alert alert-danger">
                    Postituse kustutamine ei õnnestunud! 
                </div>
                <?php
            }

            // Näita tulemust
            // SQL lause, päring ja if lause kas tulemust on
            $sql = "SELECT * FROM table1_posts ORDER BY added DESC";
            $res = $database->dbGetArray($sql);
            if ($res !== false) {
            ?>
                <table class="table table-bordered table-striped table-hover mt-2">
                    <thead class="text-center">
                        <tr>
                            <th>Pealkiri</th>
                            <th>Autor</th>
                            <th>Sisu</th>
                            <th>Lisatud</th>
                            <th>Muudetud</th>
                            <th>Tegevus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // foreach-loop algus  
                        foreach ($res as $key=>$val) {   
                            // Format the added date
                            $added_date = new DateTime($val["added"]);
                            $added = $added_date->format("d.m.Y H:i:s");
                            // Format the modified date if it exists
                            if (isset($val['modified']) && $val['modified'] !== $val['added']) {
                                $modified_date = new DateTime($val["modified"]);
                                $modified = $modified_date->format("d.m.Y H:i:s");
                            } else {
                                // Set modified to 'Not modified' if it doesn't exist
                                $modified = 'Not modified';                  
                            }
                            ?>
                            <tr>
                                <!-- <td class="text-end"><?php echo ($key + 1); ?>.</td> -->
                                <td><?php echo $val["title"]; ?></td>
                                <td><?php echo $val["author"]; ?></td>
                                <td><?php echo $val["content"]; ?></td>
                                <td><?php echo $added; ?></td>
                                <td><?php echo $modified; ?></td>
                                <td class="text-center">
                                    <a href="?page=delete_post&ids=<?php echo $val["id"]?>" onclick="if (confirm('Kas oled kindel?')) { return true; } else { return false; }">
                                        <i class="fa-solid fa-trash-can text-danger" title="Delete"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        // foreach-loop lõpp
                        } 
                        ?>
                    </tbody>
                </table>
            <?php
            // if lause elsesa
            } else {
            ?>
                <p class="text-danger fs-4 text-center fw-bold">Postitusi ei leitud</p>
            <?php
            // if lause lõpp        
            }
            ?>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>
