<!DOCTYPE html>
<html>
<head>
	<title>Borrow Book</title>
	<link rel="stylesheet" href="BorrowBook_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="BorrowBook.php"  method="POST">
<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a  href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a href="findBook.php"><i class="fa fa-search" title="Search Book"></i></a> 
	    <a class="active"  href="BorrowBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a   href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a  href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>
  
  </div>


<div class="detailsDiv" align="center">
<h1 align="center" id="heading">Borrow Book</h1>
<label id="b">Roll No</label>		<input type="number" id="r" name="rollNum" required="required" maxlength="11"> <br>
<label id="b">Book Name</label>		<input type="text" id="d" name="name" required="required" maxlength="50"><br>
<label id="b">Issue Date</label><input type="text" 	 id="a" name="issueDate" required><br>
<label id="b">Return Data</label>	<input type="text" 	 id="f" name="returnDate" required ><br><br>
<button type="submit" name="issueBtn" class="submit" ><span>BORROW</span></button>
</div>


<?php

	$dbhost="localhost";
	$username="root";
	$password="";
	$db="library";

	$RollNo="";
	$Name="";	
	$Author="";
	$IssueDate="";
	$ReturnDate="";


	$con=mysqli_connect("$dbhost","$username","$password");
	
	mysqli_select_db($con,$db);


			function getPosts()
			{
				$posts=array();
				$posts[0]=$_POST['rollNum'];
				$posts[1]=$_POST['name'];
				$posts[2]=$_POST['issueDate'];
				$posts[3]=$_POST['returnDate'];
				return $posts;
			}

	if(isset($_POST['issueBtn'])){

		$data=getPosts();
		$getBookData_query="SELECT `Name`, `Category`, `Author`, `Edition` FROM `book` WHERE Name=$data[0] ;";

		$getBookData_result=mysqli_query($con,$getBookData_query);

	
		if($getBookData_result){
			if(mysqli_num_rows($getBookData_result))
			{
				while($row=mysqli_fetch_array($getBookData_result))
				{
					$Name=$row['Name'];
					$Category=$row['Category'];
					$Author=$row['Author'];
					$Editon=$row['Edition'];
	
				}
			}else{
				echo '<script language="javascript">';
				echo 'alert("	ERROR:---->Enter Valid Details.")' ;
				echo '</script>';	
				die;
			}
		}else{
			echo "Result Error 1.";
		}
																					
		$issue_query="INSERT INTO `infobook`(`Roll_No`, `Name`, `issueDate`, `returnDate`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]');";	

		$issue_result=mysqli_query($con, $issue_query);

		if($issue_result)
		{
			if(mysqli_affected_rows($con)>0)
			{
				echo '<script language="javascript">';
				echo 'alert("Book ISSUED")';
				echo '</script>';
			}else{
				echo "No data inserted.";	
			}
		}else{
			echo "Result Error 2.";
		}
	}

?>



</form>
</body>
</html>