<?php
function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'galerie');
    $stmt = $mysqli->prepare("SELECT * FROM bookings_record WHERE MONTH(datum) = ? AND YEAR(datum) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['datum'];
            }
            
            $stmt->close();
        }
    }
    
    
     $daysOfWeek = array('Neděle','Pondělí','Úterý','Středa','Čtvrtek','Pátek','Sobota');
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
     $numberDays = date('t',$firstDayOfMonth);
     $dateComponents = getdate($firstDayOfMonth);
     $monthName = $dateComponents['month'];
     $dayOfWeek = $dateComponents['wday'];

    $datetoday = date('Y-m-d');
   
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-success' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Minulý měsíc</a> ";
    $calendar.= " <a class='btn btn-xs btn-danger' href='?month=".date('m')."&year=".date('Y')."'>Aktuální měsíc</a> ";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Další měsíc</a></center><br>";
    
   
      $calendar .= "<tr>";
     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 

     $currentDay = 1;
     $calendar .= "</tr><tr>";


     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";
          
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs' disabled>Nelze</button>";
         }elseif(in_array($date, $bookings)){
             $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-lock
             '></span> Již zarezervováno</button>";
         }else{
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'> <span class='glyphicon glyphicon-ok'></span> Zarezervovat</a>";
         }                                                              //book.php důležité
            
          $calendar .="</td>";
          $currentDay++;
          $dayOfWeek++;
     }

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 
         }
     }
     
     $calendar .= "</tr>";
     $calendar .= "</table>";
     echo $calendar;

}
    
?>


<html lang="en">
  <head>
    <title>Rezervace</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   

    <style>
    @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;

            }
            
            

            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Neděle";
            }
            td:nth-of-type(2):before {
                content: "Pondělí";
            }
            td:nth-of-type(3):before {
                content: "Úterý";
            }
            td:nth-of-type(4):before {
                content: "Středa";
            }
            td:nth-of-type(5):before {
                content: "Čtvrtek";
            }
            td:nth-of-type(6):before {
                content: "Pátek";
            }
            td:nth-of-type(7):before {
                content: "Sobota";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:#eee;
        }

        body {
        background-color: #f8f9fa;
        }

        .navbar-nav{
            font-size: 25px;
        }

    </style>
 </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">	
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/vyfotme/gallery">Hlavní stránka</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/vyfotme/bookingsystem/admin/">Administrace rezervací</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="http://localhost/vyfotme/manage_gallery">Administrace galerie</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="http://localhost/vyfotme/manage_cenik">Administrace ceníku</a>
					</li>

				</ul>
			</div>
	</nav>
  
  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <?php
                        $dateComponents = getdate();
                        if(isset($_GET['month']) && isset($_GET['year'])){
                            $month = $_GET['month'];
                            $year = $_GET['year'];
                        }else{
                            $month = $dateComponents['mon'];    //nevím proč musí být místo month - mon
                            $year = $dateComponents['year'];
                        }
                        echo build_calendar($month, $year);
                    ?>
                
            </div>
        </div>
    </div>
    
  </body>
</html>