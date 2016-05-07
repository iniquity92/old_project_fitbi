<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Fitbi|Dashboard:Admin</title>
        
        <link type="text/css" href="/fitbi/styles/css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="/fitbi/styles/css/admin_dashboard.css" rel="stylesheet">
        <script type="text/javascript" src="/fitbi/styles/js/jquery-dev.js"></script>
        <script type="text/javascript" src="/fitbi/styles/js/jquery-migrate-dev.js"></script>
        <script type="application/javascript" src="/fitbi/styles/js/bootstrap.js"></script>
        <script type="text/javascript" src="/fitbi/static/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="/fitbi/static/jui/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="/fitbi/static/jui/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="/fitbi/static/jui/jquery-ui.structure.css">
        <link rel="stylesheet" type="text/css" href="/fitbi/static/jui/jquery-ui.theme.css">
        <!--script type="text/javascript" src="/fitbi/static/js/admin/dashboard.js"></script -->
        
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
            .admin-login-form-row{
                background-color:rgb(240,240,240);
            }
                    
        </style>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 title-row">
                    <h3>Menrva</h3>
                    <ul class="upper-left-glyphs">
                        <li><a href="#"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
                    </ul>
                   <ul class="upper-right-glyphs">
                       <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
                       <li><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
                       <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                       <li id="tray"><a href="#"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></a>
                            <div class="hidden-upper-right-glyphs" id="admin_extras">
                                <a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                            </div>
                            </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 admin-login-form-row">
                    <div class="text-center"><h3>Welcome <?php echo $_SESSION['username']; ?>!</h3></div>
                </div>
            </div>

        