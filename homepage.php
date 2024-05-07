<h2 class="text-left">Avaleht</h2>
<?php
// Lisame siia leheküljendamise
// include 'paginate.php';
// sql lause, päring ja if lause

$sql = "SELECT * FROM table1_posts ORDER BY added DESC LIMIT 5";
$posts = $database->dbGetArray($sql); 

if ($posts !== false) {
    foreach ($posts as $post) {
        echo '<h3>' . $post['title'] . '</h3>';
        echo '<p>Autor: ' . $post['author'] . '</p>';

        // Check if content exists before echoing
        if (isset($post['content'])) {
            echo '<p style="width: 80%; text-align: justify;">' . $post['content'] . '</p>';
        } else {
            echo '<p>No content available.</p>';
        }

        // Display the image if it exists
        if (!empty($post['img_link'])) {
            echo '<img src="' . $post['img_link'] . '" alt="Post Image" style="max-width: 80%; height: auto;">';
        } else {
            echo '<p>No image available.</p>';
        }

        // Display the added date
/*         if (isset($post['added'])) {
            $added_date = date('j. F, Y', strtotime($post['added']));
            echo '<p>Lisatud: ' . $added_date . '</p>';
        }
         */
        // Display the modified date if it exists
        if (isset($post['modified']) && $post['modified'] !== $post['added']) {
            $modified_date = date('j. F, Y H:i', strtotime($post['modified']));
            echo '<p>Muudetud: ' . $modified_date . '</p>';
        } else {
            // Display only the added date
            $added_date = date('j. F, Y H:i', strtotime($post['added']));
            echo '<p>Lisatud: ' . $added_date . '</p>';
        }
    }

} else {
    ?>
    <div class="alert alert-danger">Sobivaid kirjeid ei leitud</div>
    <?php
}
?>
