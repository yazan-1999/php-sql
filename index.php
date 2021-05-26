<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hallo</h1>
    <?php
    function printResults($result)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['id'] . '. ';
                echo "Name: " . $row['name'] . '. ';
                echo "Bio: " . $row['bio'] . '<br><br>';
            }
        }
        echo "<hr>";
    }

    $mysql = new mysqli("localhost", "root", "", "php-mysql");
    $mysql->query("SET NAMES 'utf8'");

    // если есть ошибка выведи ошибку иначе выполняй ...
    // if($mysql->connect_error){
    //     echo 'Error Numer: '.$mysql->connect_error.'<br>';
    //     echo 'Error '.$mysql->connect_error;
    // }else{
    // echo"Host info: ".$mysql->host_info;

    // удалить таблицу
    // $mysql->query("DROP TABLE  `example`"); 

    // создать страницу
    // $mysql->query("CREATE TABLE `users`(
    //     id INT(11) NOT NULL AUTO_INCREMENT,
    //     name VARCHAR(50) NOT NULL,
    //     bio TEXT NOT NULL,
    //     PRIMARY KEY(id)
    // )");
    // бодавить 5 пользователей через цикл
    // for($i = 1 ; $i <= 5; $i++){
    // $name = "Bob #".$i;
    // $mysql->query("INSERT INTO `users` (`name`,`bio`) VALUES('$name','Full text')");
    // }

    // перезаписать в id 2 текст который находиться в bio  
    // $mysql->query("UPDATE `users` SET `bio` = 'New text' WHERE `id` = 2");

    // перезапиши все текст в bio  где id миеньше 2 
    // $mysql->query("UPDATE `users` SET `bio` = 'New text' WHERE `id` <= 2");

    // удалить запись с id 5
    // $mysql->query("DELETE FROM `users` WHERE `id` = 5 ");

    // удалить записи все с id 5 или id 4
    // $mysql->query("DELETE FROM `users` WHERE `id` = 3 OR `id` = 4 ");

    // удалить записи все с id 1 и name John
    // $mysql->query("DELETE FROM `users` WHERE `id` = 1 AND `name` = `John` ");

    // выбдрать все поля и вытянуть и таблицы users
    // $result = $mysql->query("SELECT * FROM `users`");

    // print_r($result);

    // кол-во строк в sql
    // echo "Nums: ".$result->num_rows;

    // вывод на экран всеех таблиц из базы данных
    // if ($result->num_rows > 0){
    //     // print_r($result->fetch_all());
    //     while($row = $result->fetch_assoc()){
    //         echo "ID: ".$row['id'].'. ';
    //         echo "Name: ".$row['name'].'. ';
    //         echo "Bio: ".$row['bio'].'<br><br>';
    //     }
    // }
    // }

    // работа функционнально вывести все
    $result = $mysql->query("SELECT * FROM `users`");
    printResults($result);
    
    // работа функционнально вывести только id и имя
    $result = $mysql->query("SELECT `id`,`name` FROM `users`");
    printResults($result);

    // работа функционнально вывести все у которых id больше 4
    $result = $mysql->query("SELECT * FROM `users` WHERE `id` > 4");
    printResults($result);

    // работа функционнально вывести все у которых id больше 4 от меньшего id к большепму,а если всемто ASC прописать DESC тогда пропишеться от большего к меньшему
    $result = $mysql->query("SELECT * FROM `users` WHERE `id` > 4 ORDER BY `id` ASC");
    printResults($result);

    // лимитерованный вывод выводить только первые 2 записи
    $result = $mysql->query("SELECT * FROM `users` LIMIT 2");
    printResults($result);

    // лимитерованный пропустить первые 2 записи и вывести 1 следующую запись
    $result = $mysql->query("SELECT * FROM `users` LIMIT 2, 1");
    printResults($result);

    $mysql->close();
    
    ?>
</body>

</html>