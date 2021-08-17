<?php

$json = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";

$obj = json_decode($json);

//Task1
$names = array();
$ages = array();
$cities = array();

foreach ($obj->players as $player)
{
    array_push($names, $player->name);
    array_push($ages, $player->age);
    array_push($cities, $player->address->city);
}

echo "Names are : [ ";
foreach ($names as $name)
{
    echo $name . " ";
}
echo "] \n";

echo "Ages are : [ ";
foreach ($ages as $age)
{
    echo $age . " ";
}
echo "] \n";

echo "Cities are : [ ";
foreach ($cities as $city)
{
    echo $city . " ";
}
echo "] \n";

//unique names
$unique_names = array_unique($names);

echo "Unique Names are : [ ";
foreach ($unique_names as $name)
{
    echo $name . " ";
}
echo "] \n";

//Persons with maximum age
$maxAge = max($ages);
$eldest = array();

foreach ($obj->players as $player)
{
    if($player->age == $maxAge)
    {
        array_push($eldest, $player->name);
    }
}

echo "Persons with maximum age are : [ ";
foreach ($eldest as $name)
{
    echo $name . " ";
}
echo "] \n";