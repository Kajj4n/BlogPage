 <?php
    include("server.php");
    if($_SESSION['username'] == ""){
        echo "Error: You do not have permission to view this page. Log-in to gain access."; 
        exit;
    }
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">

    <title>Create Post</title>
 </head>
 <body>

    <header>
        <h2>/++\<br>&nbsp;---</h2>
        
        <?php if($_SESSION['flag']): ?>
            <div style="display: flex; align-items:center;">
                <h3 id="logout">LOGOUT</h3>
                <h3>&nbsp;| &nbsp;</h3>
                <h3><?php echo $_SESSION['username'];?></h3>
            </div>
        <?php endif; ?>

    </header>

    <div id="createp">
        <form action="create.php" method="post" style="display: grid; grid-template-rows: 50px 1fr 50px; grid-template-columns:1fr;">
            <input maxlength="90" type="text" name="title" placeholder="Title..." style="background-color: black; color:white; border:dashed white; width:auto;">
            <textarea name="content" placeholder="Text..." style="background-color: black; color:white; border:dashed white; height:auto; align-content: start;"></textarea>
            <input value="Post" name="create_post" type="submit" style="display: grid; justify-self:end; margin-top: 10px; border-radius:0; color:white; background-color:black; cursor:pointer;">
        </form>
    </div>

    <div id="logbox">
        <section>
            <p id="close">X</p>
            <form action="create.php" method="post">
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