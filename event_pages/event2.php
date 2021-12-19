<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Events</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
				width:100%;
				height:300px;
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
			.card-signup .header, .mheader {
				margin-bottom: 15px;
			}
			.mheader h4{
				color:#FFFFFF;
			}
			.events .bodys {
				margin-top: 0px;
			}
			.carousel .carousel-indicators{
				bottom: 40px;
			}
			@media (min-width: 768px) {
				a.left.carousel-control {
				    left:-40px !important;
				}
				.events .cover {
					padding-left:0px !important;
				}
				.events .cover .infos { 
					padding-right:15px !important;
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
				#mabs{
					margin-top: 0px !important;
				}
			}
		</style>
   </head>
<body>
    <?php  
    //  function GetEventById($id){

        require '../config.php';
     
     $sql = $db_con->prepare("SELECT * FROM events");
     $sql->execute();
    //  $sql->setFetchMode(PDO::FETCH_ASSOC);
     $res = $sql->fetchAll(PDO::FETCH_ASSOC);
		
	 foreach ($res as $row) {
			echo'<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mix '.$row['event_type'].' '.$row['event_date'].' '.$row['event_name'].'" data-price="'.$row['event_price'].'" data-city="'.$row["event_venue"].'" data-dates="'.$row["event_date"].'" >
				<div class="ticket-card">       
					<div class="cover">
					           <a href="\Event\demo1\event_pages\EventsDetails.php?event_id='. $row['event_id'].'">
							<img src="\Event\demo1\images/'.$row['event_image'].'" alt="'.$row['event_name'].'" />
						</a>
						<div class="infos">
							<div class="time text-center">
								<i class="fa fa-clock-o"></i> '.$row['event_time'].'
							</div> 
							</div>
					</div>
								<div class="bodys">              
							<div class="artist">
								<div class="ih6 infos">'. $row['event_type'].'</div>
								<div class="ih4 name"><a href="/Events/'.$row['event_name'].'/'.$row['event_id'].'">'. $row['event_name'].'</a></div>
									<div class="hiddendata" style="display: none;">';
							// 		if($res['cities'] != '') {
							// //if(count($cities) > 1) {
							// 	$str.=	'<div class="input-group">
							// 		<span class="input-group-addon">
							// 			<i class="material-icons">place</i>
							// 		</span>
							// 		<div class="infos">
							// 			<p class="location" style="padding-top:10px; color:#333;">
							// 				<select id="city" name="city" required style="width: 65%;">';
							// 					$str.= '<option selected="selected" disabled="disabled" value="placeholder">Select your city</option>';
							// 					foreach ($cities as $key => $value) {
							// 						$str.= '<option value="'.$value.'">'.$value.'</option>';
							// 					}
							// 				$str.='</select>
							// 			</p>
							// 		</div>
							// 	</div>';
							// // } else {
							// // 	$str.=	'<input id="city" name="city" type="hidden" value="'.$res["cities"].'">';
							// // }
					        	// }
		echo	'</div>
				  </div>
				  <div class="price">
					'.$row['event_venue'].'
					<div class="value">'.$row['event_price'].'</div>
				  </div>              
				  <div class="clearfix"></div>
				  <div class="infos">
					<p class="location"><i class="fa fa-map-marker"></i>'.$row['event_venue'].','.$row['event_venue'].'</p>
					<p class="date"><i class="fa fa-calendar"></i>'.$row['event_date'].'</p>
				  </div>
				  <div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<div class="collapse">
				  <ul class="list-unstyled">
					<li>
						<div class="ih5 text-center"><small>
							<a target="_blank" href="/Events/'.$row['event_name'].'/'.$row['event_id'].'">More Details..<i class="fa fa-external-link"></i></a></small>
						</div>
					</li>
					'.$row['event_price'].'
				  </ul>
			</div>
			<div class="footers">
				  <button class="btns toggle-tickets" ><a href="\Event\demo1\event_pages\EventsDetails.php?event_id='. $row['event_id'].'">Show Details</button>
				  
			</div>
		</div>
	</div>';




 
     
		 
											// echo '<div style="margin-bottom:70px;padding-top:5px; width: 90%; margin-left: auto; margin-right: auto" id="ticket-card">
											//             <table class="ticket-card" >';
									
											//                  foreach ($res as $row) {
																				
											//                             echo '<tr>';
											//                             echo '<td>' . $row['event_name'] . '</td>';
											//                             echo '<td>' . $row['event_date'] . '</td>';
											//                             echo '<td>' . $row['event_time'] . '</td>';
											//                             echo '<td>' . $row['event_price'] . '</td>';

												// echo '<td><a href="\Event\demo1\event_pages\EventsDetails.php?event_id='. $row['event_id'].'"> Show Details</td>';
											//                             echo '</tr>';
																	

											// $imgs= '<img src="\Event\demo1\images/'.$row['event_image'].'" style="max-width:100px;"';
											
                               
        
                                        
                            }
  
?>
                              </table>
                                </div>          
                            </body>
                            </html>
   
    
                  

                                


    
