<?php require('../pdo.php');

    $stmt = $db->prepare('SELECT th_id, th_name, th_ref, th_cell, th_site, th_mail FROM shrinks WHERE th_id = :th_id');
    $stmt->execute(array(':th_id' => $_GET['id']));
    $row = $stmt->fetch();

    if ($row['th_id'] == '') {
        header('Location: ./');
        exit;
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bildterapihuset - <?php echo $row['th_name']; ?></title>
        <?php require('../config.php'); ?>

    </head>
    <body>
        <?php require('../navbar.php'); ?>
        <main>
            <!-- Wrapper begin -->
        <div class="wrapper">

        <!-- Shrink end -->
        <div class="shrink">
            <!-- Info begin -->
            <div class="shrink-info text">
                <?php
                    try {
                        echo '<h2>'.$row['th_name'].'</h2>';
                        include($row['th_ref'].'.php');
                        ?>
                <!-- Contact begin -->
                <div class="contact-info">
                    <span>Kontakt:</span>
                    <ul>
                        <?php
                            if ($row['th_mail'] != NULL) {
                                echo '<li>Mail: <a href="mailto:'.$row['th_mail'].'">'.$row["th_mail"].'</a></li>';
                            }
                            if ($row['th_site'] != NULL) {
                                echo '<li>Hemsida: <a href="'.$row['th_site'].'">'.$row["th_site"].'</a></li>';
                            }
                            if ($row['th_cell'] != NULL) {
                                echo '<li>Telefon: <a href="tel:'.$row['th_cell'].'">'.$row['th_cell'].'</a></li>';
                            }
                        } catch (PDOException $e) {echo $e->getMessage();}?>
                    </ul>
                </div>
                <!-- Contact end -->
            </div>
            <!-- Info end -->

        <!-- Subnav begin -->
         <div class="sub-nav">
             <!-- Image -->
            <?php echo '<img class="shrink-image" id="ThImage" src="/bildhus/includes/images/'.$row['th_ref'].'.png" alt="">';?>
            <!-- Image close -->
                <?php include 'index.php'; ?>
            </div>
            <!-- Subnav end -->
         </div>
         <!-- Shrink end -->
     </div>
 </main>
    </body>
</html>
