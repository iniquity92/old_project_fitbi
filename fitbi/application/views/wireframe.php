<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Fitness website wireframe</title>
        
        <link type="text/css" href="/fitbi/styles/css/bootstrap.css" rel="stylesheet">
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
            .pro1,.pro2,.pro3{
                height:300px;
                background-color:lightgray;
            
            }
            .search-row{
                height:200px;
                background-color:orange;
            }
            .carousel-row{
                height:400px;
                background-color:orange;
            }
            .support-row{
                height:200px;
                background-color:white;
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
            <div class="row" style="background-color:white;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 style="color:orange;">Title and logins</h1>
                    
                </div>
            </div>
            <div class="row">
                <div class="search-row col-md-12 col-xs-12 col-sm-12"></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12 pro1">
                    <h3>Rehabilitation</h1>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 pro2">
                    <h3>Weight loss</h3>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 pro3">
                    <h3>Performance</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 support-row">
                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 carousel-row">
                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 careers-row">
                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 footer-row">
                
                </div>
            </div>
        </div>
    </body>
</html>