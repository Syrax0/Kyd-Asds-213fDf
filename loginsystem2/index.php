<!DOCTYPE html>
<html>
<title>Index one</title>
<?php
    include_once 'header.php';
    
?>

<body>
    
    <section class="main-container">
        <div class="main-wrapper">

            <h2>Home</h2>
            <?php
                if (isset($_SESSION['u_id'])) {
                    echo "You are logged in, Test WORK";    
                }
            ?>
        </div>
    </section>  

    
    
</body>
    
<?php
    include_once 'footer.php';
?>
    
</html>
