<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Form</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Update Utang</h2>
                        <form method="POST" class="register-form" id="register-form" action="Update_nangutang.php">
                            <div>
                                <input name="id" type="text" value=<?php echo $id?> hidden/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input type="text" name="first_name" id="first_name" value=<?php echo $row["first_name"]?> required/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input type="text" name="middle_name" id="middle_name" value=<?php print_r($row["middle_name"])?> required/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input type="text" name="last_name" id="last_name" value=<?php echo $row["last_name"]?> required/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="email"><i class="zmdi zmdi-email"></i></label> -->
                                <input type="text" name="item" id="item" value=<?php echo $row["item"]?> required/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="pass"><i class="zmdi zmdi-lock"></i></label> -->
                                <input type="number" name="quantity" id="quantity" value=<?php echo $row["quantity"]?> required/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label> -->
                                <input type="number" name="price" id="price" value=<?php echo $row["price"]?> required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="update" id="signup" class="form-submit" value="Update"/>
                            </div>
                        </form>
                    </div>

                    <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <!-- <a href="Login.php" class="signup-image-link">I am already member</a> -->
                </div>
                    
                </div>
            </div>
        </section>

    </div>

</body>
</html>