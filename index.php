 
 <?php
    include("server.php");
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">

    <title>Home</title>
 </head>
 <body>

    <header>
        <h2>/++\<br>&nbsp;---</h2>
        
        <?php if($_SESSION['flag']): ?>
            <div style="display: flex; align-items:center;">
                <h3 id="create"><a style="text-decoration: none;" href="create.php">+ CREATE</a> &nbsp;</h3>
                <h3 id="logout">LOGOUT</h3>
                <h3>&nbsp;| &nbsp;</h3>
                <h3 id="crnt-usr"><?php echo $_SESSION['username'];?></h3>
            </div>
                    <?php else: ?>
                        <h3 id="login">LOGIN</h3>
        <?php endif; ?>
    </header>

    <div id="main">
        <?php
        // Fetch all posts from the database, ordered by the latest first
        $query = "SELECT * FROM posts ORDER BY created_at DESC";
        $results = mysqli_query($db, $query);

        // Loop through each post and display it
        while($post = mysqli_fetch_assoc($results)): ?>
            <div class="post" style="margin: 20px 0; padding: 10px;">
                <h3 style="color: white; width: 48vw; word-wrap: break-word;"><?php echo htmlspecialchars($post['title']); ?></h3>
                <p style="color: white;  width: 48vw; word-wrap: break-word;"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                <p><small style="color: grey;">Posted by <?php echo $post['username']; ?> on <?php echo $post['created_at']; ?></small></p>
            </div>
        <?php endwhile; ?>        
    </div>

    <div id="logbox">
        <section>
            <p id="close">X</p>
            <form action="index.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="submit" value="Log-In" >
            </form>

            <h4 style="color: red;"><?php echo $_SESSION['error'];?></h4>
        </section>
    </div>

    <script src="script.js"></script>
 </body>
 </html>