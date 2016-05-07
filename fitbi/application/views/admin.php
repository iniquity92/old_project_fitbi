<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Admin Login</title>
        
        <link type="text/css" href="/fitbi/styles/css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="/fitbi/styles/css/formsandlogins.css" rel="stylesheet">
        <script type="text/javascript" src="/fitbi/styles/js/jquery-dev.js"></script>
        <script type="text/javascript" src="/fitbi/styles/js/jquery-migrate-dev.js"></script>
        <script type="application/javascript" src="/fitbi/styles/js/bootstrap.js"></script>
        
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <style>
            div{
                border:0px solid black;
            }
            body{
                background-color:silver;
            }
            .title-row{
                background-color:rgb(253,75,0);
            }
            
            .search-row{
                height:200px;
                background-color:rgb(253,75,0);
            }
            
            .footer-row{
                height:600px;
                
            }
            .careers-row{
                height:200px;
                background-color:white;
            }
            
                    
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 title-row">
                    <h3>Site title</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 admin-login-form-row">
                    <div class="text-center"><h3>Welcome Admin!</h3></div>
                    <hr>
                    <form class="form" action="admin_login" name="admin_login_form" id="admin_login_form" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label><br />
                            <input type="text" class="input-lg input-login" name="username" id="username" required pattern="[A-Za-z0-9]+">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label><br />
                            <input type="password" class="input-lg input-login" id="password" name="password" required>
                        </div>
                         <div class="form-group">
                            <label for="email">Email:</label><br />
                            <input type="email" class="input-lg input-login" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="Sign In" class="btn btn-lg btn-default form-btn">
                            <a href="recover_password"><small>Forgot password?</small></a>
                        </div>
                    
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 footer-row"></div>
            </div>
        </div>
    </body>
</html>