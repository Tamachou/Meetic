<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>my_meetic</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet/search_style.css">
    <link rel="stylesheet" type="text/css" href="Stylesheet/navbar_style.css">
    <link rel="stylesheet" type="text/css" href="Stylesheet/slideshow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="search_script.js"></script>
    <script type="text/javascript" src="navbar_script.js"></script>
    <script type="text/javascript" src="slideshow_script.js"></script>

</head>
<body>
<div id="navbar">
    <nav>
        <ul class="topnav">
            <li>
                <p><i class="fa fa-bars"></i></p>
                <ul class="subnav">
                    <li><a href="user_account.php">Profile</a></li>
                    <li><a href="search.php">Research</a></li>
                    <li><a href="logOff_script.php">LogOff</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<div class="container emp-profile">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <p>I'm looking for <select id="gender" name="gender">
                    <option value="" disabled selected></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select></p>
            <p>Age <select id="age" name="age">
                    <option value="" disabled selected></option>
                    <option value="18-25">18-25</option>
                    <option value="25-35">25-35</option>
                    <option value="35-45">35-45</option>
                    <option value="45+">45+</option>
                </select></p>
            <p>From <select id="city" name="city">
                    <option value="default"> Everywhere</option>
                    <?php
                    include 'search_city_script.php';
                    $var = new location();
                    $allCity = $var->getAllCity();
                    foreach($allCity as $city){
                        $city = $city['city'];
                        echo "<option value=$city>". ucfirst($city) ."</option>";
                    }
                    ?>
                </select>
                <select id="cityTwo" name="cityTwo">
                    <option value="default"> </option>
                    <?php
                    $funct = new location();
                    $cities = $funct->getAllCity();
                    foreach($cities as $location){
                        $location = $location['city'];
                        echo "<option value=$location>". ucfirst($location) ."</option>";
                    }
                    ?>
                </select></p>
        </div>
        <div id="error"></div>
        <button type="submit" id="research" name="research" class="btn btn-primary">Search</button>
    </form>
</div>
<div id="result" class="container emp-profile">
</div>
</body>
