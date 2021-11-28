<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, word!</title>
    <style> 
        a:link { text-decoration: none !important; }
        a:visited { text-decoration: none !important; }
        a:hover { text-decoration: none !important; }
        a:active { text-decoration: none !important; }
    </style>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand bg-light" href="/">
            <img src="docker.svg" width="30" height="30" class="d-inline-block align-top" alt="" style="float: left;">
            Boilerplate-Docker
        </a>
    </nav>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-4">
        <h1 class="display-5 fw-bold">Hello, world!</h1>
        <p class="col-md-12 fs-4">This is a Simple Boilerplate Web Development Environment with Docker.</p>
        <p>It uses Apache with php 8.1 version, mysql 8.0 version and phpmyadmin. More on <a target="_blank" href="https://github.com/KyriakosG78/Boilerplate-Docker">github</a></p>
      </div>
    </div>

    <?php
    $dbhost = 'db';
    $dbname = 'MYSQLDB';
    $dbuser = 'DBUser';
    $dbpass = 'DBPassWord';

    try {
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputName">Test it ! Add a new name.</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Name">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>
        <?php

        if (isset($_POST["name"]) && !empty($_POST["name"])) {

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Users (name) VALUES ('" . $_POST["name"] . "')";

            if ($dbh->query($sql)) {
                ?>
                <div class="alert alert-success" role="alert">
                    New Record Inserted Successfully !
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Data not successfully Inserted.
                </div>
                <?php
            }
        } else if(isset($_POST["name"]) && empty($_POST["name"])) {
            ?>
            <div class="alert alert-danger" role="alert">
                Please first enter a name.
            </div>
            <?php
        }
    
        $sql = 'SELECT * From Users';
    
        echo "<ul class='list-group'>";
        foreach ($dbh->query($sql) as $row) {
            echo "<li class='list-group-item'>" . $row['id'] . " " . $row['name'] . "</li>";
        }
        echo "</ul>";

    } catch (PDOException $e) {
        echo "<div class='alert alert-warning' role='alert'>";
        echo "<b>Error message</b> : " . $e->getMessage();
        echo "</div>";
    }
    ?>
</div>

<?php
echo "<div style='background-color:#dddddd'>";
echo phpinfo();
echo "</div>";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>