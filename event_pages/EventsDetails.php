<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Event Details</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="apple-touch-icon" sizes="76x76" href="https://eventingclub.in/assets/img/apple-icon.png">

    <meta name="theme-color" content="#333399">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons|Lovers+Quarrel' rel='stylesheet' type='text/css' />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="\Event\demo1/css/material-kit.css" rel="stylesheet" />
    <link href="\Event\demo1/css/custom.css" rel="stylesheet" />

    <style>
        body.single-event .navbar {
            background-color: #333399;
        }

        #map_canvas {
            width: 100%;
            height: 300px;
        }

        .ticket-card .bodys {
            height: auto;
        }

        .modal .modal-dialog {
            margin-top: 70px;
            margin-left: 33.33333%;
            margin-right: 33.33333%;
            margin-bottom: auto;
            width: 33.33333%;
        }

        .card-signup .header,
        .mheader {
            margin-bottom: 15px;
        }

        .mheader h4 {
            color: #FFFFFF;
        }

        .events .bodys {
            margin-top: 0px;
        }

        .carousel .carousel-indicators {
            bottom: 40px;
        }

        @media (min-width: 768px) {
            a.left.carousel-control {
                left: -40px !important;
            }

            .events .cover {
                padding-left: 0px !important;
            }

            .events .cover .infos {

                padding-right: 15px !important;
            }
        }

        @media (max-width: 768px) {
            .even {
                margin-top: 48px !important;
            }

            #eve {
                padding-left: 0px;
                padding-right: 0px;
            }

            #mabs {
                margin-top: 0px !important;
            }
        }
    </style>
</head>

<body>
    <?php
    //  function GetEventById($id){

    require '../config.php';
    $id = $_GET['event_id'];


    $sql = $db_con->prepare("SELECT * FROM events  Where `event_id`='$id'");
    $sql->execute();
    //  $sql->setFetchMode(PDO::FETCH_ASSOC);
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);

    '<table class="events" border="2">';

    foreach ($res as $row) {

        // echo '<tr>';
        // echo '<td>' . $row['event_name'] . '</td>';
        // echo '<td><img src="\Event\demo1\images/' . $row['event_image'] . '" style="max-width:100px;"></td>';
        // echo '<td>' . $row['event_date'] . '</td>';
        // echo '<td>' . $row['event_time'] . '</td>';
        // echo '<td>' . $row['event_price'] . '</td>';
        // echo '<td>' . $row['event_venue'] . '</td>';
        // echo '<td>' . $row['event_details'] . '</td>';

        // echo '</tr>';


        echo '<div style="" class="even container">
        <div style="box-shadow:none" class="events ticket-card active">
        <div class="row">
            <div id="eve" class="col-xs-12 col-md-6">
                 <div style="margin:0; padding:0;" class="cover">
                     <img src="\Event\demo1\images/' . $row['event_image'] . '" style="max-width:500px;"/>
                            <div class="infos">
                                <div class="time text-center">
                                         <i class="fa fa-clock-o"></i> ' . $row['event_time']  . '
                                 </div>
                           </div> 
                    </div>
                                

                 <div class="bodys"><div class="artist">
                        <div class="ih6 infos">' . $row['event_type'] . '</div>
                            <div class="ih4 name">' . $row['event_name'] . '</div>
                                <div class="hiddendata" style="display: none;">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">place</i>
                                        </span>
                                    </div>
                                </div>
                            </div>   
                            <div class="price">
                            ' . $row['event_venue'] . '
                            <div class="value" >
                            <i class="fa fa-inr" style="font-size:36px;color:blue"></i>
                          
                                                        ' . $row['event_price'] . '</div>
                                                    </div>    
                                                    <div class="clearfix"></div>
                                                    
                                                    <div class="infos">
                                                    <p class="location">
                                                        <i class="fa fa-map-marker"></i>' . $row['event_venue'] . ',' . $row['event_venue'] . '</p>
                                                    <p class="date">
                                                        <i class="fa fa-calendar"></i>' . $row['event_date'] . '</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                        
                                                    <div style="padding:0 15px;">
                                                    <div style="border-top:1px solid #f3f3f3;" class="col-xs-12">
                                                            <button id="fbshare" class="btn btn-social btn-fill btn-facebook col-sm-3 col-xs-5">
                                                                        <i class="fa fa-facebook"></i> SHARE
                                                                    <div class="ripple-container"></div></button>
                                                                <button id="twtrshare" class="btn btn-social btn-fill btn-twitter col-sm-3 col-xs-5">
                                                                        <i class="fa fa-twitter"></i> TWEET
                                                                    <div class="ripple-container"></div></button>
                                                    </div>
                                                </div>
        
                                         </div>
                                </div>



                     <div style="margin-top:-80px" id="mabs" class="col-xs-12 col-md-6">              

                     <div class="profile-tabs">
                                                            <div id="itabs" class="nav-align-center">
                                                                <ul id="detab" class="nav nav-pills" role="tablist" >
                                                                    <li class="active">
                                                                        <a href="#Tickets" role="tab" data-toggle="tab">
                                                                            <i class="fa fa-ticket"></i>
                                                                            Tickets
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#Description" role="tab" data-toggle="tab">
                                                                            <i class="material-icons">description</i>
                                                                            Description
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#Venue" role="tab" data-toggle="tab">
                                                                            <i class="material-icons">location_on</i>
                                                                            Venue
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content gallery">
                                                                <div class="tab-pane active" id="Tickets">
                                                                    <div class="row">
                                                                        <div style="margin-top:20px;box-shadow:none" class="ticket-card ticks col-md-12">
                                                                        <ul class="list-unstyled">
                                                                                    ' . $row['event_price'] . '
                                                                                    ' . $row['event_price'] . '
                                                                                    </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                           </div>
                                                           <div class="tab-pane text-center" id="Description">
                                                           <div class="row">
                                                               <div style="text-align:left" class="col-md-12">
                                                                   <br> ' . $row['event_details'] . '
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="tab-pane text-center" id="Venue">
                                                           <div class="row">
                                                               <div class="col-md-12">
                                                                   <br> ' . $row['event_venue'] . '<br>
                                                                   <div id="map_canvas"></div>
                                                               </div>
                                                           </div>
                                                       </div>


                 
                                                       </div>
                                
                                
                                            
   
   
   
   
   ';
    }


    ?>


</body>

</html>