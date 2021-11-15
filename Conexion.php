<?php
$host = 'diegonavarrete.database.windows.net';
$username = 'DIEGONAVARRETE-';
$password = 'America2024';
$db_name = 'pasaporte_covid';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

//Create an Insert prepared statement and run it
$TIPO_DOCUMENTO = "";
$NUMERO_DOCUMENTO = "";
$NOMBE_APELLIDO = "";
$CIUDAD = "";
$REGIMEN = "";
$EPS = "";
$CENTRO_ATENCION = "";
$FECHA_PRUEBA = "";
$RESULTADO = "";
$TIPO_VACUNA = "";
$LUGAR_VACUNACION = "";
$FECHA_PRIMERA_DOSIS = "";
$FECHA_SEGUNDA_DOSIS = "";
if ($stmt = mysqli_prepare($conn, "INSERT INTO REGRISTRO (TIPO_DOCUMENTO, NUMERO_DOCUMENTO, NOMBE_APELLIDO, CIUDAD, REGIMEN, EPS, CENTRO_ATENCION, FECHA_PRUEBA, RESULTADO, TIPO_VACUNA, LUGAR_VACUNACION, FECHA_PRIMERA_DOSIS, FECHA_SEGUNDA_DOSIS) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
mysqli_stmt_bind_param($stmt, 'ssd', $TIPO_DOCUMENTO, $NUMERO_DOCUMENTO, $NOMBE_APELLIDO, $CIUDAD, $REGIMEN, $EPS, $CENTRO_ATENCION, $FECHA_PRUEBA, $RESULTADO, $TIPO_VACUNA, $LUGAR_VACUNACION, $FECHA_PRIMERA_DOSIS, $FECHA_SEGUNDA_DOSIS);
mysqli_stmt_execute($stmt);
printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
mysqli_stmt_close($stmt);
}

//Run the Select query
printf("Reading data from table: \n");
$res = mysqli_query($conn, 'SELECT * FROM REGISTRO');
while ($row = mysqli_fetch_assoc($res)) {
var_dump($row);
}

//Close the connection
mysqli_close($conn);
?>


