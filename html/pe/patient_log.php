<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/standarnote.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Standarized Patient - Clinical Skills Evaluation Patient Note | School of Medicine</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->

<style type="text/css">
body {
  -webkit-user-select: none;
     -moz-user-select: -moz-none;
      -ms-user-select: none;
          user-select: none;
}
</style>
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
<script type="text/javascript">
// Tabla 01

function addRowToTable_01()
{
  var tbl = document.getElementById('tbl_01');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
//  var cellLeft = row.insertCell(0);
//  var textNode = document.createTextNode(iteration);
//  cellLeft.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(0);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow_diagnose_01_cell_01[]';
  el.id = 'txtRow' + iteration;
  el.size = 100;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  // right cell 2
  var cellRight2 = row.insertCell(1);
  var el2 = document.createElement('input');
  el2.type = 'text';
  el2.name = 'txtRow_diagnose_01_cell_02[]';
  el2.id = 'txtRow2' + iteration;
  el2.size = 100;
  
  el2.onkeypress = keyPressTest;
  cellRight2.appendChild(el2);
}
function keyPressTest(e, obj)
{
  var validateChkb = document.getElementById('chkValidateOnKeyPress');
  if (validateChkb.checked) {
    var displayObj = document.getElementById('spanOutput');
    var key;
    if(window.event) {
      key = window.event.keyCode; 
    }
    else if(e.which) {
      key = e.which;
    }
    var objId;
    if (obj != null) {
      objId = obj.id;
    } else {
      objId = this.id;
    }
    displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);

  }
}
function removeRowFromTable_01()
{
  var tbl = document.getElementById('tbl_01');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}
function openInNewWindow(frm)
{
  // open a blank window
  var aWindow = window.open('', 'TableAddRowNewWindow',
   'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
   
  // set the target to the blank window
  frm.target = 'TableAddRowNewWindow';
  
  // submit
  frm.submit();
}
function validateRow(frm)
{
  var chkb = document.getElementById('chkValidate');
  if (chkb.checked) {
    var tbl = document.getElementById('tbl_01');
    var lastRow = tbl.rows.length - 1;
    var i;
    for (i=1; i<=lastRow; i++) {
      var aRow = document.getElementById('txtRow' + i);
      if (aRow.value.length <= 0) {
        alert('Row ' + i + ' is empty');
        return;
      }
    }
  }
  openInNewWindow(frm);
}

function insertRowPHP()
{
  var tbl = document.getElementById('tblInsertRowPHP');
  var iteration = tbl.tBodies[0].rows.length;
  newRow = tbl.tBodies[0].insertRow(-1);
  var newCell = newRow.insertCell(0);
  newCell.innerHTML = 'row ' + iteration;
  var newCell1 = newRow.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow[]';
  el.id = 'txtRow' + iteration;
  el.size = 40;
  newCell1.appendChild(el);
}

// Tabla 02

function addRowToTable_02()
{
  var tbl = document.getElementById('tbl_02');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
//  var cellLeft = row.insertCell(0);
//  var textNode = document.createTextNode(iteration);
//  cellLeft.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(0);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow_diagnose_02_cell_01[]';
  el.id = 'txtRow' + iteration;
  el.size = 100;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  // right cell 2
  var cellRight2 = row.insertCell(1);
  var el2 = document.createElement('input');
  el2.type = 'text';
  el2.name = 'txtRow_diagnose_02_cell_02[]';
  el2.id = 'txtRow2' + iteration;
  el2.size = 100;
  
  el2.onkeypress = keyPressTest;
  cellRight2.appendChild(el2);
}
function removeRowFromTable_02()
{
  var tbl = document.getElementById('tbl_02');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}

// Tabla 03

function addRowToTable_03()
{
  var tbl = document.getElementById('tbl_03');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
//  var cellLeft = row.insertCell(0);
//  var textNode = document.createTextNode(iteration);
//  cellLeft.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(0);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow_diagnose_03_cell_01[]';
  el.id = 'txtRow' + iteration;
  el.size = 100;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  // right cell 2
  var cellRight2 = row.insertCell(1);
  var el2 = document.createElement('input');
  el2.type = 'text';
  el2.name = 'txtRow_diagnose_03_cell_02[]';
  el2.id = 'txtRow2' + iteration;
  el2.size = 100;
  
  el2.onkeypress = keyPressTest;
  cellRight2.appendChild(el2);
}
function removeRowFromTable_03()
{
  var tbl = document.getElementById('tbl_03');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}

// Tabla 04

function addRowToTable_04()
{
  var tbl = document.getElementById('tbl_04');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
//  var cellLeft = row.insertCell(0);
//  var textNode = document.createTextNode(iteration);
//  cellLeft.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(0);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow_study_cell_01[]';
  el.id = 'txtRow' + iteration;
  el.size = 50;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);

}
function removeRowFromTable_04()
{
  var tbl = document.getElementById('tbl_04');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}


