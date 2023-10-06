<?php
    // Set the timezone to your desired location
    date_default_timezone_set('America/New_York'); // Change this to your timezone

    // Get the current local time
    $currentTime = date('H:i'); // Format: Hour:Minute

    // Get the current day of the week
    $currentDay = date('l'); // Full weekday name (e.g., "Monday")
    
    // Get the day of the month
    $currentDayOfMonth = date('j'); // Day of the month without leading zeros

    // Get the current month and year
    $nowMonth = date('F'); // Full month name (e.g., "September")
?>


<?php
$index = '../';
$path = '_global/';
$internal_style = '
<style>
.day-letters{position:sticky;top:0;z-index:2;background-color:rgba(255,255,255,.77)}
.day-letters th{padding-top:5px}
h2{text-align:left;margin-top:4rem;margin-bottom:0}
h3{margin-bottom:0}
td{text-align:center;vertical-align:middle;
white-space:nowrap;text-overflow:ellipsis;position:relative;}
td{padding-top:7px;padding-bottom:12px;min-width:37px}

/* mini sreens only
tr{display:flex}
td{flex:1}*/

.week{position:absolute;top:-5px;left:-5px;opacity:.7;font-size:9px}
@media (prefers-color-scheme: dark) {
.day-letters{color:white;background-color: rgba(0, 0, 0, 0.77)}
.week{color:#ffffff}

.today{box-sizing:border-box;border:1px solid yellow;border-radius:5px}
}
</style>';
$scripts = '<script>
document.addEventListener("DOMContentLoaded", function() {
    const rows = document.querySelectorAll("table tbody tr");
    let lastProcessedWeek = null;
    
    rows.forEach(row => {
        // Find the first cell in the row with a data-week attribute
        const firstCellWithData = row.querySelector("td[data-week]");
        
        if (firstCellWithData) {
            const weekOfFirstCell = parseInt(firstCellWithData.dataset.week.split("-")[1]).toString();

            // If it is a different week or the first day of the month, add the week number
            if (lastProcessedWeek !== weekOfFirstCell || parseInt(firstCellWithData.textContent.trim()) === 1) {
                const weekSpan = document.createElement("span");
                weekSpan.innerText = weekOfFirstCell;
                weekSpan.classList.add("week");
                
                firstCellWithData.insertBefore(weekSpan, firstCellWithData.firstChild);

                lastProcessedWeek = weekOfFirstCell;  // Update the last processed week
            }
        }
    });
});
</script>';
?>
<html>
 <?php include $index . $path . ('head.php'); ?>
 <body>
  <div id="container">
   <span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">W/<em style="opacity:.8">.</em>LLC</h1></span>
   <?php include $index . $path . ('navigation.php'); ?>
  </div>
  <div id="container">



<?php
date_default_timezone_set('America/Los_Angeles');

function getAbbreviatedMonthName($monthNumber) {
    return date('M', mktime(0, 0, 0, $monthNumber, 1));
}

function getWeekYearAndNumber($year, $month, $day) {
    $dateStr = "$year-$month-$day";
    $timestamp = strtotime($dateStr);

    // Calculate the week number based on Sunday as the start of the week
    $weekNumber = intval(date('W', $timestamp));
    if (date('w', $timestamp) == 0) {
        $weekNumber++;
    }

    // If the weekNumber becomes 53 (which is not usual), set it to 01 and increase the year.
    if ($weekNumber > 52) {
        $weekNumber = 1;
        $year++;
    }

    // If December 31st is part of the first week of the next year, adjust the year
    if ($month == 12 && $day == 31 && $weekNumber == 1) {
        $year++;
    }

    return [$year, sprintf('%02d', $weekNumber)]; // Format week number to two digits
}

function generateMonthTable($year, $month) {
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $firstDayOfMonth = date('w', strtotime("$year-$month-01"));
    $table = '';

    // Display month name
    $table .= '<tr aria-label="Month" class="month">';
    for ($i = 0; $i < $firstDayOfMonth; $i++) {
        $table .= '<td></td>';
    }
    $table .= '<td><h3>' . getAbbreviatedMonthName($month) . '</h3></td>';
    for ($i = $firstDayOfMonth + 1; $i < 7; $i++) {
        $table .= '<td></td>';
    }
    $table .= '</tr>';

    // Display days
    $currentDay = 1;
    while ($currentDay <= $daysInMonth) {
        $table .= '<tr>';
        for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
            if (($dayOfWeek >= $firstDayOfMonth && $currentDay == 1) || $currentDay > 1) {
                if ($currentDay <= $daysInMonth) {
                    list($weekYear, $weekNumber) = getWeekYearAndNumber($year, $month, $currentDay);
                    $todayClass = ($year == date('Y') && $month == date('n') && $currentDay == date('j')) ? 'today selected' : '';
                    $table .= '<td class="' . $todayClass . '" data-week="' . $weekYear . '-' . $weekNumber . '">' . $currentDay . '</td>';
                    $currentDay++;
                } else {
                    $table .= '<td></td>';
                }
            } else {
                $table .= '<td></td>';
            }
        }
        $table .= '</tr>';
    }

    return $table;
}

$currentYear = date('Y');
$previousYears = 1; // Number of previous years to display
$upcomingYears = 1; // Number of upcoming years to display
$tables = '';
$tables .= '<tr class="day-letters"><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>';

for ($i = -$previousYears; $i <= $upcomingYears; $i++) {
    $yearToDisplay = $currentYear + $i;
    $tables .= '<tr aria-label="Year" class="year"><td colspan="7"><h2>' . $yearToDisplay . '</h2></td></tr>';
    for ($monthToDisplay = 1; $monthToDisplay <= 12; $monthToDisplay++) {
        $tables .= generateMonthTable($yearToDisplay, $monthToDisplay);
    }
}

$calendarTable = '<table>' . $tables . '</table>';
echo $calendarTable;
?>




   <p><?php echo $currentTime; ?> <?php echo $currentDay; ?> <?php echo $nowcurrentMonth; ?> <?php echo $currentDayOfMonth; ?></p>
  </div>
  <?php echo $scripts; ?>
 </body>
</html>