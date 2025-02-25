<?php

require 'func.php'

if ( isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            header("Location: regis.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Halaman Login</title>

    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;">username /password salah</p>
    <?php endif; ?>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
            </ul>
        </form>
    </h1>
</body>
</html>