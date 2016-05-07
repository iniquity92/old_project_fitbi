<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Home</title>
        
        <link type="text/css" href="/fitbi/styles/css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="/fitbi/styles/css/home.css" rel="stylesheet">
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
            .pro1,.pro2,.pro3{
                height:300px;
                background-color:lightgray;
            
            }
            .search-row{
                height:200px;
                background-color:rgb(253,75,0);
            }
            .carousel-row{
                height:400px;
                background-color:rgb(253,75,0);
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 title-row">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3>SiteTitle</h3>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <button class="btn btn-info btn-user">Users</button>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <button class="btn btn-info btn-trainer">Trainers</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="search-row col-md-12 col-xs-12 col-sm-12">
                    <form method="get" action="searchquery.php" name="search" id="search">
                        <input type="search" class="form-control input-lg input-search" placeholder="Search for a condition, requirement or trainer">
                    </form>
                </div>
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
                    <div id="UserTestimonials" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#UserTestimonials" data-slide-to="0" class="active"></li>
                            <li data-target="#UserTestimonials" data-slide-to="1"></li>
                            <li data-target="#UserTestimonials" data-slide-to="0"></li>
                            
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="/fitbi/static/images/img1.jpg">
                                <div class="carousel-caption">
                                    <h3>Image 1</h3>
                                    <p>Some description...</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/fitbi/static/images/img2.jpg">
                                <div class="carousel-caption">
                                    <h3>Image 2</h3>
                                    <p>Some other description...</p>
                                </div>
                            </div>
                            <div class="item active">
                                <img src="/fitbi/static/images/img3.jpg">
                                <div class="carousel-caption">
                                    <h3>Image 3</h3>
                                    <p>Another description...</p>
                                </div>
                            </div>
                                              
                        </div>
                        
                    </div>
                    <!--controls-->
                    <a class="left carousel-control" href="#UserTestimonials" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#UserTestimonials" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 careers-row">
                    Join us if you're a Certified
                    <ol>
                        <li>Fitness Trainer</li>
                        <li>Dietician/Nutritionist</li>
                        <li>Physiotherapist</li>
                        <li>Yoga Instructor</li>
                        <li>Health Professional specialising in First Aid and preventive measures</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 footer-row">
                    Footer information Plus App notification
                </div>
            </div>
        </div>
    </body>
</html>