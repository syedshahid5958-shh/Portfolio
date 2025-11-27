<?php
session_start();

// 1. MySQL Connection
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) die("Connection failed");

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // 2. Set Cookie (Marks)
    setcookie("username", $name, time() + 86400, "/"); 
    
    // 3. Set Session (Marks)
    $_SESSION['last_login'] = date("h:i:sa");

    // MySQL Insert
    $sql = "INSERT INTO contacts (name, email) VALUES ('$name', '$email')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body style="padding: 50px; text-align: center;">
    <h1 class="heading">Admin <span class="green">Dashboard</span></h1>
    
    <div class="skill-box" style="margin: 20px auto; max-width: 600px;">
        <?php
        // Display Cookie
        if(isset($_COOKIE['username'])) { 
            echo "<h3>Welcome back, " . $_COOKIE['username'] . "</h3>"; 
        }
        // Display Session
        if(isset($_SESSION['last_login'])) {
            echo "<p>Session Active since: " . $_SESSION['last_login'] . "</p>";
        }

        // 4. Associative Array Implementation (Marks)
        $stats = array("Projects"=>"5 Completed", "Experience"=>"Fresher", "GitHub"=>"Active");
        
        echo "<br><table class='edu-table'><tr><th>Category</th><th>Status</th></tr>";
        foreach($stats as $key => $val) {
            echo "<tr><td>$key</td><td>$val</td></tr>";
        }
        echo "</table>";
        ?>
    </div>
    <a href="index.html" class="btn">Back to Home</a>
</body>
</html>