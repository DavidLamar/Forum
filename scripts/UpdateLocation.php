<?php
        session_start();
        $username = $_SESSION["username"];
        $location = $_POST["location"];

        $servername = "cis.gvsu.edu";
        $dbusername = "lamard";
        $dbpassword = "lamard7742";
        $dbname = "lamard";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if($conn->connect_error) {
                die("Connection Failed");
        }

        $selectUser = "SELECT * FROM users WHERE username = '" . mysql_real_escape_string($username) . "';";
        $results = $conn->query($selectUser);

        $user = $results->fetch_assoc();

        $update = "UPDATE users SET addr='$location' WHERE username='$username';";
        $conn->query($update);
        $conn->query("COMMIT;");

	header("Location: /~lamard/Forum/Account.php");
?>
