<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL SHORTENER</title>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

</head>
<body>
    <div class="main-wrapp">
        <div class="main-container">
            <h1>SKRATI URL</h1>
            
            <form action="./inc/skrati.inc.php" method="post">
                <input type="text" autocomplete="off" placeholder="Ovdje unesite URL" name="url">
                <button type="submit" name='skrati-btn'> <i class="fas fa-cut"></i> </button>
            </form>
                <?php 
                    if(isset($_SESSION['error'])) {
                        echo "<p class='error'>".$_SESSION['error']."</p>";
                        unset($_SESSION['error']);
                    };
                    if(isset($_SESSION['feedback'])) {
                        echo "<h2>Kratki URL <i class='fas fa-chevron-circle-down'></i></h2>";
                        echo "<p class='short_url'>".$_SESSION['feedback']."</p>";
                        unset($_SESSION['feedback']);
                    };
                ?>
        </div>
    </div>
</body>
</html>