<html>
<head>
    <title>İl ilçe PDO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-12"><h1>PHP PDO ve MySQL ile il ilçe seçme</h1><hr></div>

        <div class="col-md-3">
            <label for="universite">üniver</label>
            <select name="universite" id="universite" class="form-control">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="fakulte">fakulte</label>
            <select name="fakulte" id="fakulte" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="bolumler">bolumler</label>
            <select name="bolumler" id="bolumler" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        ajaxFunc("universite", "", "#universite");

        $("#universite").on("change", function(){

            $("#fakulte").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("fakulte", $(this).val(), "#fakulte");

        });

        $("#fakulte").on("change", function(){

            $("#bolumler").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("bolumler", $(this).val(), "#bolumler");

        });

        function ajaxFunc(action, name, id ){
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {action:action, name:name},
                success: function(sonuc){
                    console.log (sonuc);
                    $.each($.parseJSON(sonuc), function(index, value){
                        var row="";
                        row +='<option value="'+value.id+'">'+value.adi+'</option>';
                        $(id).append(row);
                    });
                }});
        }
    });
</script>
</body>
</html>