<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="reg_connect.php" enctype="multipart/form-data">

        <div class="form">
            <h2>Registration</h2>

            <div class="inputbox">
                <input type="text" required="true" name="username" placeholder="Username" maxlength="25">
            </div>
            <div class="inputbox">
                <input type="Email" required="true" name="email" placeholder="Email Address">
            </div>
            <div class="inputbox">
                <input type="number" required="true" name="number" placeholder="Phone Number">
            </div>
            <div class="inputbox">
                <input type="number" required="true" name="nid" placeholder="NID Number">
            </div>
            <div class="inputbox">
                <input type="text" required="true" name="address" placeholder="Address">
            </div>
            <div class="inputbox">
                <input type="password" required="true" name="password" placeholder="Password" maxlength="8" minlength="6">
            </div>
            <div class="inputbox">
                <input type="password" required="true" name="con_password" placeholder="Confirm Password" maxlength="8" minlength="6">
            </div>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input">
            </div>
            <div class="link">
                <a href="login.php">Sign In</a>
            </div>
            <button type="submit" value="Signin">Sign Up</button>

        </div>



    </form>



</body>

</html>

