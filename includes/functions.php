<?php

/**
 * Displays site name.
 */
function site_name()
{
    echo config('name');
}

/**
 * Displays site url provided in conig.
 */
function site_url()
{
    echo config('site_url');
}

/**
 * Displays site version.
 */
function site_version()
{
    echo config('version');
}

/**
 * Website navigation.
 */
function nav_menu($sep = ' ')
{
    $nav_menu = '';
    $nav_items = config('nav_menu');
    foreach ($nav_items as $uri => $name) {
        $class = str_replace('page=', '', $_SERVER['QUERY_STRING']) == $uri ? ' active' : '';
        $url = config('site_url') . '/' . (config('pretty_uri') || $uri == '' ? '' : '?page=') . $uri;
        $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;
    }
    echo trim($nav_menu, $sep);
}

/**
 * Displays page title. It takes the data from
 * URL, it replaces the hyphens with spaces and
 * it capitalizes the words.
 */
function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';
    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function page_content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = getcwd() . '/' . config('content_path') . '/' . $page . '.phtml';
    if (! file_exists($path)) {
        $path = getcwd() . '/' . config('content_path') . '/404.phtml';
    }
    echo file_get_contents($path);
}

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

/**
 * Starts everything and displays the template.
 */
function init()
{
    require config('template_path') . '/template.php';
}

?>