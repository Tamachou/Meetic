<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>my_meetic</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="Register_form_script.js"></script>
</head>
<body id="LoginForm">
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2> Sign-in</h2>
            </div>
            <form id="Login">
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                </div>
                <div class="date">
                    <input type="date" id="birthdate" name="trip-start" value="1976-07-22" min="0000-00-00" max="2018-12-31">
                </div>
                <div class="form-group">
                    <select id="gender" name="gender">
                        <option value="" disabled selected>Sexe</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputCity" placeholder="City">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" id="sign_in">Sign-in</button>
                <div class="return">
                    <a href="index.php">Return</a>
                </div>
                <div id="error"></div>

            </form>
        </div>
</body>
</html>