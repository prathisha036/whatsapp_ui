<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">


<body class="vh-100 bg-dark d-flex justify-content-center align-items-center ">
    <div class="card bg-transparent shadow  w-25">
        <form action="#" method="post" class="card-body d-flex flex-column gap-2">
            <h1 class="text-center text-white">Login</h1>
            <p class="text-danger text-center"><?= $_GET["msg"]??""  ?></p>
            <div>
                <label for="" class="form-label text-white fs-5">username</label>
                <input type="text" class="form-control" name="username" reqired>
            </div>
            <div>
                <label for="" class="form-label text-white fs-5">password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button class="btn btn-success">Login</button>
            <a class="text-end" href="./registerForm.php">create account</a>
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $con=mysqli_connect("localhost","root","","chat_application");
            if(!$con){
                die("unable to connect database");
            }
            $username=$_POST["username"];
            $password=$_POST["password"];
            $query="select * from users where username='$username' and password='$password'";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                $_SESSION["username"]=$username;
                header("Location: dashboard.php");
            }else{
                header("Location: login.php?msg=invalid username or password!");
            }
        }

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>