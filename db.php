<?php
class Database
{


    public $isConn;
    protected $db;



    public function __construct($host = "localhost", $username ="root", $password="root", $db_name = "study_project"){
        $this->isConn = TRUE;
        try{
            $this->db = new PDO("mysql:host={$host};dbname={$db_name};charset=utf8", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }

    }


// получить все записи из таблицы
    public function getAll($query, $params =[]){
        try{
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();

        } catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

//  получить одну запись из таблицы по id
    public function getOne($query, $params =[]){
        try{
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();

        } catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
// записать данные в таблицу
    public function insertDb($query, $params =[]){
        try{
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return TRUE;

        } catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

// обновить данные в таблицу
    public function updateDb($query, $params =[]){

        $this->insertDb($query, $params);

    }

// обновить данные из таблицы
    public function deleteDb($query, $params =[]){

        $this->insertDb($query, $params);

    }

}
