<?php
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
public function getUniList()
{
    $data=array();
    $query = self::$db->query("SELECT *  from universiteler", PDO::FETCH_ASSOC);
    if($query->rowCount())
    {
        foreach ($query as $row)
        {
            $data[]=$row["universite_adi"];
        }
    }
    echo json_encode($data);
}

//İlleri getiren fonksiyon
public function getIlList($bolge){
  $data=array();
  $query = self::$db->prepare("SELECT DISTINCT il FROM ilveilceler WHERE bolge=:bolge");
  $query->execute(array(":bolge"=>$bolge));
  if($query->rowCount())
  {
  foreach ($query as $row)
  {
  $data[]=$row["il"];
  }
  }
  echo json_encode($data);
  }

}

$db=new dbConn();
$db->getUniList();
