<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$phpVe = false;
$PDO = false;
$phpVersion = array('5.5', '5.4');

$pos = strripos(phpversion(), '.');
$rest = substr(phpversion(), 0, $pos);    // devuelve "f"
// verifico que php es bueno
if (in_array($rest, $phpVersion)) {
    $phpVe = true;
    echo '<h3>Version of php OK</h3>';
} else {
    echo '<h3>Error in the version of php </h3>';
}
// verifico si pdo existe
if (PDO::class == 'PDO') {
    $PDO = true;
    echo '<h3>Version of PDO OK</h3>';
} else {
    echo '<h3>Error in the version of PDO </h3>';
}

if ($phpVe && $PDO) {
    ?>
    <form class="form-horizontal" method="post" action="">
        <fieldset>

            <!-- Form Name -->
            <legend>  </legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Host">Host name</label>  
                <div class="col-md-4">
                    <input id="Host" name="Host" placeholder="" class="form-control input-md" required="" type="text" value="">

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="DB">Data base name</label>  
                <div class="col-md-4">
                    <input id="DB" name="DB" placeholder="" class="form-control input-md" required="" type="text" value="">

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="User">User</label>  
                <div class="col-md-4">
                    <input id="User" name="User" placeholder="" class="form-control input-md" required="" type="text" value="">

                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Pass">pass</label>  
                <div class="col-md-4">
                    <input id="Pass" name="Pass" placeholder="" class="form-control input-md"  type="text" value="">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-4">
                    <input type="submit"  id="save" name="button" type="button" class="btn btn-success" value ="Save">
                </div>
            </div>

        </fieldset>
    </form>

    <?php
}

var_dump($_POST);

if (isset($_POST['Host']) && isset($_POST['DB']) && isset($_POST['User']) && isset($_POST['Pass'])) {
    $result = CreationDataBase($_POST['Host'], $_POST['DB'], $_POST['User'], $_POST['Pass']);

    if ($result == 1) {
        $file = fopen("./app/config.php", "w+");
        fwrite($file, "<?php" . PHP_EOL);
        fwrite($file, '$dbName = ' . "'".$_POST['DB']."';" . PHP_EOL);
        fwrite($file, '$host = ' . "'".$_POST['Host']."';" . PHP_EOL);
        fwrite($file, '$user = ' . "'".$_POST['User']."';" . PHP_EOL);
        fwrite($file, '$pass = ' . "'".$_POST['Pass']."';" . PHP_EOL);
        fwrite($file, "?>" . PHP_EOL);
        fclose($file);
        echo '<input class="mkbutton" value="Descargar" name="submit" type="submit" onClick="javascript:window.location(\'tu_pagina.htm l\')" />';
    }
}

// primero me conecto a la mysql si no error
// despues creo la base
// despues me conecto a esta base de datos si no error
// leo el fichero de la base de datos si no error
// ejecuto el script contenido en el fichero de la base de datos  si no error




function CreationDataBase($Host, $DB, $User, $Pass) {
    $Host = 'mysql:host=' . $Host;

    try {
        $gbd = new PDO($Host, $User, $Pass);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return 0;
    }

    $sql = 'CREATE DATABASE IF NOT EXISTS ' . $DB . ' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;';

    try {
        $requete = $gbd->prepare($sql);
        $rel = $requete->execute();
    } catch (Exception $exc) {
        echo 'Error : ' . $exc->getMessage();
        return 0;
    }

    $dsn = 'mysql:dbname=' . $DB . ';' . $Host;
    try {
        $gbd = new PDO($dsn, $User, $Pass);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $linea = '';

    $fp = fopen("./app/dump/mySql.sql", "r");
    while (!feof($fp)) {
        $linea .= fgets($fp) . "\n";
    }
    echo '<pre>';
    echo $linea;
    echo '</pre>';
//        var_dump($linea);

    try {
        $requete = $gbd->prepare($linea);
        $rel = $requete->execute();
    } catch (Exception $exc) {
        echo 'Error : ' . $exc->getMessage();
        return 0;
    }

    fclose($fp);
    return 1;
}
