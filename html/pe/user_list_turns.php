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

?>

<h2>User Turns List</h2>

<?php 


   if ($stmt_list_turns = $mysqli->prepare("SELECT username, id_stu, ciclo, hora, fecha, exam_name,exam_pass
FROM members, turnos JOIN examenes WHERE id_stu = email AND examenes.id_exam = turnos.id_exam AND turnos.status = '1'")) { 
    //  $stmt_list_turns->bind_param('s', $ciclo_new_new); // Bind "$ciclo_new_new" to parameter.
      $stmt_list_turns->execute(); // Execute the prepared query.
      $stmt_list_turns->store_result();
      $stmt_list_turns->bind_result($username_new, $id_stu_new, $ciclo_new, $hora_new,$fecha, $id_exam, $exam_pass); // get variables from result.
    /* execute statement */
    mysqli_stmt_execute($stmt_list_turns);
    /* bind result variables */
    mysqli_stmt_bind_result($username_new, $id_stu_new, $ciclo_new, $hora_new, $fecha, $id_exam, $exam_pass);
    /* fetch values */
 
	echo "<table width=\"80%\" border=\"0\" cellspacing=\"5\" cellpadding=\"5\"><tr><td align=\"left\">Name</td>
	<td align=\"left\">Username</td><td align=\"left\">Cycle</td><td align=\"left\">Hour</td><td align=\"left\">Date</td><td align=\"left\">Exam</td><td align=\"left\">Exam Pass</td></tr>";
    while (mysqli_stmt_fetch($stmt_list_turns)) {
		echo "<tr><td>$username_new</td><td>$id_stu_new</td><td>$ciclo_new</td><td>$hora_new</td><td>$fecha</td><td>$id_exam</td><td>$exam_pass</td></tr>";
	}
	echo "</table>";
    /* close statement */
  //  mysqli_stmt_close($stmt_list_turns);
	
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
