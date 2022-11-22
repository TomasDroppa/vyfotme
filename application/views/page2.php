<?php


function build_calendar($month, $year){
// Nejprve vytvořím pole obsahující názvy všech dnů v týdnu.
$daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

// Pak získám první den měsíce, který je v argumentu této funkce.

$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

// Nyní sbírám počet dní v tomto měsíci.
$numberDays = date('t', $firstDayOfMonth);

// Získání informací o prvním dni tohoto měsíce.
$dateComponents = getdate($firstDayOfMonth);

// Získání názvu tohoto měsíce.
$monthName = $dateComponents['month'];

// Získání hodnoty indexu 0-6 prvního dne tohoto měsíce.
$dayOfWeek = $dateComponents['wday'];

// Získání aktuálního data.
$dateToday = date('Y-m-d');

// nyní vytvoření tabulky HTML.
$calendar = "<table class='table table-bordered'>";
$calendar .= "<center><h2>$monthName $year</h2></center>";
$calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";

$calendar .= "<tr>";

// vytváření záhlaví kalendáře.
if (is_array($daysOfWeek) || is_object($daysOfWeek))
{
foreach ($daysOfWeek as $day) {
$calendar .= "<th class='header'>$day</th>";
    }
}

$calendar .= "</tr><tr>";

// Proměnná $dayOfWeek zajistí, že v naší tabulce musí být pouze 7 sloupců.
if($dayOfWeek > 0){
    for($k=0;$k<$dayOfWeek;$k++){
        $calendar.="<td></td>";
    }
}

// Zahájení denního počítadla.
$currentDay = 1;

// Získání čísla měsíce.

$month = str_pad($month, 2, "0", STR_PAD_LEFT);

while($currentDay <= $numberDays){




    //pokud je dosaženo sloupce sevent (sobota), začněte nový řádek
    if($dayOfWeek == 7){
        $dayOfWeek = 0;
        $calendar.="</tr><tr>";
    }

    $currentDayRel = str_pad($month, 2, "0", STR_PAD_LEFT);
    $date = "$year-$month-$currentDayRel";


    $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
         }else{
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
         }

    $calendar.= "</td>";

    // Zvyšování počítadel.
    $currentDay++;
    $dayOfWeek++;

    }

    // případné doplnění řádku posledního týdne v měsíci..
if($dayOfWeek != 7){
    $remainingDays = 7-$dayOfWeek;
    for($l=0;$l<$remainingDays;$l++){
        $calendar.= "<td></td>";
    }
}

$calendar.= "</tr>";
$calendar.= "</table>";

echo $calendar;

}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Zabrání termínů</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        table{
            table-layout: fixed;
        }

        td{
            width: 33%;
        }

        .today{
            background: yellow;
        }

        </style>
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>






    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if(isset($_GET['month']) && isset($_GET['year'])){
                    $month = $_GET['month']; 			     
                    $year = $_GET['year'];
                     }else{
                    $month = $dateComponents['mon']; 			     
                    $year = $dateComponents['year'];
                    }
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
  </body>
</html>








