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

$id_stu = $_REQUEST["id_stu"]; 
$id_exam = $_REQUEST["id_exam"]; 
$history = $_REQUEST["history"]; 
$history_score = $_REQUEST["history_score"]; 
$physical = $_REQUEST["physical"]; 
$physical_score = $_REQUEST["physical_score"]; 
$diagnosis_01 = $_REQUEST["diagnosis_01"]; 
$diagnosis_01_score = $_REQUEST["diagnosis_01_score"]; 
$diagnosis_01_history_finding = $_REQUEST["diagnosis_01_history_finding"]; 
$diagnosis_01_history_finding_score = $_REQUEST["diagnosis_01_history_finding_score"]; 
$diagnosis_01_physical_finding = $_REQUEST["diagnosis_01_physical_finding"]; 
$diagnosis_01_physical_finding_score = $_REQUEST["diagnosis_01_physical_finding_score"]; 
$diagnosis_02 = $_REQUEST["diagnosis_02"]; 
$diagnosis_02_score = $_REQUEST["diagnosis_02_score"]; 
$diagnosis_02_history_finding = $_REQUEST["diagnosis_02_history_finding"]; 
$diagnosis_02_history_finding_score = $_REQUEST["diagnosis_02_history_finding_score"]; 
$diagnosis_02_physical_finding = $_REQUEST["diagnosis_02_physical_finding"]; 
$diagnosis_02_physical_finding_score = $_REQUEST["diagnosis_02_physical_finding_score"]; 
$diagnosis_03 = $_REQUEST["diagnosis_03"]; 
$diagnosis_03_score = $_REQUEST["diagnosis_03_score"]; 
$diagnosis_03_history_finding = $_REQUEST["diagnosis_03_history_finding"]; 
$diagnosis_03_history_finding_score = $_REQUEST["diagnosis_03_history_finding_score"]; 
$diagnosis_03_physical_finding = $_REQUEST["diagnosis_03_physical_finding"]; 
$diagnosis_03_physical_finding_score = $_REQUEST["diagnosis_03_physical_finding_score"]; 
$diagnostic_study = $_REQUEST["diagnostic_study"]; 
$diagnostic_study_score = $_REQUEST["diagnostic_study_score"]; 
// Data de la tabla del examen con notas -------------
$query2 = "SELECT * FROM estudiante_nota_02 WHERE id_stu = '$id_stu'";
$result2 = $mysqli->query($query2);   
$row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
// coteja si se corrigio -------------------   
if ($row2 >= 1) {
	$query_name = "SELECT username FROM members WHERE id = '$row2[27]'";
	$result_name = $mysqli->query($query_name);   
	$row_name = mysqli_fetch_array($result_name, MYSQLI_NUM);
	echo "<h1>The exam was already grade it on  ".$row2[28]." by ".$row_name[0].".</h1><br> ";
	echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"Go Back\" ONCLICK=\"history.go(-1)\"></FORM>";
	exit ();
} // -------------------------------------------
echo "<h1>$exam_name</h1><hr>";
if ($insert_stmt_exam = $mysqli->prepare("INSERT INTO estudiante_nota_02 (id_stu, id_exam, history, history_score, physical, physical_score, diagnosis_01, 
diagnosis_01_score, diagnosis_01_history_finding, diagnosis_01_history_finding_score, 
diagnosis_01_physical_finding, diagnosis_01_physical_finding_score, diagnosis_02, diagnosis_02_score, 
diagnosis_02_history_finding, diagnosis_02_history_finding_score, diagnosis_02_physical_finding, 
diagnosis_02_physical_finding_score, diagnosis_03, diagnosis_03_score, diagnosis_03_history_finding, 
diagnosis_03_history_finding_score, diagnosis_03_physical_finding, diagnosis_03_physical_finding_score,
diagnostic_study, diagnostic_study_score, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?)")) {    
$insert_stmt_exam->bind_param('sssssssssssssssssssssssssss', $id_stu, $id_exam, $history, $history_score, $physical, $physical_score, $diagnosis_01, 
$diagnosis_01_score, $diagnosis_01_history_finding, $diagnosis_01_history_finding_score, $diagnosis_01_physical_finding, 
$diagnosis_01_physical_finding_score, $diagnosis_02, $diagnosis_02_score, $diagnosis_02_history_finding, 
$diagnosis_02_history_finding_score, $diagnosis_02_physical_finding, $diagnosis_02_physical_finding_score,  $diagnosis_03, 
$diagnosis_03_score, $diagnosis_03_history_finding, $diagnosis_03_history_finding_score, $diagnosis_03_physical_finding,
$diagnosis_03_physical_finding_score, $diagnostic_study, $diagnostic_study_score, $_SESSION['user_id']); 
   // Execute the prepared query.
   $insert_stmt_exam->execute();
   echo "Grade fully made it";
}
?>

<!-- InstanceEndEditable -->
<?php echo "<br><p>Logina as: ".$_SESSION['username']."(".$_SESSION['nivel'].")</p>";
 ?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
