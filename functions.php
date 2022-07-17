<?php 

$con = new PDO('mysql:host=localhost;dbname=xmlparser', 'root', 'root');

//Функция проверяет по id есть ли запись в базе, если нет, то добавляет
function add_new_items($url,$con) 
{
    $xml = simplexml_load_file($url) or die('Sorry');    
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
}

//Функция удаляет записи из базы, которых нет в загруженном XML файле
function delete_items($url,$con) 
{
    $xml = simplexml_load_file($url) or die('Sorry');    
    $data = [];
    $result = $con->prepare("SELECT id FROM parsing");
    $result->execute();

    if ($result->rowCount() > 0) {
       
        $id_from_db = [];

        while ($res = $result->fetch(PDO::FETCH_BOTH)) {            
            
            $id_from_db[] = $res['id'];
            $id_from_file = [];

            foreach ($xml->offers->offer as $data) {
                $data = ( (array) $data);
                $id_from_file[] = ($data['id']); 
            };  
        }  

        $diff = array_diff($id_from_db, $id_from_file);  

        if (empty($diff)) {
            echo "Записи в базе соответствуют загруженному файлу";
        } else {
            foreach ($diff as $id) {
                echo "Лишняя запись с id $id удалена из базы <br>";
                $stmt = $con->prepare('DELETE FROM parsing WHERE id = :id');
                $stmt->bindValue(':id', $id);
                $stmt->execute();
            }
        }     
    }    
}

// Функция обновляет записи, которые пришли в XML и уже есть в базе;
function update_items($url,$con) 
{
    $xml = simplexml_load_file($url) or die('Sorry'); 

    foreach ($xml->offers->offer as $data) {

        $data = ( (array) $data);

        $id = $data['id'];
        $mark = $data['mark']; 
        $model = $data['model']; 
        $generation = $data['generation']; 
        $year = $data['year']; 
        $run = $data['run']; 
        $color = $data['color']; 
        $body = $data['body']; 
        $engine = $data['engine']; 
        $transmission = $data['transmission']; 
        $gear = $data['gear']; 
        $generation_id = $data['generation_id'];

        $stmt = $con->prepare('SELECT * FROM parsing WHERE id =:id');    
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute(); 

        if ($stmt->fetch(PDO::FETCH_NUM)) {            
            $result = $con->prepare("UPDATE `parsing`
            SET `id` = :id, 
                `mark` = :mark, 
                `model` = :model, 
                `generation` = :generation,
                `year` = :year,
                `run` = :run,
                `color` = :color,
                `body` = :body, 
                `engine` = :engine, 
                `transmission` = :transmission, 
                `gear` = :gear, 
                `generation_id` = :generation_id WHERE `id` = :id");
            $result->bindValue(':id', $id, PDO::PARAM_INT);
            $result->bindValue(':mark', $mark); 
            $result->bindValue(':model', $model); 
            $result->bindValue(':generation', $generation); 
            $result->bindValue(':year', $year); 
            $result->bindValue(':run', $run); 
            $result->bindValue(':color', $color); 
            $result->bindValue(':body', $body); 
            $result->bindValue(':engine', $engine); 
            $result->bindValue(':transmission', $transmission); 
            $result->bindValue(':gear', $gear); 
            $result->bindValue(':generation_id', $generation_id);
            $result->execute();              
            if ($result->execute()) {
                echo "Запись с ID $id обновлена <br>";
            } else {
                echo 'Ошибка';
            } 
        }    
    }    
}