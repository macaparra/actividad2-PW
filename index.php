<?php
    $cantMat = 0;
    $cantFi = 0;
    $cantProg = 0;
    $promedioMatematicas = 0;
    $promedioFisica = 0;
    $promedioProgramacion = 0;
    $alumnosAprobados = 0;
    $alumnosAplazados = 0;
    $alumnosAprobadoTodo = 0;
    $alumnosAprobaronUna = 0;
    $alumnosAprobaronDos = 0;
    $notaMaximaMatematicas = 0;
    $notaMaximaFisica = 0;
    $notaMaximaProgramacion = 0;
    $data = $_POST;
    $flag = false;
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'],$queries);
    $amount = array_key_exists("amount",$queries)?$queries["amount"]:-1;
    $aMat = 0;
    $aFi = 0;
    $aProg = 0;
    $aplMat = 0;
    $aplaFi = 0;
    $aplProg = 0;
        for($i=0;$i<$amount+1;$i++){
        
            if( !empty($data['cedula'.$i])&&!empty($data['nombre'.$i])&&!empty($data['matematicas'.$i])&&!empty($data['fisica'.$i])&&!empty($data['programacion'.$i]) ) {
                $cantMat += $data['matematicas'.$i];
                $cantFi += $data['fisica'.$i];
                $cantProg += $data['programacion'.$i];
                if($data['matematicas'.$i]>9){
                    $aMat++;
                }
                if($data['fisica'.$i]>9){
                    $aFi++;
                }
                if($data['programacion'.$i]>9){
                    $aProg++;
                }
                if($data['matematicas'.$i]<10){
                    $aplMat++;
                }
                if($data['fisica'.$i]<10){
                    $aplaFi++;
                }
                if($data['programacion'.$i]<10){
                    $aplProg++;
                }
                $listQuantity = count(array_filter([$data['matematicas'.$i],$data['fisica'.$i],$data['programacion'.$i]], 
                    function ($value){
                        return $value>9;
                    }
                ));
                if($listQuantity===3){
                    $alumnosAprobadoTodo++;            
                }
                if($listQuantity===2){
                    $alumnosAprobaronDos++;
                }
                if($listQuantity===1){
                    $alumnosAprobaronUna++;
                }
                $notaMaximaMatematicas =  $notaMaximaMatematicas < $data['matematicas'.$i]?$data['matematicas'.$i]:$notaMaximaMatematicas;
                $notaMaximaFisica = $notaMaximaFisica < $data['fisica'.$i]?$data['fisica'.$i]:$notaMaximaFisica;
                $notaMaximaProgramacion = $notaMaximaProgramacion < $data['programacion'.$i]?$data['programacion'.$i]:$notaMaximaProgramacion;
            }
        }
    $promedioMatematicas = $cantMat/$amount;
    $promedioFisica = $cantFi/$amount;
    $promedioProgramacion = $cantProg/$amount;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css"rel="stylesheet"/>
    <title>Actividad 2</title>
</head>
<body>
<div>
    <?php if($amount===-1){ ?>
        <div class="mensaje">
            <h1>Debes llenar todos los datos&#10071&#10071</h1>
            <button class="boton" type="submit" onClick="document.location.href='home.php'"> Volver</button>
        </div>
    <?php }else { ?>
        <h1>&#128203 Resultados:</h1>
        <div class="resultados">
            <h4>&#128203 Nota promedio de cada materia:</h4>
            <label for="PromedioMatematicas"> &#128204 Nota promedio Matematicas: <?php echo ($promedioMatematicas)?></label> <br><br>
            <label for="PromedioFisica"> &#128204 Nota promedio Fisica: <?php echo ($promedioFisica)?></label> <br><br>
            <label for="PromedioProgramacion"> &#128204 Nota promedio Programacion: <?php echo ($promedioProgramacion)?></label> <br><br>

            <h4>&#128203 Numero de alumnos aprobados en cada materia:</h4>
            <label for="AlumnosAprobados"> &#128204 Numero de alumnos aprobados en Matematicas: <?php echo($aMat)?></label> <br><br>
            <label for="AlumnosAprobados"> &#128204 Numero de alumnos aprobados en Fisica: <?php echo($aFi)?></label> <br><br>
            <label for="AlumnosAprobados"> &#128204 Numero de alumnos aprobados en Programacion: <?php echo($aProg)?></label> <br><br>
            
            <h4>&#128203 Numero de alumnos aplazados en cada materia:</h4>
            <label for="AlumnosAplazados"> &#128204 Numero de alumnos aplazados en Matematicas: <?php echo ($aplMat)?></label> <br><br>
            <label for="AlumnosAplazados"> &#128204 Numero de alumnos aplazados en Fisica: <?php echo ($aplaFi)?></label> <br><br>
            <label for="AlumnosAplazados"> &#128204 Numero de alumnos aplazados en Programacion: <?php echo ($aplProg)?></label> <br><br>

            <h4>&#128203 Numero de alumnos que aprobaron todas, una o dos materias:</h4>
            <label for="AlumnosAT"> &#128204 Numero de alumnos que aprobaron todas las materias: <?php echo round($alumnosAprobadoTodo)?></label> <br><br>
            <label for="AlumnosAU"> &#128204 Numero de alumnos que aprobaron una sola materia: <?php echo round($alumnosAprobaronUna)?></label> <br><br>
            <label for="AlumnosAD"> &#128204 Numero de alumnos que aprobaron dos materias: <?php echo round($alumnosAprobaronDos)?></label> <br><br>

            <h4>&#128203 Nota maxima de cada materia:</h4>
            <label for="NMMatematicas"> &#128204 Nota maxima Matematicas: <?php echo round($notaMaximaMatematicas)?></label> <br><br>
            <label for="NMoFisica"> &#128204 Nota maxima Fisica: <?php echo round($notaMaximaFisica)?></label> <br><br>
            <label for="NMProgramacion"> &#128204 Nota maxima Programacion: <?php echo round($notaMaximaProgramacion)?></label> <br><br><br>
            <button class="boton" type="submit" onClick="document.location.href='home.php'"> Volver</button>
        </div>
    <?php } ?>
</div>
</body>
</html>