<?php
function build_calendar($month, $year){
    //Created an array containing names of the day of the week.
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    //Getting the first day of the month
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    //Getting the number of days first month containes
    $numberDays = date('t', $firstDayOfMonth);

    //Getting information abouth the first day of the month
    $dateComponents = getdata($firstDayOfMonth);

    //Getting the name of this month
    $monthName = $dateComponents['month'];

    //Getting the index value 0-6 of the first day of this month
    $dayOfWeek = $dateComponents['wday'];

    //Getting the current date
    $dateToday = date('Y-m-d');
    
    //Creating the HTML table
    $calendar = "<table class='table table-bordered'>";
    $calendar.= "<center><h2>$monthName $year</h2></center>";

    $calendar.= "<tr>";

    //Creating calendar headers
    foreach($daysOfWeek as $day){
        $calendar.= "<th class='header'>$day</th>";
    }

    $calendar = "</tr><tr>";

    //The variable $dayOfWeek makes sure there are only 7 columns on the table
    if($dayOfWeek > 0){
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.= "<td></td>";
        }
    }

    //Initializing day counter
    $currentDay = 1;

    //Getting the month number
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){

        //if seventh column (saturday) reahed, start a new row
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.="</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $calendar.= "<td><h4>$currentDay</h4>";
        $calendar.="</td>";

        //Incrementing the counters
        $currentDay++;
        $dayOfWeek++;

    }

    //Completing the row of the last week in the month.
    if($dayOfWeek != 7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.="<td></td>";
        }
    }

    $calendar.="</tr>";
    $calendar.="</table>";

    echo $calendar;
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
            $dateComponents = getdate();
            $month = $dateComponents['mon'];
            $year = $dateComponents['year'];
            echo build_calendar($month, $year);
        ?>
      </div>
    </div>
  </div>
</body>
</html>