<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Hello word</title>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="docker.svg" width="30" height="30" class="d-inline-block align-top" alt="" style="float: left;">
            Boilerplate-Docker
        </a>
    </nav>

    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a Simple Boilerplate Web Development Environment with Docker.</p>
        <p>It uses Apache with php 7.4 version, mysql 8.0 version and phpmyadmin. More on <a target="_blank" href="https://github.com/KyriakosG78/Boilerplate-Docker">github
        </p>
        </a>
    </div>

    <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputName">Test it ! Add a new name.</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    $dbhost = 'db';
    $dbname = 'MYSQLDB';
    $dbuser = 'DBUser';
    $dbpass = 'DBPassWord';

    try {
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if (isset($_POST["name"])) {
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
    }

    $sql = 'SELECT * From Users';

    echo "<ul class='list-group'>";
    foreach ($dbh->query($sql) as $row) {
        echo "<li class='list-group-item'>" . $row['id'] . " " . $row['name'] . "</li>";
    }
    echo "</ul>";

    echo phpinfo();
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>