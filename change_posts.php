<h2 class="text-left">Kõik postitused</h2>
<?php

// sql lause, päring ja if lause
// nimi tuleks muuta all_posts.php

$sql = "SELECT * FROM table1_posts ORDER BY added DESC LIMIT 10";
$posts = $database->dbGetArray($sql); 
echo $sql;
?>

<table class="table table-hover table-bordered">
    <thead>
        <tr class="text-center">
            <th>Pealkiri</th>
            <th>Autor</th>
            <th>Lisatud</th>
            <th>Muudetud</th>
            <th>Tegevus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($posts as $post){
            $modified_date = isset($post['modified']) && $post['modified'] !== $post['added'] ? date('j. F, Y H:i', strtotime($post['modified'])) : 'Not modified';
            $added_date = date('j. F, Y H:i', strtotime($post['added']));
        ?>
        <tr>
            <td><?php echo $post['title']; ?></td>
            <td><?php echo $post['author']; ?></td>
            <td><?php echo $added_date; ?></td>
            <td><?php echo $modified_date; ?></td>
            <td>
                <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=change_posts_by_id" style="display: inline-block; margin-right: 10px;">
                    <i class="fa-solid fa-pen-to-square text-warning"></i>
                </a>
                <a class="nav-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=delete_post" style="display: inline-block;">
                    <i class="fa-regular fa-trash-can text-danger"></i>
                </a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>
