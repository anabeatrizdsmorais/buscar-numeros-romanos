<?php
    require ('../controllers/conexao.php');

    $sql = "SELECT * FROM dados ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de dados</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h2>Entrada de dados</h2>
        <br>
        <form action="../controllers/insert.php" method="post">
            <div class="row">

                <div class="col-md-6">
                    <label for="texto">Digite uma palavra:</label>
                    <input class="form-control" type="text" name="texto">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit" id="button" style="margin-top: 25px;">Enviar</button>
                </div>
            </div>
        </form>

        <hr>
    
        <h2>Saida de dados</h2> <small>Obs.: API está no arquivo api.php</small>
        <br>
        <br>
        <?php
            $retorno = [];
            if(mysqli_num_rows($res) > 0) {
                while($ret = mysqli_fetch_array($res)) {
                    $retorno = [
                        "text" => $ret['text'],
                        "number" => $ret['number'],
                        "value" => $ret['value'],
                    ];
                    echo json_encode($retorno, JSON_PRETTY_PRINT);
                }
            }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>