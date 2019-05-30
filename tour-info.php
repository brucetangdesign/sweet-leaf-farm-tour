<?php
$tourStops = array(
  array(
    'id' => 'cincinnati-oh',
    'map-coords' => 'left: 74%; top: 41%',
    'city' => 'Cincinnati, OH',
    'date' => 'June 8',
    'date-code' => '2019-06-08',
    'ticket-link' => ''),
  array(
    'id' => 'foxborough-ma',
    'map-coords' => 'left: 94%; top: 20%',
    'city' => 'Foxborough, MA',
    'date' => 'June 21',
    'date-code' => '2019-06-21',
    'ticket-link' => 'https://www1.ticketmaster.com/luke-bryan-sunset-repeat-tour-2019/event/01005655917B24D9'),
  array(
    'id' => 'canandaigua-ny',
    'map-coords' => 'left: 83%; top: 23%',
    'city' => 'Canandaigua, NY',
    'date' => 'July 12',
    'date-code' => '2019-07-12',
    'ticket-link' => 'https://www1.ticketmaster.com/luke-bryan-sunset-repeat-tour-2019/event/0000565BAE905516'),
  array(
    'id' => 'wantagh-ny',
    'map-coords' => 'left: 92%; top: 26%',
    'city' => 'Wantagh, NY',
    'date' => 'July 13',
    'date-code' => '2019-07-13',
    'ticket-link' => 'https://concerts1.livenation.com/event/1D005686A47817E2?_ga=2.16371830.1193104708.1555021566-796393091.1520617630'),
  array(
    'id' => 'tampa-fl',
    'map-coords' => 'left: 85%; top: 81%',
    'city' => 'Tampa, FL',
    'date' => 'August 2',
    'date-code' => '2019-08-02',
    'ticket-link' => 'https://concerts1.livenation.com/event/0D00567CC5ECBA9A?_ga=2.13203319.1951917153.1557519622-796393091.1520617630'),
  array(
    'id' => 'st-louis-mo',
    'map-coords' => 'left: 62.5%; top: 48%;',
    'city' => 'St. Louis, MO',
    'date' => 'August 17',
    'date-code' => '2019-08-17',
    'ticket-link' => 'https://concerts1.livenation.com/event/060056729A6A3958'),
  array(
    'id' => 'indianapolis-in',
    'map-coords' => 'left: 69.8%; top: 40%',
    'city' => 'Indianapolis, IN',
    'date' => 'August 18',
    'date-code' => '2019-08-18',
    'ticket-link' => 'https://concerts1.livenation.com/event/05005681CFD97EBC?_ga=2.40023394.1193104708.1555021566-796393091.1520617630'),
  array(
    'id' => 'marshall-wi',
    'map-coords' => 'left: 63%; top: 28%',
    'city' => 'Marshall, WI',
    'date' => 'September 26',
    'date-code' => '2019-09-26',
    'farm' => 'Statz Bros. Farms',
    'ticket-link' => 'http://www.google.com'),
  array(
    'id' => 'richland-mi',
    'map-coords' => 'left: 70%; top: 28%',
    'city' => 'Richland, MI',
    'date' => 'September 27',
    'date-code' => '2019-09-27',
    'farm' => 'Stafford Farms',
    'ticket-link' => ''),
  array(
    'id' => 'pleasantville-oh',
    'map-coords' => 'left: 75.6%; top: 36.5%;',
    'city' => 'Pleasantville, OH',
    'date' => 'September 28',
    'date-code' => '2019-09-28',
    'farm' => 'Miller Family Farms',
    'ticket-link' => ''),
  array(
    'id' => 'louisburg-ks',
    'map-coords' => 'left: 54%; top: 49%',
    'city' => 'Louisburg, KS',
    'date' => 'October 3',
    'date-code' => '2019-10-03',
    'farm' => 'MC Farms',
    'ticket-link' => ''),
  array(
    'id' => 'douglass-ks',
    'map-coords' => 'left: 50%; top: 53%',
    'city' => 'Douglass, KS',
    'date' => 'October 4',
    'date-code' => '2019-10-04',
    'farm' => 'Flying B Ranch',
    'ticket-link' => ''),
  array(
    'id' => 'norman-ok',
    'map-coords' => 'left: 50%; top: 63%',
    'city' => 'Norman, OK',
    'date' => 'October 5',
    'date-code' => '2019-10-05',
    'farm' => 'Adkins Farm',
    'ticket-link' => ''),
  array(
    'id' => 'fort-wayne-in',
    'map-coords' => 'left: 70.5%; top: 34%',
    'city' => 'Fort Wayne, IN',
    'date' => 'October 23',
    'date-code' => '2019-10-23',
    'ticket-link' => ''),
  array(
    'id' => 'detroit-mi',
    'map-coords' => 'left: 73.3%; top: 28.6%;',
    'city' => 'Detroit, MI',
    'date' => 'October 25',
    'date-code' => '2019-10-25',
    'ticket-link' => 'https://www1.ticketmaster.com/luke-bryan-sunset-repeat-tour-2019/event/080056A1E3DB613B')
);

$today = date("Y-m-d");

foreach ($tourStops as $i => $row){
  if(isset($row['date-code'])){
    $val = abs(strtotime($today) - strtotime($row['date-code']));
    $allIntervals[] = $val;
    if(strtotime($row['date-code']) > strtotime($today)){
      $interval[] = $val;
    }
  }
}
asort($interval);

$j = 0;
foreach ($allIntervals as $allInterval){
    if($allInterval == $interval[0]){
      $closestDateIndex = $j;
    }
    $j++;
}
$tourStops[$closestDateIndex]['closest-date'] = "true";

?>
