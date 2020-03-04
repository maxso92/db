<?php
/**
 * Created by PhpStorm.
 * User: imacbro
 * Date: 04.03.2020
 * Time: 16:53
 */



//$pdo = new PDO('mysql:host=localhost;dbname=study_project;charset=utf8', 'root', 'root');
//var_dump($pdo);

// query
// fetchAll - все записи
// fetch - одну запись
// PDO::FETH_ASSOC

/*
$sql = 'SELECT name FROM users';
$statement = $pdo->query($sql);

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user){
    echo $user['name'];
    echo '<br>';
}
*/


require_once "db.php";

$db = new Database();

echo '<h1>Все записи</h1>';
$getAll = $db->getAll("SELECT * FROM users");

foreach($getAll as $user){
    echo $user['name']. ' / ' .$user['lastname'] ;
    echo '<br>';
}


//var_dump($getAll);

echo '<h1>Одна запись</h1>';


$getOne = $db->getOne("SELECT * FROM users WHERE id = ?", ["1"]);
echo $getOne['name']. ' / ' .$getOne['lastname'] ;
echo '<br>';


// Добавялем запись
//$insert = $db->insertDb("INSERT INTO users (name, lastname, status ) VALUE(?,?,?)", ["John", "Travolta", "1"]);


// Обновляем запись
$update = $db->updateDb("UPDATE  users SET name = ?, lastname = ?, status = ? WHERE id = ?", ["Max", "S", "1" , "5"]);
//$update();

// Удаляем запись
$delete = $db->deleteDb("DELETE FROM  users  WHERE id = ?", ["5"]);
