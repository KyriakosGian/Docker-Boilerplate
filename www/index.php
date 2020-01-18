<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
 <title>Hello containers</title>

</head>
<body>
    <div class="container">

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="docker.svg" width="30" height="30" class="d-inline-block align-top" alt="" style="float: left;">
                SWDBD
            </a>
        </nav>

        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a Simple Boilerplate Web Development Environment with Docker.</p>
            <hr class="my-4">
            <p>It uses Apache with php 7.4 version, mysql 8.0 version and phpmyadmin.</p>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputName">Add a new name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <?php
            $dbhost = 'db';
            $dbname='MYSQLDB';
            $dbuser = 'DBUser';
            $dbpass = 'DBPassWord';

            try {
                $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            
            if(isset($_POST["name"])){
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $sql = "INSERT INTO Users (name) VALUES ('".$_POST["name"]."')";
                if ($dbh->query($sql)) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            New Record Inserted Successfully !
                        </div>
                    <?php
                }
                else{
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
                echo "<li class='list-group-item'>" . $row['id'] . " " . $row['name']  . "</li>";
            }
            echo "</ul>";

            echo phpinfo();
        ?>

    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
