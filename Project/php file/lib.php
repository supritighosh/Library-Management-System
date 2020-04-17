<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LIBRARY MANAGEMENT SYSTEM</title>

<style type="text/css">
<!--
.style7 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 50px;
	color:#330033;
}
.style14 {
    font-weight: bold; 
	font-family: Arial, Helvetica, sans-serif;
}
.style16 {
    font-size: 24px;
}
.style8 {
    font-size:20px;
}
-->
</style>

</head>

<body bgcolor="#999999">

<table width="1003" height="595" border="3" align="center" cellpadding="2" cellspacing="2" bordercolor="#000000" bgcolor="#F0F0F0">
  <tr>
    <td width="987" height="122"><h1 align="center"><span class="style7">Library Management System </span></h1></td>
  </tr>
  <tr>
    <td height="172"><div align="center">
	  <?php
       include ('connect.php');
       $query = "select * from book_information";
       $result = mysql_query($query) or die('Query failed: '.mysql_error());
      ?>
 
      <table border="2" align="center" cellpadding="2" bordercolor="#F0F0F0" bgcolor="#CCCCCC">

       <tr >
         <td width="183"><div align="center" class="style16"><span class="style14">Book_Name</span></div></td>
	     <td width="98"><div align="center" class="style16"><span class="style14">ISBN</span></div></td>
	     <td width="158"><div align="center" class="style16"><span class="style14">Author</span></div></td>
	     <td width="149"><div align="center" class="style16"><span class="style14">Publisher</span></div></td>
		 <td width="116"><div align="center" class="style16"><span class="style14">Edition</span></div></td>
       </tr>
    
       <?php
	     while($row = mysql_fetch_array($result))
	     {
       ?>
         <tr>
           <td height="33"><div class="style8"><?php echo $row['Book_Name'];?></div></td>
           <td><div class="style8"><?php echo $row['ISBN']; ?></div></td>
	       <td><div class="style8"><?php echo $row['Author']; ?></div></td>
	       <td><div class="style8"><?php echo $row['Publisher']; ?></div></td>
		   <td><div class="style8"><?php echo $row['Edition']; ?></div></td>
         </tr>
    
         <?php 
         }
         ?>          
      </table>
      </div>
      
	  <form name="form1" action="report.php" target="_blank" method="post">
        <div align="center">

          <table border="1">
            <p><tr><td><input type="submit" name="save" value="Create Report"/></td></tr></p>
          </table>
        
		</div>
      </form></td>
  </tr>
  <tr>
    <td><p align="center"></p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>

</body>
</html>
