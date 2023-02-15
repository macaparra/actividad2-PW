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
    <h1>Bienvenido al sistema de notas: &#128590</h1>
    <form action="home.php" method="post" >
        <p>Cantidad de alumnos: <input type="number" name="amount" required="required" min="1" oninvalid="this.setCustomValidity('Ingresa una cantidad mayor a 0')"
                oninput="this.setCustomValidity('')"></p>
        <input type="submit" value="Enviar"><br><br>
    </form>
    <?php
        if($_POST){
            $amount = $_POST["amount"];
            $i=1;
            ?>    
            <form action="index.php?amount=<?php echo $amount ?>". method="post">
            <?php   
            while($i<=$amount){
                echo"&#128590 Alumno ".$i;
                ?>      
                <br>
                <br>

                <label class="title" for="cedulaid">&#128204 Numero de cedula de identidad del alumno:</label> <br>
                <input type="number" name="cedula<?php echo $i?>" required="required"  id="cedulaid"><br><br>

                <label class="title" for="nombreid"> &#128204 Nombre del Alumno:</label> <br>
                <input type="text" name="nombre<?php echo $i?>" required="required" id="nombreid" require="" pattern="[a-zA-Z]+" oninvalid="this.setCustomValidity('Solo puedes ingresar letras y sin espacios Ej:Macarena')"
                oninput="this.setCustomValidity('')" ><br><br>

                <label class="title" for="matematicasid">&#128204 Nota de matematicas:</label> <br>
                <input type="number" name="matematicas<?php echo $i?>" required="required" min="1" max="20" oninvalid="this.setCustomValidity('Ingresa una cantidad mayor a 0 o menor a 20')"
                oninput="this.setCustomValidity('')" id="matematicasid"><br><br>

                <label class="title" for="fisicaid">&#128204 Nota de fisica:</label> <br>
                <input type="number" name="fisica<?php echo $i?>" required="required" min="1" max="20" oninvalid="this.setCustomValidity('Ingresa una cantidad mayor a 0 o menor a 20')"
                oninput="this.setCustomValidity('')" id="fisicaid"><br><br>

                <label class="title" for="programacionid">&#128204 Nota de programacion:</label> <br>
                <input type="number" name="programacion<?php echo $i?>" required="required" min="1" max="20" oninvalid="this.setCustomValidity('Ingresa una cantidad mayor a 0 o menor a 20')"
                oninput="this.setCustomValidity('')" id="programacionid"><br><br>

                <hr class="line"><br>

                <?php
                $i++;
            }
            ?>

            <input class="boton" name="btn" value="Calcular" type="submit" value="Calcular">
            <input class="boton" type="reset" name="btn" value="Limpiar">
            </form>
            <?php
        }
    ?>
</body>
</html>