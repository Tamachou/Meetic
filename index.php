<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>my_meetic</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="index_script.js"></script>
    <?php include 'index_script.php'; ?>
</head>
<body id="LoginForm">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2> Login</h2>
                </div>
                <form id="Login" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                    </div>
                    <div class="register">
                        <a href="Register_form.php">Not a member yet?</a>
                    </div>
                    <button type="submit" id="log_in" name="log_in" class="btn btn-primary">Login</button>
                    <div id="error"></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>