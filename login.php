<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="log_connect.php" method="post">

        <div class="form">
            <h2>Sign In</h2>
            <div class="inputbox">
                <input type="text" required="required" name="email" placeholder="Email">

            </div>
            <div class="inputbox">
                <input type="password" required="required" name="password" placeholder="Password">

            </div>
            <div class="link">
                <a href="#">Forget password</a>
                <a href="registration.php">Registration</a>
            </div>

            <button type="submit" name="login">Log in</button>

        </div>



    </form>


</body>

</html>