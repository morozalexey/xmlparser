<?php
    $con = new PDO('mysql:host=localhost;dbname=xmlparser', 'root', 'root');    
    $sth = $con->prepare("SELECT * FROM parsing");
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Парсинг XML</title>
</head>
<body>
    <style>
        table.iksweb{
        width: 100%;
        border-collapse:collapse;
        border-spacing:0;
        height: auto;
        }
        table.iksweb,table.iksweb td, table.iksweb th {
        border: 1px solid #595959;
        }
        table.iksweb td,table.iksweb th {
        padding: 3px;
        width: 30px;
        height: 35px;
        }
        table.iksweb th {
        background: #347c99; 
        color: #fff; 
        font-weight: normal;
        }
    </style>
    <ul>
        <li><a href="/">Главная</a></li>
        <li><a href="/table.php">База</a></li>
    </ul>

    <table class="iksweb">
        <tbody>
            <tr>
                <td>id</td>
                <td>mark</td>
                <td>model</td>
                <td>generation</td>
                <td>year</td>
                <td>run</td>
                <td>color</td>
                <td>body</td>
                <td>engine</td>
                <td>transmission</td>
                <td>gear</td>
                <td>generation_id</td>
            </tr>
            <?php foreach ($result as $item) : ?>
            <tr>   
                <td><?= $item['id'] ?></td> 
                <td><?= $item['mark'] ?></td>
                <td><?= $item['model'] ?></td>
                <td><?= $item['generation'] ?></td>
                <td><?= $item['year'] ?></td>
                <td><?= $item['run'] ?></td>
                <td><?= $item['color'] ?></td>
                <td><?= $item['body'] ?></td>
                <td><?= $item['engine'] ?></td>
                <td><?= $item['transmission'] ?></td>
                <td><?= $item['gear'] ?></td>
                <td><?= $item['generation_id'] ?></td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
    </table>
</body>
</html>