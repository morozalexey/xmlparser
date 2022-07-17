<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Парсинг XML</title>
	</head>
	<body>
		<ul>
			<li><a href="/">Главная</a></li>
			<li><a href="/table.php">База записей</a></li>
		</ul>
		<h1>Записать новые значения в базу</h1>
		<form action="/upload.php" method="post" enctype="multipart/form-data" style="border: 1px solid black;width: 300px;padding: 10px;">
			<input type="text" name="action" value="add" hidden>
			<input type="file" name="file"><br><br>
			<input type="submit" value="Отправить">
		</form>		
		<h1>Удалить записи из базы, которых нет в файле.</h1>
		<form action="/upload.php" method="post" enctype="multipart/form-data" style="border: 1px solid black;width: 300px;padding: 10px;">
			<input type="text" name="action" value="delete" hidden>
			<input type="file" name="file"><br><br>
			<input type="submit" value="Отправить">
		</form>	
		<h1>Обновить записи в базе(функционал пока не работает)</h1>
		<form action="/upload.php" method="post" enctype="multipart/form-data" style="border: 1px solid black;width: 300px;padding: 10px;">
			<input type="text" name="action" value="update" hidden>
			<input type="file" name="file"><br><br>
			<input type="submit" value="Отправить">
		</form> 
	</body>
</html>




