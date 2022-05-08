<?php 
        require ('../controllers/conexao.php');

        $retorno = [];
        $sql = "SELECT * FROM dados ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0) {
            while($ret = mysqli_fetch_array($res)) {
                $retorno[] = [
                    "text" => $ret['text'],
                    "number" => $ret['number'],
                    "value" => $ret['value'],
                ];
            }
        } else {
            $retorno = [
                "error" => "Nenhum valor romano foi encontrado"
            ];
        }
        echo json_encode($retorno, JSON_PRETTY_PRINT);
?>
