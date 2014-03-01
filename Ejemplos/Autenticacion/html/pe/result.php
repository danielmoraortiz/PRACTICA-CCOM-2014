<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Standarized Patient - Clinical Skills Evaluation Patient Note | School of Medicine</title>
</head>

<body>

<?php
include '../../common/paciente_log.php';
include '../../common/paciente_functions.php';
// Include database connection and functions here.
sec_session_start(); // Our custom secure way of starting a php session. 

if(login_check($mysqli) == true) {
 
   // Add your protected page content here!
 
} else {
   echo 'You are not authorized to access this page, please login. <br/>';
}

// Check if the exam was taken ----------------

$query2 = "SELECT id_stu_examen, timestamp FROM estudiante_examen WHERE id_stu_examen = '$_SESSION[email]'";
$result2 = $mysqli->query($query2);   
$row2 = mysqli_fetch_array($result2, MYSQLI_NUM);

if ($row2 >= 1) {
	echo "<h1>The exam was already taken on  ".$row2[1]."</h1><br> ";
	echo "If you think this is an error, contact your proctor.";
	exit ();
}	

$history = $_POST["history"]; 
$physical = $_POST["physical"]; 

// Tabla 1 -------------------------------------------------------

$diagnosis_01 = $_POST["diagnosis_01"]; 
$tbl_01_linea01 = $_POST["diagnose_01_cell_01"]; 
$tbl_01_linea02 = $_POST["txtRow_diagnose_01_cell_01"]; 
$tbl_01_col01 = $_POST["diagnose_01_cell_02"]; 
$tbl_01_col02 = $_POST["txtRow_diagnose_01_cell_02"]; 

// Tabla 2 -------------------------------------------------------
$diagnosis_02 = $_POST["diagnosis_02"]; 

$tbl_02_linea01 = $_POST["diagnose_02_cell_01"]; 
$tbl_02_linea02 = $_POST["txtRow_diagnose_02_cell_01"]; 
$tbl_02_col01 = $_POST["diagnose_02_cell_02"]; 
$tbl_02_col02 = $_POST["txtRow_diagnose_02_cell_02"]; 

// Tabla 3 -------------------------------------------------------
$diagnosis_03 = $_POST["diagnosis_03"]; 

$tbl_03_linea01 = $_POST["diagnose_03_cell_01"]; 
$tbl_03_linea02 = $_POST["txtRow_diagnose_03_cell_01"]; 
$tbl_03_col01 = $_POST["diagnose_03_cell_02"]; 
$tbl_03_col02 = $_POST["txtRow_diagnose_03_cell_02"]; 

// Tabla 4 -------------------------------------------------------

$study_cell_01 = $_POST["study_cell_01"]; 
$study_cell_02 = $_POST["txtRow_study_cell_01"]; 

$valor = "";
$tbl_01_linea02_extracted = "";
$tbl_01_col02_extracted = "";
$tbl_02_linea02_extracted = "";
$tbl_02_col02_extracted = "";
$tbl_03_linea02_extracted ="";
$tbl_03_col02_extracted = "";
$study_cell_02_extracted ="";

// Sacar los valores del arreglo, y guardarlos por separados dentro de la variable usando []
foreach ($tbl_01_linea02 as $valor) {
	$tbl_01_linea02_extracted .= "[".$valor."]";
}$valor = "";

// Sacar los valores del arreglo, y guardarlos por separados dentro de la variable usando []
foreach ($tbl_01_col02 as $valor) {
	$tbl_01_col02_extracted .= "[".$valor."]";
}$valor = "";

// Sacar los valores del arreglo, y guardarlos por separados dentro de la variable usando []
foreach ($tbl_02_linea02 as $valor) {
	$tbl_02_linea02_extracted .= "[".$valor."]";
}$valor = "";

// Sacar los valores del arreglo, y guardarlos por separados dentro de la variable usando []
foreach ($tbl_02_col02 as $valor) {
	$tbl_02_col02_extracted .= "[".$valor."]";
}$valor = "";

// Sacar los valores del arreglo, y guardarlos por separados dentro de la variable usando []
foreach ($tbl_03_linea02 as $valor) {
	$tbl_03_linea02_extracted .= "[".$valor."]";
}$valor = "";

// Sacar los valores del arreglo, y guardarlos por separados dentro de la variable usando []
foreach ($tbl_03_col02 as $valor) {
	$tbl_03_col02_extracted .= "[".$valor."]";
}$valor = "";

// Sacar los valores del arreglo, y guardarlos por separados dentro de la variable usando []
foreach ($study_cell_02 as $valor) {
	$study_cell_02_extracted .= "[".$valor."]";
}$valor = "";

$status = '1';

if ($insert_stmt_exam = $mysqli->prepare("INSERT INTO estudiante_examen (id_stu_examen, history, physical, diagnosis_01, tbl_01_linea01, tbl_01_linea02, tbl_01_col01, tbl_01_col02, diagnosis_02,tbl_02_linea01, tbl_02_linea02, tbl_02_col01, tbl_02_col02, diagnosis_03, tbl_03_linea01, tbl_03_linea02, tbl_03_col01, tbl_03_col02, study_cell_01, study_cell_02,status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?)")) {    
$insert_stmt_exam->bind_param('sssssssssssssssssssss', $_SESSION['email'], $history, $physical, $diagnosis_01, $tbl_01_linea01, $tbl_01_linea02_extracted, $tbl_01_col01, $tbl_01_col02_extracted, $diagnosis_02,$tbl_02_linea01, $tbl_02_linea02_extracted, $tbl_02_col01, $tbl_02_col02_extracted, $diagnosis_03, $tbl_03_linea01, $tbl_03_linea02_extracted, $tbl_03_col01, $tbl_03_col02_extracted, $study_cell_01, $study_cell_02_extracted, $status); 
   // Execute the prepared query.
   $insert_stmt_exam->execute();
   echo "Data inserted succesfully.<br>";
   header('Location: ./index2.php');
}
else {
echo "An has ocurred with your exam. Contact your proctor.";
}
?>

</body>
</html>