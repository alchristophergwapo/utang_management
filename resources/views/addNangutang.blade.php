<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Add Palautang</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{ url('addUtang')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                            <input type="text" name="first_name" id="name" placeholder="First Name" required />
                        </div>
                        <div class="form-group">
                            <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                            <input type="text" name="middle_name" id="name" placeholder="Middle Name" required />
                        </div>
                        <div class="form-group">
                            <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                            <input type="text" name="last_name" id="name" placeholder="Last Name" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="item" placeholder="Item ...">
                        </div>
                        <div class="form-group">
                            <input type="number" name="quantity" id="quantity" placeholder="Quantity ....." required />
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" id="price" placeholder="Price ....." required />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="add_palautang" id="signup" class="form-submit" value="Add" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>

</body>

</html>