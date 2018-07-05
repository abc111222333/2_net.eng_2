<?php
class class_db
{

    private $username = "root";
    private $password = '';
    private $dsn = "mysql:host=localhost;dbname=rez";
    private $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    public $db;


    public function __construct()
    {
        try {
            $this->db = new PDO($this->dsn, $this->username, $this->password, $this->attr);            // set the PDO error mode to exception
            $this->db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }




    }



    function beginTransaction(){
        $this->db->beginTransaction();
    }
    function commitTransaction(){
        $this->db->commit();
    }
    function rollBack(){
        $this->db->rollBack();
    }

    function doSelect($sql, $values = array(), $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {
        try{
            $stmt = $this->db->prepare($sql);
            foreach ($values as $key => $value) {
                $stmt->bindValue($key + 1, $value);
            }
            $stmt->execute();
            if ($fetch == '') {
                $result = $stmt->fetchAll($fetchStyle);
            } else {
                $result = $stmt->fetch($fetchStyle);
            }
            return $result;
        }
        catch (PDOException $e) {

            $error="error";
            return $error;
        }


    }


    public function select($sql, $array = array(), $style = PDO::FETCH_ASSOC)
    {
        try{$stmt = $this->db->prepare($sql);

            foreach ($array as $key => $value) {

                $stmt->bindValue($key + 1, $value);


            }/*forach*/

            $stmt->execute();

            $result = $stmt->fetchAll($style);


            return $result;}
        catch (PDOException $e) {

            $error="error";
            return $error;
        }



    }/*select*//*select*/


    function myquery($sql, $array = array())
    {
        try {
            $stmt = $this->db->prepare($sql);

            foreach ($array as $key => $value) {

                $stmt->bindvalue($key + 1, $value);


            }/*foreach*/

            //  $stmt->execute();
            if($stmt->execute()){

                return 1;

            }
            else{
                return 0;
            }


        } catch (PDOException $e) {

            //   $error="error";
            return 0;
        }
    }

    /*update*/


    function num($sql, $array = array())
    {

        try{
            $stmt = $this->db->prepare($sql);

            foreach ($array as $key => $value) {

                $stmt->bindvalue($key + 1, $value);


            }/*foreach*/

            $stmt->execute();

            return $stmt->rowCount();
        }   catch (PDOException $e) {

            $error="error";
            return $error;
        }



    }/*num*/








    ///////////////





}/*class*/


?>








