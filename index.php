<?php
session_start();
include 'assets/server/connection.php';

if (isset($_SESSION['logged_in'])) {
    header('location:dashboard.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['username'];
    $password = ($_POST['password_admin']);

    $query = "SELECT * FROM admin WHERE username = ? AND password_admin = ?";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result($admin_id, $user_name, $admin_email, $admin_password);
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['id_admin'] = $admin_id;
            $_SESSION['username'] = $user_name;
            $_SESSION['email_admin'] = $admin_email;
            $_SESSION['password_admin'] = $admin_password;
            $_SESSION['logged_in'] = true;

            header('location:dashboard.php?message=Logged in successfully');
        } else {
            header('location:index.php?error=Could not verify your account');
        }
    } else {
        // Error catch
        header('location: index.php?error=Something went wrong!');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" type="image/png" href="assets/img/hero.png">
   

</head>

<body>
    <!-- Login Section -->
    <section class="container">
        <form action="index.php" method="POST">
            <?php if (isset($_GET['error'])) ?>
            <div role="alert">
                <?php
                if (isset($_GET['error'])) {
                    echo $_GET['error'];
                }
                ?>
            </div>
            <div class="mb-3">
                <div > <img src="assets/img/sigesit.png" alt="sigesit"></div>
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email ">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password_admin" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-outline-primary" name="login_btn">Login</button>
            <hr>
        </form>
    </section>

    <!-- Registration Section -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4c7e0de464.js" crossorigin="anonymous"></script>
</body>

</html>