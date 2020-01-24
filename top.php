<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/StyleSheet.css">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                if(@$_SESSION)
                {
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
                ?>
            </ul>
        </nav>
    </head>