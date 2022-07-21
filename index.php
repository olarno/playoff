<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Playoff</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
</head>
<body>
  <header>
    <h1>Playoff result</h1>
<?php
include 'class/team.php';
include 'class/player.php';

$nameTeam = [
  1 => 'A',
  2 => 'B',
  3 => 'C',
  4 => 'D',
  5 => 'E',
  6 => 'F',
  7 => 'G',
  8 => 'H',
];

// init team array for each league
$eTeams = [];
$wTeams = [];

foreach ($nameTeam as $key => $name) {
  $eTeams[] = new team($name, 'East');
  $wTeams[] = new team($name, 'West');
}

// create each players and add her score
foreach ($eTeams as $team) {
  $players = [];
  for ($i = 0; $i <= 20; $i++) {
    $players[$i] = new player((mt_rand(15, 100) / 100));
  }
  $team->setPlayers($players);
  $average = $team::averageScore($team->getPlayers());
  $team->setAverageScore($average);
}

foreach ($wTeams as $team) {
  $players = [];
  for ($i = 0; $i <= 20; $i++) {
    $players[$i] = new player((mt_rand(15, 100) / 100));
  }
  $team->setPlayers($players);
  $average = $team::averageScore($team->getPlayers());
  $team->setAverageScore($average);
}

echo '***** DIVISION EAST *****'.'<br/>';
echo '*** Round #0 ***'.'<br/>';
$result = $team::match($eTeams[0], $eTeams[1]); 
echo 'Serie '.$eTeams[0]->getName(). ' vs '. $eTeams[1]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner1 = $result[0][0];
$result = $team::match($eTeams[2], $eTeams[3]); 
echo 'Serie '.$eTeams[2]->getName(). ' vs '. $eTeams[3]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner2 = $result[0][0];
$result = $team::match($eTeams[4], $eTeams[5]); 
echo 'Serie '.$eTeams[4]->getName(). ' vs '. $eTeams[5]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner3 = $result[0][0];
$result = $team::match($eTeams[6], $eTeams[7]); 
echo 'Serie '.$eTeams[6]->getName(). ' vs '. $eTeams[7]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner4 = $result[0][0];

echo '*** Round #1 ***'.'<br/>';
$result = $team::match($winner1, $winner2); 
echo 'Serie '.$winner1->getName(). ' vs '. $winner2->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner11 = $result[0][0];
$result = $team::match($winner3, $winner4); 
echo 'Serie '.$winner3->getName(). ' vs '. $winner4->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner12 = $result[0][0];

echo '*** Round #Final ***'.'<br/>';
$result = $team::match($winner11, $winner12); 
echo 'Serie '.$winner11->getName(). ' vs '. $winner12->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winnerGroupEast = $result[0][0];

echo '***** DIVISION WEST *****'.'<br/>';
echo '*** Round #0 ***'.'<br/>';
$result = $team::match($wTeams[0], $wTeams[1]); 
echo 'Serie '.$wTeams[0]->getName(). ' vs '. $wTeams[1]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner1 = $result[0][0];
$result = $team::match($wTeams[2], $wTeams[3]);
echo 'Serie '.$wTeams[2]->getName(). ' vs '. $wTeams[3]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner2 = $result[0][0];
$result = $team::match($wTeams[4], $wTeams[5]); 
echo 'Serie '.$wTeams[4]->getName(). ' vs '. $wTeams[5]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner3 = $result[0][0];
$result = $team::match($wTeams[6], $wTeams[7]);
echo 'Serie '.$wTeams[6]->getName(). ' vs '. $wTeams[7]->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner4 = $result[0][0];

echo '*** Round #1 ***'.'<br/>';
$result = $team::match($winner1, $winner2);
echo 'Serie '.$winner1->getName(). ' vs '. $winner2->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner11 = $result[0][0];
$result = $team::match($winner3, $winner4);
echo 'Serie '.$winner3->getName(). ' vs '. $winner4->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner12 = $result[0][0];

echo '*** Round #Final ***'.'<br/>';
$result = $team::match($winner11, $winner12);
echo 'Serie '.$winner11->getName(). ' vs '. $winner12->getName().' - Winner : '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winnerGroupWest = $result[0][0];

echo '*******FINAL*******'.'<br/>';
$result = $team::match($winnerGroupEast, $winnerGroupWest); 
echo 'Final '.$winnerGroupEast->getDivisionTeam(). ' '. $winnerGroupEast->getName(). ' vs '.$winnerGroupWest->getDivisionTeam().' '. $winnerGroupWest->getName().' - Winner : '. $result[0][0]->getDivisionTeam() . ' '. $result[0][0]->getName() . ' ('.$result[0][1].'/'.$result[1][1].')'.'<br/>';
$winner = $result[0][0];

?>

<p>The winning team is :  <?php echo $winner->getName() ?> <br/> 
It comes from the division : <?php echo $winner->getDivisionTeam() ?> </p>

<h2>Stats teams</h2>

<h3> Division East</h3>
<ul>
<?php
foreach ($eTeams as $team) {
  echo '<li>';
  echo 'Team division : ' . $team->getdivisionTeam();
  echo '<br /> Team name : ' . $team->getName();
  echo '<br /> Average Score : <strong>'. $team::averageScore($team->getPlayers()) . '</strong><br /> ';
  echo '</li>';
}
?>
</ul>
<h3> Division West</h3>
<ul>
<?php
foreach ($wTeams as $team) {
  echo '<li>';
  echo 'Team division : ' . $team->getdivisionTeam();
  echo '<br /> Team name : ' . $team->getName();
  echo '<br /> Average Score : <strong>'. $team::averageScore($team->getPlayers()) . '</strong><br /> ';
  echo '</li>';
}
?>
</ul>
<a href="" >Link for repo github </a>
</body>
</html>