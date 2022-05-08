<?php
    require ('conexao.php');

    $text = $_POST['texto'];
    $textResult = str_split($text);
    $number = "";
    $value = 0;
    $soma = 0;

    for($k = 0; $k < count($textResult); $k++){
        if($textResult[$k] == "i" || $textResult[$k] == "I") {
            $number .= "I";
            $value += 1;
        } elseif($textResult[$k] == "v" || $textResult[$k] == "V"){
            $number .= "V";
            $value += 5;
        } elseif($textResult[$k] == "x" || $textResult[$k] == "X"){
            $number .= "X";
            $value += 10;
        } elseif($textResult[$k] == "l" || $textResult[$k] == "L"){
            $number .= "L";
            $value += 50;
        } elseif($textResult[$k] == "C" || $textResult[$k] == "C"){
            $number .= "C";
            $value += 100;
        } elseif($textResult[$k] == "d" || $textResult[$k] == "D"){
            $number .= "D";
            $value += 500;
        } elseif($textResult[$k] == "m" || $textResult[$k] == "M"){
            $number .= "M";
            $value += 1000;
        }

    }

    $sql_insert = " INSERT INTO dados (text, number, value) VALUES ('$text', '$number', '$value') ";
    $result = mysqli_query($conn, $sql_insert);
    
    if($result){
        echo "<script> 
            location.href = '../views/index.php'
        </script>";
    } else {
        echo "<script>
            alert('Erro');
            location.href = '../views/index.php';
        </script>";
    }
   
?>