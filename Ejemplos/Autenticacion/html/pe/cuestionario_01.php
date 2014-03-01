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
include '../../../../common/paciente_log.php';
include '../../../../common/paciente_functions.php';
// Include database connection and functions here.
sec_session_start();
if(login_check($mysqli) == true) {
?>
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
<script src="./examenes/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">

<title>Results | Standarized Patient - Clinical Skills Evaluation Patient Note</title>

<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />



<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Patient Note</li>
    <li class="TabbedPanelsTab" tabindex="0">Examinee Instructions<br />
    </li>
    <li class="TabbedPanelsTab" tabindex="0">Patient Note Knee Pain</li>
</ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <h2 align="center">Clinical Skills Evaluation</h2>
      <h2 align="center">Patient Note</h2>
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="result.php">
        <p>HISTORY: Describe the history you just obtained from this patient. Include only information (pertinent positives and negatives) relevant to this patient's problem(s). </p>
        <p><span id="sprytextarea1">
          <label for="history"></label>
          <textarea name="history" id="history" cols="150" rows="5"></textarea>
          <span class="textareaRequiredMsg">A value is required.</span></span></p>
        <p>
          <LABEL for="txtPE"><STRONG>PHYSICAL EXAMINATION</STRONG>: Describe any positive   and negative findings relevant to this patient's problem(s). Be careful to   include <EM>only</EM> those parts of examination you performed in <EM>this</EM> encounter. </LABEL>
        </p>
        <p><span id="sprytextarea2">
          <label for="physical\"></label>
          <textarea name="physical\" id="physical\" cols="150" rows="5"></textarea>
          <span class="textareaRequiredMsg">A value is required.</span></span></p>
        <p>
          <LABEL for="label"><STRONG>DATA INTERPRETATION</STRONG>: <EM>Based on what you   have learned from the history and the physical examination</EM>, list up to 3   diagnoses that might explain this patient's complaint(s). List your diagnoses   from most to least likely. For some cases, fewer than 3 diagnoses will be   appropriate. Then, enter the positive or negative findings from the history and   the physical examination (if present) that support each diagnosis. Lastly, list   initial <EM>diagnostic</EM> studies (if any) you would order for each listed   diagnosis (e.g. restricted physical exam maneuvers, laboratory tests, imaging,   ECG, etc.) </LABEL>
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
              <input name="diagnose_01_cell_01" type="text" id="diagnose_01_cell_01" onKeyPress="keyPressTest(event, this);" size="80" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
            <td width="490" align="left"><strong>Physical Exam Finding(s) </strong> <span id="sprytextfield3">
              <label for="diagnose_01_cell_02"></label>
              <input name="diagnose_01_cell_02" type="text" id="diagnose_01_cell_02" onKeyPress="keyPressTest(event, this);" size="80" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onClick="addRowToTable_01();" />
          <input type="button" value="Remove" onClick="removeRowFromTable_01();" />
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
     id="diagnose_02_cell_01" onKeyPress="keyPressTest(event, this);" size="80"/>
            </strong></p></td>
            <td width="480" align="center"><p align="left"><strong>Physical Exam Finding(s)<br />
              <input type="text" name="diagnose_02_cell_02"
     id="diagnose_01_cell_2" size="80" onKeyPress="keyPressTest(event, this);"/>
            </strong></p></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onClick="addRowToTable_02();" />
          <input type="button" value="Remove" onClick="removeRowFromTable_02();" />
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
     id="diagnose_03_cell_01" size="80" onKeyPress="keyPressTest(event, this);"/>
            </strong></p></td>
            <td width="490" align="center"><p align="left"><strong>Physical Exam Finding(s)<br />
              <input type="text" name="diagnose_03_cell_02"
     id="diagnose_03_cell_02" size="80" onKeyPress="keyPressTest(event, this);"/>
            </strong></p></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onClick="addRowToTable_03();" />
          <input type="button" value="Remove" onClick="removeRowFromTable_03();" />
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
     id="study_cell_01" size="50" onKeyPress="keyPressTest(event, this);"/>
            </strong></p></td>
          </tr>
        </table>
        <p>
          <input type="button" value="Add" onClick="addRowToTable_04();" />
          <input type="button" value="Remove" onClick="removeRowFromTable_04();" />
        </p>
        <p>
          <input type="hidden" id="chkValidate" />
          <input name="" type="submit" value="Submit" />
        </p>
      </form>
      <p>&nbsp; </p>
    </div>
    <div class="TabbedPanelsContent">
      <DIV id="tabs-2">
        <p>Vital Signs</p>
        <p><strong>Temperature</strong>: 98.8&deg;F (37.1&deg;C)<BR />
          <BR />
          <strong>Blood Pressure</strong>: 120/76 mm   Hg<BR />
          <BR />
          <strong>Heart Rate</strong>: 78/min<BR />
          <BR />
          <strong>Respirations</strong>: 15/min<BR />
          <BR />
        </p>
        <p>Instructions</p>
        <OL>
          <LI>Obtain a history pertinent to this patient's problem. </li>
          <LI>Perform a relevant physical exmaination (Do not perform a breast,   pelvic/genital, corneal reflex, or rectal examination). </li>
          <LI>Discuss your impressions and any initial plans with the patient. </li>
          <LI>After leaving the room, complete your patient notes on the given form or   computer. </LI>
        </OL>
        <p>Opening Scenario</p>
        <p>Jason Morris, a 21-year-old male, has come to the student health clinic   because he recently passed out while playing basketball.</p>
      </DIV>
    </div>
    <div class="TabbedPanelsContent">Content 3</div>
</div>
</div>



<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
<?php 
} else {
   echo 'You are not authorized to access this page, please login. <br/>';
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
