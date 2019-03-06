<!DOCTYPE html>
<html>

<head>
    <title>Users Table Script</title>
</head>

<body>
    <?php
        $file = "users.sql";
        
        // Check the existence of file
        if(file_exists($file)){
            
            $lines = file($file);
            // Loop through our array, show HTML source as HTML source; and line numbers too.
            foreach ($lines as $line_num => $line) {
                echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />";
            }
        } else{
            echo "ERROR: File does not exist."."<br />";
        }
    ?>
    <a href="welcome.php">Welcome Page</a>
</body>

</html>