<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>my_meetic</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet/user_account_style.css">
    <link rel="stylesheet" type="text/css" href="Stylesheet/navbar_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="user_account_edit_script.js"></script>
    <script type="text/javascript" src="navbar_script.js"></script>
    <?php
    include 'user_account_script.php';
    $var = new loggedOn();
    $finalstat = $var->getInfo();
    ?>
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
<!--   <form enctype="multipart/form-data"> --->
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://i.postimg.cc/X7Rchj9f/Sans-titre-1.png" alt="Profile picture"/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php echo $finalstat[0]["last_name"] . " "; echo $finalstat[0]["name"]?>
                    </h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist"></ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" id="cancel" name="btnAddMore" value="Return"/>
                <input type="submit" class="profile-edit-btn" id ="save" name="btnDel" value="Save"/>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <form id="res_form">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="<?php echo $finalstat[0]["name"] ?>">
                                    </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Last Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="<?php echo $finalstat[0]["last_name"]?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Birth date</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <input type="date" id="birthdate" name="trip-start" value="<?php echo $finalstat[0]["birth_date"] ?>" min="0000-00-00" max="2018-12-31">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Genre</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <select id="gender" name="gender">
                                        <option value="" disabled selected><?php echo $finalstat[0]["sex"] ?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>City</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="<?php echo $finalstat[0]["city"] ?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="<?php echo $finalstat[0]["mail"] ?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Password</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder=" New Password">
                                </p>
                            </div>
                            <div id="error"></div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
