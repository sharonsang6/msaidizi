<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['user_email'];
  $pass=$_POST['user_password'];
  mysql_connect('localhost','root','');
  mysql_select_db('msaidizi');
  $select=mysql_query("update users set user_password='$pass' where user_email='$email'");
}
?>