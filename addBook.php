<!DOCTYPE html>
<html>
<head>
	<title>ADD BOOK</title>
	<link rel="stylesheet" href="addBook_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
</head>
<body>

<form action="addBook.php" method="POST">


	<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a  href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a href="findBook.php"><i class="fa fa-search" title="Search Book"></i></a> 
	    <a class="active"  href="BorrowBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a   href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a  href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>  
  </div>



<div class="detailsDiv" align="center">
	<h1 align="center" id="heading">Enter Details Of Book</h1>
	<label id="b">Name	</label>		<input type="text"	id="a" name="name" required="required" maxlength="50"><br>
	<label id="c">Category</label>	<input type="text"	id="d" name="category" required="required"><br><br>
	<label id="f">Author 	</label>		<input type="text" id="e" name="author" required="required"><br>
	<label id="f">Edition 	</label>		<input type="number" id="e" name="edition" required="required"><br>
	<button type="submit" name="sbmBtn" class="submit" ><span>SUBMIT</span></button>
	</div>

	
	<?php

	$dbhost="localhost";
	$username="root";
	$password="";
	$db="library";


	$con=mysqli_connect("$dbhost","$username","$password");
	
	mysqli_select_db($con,$db);


			function getPosts()
			{
				$posts=array();
				$posts[0]=$_POST['name'];
				$posts[1]=$_POST['category'];
				$posts[2]=$_POST['author'];
				$posts[3]=$_POST['edition'];
				return $posts;
			}
			
		if(isset($_POST['sbmBtn']))
		{
				$data=getPosts();

				$addBook_query="INSERT INTO `book`(`Name`, `Category`, `Author`,  `Edition`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]');";

				$addBook_result=mysqli_query($con,$addBook_query);

				if($addBook_result){
					if(mysqli_affected_rows($con)>0)
						{
							
							echo '<script language="javascript">';
							echo 'alert("Book Added To The DataBase")';
							echo '</script>';
						}else{
							echo "No data inserted.";	
							}

				}else{
					echo "RESULT ERROR";
				}
		}




	?>
</form>

</body>
</html>