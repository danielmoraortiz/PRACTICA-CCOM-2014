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
<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>
<form action="process_user.php" method="post" name="login_form">
<?php 
include '../../common/paciente_log.php';
include '../../common/paciente_functions.php';
// Include database connection and functions here.
sec_session_start(); // Our custom secure way of starting a php session. 

if(!check_level($_SESSION['nivel']) == true) {
	   echo "Access denied, due access level. Contact the administrator.<br>" ;
	   exit(); 
}
?>
  <p>
   </p>
   <h1>Create new user</h1>
   <table width="400" border="0" cellspacing="5" cellpadding="5">
     <tr>
       <td>Name:</td>
       <td><input name="username" type="text" id="username" /></td>
     </tr>
     <tr>
       <td>Username:</td>
       <td><input type="text" name="email" /></td>
     </tr>
     <tr>
       <td>Password: </td>
       <td><input type="password" name="password" id="password"/></td>
     </tr>
     <tr>
       <td>Nivel Acceso:</td>

   
       <td><label for="nivel_acceso"></label>
<?php 

   if ($stmt_list = $mysqli->prepare("SELECT nivel, description FROM privilegio ORDER BY description")) { 
      $stmt_list->bind_param('s', $email_new_new); // Bind "$email_new_new" to parameter.
      $stmt_list->execute(); // Execute the prepared query.
      $stmt_list->store_result();
      $stmt_list->bind_result($nivel, $description); // get variables from result.
      mysqli_stmt_execute($stmt_list);
      mysqli_stmt_bind_result($nivel, $description);
 }

?>
    <select name="nivel_acceso">
      <option value="">Select one...</option>
        <?php 
    while (mysqli_stmt_fetch($stmt_list)) {
			echo "<option value=\"".$nivel."\">".$description."</option>\n\t\t\t\t\t\t\t\t\t"; 
			}
	?>
    </select>
</td>
     </tr>
   </table>
   <p>
     <input type="button" value="Crear Usuario" onclick="formhash(this.form, this.form.password);" />
  </p>
</form>

      
<?php
if(isset($_GET['error'])) { 
   echo '<h2>Error Logging In!</h2>';
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
