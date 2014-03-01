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
sec_session_start();
if(login_check($mysqli) == true) {
if(!check_level($_SESSION['nivel']) == true) {
	   echo "Access denied, due access level. Contact the administrator.<br>" ;
	   exit(); 
}
?>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td valign="top"><p><strong>Account Administration</strong></p>
      <p><a href="usuario_admin.php">Create Users</a></p>
      <p><a href="#">Edit Users</a></p>
    <p><a href="user_list.php">List of Users</a></p></td>
    <td valign="top"><p><strong>Turns Administration</strong></p>
      <p><a href="user_list_turns.php">Student List</a></p>
      <p><a href="upload_assign_exam_list_turns.php">Upload Turn List</a></p>
      <p>Add Turn to list</p>
    <p>Edit Turns</p></td>
    <td valign="top"><p><strong>Exam Administration</strong></p>
      <p><a href="user_exam_list.php">Exam List</a></p>
      <p>Add Exam</p>
    <p>Edit Exam</p></td>
  </tr>
  <tr>
    <td><strong>Grades</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p><a href="exam_list.php">Exam users list with exams</a></p></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<h2>
  <?php 
} else {
   echo 'You are not authorized to access this page, please login. <br/>';
}
?>
</h2>
<!-- InstanceEndEditable -->
<?php echo "<br><p>Logina as: ".$_SESSION['username']."(".$_SESSION['nivel'].")</p>";
 ?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
