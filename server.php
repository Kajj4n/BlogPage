<?php
    ini_set("session.cookie_lifetime", 0);
    session_start();
    $username = "";
    $password = "";
    
    if (!isset($_SESSION["username"])) {
        $_SESSION["username"] = "";
        $_SESSION["flag"] = false;
    }
    
    if (!isset($_SESSION["error"])) {
        $_SESSION["error"] = "";
    }

    $db = mysqli_connect("localhost", "root", "ginklai123", "login");

    if(isset($_POST["submit"])){
        
        $username = mysqli_real_escape_string($db, $_POST["username"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);

        if (empty($password) && empty($username)) {
            $_SESSION["error"] = "Password & username are missing";
            return;
        }

        elseif (empty($username)){
            $_SESSION["error"] = "Username is missing";
            return;
        }

        elseif (empty($password)) {
            $_SESSION["error"] = "Password is missing";
            return;
        }


        else{
            $_SESSION["error"] = "";
  	        $query = "SELECT * FROM users WHERE user='$username' AND password='$password'";
              $results = mysqli_query($db, $query);
              if (mysqli_num_rows($results)) {
                $_SESSION["username"] = $username;
                $_SESSION["flag"] = true;

            } else $_SESSION["error"] = "Wrong username/password combination";

        }
    }

    if(isset($_POST["create_post"])){
        $title = mysqli_real_escape_string($db, $_POST["title"]);
        $content = mysqli_real_escape_string($db, $_POST["content"]);
    
        // Check for empty fields
        if (empty($title) || empty($content)) {
            $_SESSION["error"] = "Both title and content are required!";
        } else {
            // Insert post into database
            $username = $_SESSION["username"]; // Current logged-in user
            $query = "INSERT INTO posts (title, content, username) VALUES ('$title', '$content', '$username')";
            
            if (mysqli_query($db, $query)) {
                // Redirect to index.php after successful post creation
                header("Location: index.php");
                exit();
            } else {
                $_SESSION["error"] = "Failed to create post. Please try again.";
            }
        }
    }
    
?>