</script>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

</script> 
<script>

//"Accept terms" form submission- By Dynamic Drive
//For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
//This credit MUST stay intact for use

var checkobj

function agreesubmit(el){
checkobj=el
if (document.all||document.getElementById){
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
var tempobj=checkobj.form.elements[i]
if(tempobj.type.toLowerCase()=="submit")
tempobj.disabled=!checkobj.checked
}
}
}

function defaultagree(el){
if (!document.all&&!document.getElementById){
if (window.checkobj&&checkobj.checked)
return true
else{
alert("Please read/accept terms to submit form")
return false
}
}
}

</script>
<?php 
include '../../common/paciente_log.php';
include '../../common/paciente_functions.php';
// Include database connection and functions here.
sec_session_start();
if(login_check($mysqli) == true) {
// ----------------------------------------

if(check_level($_SESSION['nivel']) == true) {
		echo "<h2>Choose the Administration menu if you are faculty or member of the administration group.</h2>";
	  exit();
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
// ------------------------------------------------
// Check if exam is on this date --------------------------------------------------------------------
	if ($stmt_list = $mysqli->prepare("SELECT id_stu, hora, fecha FROM turnos WHERE id_stu = ?")) { 
		$stmt_list->bind_param('s', $_SESSION['email']); // Bind "$email_new_new" to parameter.
      	$stmt_list->execute(); // Execute the prepared query.
      	$stmt_list->store_result();
      	$stmt_list->bind_result($id_stu, $hora_db, $fecha_db); // get variables from result.
    		/* execute statement */
    	mysqli_stmt_execute($stmt_list);
    		/* bind result variables */
    	mysqli_stmt_bind_result($id_stu, $hora_db, $fecha_db);
    	/* fetch values */
    	mysqli_stmt_fetch($stmt_list);
		    /* close statement */
    	$stmt_list->close();
	}
// Cotejar si examen corresponde con fecha
$dia = "";
$hora = "";
$dia = date("d/m/Y");
$hora = date("h:i a"); 
if ($dia != $fecha_db){
	echo "Your exam is schedule on ".$fecha_db.". If you think this is an error, contact your proctor.";
	exit();
	} else if (strtotime($hora) < strtotime($hora_db)){
			echo "Your exam time is schedule to start at ".$hora_db.". If you think this is an error, contact your proctor.";
			exit();

	} 
	
	
?>
<title>Results | Standarized Patient - Clinical Skills Evaluation Patient Note</title>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Patient Note</li>
    <li class="TabbedPanelsTab" tabindex="0">Clinical Scenario<br />
    </li>
</ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <h2 align="center">Clinical Skills Evaluation</h2>
      <h2 align="center">Clinical Scenario and Patient Note</h2>
      <h2 align="center">--- Once you complete the patient note, you will not be able to go back. ---</h2>
<p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="result.php" >
        <p>HISTORY: Describe the history you just obtained from this patient. Include only information (pertinent positives and negatives) relevant to this patient's problem(s). </p>
        <p><span id="sprytextarea1">
          <label for="history"></label>
          <textarea name="history" id="history" cols="150" rows="5"></textarea>
          <span class="textareaRequiredMsg">A value is required.</span></span></p>
        <p>
          <label for="txtPE"><strong>PHYSICAL EXAMINATION</strong>: Describe any positive   and negative findings relevant to this patient's problem(s). Be careful to   include <em>only</em> those parts of examination you performed in <em>this</em> encounter. </label>
        </p>
        <p><span id="sprytextarea2">
          <label for="physical"></label>
          <textarea name="physical" id="physical" cols="150" rows="5"></textarea>
          <span class="textareaRequiredMsg">A value is required.</span></span></p>
        <p>
          <label for="label"><strong>DATA INTERPRETATION</strong>: <em>Based on what you   have learned from the history and the physical examination</em>, list up to 3   diagnoses that might explain this patient's complaint(s). List your diagnoses   from most to least likely. For some cases, fewer than 3 diagnoses will be   appropriate. Then, enter the positive or negative findings from the history and   the physical examination (if present) that support each diagnosis. Lastly, list   initial <em>diagnostic</em> studies (if any) you would order for each listed   diagnosis (e.g. restricted physical exam maneuvers, laboratory tests, imaging,   ECG, etc.) </label>
        </p>
        <table width="87%" border="1" id="tbl_01">
          <tr>
            <th colspan="2"><div align="left">Diagnosis #1</div></th>
          </tr>
          <tr>
            <th colspan="2"><div align="left">
                <p>
                  <label for="diagnosis_01"></label>
                  <span id="sprytextfield1">
                  <label for="diagnosis_01"></label>
                  <input name="diagnosis_01" type="text" id="diagnosis_01" size="160" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></p>
              </div></th>
          </tr>
          <tr>
            <td width="480"><strong>History Finding(s) </strong> <span id="sprytextfield2">
              <input name="diagnose_01_cell_01" type="text" id="diagnose_01_cell_01" onkeypress="keyPressTest(event, this);" size="80" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td width="490" align="left"><strong>Physical Exam Finding(s) </strong> <span id="sprytextfield3">
              <label for="diagnose_01_cell_02"></label>
              <input name="diagnose_01_cell_02" type="text" id="diagnose_01_cell_02" onkeypress="keyPressTest(event, this);" size="80" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onclick="addRowToTable_01();" />
          <input type="button" value="Remove" onclick="removeRowFromTable_01();" />
        </p>
        <table width="99%" border="1" id="tbl_02">
          <tr>
            <th colspan="2"><div align="left">Diagnosis #2</div></th>
          </tr>
          <tr>
            <th colspan="2"><div align="left">
                <label for="diagnosis_01"></label>
                <input name="diagnosis_02" type="text" id="diagnosis_01" size="160" />
              </div></th>
          </tr>
          <tr>
            <td width="480"><p><strong>History Finding(s) <br />
                <input name="diagnose_02_cell_01" type="text"
     id="diagnose_02_cell_01" onkeypress="keyPressTest(event, this);" size="80"/>
                </strong></p></td>
            <td width="480" align="center"><p align="left"><strong>Physical Exam Finding(s)<br />
                <input type="text" name="diagnose_02_cell_02"
     id="diagnose_01_cell_2" size="80" onkeypress="keyPressTest(event, this);"/>
                </strong></p></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onclick="addRowToTable_02();" />
          <input type="button" value="Remove" onclick="removeRowFromTable_02();" />
        </p>
        <table width="66%" border="1" id="tbl_03">
          <tr>
            <th colspan="2"><div align="left">Diagnosis #3</div></th>
          </tr>
          <tr>
            <th colspan="2"><div align="left">
                <label for="diagnosis_01"></label>
                <input name="diagnosis_03" type="text" id="diagnosis_01" size="160" />
              </div></th>
          </tr>
          <tr>
            <td width="480"><p><strong>History Finding(s) <br />
                <input type="text" name="diagnose_03_cell_01"
     id="diagnose_03_cell_01" size="80" onkeypress="keyPressTest(event, this);"/>
                </strong></p></td>
            <td width="490" align="center"><p align="left"><strong>Physical Exam Finding(s)<br />
                <input type="text" name="diagnose_03_cell_02"
     id="diagnose_03_cell_02" size="80" onkeypress="keyPressTest(event, this);"/>
                </strong></p></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onclick="addRowToTable_03();" />
          <input type="button" value="Remove" onclick="removeRowFromTable_03();" />
        </p>
        <table width="51%" border="1" id="tbl_04">
          <tr>
            <th><div align="left">Diagnostic Study/Studies </div></th>
          </tr>
          <tr>
            <th><div align="left">
                <label for="diagnosis_01"></label>
              </div></th>
          </tr>
          <tr>
            <td><p><strong>
                <input type="text" name="study_cell_01"
     id="study_cell_01" size="80" onkeypress="keyPressTest(event, this);"/>
                </strong></p></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onclick="addRowToTable_04();" />
          <input type="button" value="Remove" onclick="removeRowFromTable_04();" />
        </p>
     <hr />
     <h2 align="center"> --- Once you complete the patient note, you will not be able to go back. ---</h2>
     <h3 align="center">
          <input type="hidden" id="chkValidate" />
  <input name="agreecheck" type="checkbox" onclick="agreesubmit(this)" />
  <b>I agree to the above terms</b><br />
        <input type="submit" name="send" id="send" value="Submit" disabled="disabled"/>
  
      <input type="reset" name="clear" id="clear" value="Reset" />
     </h3>
     <hr />
      </form>
      <p>&nbsp; </p>
    </div>
    <div class="TabbedPanelsContent">
      <div id="tabs-2">
        <blockquote>
          <h1 align="center"><strong>OPENING  SCENARIO</strong></h1>
          <p>You  are at the Internal Medicine Clinics of the University of Puerto Rico School of  Medicine. Your next patient comes for evaluation.</p>
<p>Vital  Signs: HR: 80/min RR 18/min T 36.5 &deg;C BP 130/70mmHg</p>
<p>You  have <strong>15 minutes</strong> to perform the  following tasks:<strong>&nbsp;</strong></p>
          <ul>
            <li>Read  carefully the patient&rsquo;s medical chart.<strong></strong></li>
            <li>Review the  physical exam findings.<strong></strong></li>
            <li>Review the  laboratory results available.<strong></strong></li>
          </ul>
          <ul>
            <li>Answer the  post encounter.</li>
          </ul>
          <p><strong>&nbsp;</strong>You  will receive a warning when you have 5 minutes left.</p>
In this scenario, there is no patient available.  You will use the information provided in the computer. Read carefully and  answer accordingly.</blockquote>
        <blockquote>
          <hr />
          <h1 align="center">Historial</h1>
          <p><strong>Historial M&eacute;dico: </strong><br />
          </p>
          <p align="justify">Caso de  paciente de 65 a&ntilde;os de edad con historial de obesidad que viene a evaluaci&oacute;n a  traer resultado de una pruebas de laboratorio. El paciente estaba orinando mucho, fue a evaluaci&oacute;n hace una semana y le ordenaron las pruebas. Paciente  refiere estar orinando mucho desde hace tres semanas sin otros cambios en el  olor o color de la orina. No le molesta o le duele al orinar. Adem&aacute;s refiere mucha sed, cansancio, y m&aacute;s apetito. Niega tener fiebre, p&eacute;rdida de peso, v&oacute;mitos,  diarreas, mareos, dolor de cabeza, visi&oacute;n borrosa o infecciones  frecuentes. Ha notado que se le ha  ennegrecido el cuello y debajo de las axilas.</p>
          <p><strong>Historial pasado:</strong><br />
            </p>
          <p align="justify">Historial de apendectom&iacute;a  a los 25 a&ntilde;os y varicela a los 11 a&ntilde;os. No ha estado hospitalizado por alguna otra raz&oacute;n. Se hizo una colonoscopia a los 55 a&ntilde;os y  estaba negativa. No le gusta ir a los  m&eacute;dicos. Nunca ha fumado y no bebe alcohol.<br />
            <br />
            <strong>Historial Social:</strong><br />
          </p>
          <p>Viudo desde  hace tres a&ntilde;os. Su esposa muri&oacute; por una  aneurisma cerebral. Tiene 3 hijos que viven  en Estados Unidos. Es retirado del  Gobierno, trabaj&oacute; en el Dpto. de Hacienda. No se ejercita y come de todo. Le  gusta ir a la iglesia y jugar al bingo con las amistades.<br />
            </p>
          <p><strong>Historial Familiar:</strong> Madre con historial de Diabetes tipo 2 y  padre con historial de hipertensi&oacute;n. Ambos murieron.</p>
          <hr />
          <h1 align="center">Ex&aacute;men F&iacute;sico</h1>
<img src="images/2014/3/examid_03.jpg" width="717" height="478" />
<br />
<table width="34%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="35%"><strong>BMI</strong>:</td>
    <td width="65%">38 kg/m<sup>2</sup> </td>
  </tr>
  <tr>
    <td><strong>Weight</strong>: </td>
    <td>235 pounds</td>
  </tr>
  <tr>
    <td><strong>Height</strong>: </td>
    <td> 66 inches </td>
  </tr>
</table>
<hr />
<h1 align="center"><strong>Laboratory Results</strong></h1>
<p>&nbsp;  </p>
<p>HbA1c of 7.5% (Normal:  Less than 5.7%)        </p>
        </blockquote>
      </div>
    </div>
</div>
</div>

<?php 
} else {
   echo 'You are not authorized to access this page, please login. <br/>';
}
?>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:1});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script><!-- InstanceEndEditable -->
<?php echo "<br><p>Logina as: ".$_SESSION['username']."(".$_SESSION['nivel'].")</p>";
 ?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
