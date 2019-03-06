<!DOCTYPE html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <div>
        <h2>Employees Details</h2>
    </div>

    <?php
        // Include config file
        require_once "config.php";
        
        // Attempt select query execution
        $sql = "SELECT * FROM users";
        if($result = mysqli_query($db, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Username</th>";
                            echo "<th>PWD-Hash</th>";
                            echo "<th>Created At</th>";                        
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
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

</body>

</html>