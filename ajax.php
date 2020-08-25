<?php
include ("dbConn.php");

$action=$_POST["action"];

switch ($action)
{
    case "universite":
        $db=new dbConn();
        return $db->getUniversitelerList();
        break;

    case "fakulte":
        $db=new dbConn();
        $universite_id=$_POST["name"];
        return $db->getFakultelerList($universite_id);
        break;

    case "bolumler":
        $db=new dbConn();
        $il=$_POST["name"];
        return $db->getBolumlerList($il);
        break;
}