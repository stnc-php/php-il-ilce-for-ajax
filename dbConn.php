<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/22/2018
 * Time: 22:19
 */

class dbConn
{
    protected static $db;


    //veritabanına bağlanan fonksiyon
    public function __construct()
    {
        try{
            self::$db = new PDO("mysql:host=localhost;dbname=aysun;charset=utf8", "root", "");
        }
        catch (PDOException $exception)
        {
            print $exception->getMessage();
        }
    }

    //Bölgeleri getiren fonksiyon
    public function getUniversitelerList()
    {
        $data=array();
        $query = self::$db->query("SELECT * from universiteler", PDO::FETCH_ASSOC);
        if($query->rowCount())
        {
            foreach ($query as $key => $row)
            {
                $data[$key]["adi"]=$row["universite_adi"];
                $data[$key]["id"]=$row["uni_id"];
            }
        }
        echo json_encode($data);
    }


    //İlleri getiren fonksiyon
    public function getFakultelerList($universite_id){
        $data=array();
        $query = self::$db->prepare("SELECT *  FROM fakulteler WHERE universite_id=:universite_id");
        $query->execute(array(":universite_id"=>$universite_id));
        if($query->rowCount())
        {
            foreach ($query as  $key => $row)
            {
                $data[$key]["adi"]=$row["fakulte_ismi"];
                $data[$key]["id"]=$row["fakulte_id"];
            }
        }
        echo json_encode($data);
    }


    //İlçeleri getiren fonksiyon
    public function getBolumlerList($fakulte_id){
        $data=array();
        $query = self::$db->prepare("SELECT *  FROM bolumler WHERE fakulte_id=:fakulte_id");
        $query->execute(array(":fakulte_id"=>$fakulte_id));
        if($query->rowCount())
        {
            foreach ($query as   $key =>$row)
            {
                $data[$key]["adi"]=$row["bolum_adi"];
                $data[$key]["id"]=$row["id"];
            }
        }
        echo json_encode($data);
    }
}