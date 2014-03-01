<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/standarnote.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Standarized Patient - Clinical Skills Evaluation Patient Note | School of Medicine</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<style type="text/css">
body {
	background-color: #F0F0F0;
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td width="142"><img src="images/logomed.png" width="142" height="149" align="middle" /></td>
    <td colspan="2"><h1>Standarized Patient<br />
    Clinical Skills Evaluation Patient Note </h1></td>
  </tr>
  <tr>
    <td colspan="3" align="left" bgcolor="#060"><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="login.php" title="Login">Login</a>        </li>
      <li><a href="logout.php" title="Logout">Logout</a></li>
      <li><a href="administracion.php" title="Administration" class="MenuBarItemSubmenu">Administration</a>
        <ul>
          <li><a href="#" title="Accounts" class="MenuBarItemSubmenu">Accounts</a>
            <ul>
              <li><a href="usuario_admin.php" title="Create Users">Create Users</a></li>
              <li><a href="#" title="Edit Users">Edit Users</a></li>
              <li><a href="user_list.php" title="List of Users">List of Users</a></li>
            </ul>
          </li>
          <li><a href="#" title="Grades" class="MenuBarItemSubmenu">Grades</a>
            <ul>
              <li><a href="exam_list.php" title="Taken Exams">Taken Exams</a></li>
            </ul>
          </li>
          <li><a href="#" title="Exams" class="MenuBarItemSubmenu">Exams</a>
            <ul>
<li><a href="#" title="Add Exam">Add Exam</a></li>
<li><a href="#" title="Edit Exam">Edit Exam</a></li>
<li><a href="user_exam_list.php" title="Exam List">Exam List</a></li>
            </ul>
          </li>
          <li><a href="#" title="Turns Administration" class="MenuBarItemSubmenu">Turns</a>
            <ul>
              <li><a href="#" title="Add Turn to list">Add Turn to list</a></li>
              <li><a href="#" title="Edit Turns">Edit Turns</a></li>
              <li><a href="user_list_turns.php" title="Student Lis">Student Lis</a></li>
<li><a href="upload_assign_exam_list_turns.php" title="Upload Turn List">Upload Turn List</a></li>
            </ul>
          </li>
          </ul>
        </li>
</ul></td>
  </tr>
</table>
<!-- InstanceBeginEditable name="EditRegion3" -->
<?php 
include '../../common/paciente_log.php';
include '../../common/paciente_functions.php';
// Include database connection and functions here.
sec_session_start(); // Our custom secure way of starting a php session. 

if(!check_level($_SESSION['nivel']) == true) {
	   echo "Access denied. Can't view users due access level. Contact the administrator.<br>" ;
	   exit(); 
}
$password = $_POST['p'];
$exam = addslashes($_REQUEST['exam']);

// ------------------ Subir archivo -----------------------------

	// Directorio para subir archivo
	$target_path = "/examenes/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
	//Verificar formato archivo
	$error_type = 0;

	$fileType = $_FILES['uploadedfile']['type']; 
    switch($fileType) { 
        case "application/x-csv": 
            echo "El archivo cumple con el formato establecido, y es valido<br>"; 
			echo "<br>";
            break; 
        default: 
            echo "El archivo \"".$_FILES['uploadedfile']['name']."\" no es valido. Solo pueden subirse archivos tipo application/x-csv.<br>"; 
			echo "<br>";
			$error_type = 1;
			break;
    } 
	if($error_type == 1){
		echo "Hay un error. El archivo \"".$_FILES['uploadedfile']['name']."\" no es valido.";
		echo "<FORM><INPUT TYPE=\"button\" VALUE=\"Regresar\" onClick=\"history.go(-1);return true;\"> </FORM>";

		break;
	}

	// Guardar archivo en el servidor
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	   	echo "El archivo ".  basename( $_FILES['uploadedfile']['name']). 
	   	" ha sido procesado con exito<br>";
		echo "<br>";
	}
	// Proceso subir datos a db
		$archivo_nomina = $_FILES['uploadedfile']['tmp_name'];
		$fcontents = file ('$archivo_nomina');

	if (is_uploaded_file($_FILES['uploadedfile']['tmp_name'])){
	//	readfile( $_FILES['uploadedfile']['tmp_name']);	
	}
     $filename=$archivo_nomina;
     $handle = fopen("$filename", "r");
	 $array_csv = array();
 	 $array_query = array();


     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
     {
		$array_csv[] = $data;

	 }


$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
// Create salted password (Careful not to over season)
$password = hash('sha512', $password.$random_salt);
$nivel_new = '3'; // student level


	$key2 = 0;
	$size = count($array_csv);
	$counter = $size -1;
	 for ($key = 0, $size = $counter; $key <= $size; $key++) { 	
		// Insertar datos en db
				$id_stu_new = $array_csv[$key][$key2];
				$name = $array_csv[$key][$key2+1];
				$ciclo = $array_csv[$key][$key2+2];
				$hora = $array_csv[$key][$key2+3];
				$fecha = $array_csv[$key][$key2+4];
		if ($insert_stmt_exam = $mysqli->prepare("INSERT INTO turnos (id_stu, ciclo, hora, fecha, 
			id_exam) 	VALUES (?, ?, ?, ?, ?)")) {    
			$insert_stmt_exam->bind_param('sssss', $id_stu_new, $ciclo, $hora, $fecha, $exam); 
   			// Execute the prepared query.
   			$insert_stmt_exam->execute();
   			//echo "Grade fully made it";
			//echo $id_stu." - ".$ciclo." - ".$hora." - ".$fecha." - ".$exam ."<br>";
 			//$insert_stmt_exam->close();
		} // end if ---------------
// Create user login -------------------------------------------------------------------------------

// Create a random salt

// check if exists -------------------------
   if ($existe = $mysqli->prepare("SELECT id, username, password, salt FROM members WHERE email = ? LIMIT 1")) { 
      $existe->bind_param('s', $id_stu_new); // Bind "$email_new" to parameter.
      $existe->execute(); // Execute the prepared query.
      $existe->store_result();
      $existe->bind_result($user_id, $username_new, $password, $random_salt); // get variables from result.
      $existe->fetch();
 
      if($existe->num_rows == 1) { // If the user exists
		echo "User exists. Press BACK buton to try again";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"Back\" ONCLICK=\"history.go(-1)\"></FORM>";
		exit();

	  }
   }
   // Using prepared Statements means that SQL injection is not possible. 
	if(login($id_stu_new, $password, $mysqli) == true) {
		echo "User exists, try again";
		exit();
	}
// Add your insert to database script here. 
// Make sure you use prepared statements!'
	if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, nivel) VALUES (?, ?, ?, ?, ?)")) {    
   	$insert_stmt->bind_param('sssss', $name, $id_stu_new, $password, $random_salt, $nivel_new); 
   	// Execute the prepared query.
   	$insert_stmt->execute();
   	//echo "User created succesfully.<br>";
	//$insert_stmt->close();
}

// end create user login ----------------------------------------------------------------------------

	 }// end for loop ----------------
	       header('Location: ./patient_log.php');

	if(mysql_error()) {
       	echo mysql_error() ."<br>\n";
		mail("daniel.mora2@upr.edu","Upload User Error - Patient Note",mysql_error());
	}

		$borrar_archivo_nomina = $archivo_nomina;
		unlink($borrar_archivo_nomina);


?><!-- InstanceEndEditable -->
<?php echo "<br><p>Logina as: ".$_SESSION['username']."(".$_SESSION['nivel'].")</p>";
 ?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
