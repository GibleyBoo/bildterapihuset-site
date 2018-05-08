<?php #require('../pdo.php');
if (!isset($db)) {
    require('../pdo.php');

    # code...
}
/*
    $stmt = $db->prepare('SELECT th_id, , th_name, th_ref, th_mail FROM shrinks WHERE th_id = :th_id');
    $stmt->execute(array(':th_id' => $_GET['id']));
    $row = $stmt->fetch();

    if ($row['th_id'] == '') {
        header('Location: ./');
        exit;
    }*/
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Vi Bildterapeuter</title>
        <?php include('../config.php'); ?>
    </head>
    <body>
        <?php require('../navbar.php'); ?>
    <main>
        <!-- Wrapper begin -->
        <div class="wrapper">

        <ul class="employees">
            <?php
                try {

                    $stmt = $db->query('SELECT th_id, th_name FROM shrinks ORDER BY th_id DESC');
                    while ($row = $stmt->fetch()) {
                        echo '<li>';
                        echo '<a href="view_shrink.php?id='.$row['th_id'].'">'.$row["th_name"].'</a>';
                        echo '</li>';
                    }

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

             ?>
        </ul>
    </div>
    <!-- Wrapper end -->
</main>
    </body>
</html>
