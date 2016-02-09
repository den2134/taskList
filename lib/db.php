<?php

include 'config.class.php';

class DB{

    protected $dbh;

    public function __construct(){
        try {
            $this->dbh = new PDO('mysql: host=localhost; dbname=tasks', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            $status = 'Fail: ' . $e->getMessage();
        }
    }

    public function insert(){
        if(empty($_POST['task'])){
            exit("Incorrent input");
        }

            $ch_task = trim($_POST['task']);
            $ch_task = stripslashes($ch_task);
            $ch_task = htmlspecialchars($ch_task);
            $ch_task = strip_tags($ch_task);

            try {
                $sth = $this->dbh->prepare('INSERT INTO task (task) VALUES (:task)');
                $sth->bindParam(':task', $ch_task);
                $sth->execute();

            } catch (PDOException $e) {
                echo "Cant insert into DB - " . $e->getMessage();
            }
    }

    public function select($chk){
        try{
            $sth = $this->dbh->prepare('SELECT * FROM task WHERE is_checked = :check');
            $sth->bindParam(':check', $chk);
            $sth->execute();
            $res = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        } catch(PDOException $e) {
            echo "Error - ".$e->getMessage();
            return false;
        }
    }

    public function update($chk = 1){
        $id = htmlspecialchars($_POST['check']);
        try{
            $sth = $this->dbh->prepare('UPDATE task SET is_checked = :check WHERE id = :id');
            $sth->bindParam(':check', $chk);
            $sth->bindParam(':id', $_POST['check']);
            $sth->execute();

        } catch (PDOException $e) {
            echo "Cant update DB - " . $e->getMessage();
        }
    }

}