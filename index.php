<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="styles.css"><!--link to the css file-->
</head>
<body>
    <div class="Login-container">
        <form class="Login-form">
            <div class="Login-header">
            <h2>Login</h2> 
            <div class="input-group">
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p class="signup-text">If you dont have an account,<a href="signup.html">Signup</a></p>
        </form>
    </div>
    <!-- <footer>&copy; 2024 Mbeya university of Science and Technology. All rights reserved</footer> -->
</body>
</html>