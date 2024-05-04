<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
            padding: 0px 20px;
        }
    </style>
</head>

<body>
    <form class="form-horizontal" action="process_new_user.php" method="get">
        <fieldset>
            <legend>Register new account</legend>
            <div class="form-group"> <label class="col-md-4 control-label" for="keyword">New username</label>
                <div class="col-md-5"> <input id="username" type="text" name="username" placeholder="your name"
                        class="form-control input-md" required="">
                    <p class="help-block">Create a new login name</p>
                </div>
            </div>
            <div class="form-group" style="text-align: center; color: red;">
                <p>Passwords must be at least 8 characters, contain at least 1 number, and contain at least 1 of these special characters:  ! @ # $ % ^ & * ( )</p>
            </div>
            <div class="form-group"> <label class="col-md-4 control-label" for="keyword">New password</label>
                <div class="col-md-5"> <input id="password" type="password" name="password" placeholder=""
                        class="form-control input-md" required="">
                    <p class="help-block">Create a new password</p>
                </div>
            </div>
            <div class="form-group"> <label class="col-md-4 control-label" for="keyword">Confirm password</label>
                <div class="col-md-5"> <input id="password-confirm" type="password" name="password-confirm"
                        placeholder="" class="form-control input-md" required="">
                    <p class="help-block">Retype the password</p>
                </div>
            </div>
            <div class="form-group"> <label for="submit" class="col-md-4 control-label"></label>
                <div class-"col-md-4"> <button id="submit" name="submit" class="btn btn-primary">Create User</button> </div>
            </div>
    </form>

<div>
    <a href="index.php">Home</a>
    <br>
    <br>
    <a href="login_form.php">Login</a>
</div>
</body>

</html>