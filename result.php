
<!DOCTYPE html>
<html>
<head>
	<title>Result</title>  
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css1/bootstrap.min.css">

<!-- jQuery library -->
<script src="js1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="js1/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js1/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>
<body style="font-family: Ubuntu;">

<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "datatypes";
    $cid="1";
        $conn = mysqli_connect($host, $user, $password, $db);
if ($conn) {
   if(isset($_POST['submit']))
   {
  
       if(!empty($_POST['quizto']))
       {
            $count=count($_POST['quizto']);
       
            //echo "out of 5 there are".$count."you selectd";
$mark=0;
$i=1;
            $selected = $_POST['quizto'];
          // print_r($selected);
           
           $sql="SELECT `qid`, `cid`, `level`, `qname`, `A`, `B`, `C`, `D`, `correct_ans` FROM `questions` WHERE 1";
		    $result = mysqli_query($conn,$sql);
		    while($row = mysqli_fetch_array($result))  {
		    	if($row["cid"]==$cid)
		    	{
		    		$check=$row["correct_ans"]==$selected[$i];
		    		if($check) {
		    			$mark++;
		    		}//else{
		    			//echo "Correct Answer is ".$row["correct_ans"]."---):  You selected " .$selected[$i]."<br>";
		    		//}

		    	}$i++;
             
           }
          
        }//echo "Your result is".$mark."";
   }
}
?>
	<div class="container" style="padding-top: 7em;">	
		<div class="card">
			<div class="card-header text-center">
<table>
	<thead>
		<tr>
	
		<h2>Result</h2>

</tr>
	</thead>
<tr>
	<tbody>
		<td><h4 style="color:#F05054;text-align: left;"><?php echo "Out of 10 you attempt".$count."."; ?></h4></td>


		<td>
		<?php 
		if($mark<5) 
		{
			?>
			 <h4 style="color:#F05054;text-align: left;"><?php echo "Your result is ".$mark."/10 in this level." ; ?>
	</h4></td>
	<td>
	<?php
		}else{
		?>
	<h4 style="color:green;text-align: left;"><?php echo "Your result is ".$mark."/10 in this level." ; ?>
	</h4></td>
		
		<?php
	}
	?>	
	

		
		<td style="text-align: right;"><?php
		echo " You selected wrong answers:<br>" ;
		$i=1;
		$cid="1";
            $selected = $_POST['quizto'];
		 $sql="SELECT `qid`, `cid`, `level`, `qname`, `A`, `B`, `C`, `D`, `correct_ans` FROM `questions` WHERE 1";
		    $result = mysqli_query($conn,$sql);
		    while($row = mysqli_fetch_array($result))  {
		    	if($row["cid"]==$cid)
		    	{
		    		$check=$row["correct_ans"]==$selected[$i];
		    		if ($check!=$selected[$i]){
		    			echo "Qno ".$row["qid"]."---):  " .$selected[$i]."<br>"; 
		    		}
		    		$i++;
		    	}
		    }?></td>

	</tbody>	
	</tr>

</table>
</div>
</div>

<?php
mysqli_close($conn);
?><a href="../arithmetic.php"><button class="btn btn-danger" style="">Back to Home</button></a>
</div>
</body>
</html>