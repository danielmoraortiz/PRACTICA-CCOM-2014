<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/standarnote.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Standarized Patient - Clinical Skills Evaluation Patient Note | School of Medicine</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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

<h2>
  <?php 
include '../../common/paciente_log.php';
include '../../common/paciente_functions.php';
// Include database connection and functions here.
sec_session_start(); // Our custom secure way of starting a php session. 

if(!check_level($_SESSION['nivel']) == true) {
	   echo "Access denied, due access level. Contact the administrator.<br>" ;
	   exit(); 
}

$id_stu = $_REQUEST["id_stu"]; 
$id_exam = $_REQUEST["id_exam"]; 
$exam_name = $_REQUEST["exam_name"]; 

// Data de la tabla del examen contestado -------------
$query = "SELECT * FROM estudiante_examen WHERE id_stu_examen = '$id_stu'";
$result = $mysqli->query($query);   
$row = mysqli_fetch_array($result, MYSQLI_NUM);

// Data de la tabla del examen con notas -------------
$query2 = "SELECT * FROM estudiante_nota WHERE id_stu = '$id_stu'";
$result2 = $mysqli->query($query2);   
$row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
   
$total_score = 0;
$total_score = $total_score + $row2[4] + $row2[6] + $row2[8] + $row2[10] + $row2[12] + $row2[14] + $row2[16] + $row2[18] + $row2[20] + $row2[22] + $row2[24] + $row2[26];
if ($total_score == 0){
	echo "This exam has not been graded!";
	echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"Go Back\" ONCLICK=\"history.go(-1)\"></FORM>";
	exit ();
	}
echo "<h1>Score: ".$total_score."</h1> ";

 ?>

<form id="form1" name="form1" method="post" action="give_grade.php">
  <table width="100%" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td colspan="2"><h2>HISTORY</h2></td>
    </tr>
    <tr>
      <td width="14%" valign="top">Response:</td>
      <td width="86%"><?php echo $row[2];?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td>
     <?php echo $row2[3];?>
     </td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[4];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>PHYSICAL EXAMINATION</strong></td>
    </tr>
    <tr>
      <td width="14%" valign="top">Response:</td>
      <td><?php echo $row[3];?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[5];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[6];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>DATA INTERPRETATION</strong></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><h3>Diagnosis #1</h3></td>
    </tr>
    <tr>
      <td width="14%" valign="top">Response:</td>
      <td><?php echo $row[4];
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[7];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="diagnosis_01_score">
        <label for="diagnosis_01_score"></label>
      <span class="textfieldRequiredMsg">A value is required.</span><?php echo $row2[8];?></span></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>Diagnosis #1 - History Finding(s) </strong></td>
    </tr>
    <tr>
      <td width="14%" valign="top">Response:</td>
      <td>
	  <?php 
	  echo $row[5]."<br>";
	  $parts = preg_split('/(\[.*?\])/', $row[6], null, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($parts as $valor) {
			$square_bracket = array("[", "]");
			$no_brackets = str_replace($square_bracket, "", $valor);
    		echo $no_brackets."<br>";;
		}
	   ?>
       </td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[9];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[10];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>Diagnosis #1 - Physical Exam Finding(s) </strong></td>
    </tr>
    <tr>
      <td width="14%" valign="top">Response:</td>
      <td><?php 
	  echo $row[7]."<br>";
	  $parts = preg_split('/(\[.*?\])/', $row[8], null, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($parts as $valor) {
			$square_bracket = array("[", "]");
			$no_brackets = str_replace($square_bracket, "", $valor);
    		echo $no_brackets."<br>";;
		}
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[11];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[12];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><h3>Diagnosis #2</h3></td>
    </tr>
    <tr>
      <td valign="top">Response:</td>
      <td><?php echo $row[9];
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[13];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield5">
        <label for="diagnosis_02_score"></label>
        <span class="textfieldRequiredMsg">A value is required.</span><?php echo $row2[14];?></span></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>Diagnosis #2 - History Finding(s) </strong></td>
    </tr>
    <tr>
      <td valign="top">Response:</td>
      <td><?php 
	  echo $row[10]."<br>";
	  $parts = preg_split('/(\[.*?\])/', $row[11], null, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($parts as $valor) {
			$square_bracket = array("[", "]");
			$no_brackets = str_replace($square_bracket, "", $valor);
    		echo $no_brackets."<br>";;
		}
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[15];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[16];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>Diagnosis #2 - Physical Exam Finding(s) </strong></td>
    </tr>
    <tr>
      <td valign="top">Response:</td>
      <td><?php 
	  echo $row[12]."<br>";
	  $parts = preg_split('/(\[.*?\])/', $row[13], null, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($parts as $valor) {
			$square_bracket = array("[", "]");
			$no_brackets = str_replace($square_bracket, "", $valor);
    		echo $no_brackets."<br>";;
		}
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[17];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[18];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><h3>Diagnosis #3</h3></td>
    </tr>
    <tr>
      <td valign="top">Response:</td>
      <td><?php echo $row[14];
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[19];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[20];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>Diagnosis #3 - History Finding(s) </strong></td>
    </tr>
    <tr>
      <td valign="top">Response:</td>
      <td><?php 
	  echo $row[15]."<br>";
	  $parts = preg_split('/(\[.*?\])/', $row[16], null, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($parts as $valor) {
			$square_bracket = array("[", "]");
			$no_brackets = str_replace($square_bracket, "", $valor);
    		echo $no_brackets."<br>";;
		}
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[21];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[22];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><strong>Diagnosis #3 - Physical Exam Finding(s) </strong></td>
    </tr>
    <tr>
      <td valign="top">Response:</td>
      <td><?php 
	  echo $row[17]."<br>";
	  $parts = preg_split('/(\[.*?\])/', $row[18], null, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($parts as $valor) {
			$square_bracket = array("[", "]");
			$no_brackets = str_replace($square_bracket, "", $valor);
    		echo $no_brackets."<br>";;
		}
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[23];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[24];?></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><h2>Diagnostic Study/Studies </h2></td>
    </tr>
    <tr>
      <td valign="top">Response:</td>
      <td><?php 
	  echo $row[19]."<br>";
	  $parts = preg_split('/(\[.*?\])/', $row[20], null, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($parts as $valor) {
			$square_bracket = array("[", "]");
			$no_brackets = str_replace($square_bracket, "", $valor);
    		echo $no_brackets."<br>";;
		}
	   ?></td>
    </tr>
    <tr>
      <td valign="top">Comments:</td>
      <td><?php echo $row2[25];?></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><?php echo $row2[26];?></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
  

  
  <input name="id_stu" type="hidden" value="<?php echo $id_stu; ?>" />
   <input name="id_exam" type="hidden" value="<?php echo $id_exam; ?>" />
    <input type="submit" name="button" id="button" value="Submit" />
    <input type="reset" name="button2" id="button2" value="Reset" />
  </p>
</form>
<p>&nbsp;</p>

<!-- InstanceEndEditable -->
<?php echo "<br><p>Logina as: ".$_SESSION['username']."(".$_SESSION['nivel'].")</p>";
 ?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
