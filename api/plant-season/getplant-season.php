<?php
 include_once '../../config/Database.php';
 include_once '../../models/PlantSeason.php';

 //connect to db
$database = new Database();
$db = $database->connect();

$plantSeason = new PlantSeason($db);

$result = $plantSeason->getAll();
$outPut = array();

if($result->rowCount()){
    $beds = $result->fetchAll(PDO::FETCH_ASSOC);
    $outPut = $beds;

}
echo json_encode($outPut);

