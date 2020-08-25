<?php



$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
try {
    $conn = new PDO("mysql:host=$mysqlsunucu;dbname=aysun;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Bağlantı başarılı"; 
    }
catch(PDOException $e)
    {
    echo "Bağlantı hatası: " . $e->getMessage();
    }

    echo "<br>";

 $query = $conn->query("SELECT * FROM universiteler", PDO::FETCH_ASSOC);
 if ( $query->rowCount() ){

?>

  <label for="uni">Übiversiteler</label>

  <select id="uni" name="uni">
  <?php foreach( $query as $row ){ ?>
    <option value="<?php echo $row['id'] ?>"> <?php echo $row['universite_adi'] ?></option>
  <?php } ?>
  </select>
<?php 
}
?>
<label for="fak">fakulteler</label>

<select  disabled="disabled" id="fak" name="fak">
  <option value=""> Seçiniz </option>
</select>
