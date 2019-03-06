<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>

<head>
    <title>Welcome</title>
</head>

<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>

    <div>
        <h2>Here you can see a list of already registered users:</h2>
    </div>

    <?php
        // Include config file
        require_once "config.php";
        
        // Attempt select query execution
        $sql = "SELECT id, username, created_at FROM users";
        if($result = mysqli_query($db, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Username</th>";
                            echo "<th>Created At</th>";                        
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";                            
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "<p>No records were found.</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }

        // Close connection
        mysqli_close($db);
    ?>

    <p>
        <a href="logout.php">Sign Out of Your Account</a><br>
        <a href="users.php">Show Create Users Table Script</a>
    </p>
</body>

</html>