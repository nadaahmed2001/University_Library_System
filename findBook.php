<!DOCTYPE html>
<html>
<head>
	<title>Find A BOOK</title>
	<link rel="stylesheet" href="findBook_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>



<?php

	$dbhost="localhost";
	$username="root";
	$password="";
	$db="library";

	$Title="";
	$ISBN="";
	$Author="";
	$Department="";
	$Section="";


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

	if(isset($_POST['findBtn'])){

		$data=getPosts();

		

		$find_query="SELECT `Name`, `Category`, `Author`,  `Edition` FROM `book` WHERE Name LIKE '$data[0]';";
		

		$find_result=mysqli_query($con, $find_query);
		

		if($find_result){
			if(mysqli_num_rows($find_result))
			{
				while($row=mysqli_fetch_array($find_result))
				{
					$Name=$row['Name'];
					$Category=$row['Category'];
					$Author=$row['Author'];
					$Edition=$row['Edition'];
				}
				echo '<script language="javascript">';
				echo 'alert("Book Found")';
				echo '</script>';


			}else{
				echo '<script language="javascript">';
				echo 'alert("Book Not Found")';
				echo '</script>';
			}
		}else{
			echo "Result Error.";
		}
	}

?>

<form action="findBook.php"  method="POST">
<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a  href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a href="findBook.php"><i class="fa fa-search" title="Search Book"></i></a> 
	    <a class="active"  href="BorrowBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a   href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a  href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>  
  </div>


<div class="detailsDiv" align="center">
<h1 align="center" id="heading">Find Book</h1>
<label id="b">Name</label>		<input type="text" 	 id="a"  name="name" required="required" value="<?php echo "$Title"; ?>"><br>
<label id="b">Category</label>		<input type="text" id="a" name="category" value="<?php echo "$ISBN"; ?>"> <br>
<label id="b">Author</label>	<input type="text" 	 id="a" name="author" value="<?php echo "$Author"; ?>"><br>
<label id="b">Edition</label><input type="number" 	 id="a" name="edition" value="<?php echo "$Department"; ?>"><br>
<button type="submit" name="findBtn" class="submit" ><span>SEARCH</span></button>
</div>

</form>
</body>
</html>