<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/standarnote.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Standarized Patient - Clinical Skills Evaluation Patient Note | School of Medicine</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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

<p>
<script type="text/javascript">

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

</script> 
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
$exam_name = $_REQUEST["exam_name"]; 

// Data de la tabla del examen con notas -------------
$query2 = "SELECT * FROM estudiante_nota WHERE id_stu = '$id_stu'";
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




echo "<h1>$exam_name - Grade</h1><hr>";
$query = "SELECT * FROM estudiante_examen WHERE id_stu_examen = '$id_stu'";
$result = $mysqli->query($query);   
$row = mysqli_fetch_array($result, MYSQLI_NUM);


   
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
      <td><span id="sprytextarea1">
        <label for="history"></label>
        <textarea name="history" id="history" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield1">
      <label for="history_score"></label>
      <input name="history_score" type="text" id="history_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea2">
        <label for="physical"></label>
        <textarea name="physical" id="physical" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield2">
      <label for="physical_score"></label>
      <input name="physical_score" type="text" id="physical_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea3">
      <label for="diagnosis_01"></label>
      <textarea name="diagnosis_01" id="diagnosis_01" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="diagnosis_01_score">
        <label for="diagnosis_01_score"></label>
        <span id="sprytextfield12">
        <label for="diagnosis_01_score2"></label>
        <input name="diagnosis_01_score" type="text" id="diagnosis_01_score2" size="5" maxlength="3" />
        <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
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
      <td><span id="sprytextarea4">
        <label for="diagnosis_01_history_finding"></label>
        <textarea name="diagnosis_01_history_finding" id="diagnosis_01_history_finding" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield3">
      <label for="diagnosis_01_history_finding_score"></label>
      <input name="diagnosis_01_history_finding_score" type="text" id="diagnosis_01_history_finding_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea5">
        <label for="diagnosis_01_physical_finding"></label>
        <textarea name="diagnosis_01_physical_finding" id="diagnosis_01_physical_finding" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield4">
      <label for="diagnosis_01_physical_finding_score"></label>
      <input name="diagnosis_01_physical_finding_score" type="text" id="diagnosis_01_physical_finding_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea6">
        <label for="diagnosis_02"></label>
        <textarea name="diagnosis_02" id="diagnosis_02" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield5">
      <label for="diagnosis_02_score"></label>
      <input name="diagnosis_02_score" type="text" id="diagnosis_02_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea7">
        <label for="diagnosis_02_history_finding"></label>
        <textarea name="diagnosis_02_history_finding" id="diagnosis_02_history_finding" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield6">
      <label for="diagnosis_02_history_finding_score"></label>
      <input name="diagnosis_02_history_finding_score" type="text" id="diagnosis_02_history_finding_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea8">
        <label for="diagnosis_02_physical_finding"></label>
        <textarea name="diagnosis_02_physical_finding" id="diagnosis_02_physical_finding" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield7">
      <label for="diagnosis_02_physical_finding_score"></label>
      <input name="diagnosis_02_physical_finding_score" type="text" id="diagnosis_02_physical_finding_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea9">
        <label for="diagnosis_03"></label>
        <textarea name="diagnosis_03" id="diagnosis_03" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield8">
      <label for="diagnosis_03_score"></label>
      <input name="diagnosis_03_score" type="text" id="diagnosis_03_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea10">
        <label for="diagnosis_03_history_finding"></label>
        <textarea name="diagnosis_03_history_finding" id="diagnosis_03_history_finding" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield9">
      <label for="diagnosis_03_history_finding_score"></label>
      <input name="diagnosis_03_history_finding_score" type="text" id="diagnosis_03_history_finding_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea11">
        <label for="diagnosis_03_physical_finding"></label>
        <textarea name="diagnosis_03_physical_finding" id="diagnosis_03_physical_finding" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield10">
      <label for="diagnosis_03_physical_finding_score"></label>
      <input name="diagnosis_03_physical_finding_score" type="text" id="diagnosis_03_physical_finding_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
      <td><span id="sprytextarea12">
        <label for="diagnostic_study"></label>
        <textarea name="diagnostic_study" id="diagnostic_study" cols="100" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td valign="top">Score:</td>
      <td><span id="sprytextfield11">
      <label for="diagnostic_study_score"></label>
      <input name="diagnostic_study_score" type="text" id="diagnostic_study_score" size="5" maxlength="3" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
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
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer");
var sprytextarea3 = new Spry.Widget.ValidationTextarea("sprytextarea3", {isRequired:false});
var sprytextarea4 = new Spry.Widget.ValidationTextarea("sprytextarea4", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer");
var sprytextarea5 = new Spry.Widget.ValidationTextarea("sprytextarea5", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer");
var sprytextarea6 = new Spry.Widget.ValidationTextarea("sprytextarea6", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer");
var sprytextarea7 = new Spry.Widget.ValidationTextarea("sprytextarea7", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer");
var sprytextarea8 = new Spry.Widget.ValidationTextarea("sprytextarea8", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "integer");
var sprytextarea9 = new Spry.Widget.ValidationTextarea("sprytextarea9", {isRequired:false});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "integer");
var sprytextarea10 = new Spry.Widget.ValidationTextarea("sprytextarea10", {isRequired:false});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "integer");
var sprytextarea11 = new Spry.Widget.ValidationTextarea("sprytextarea11", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "integer");
var sprytextarea12 = new Spry.Widget.ValidationTextarea("sprytextarea12", {isRequired:false});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "integer");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "integer");
</script>
<!-- InstanceEndEditable -->
<?php echo "<br><p>Logina as: ".$_SESSION['username']."(".$_SESSION['nivel'].")</p>";
 ?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
