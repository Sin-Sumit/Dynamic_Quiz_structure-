<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
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
     <nav class="navbar navbar-default navbar-fixed-top" style=" background-color:#F05054; border:0px; ">
        <div class="container-fluid">
            <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar" style="background-color: #77BB41"></span>
        <span class="icon-bar" style="background-color: #77BB41"></span>
        <span class="icon-bar" style="background-color: #77BB41"></span>
      </button>
  </div>
     <ul class="nav navbar-nav navbar-right" >
      <h1 style="color: white;padding-left: 2em;font-family: Ubuntu;font-size: 35px; ">Quiz </h1>
     </ul>
        <div class="collapse navbar-collapse" id="collapse-1">
            <ul class="nav navbar-nav navbar-right" id="bs" style="padding-right: 3em;font-size: 29px;margin-top: 22px;">
              <li><a href="../arithmetic.php" class="link1" style="color: #fff;">Back</a></li>
            </ul>
        </div>
        </div>
      </nav>
    <div class="container">
          <form action="result.php" method="POST" style="padding-top: 8em;padding-right: 7em; ">

<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "datatypes";
        $conn = mysqli_connect($host, $user, $password, $db);
//making here to take input from user about the level he/she to be go inside that is taken from from the webpage like selcting 'easy' that will be added here automatically and then it do the furrther work.//  
$level="Easy";
$cid="1";
   $sql="SELECT `qid`, `cid`, `level`, `qname`, `A`, `B`, `C`, `D`, `correct_ans` FROM `questions` WHERE 1";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) 
    {
        if($row["cid"]==$cid)
        {
            if($row["level"]==$level)
            {
              
     //echo " ".$row["qid"].".".$row["qname"]." <br>";
     //echo " ".$row["Answer1"]." <br> ".$row["Answer2"]." <br> ".$row["Answer3"]." <br> ".$row["Answer4"]." <br>";
   ?>
 
   <div class="card">
<div class="card-header">
    <?php echo "".$row["qid"].".".$row["qname"]."";?>
</div>
<div class="card-body">
    <input type="radio" name="quizto[<?php echo $row["qid"]; ?>]" value="<?php echo $row["A"]; ?>"required=""><?php echo "".$row["A"]."";?><br>
    <input type="radio" name="quizto[<?php echo $row["qid"]; ?>]" value="<?php echo $row["B"]; ?>"required=""><?php echo "".$row["B"]."";?><br>
    <input type="radio" name="quizto[<?php echo $row["qid"]; ?>]" value="<?php echo $row["C"]; ?>"required=""><?php echo "".$row["C"]."";?><br>
    <input type="radio" name="quizto[<?php echo $row["qid"]; ?>]" value="<?php echo $row["D"]; ?>"required=""><?php echo "".$row["D"]."";?><br><br>
</div>
    </div> <br /><br />

          <?php  
            }
        }
    }
    ?>
<input type="submit" name="submit" value="Submit" class="btn btn-success"><br /><br />
      </form>
  </div>
    </body>
</html>