<?php

$con = new PDO('mysql:host=localhost;dbname=xmlparser', 'root', 'root');
$file = $_GET['file'];
$url = "uploads/$file";

$xml = simplexml_load_file($url) or die('Sorry');

//проверяет есть ли запись в базе, если нет, то добавляет
$data = [];
foreach ($xml->offers->offer as $key => $data) {
    $data = ( (array) $data);
    $id = ($data['id']);
    
    $stmt = $con->prepare('SELECT id FROM parsing WHERE id =:id');    
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_NUM)) {
        echo "Запись с ID $id уже есть в базе есть <br>";
        continue;
    } else {
        echo "Новая запись с ID $id добавлена в базу<br>";
        $sql = 'INSERT INTO parsing (id, mark, model, generation, year, run, color, body, engine, transmission, gear, generation_id) VALUES(:id,:mark, :model, :generation, :year, :run, :color, :body, :engine, :transmission, :gear, :generation_id)';
        $statement = $con->prepare($sql); 
        $result = $statement->execute($data);
    }
}
