<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables
$server= "localhost";
$username = "root";
$password = "";

//create a database connection
$con  = mysqli_connect($server, $username, $password);

//Check for connection success
if (!$con){
    die("connection to this database is failed due to" . mysqli_connect_error());
}
// echo "Sucess Connection";

//collect post variables
$recordno = $_POST ['recordno'];
$date= $_POST ['date']; 
$name= $_POST ['name']; 
$phone= $_POST['phone'] ;
$model= $_POST['model'] ;
$cable = $_POST ['cable'];
$charger = $_POST ['charger'];
$problem= $_POST['problem'] ;
$deliver = $_POST['deliver'];
$other = $_POST['other'];


$sql = "INSERT INTO `scdb`.`scdb` (`recordno`, `date`, `name`, `phone`, 
`model`, `cable`, `charger`, `Problem`, `Deliver`, `other`) VALUES ('$recordno', '$date', '$name',
 '$phone', '$model', '$cable', '$charger', '$problem', '$deliver', '$other');";

//  echo $sql;

 if($con->query($sql) == true){
    //  echo  "Sucessfully Inserted";
    $insert = true;
 }

 else{
     echo "error: $sql <br> $con->error";
     
 }

 $con-> close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Vab Db</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class= "bg" src="bgg.jpg" alt="Services png">

    <div class="container">
    <h1>Welcome to Vab Db</h1>
    <p>Details of Record Book</p>

    <?php
    if($insert == true){
    echo "<p class='submitMsg'>Thanks For Submitting Your Form. We are Happy to see you Coming and Joining Us.</p>";
}
    ?>
    
    <form action="index.php" method="post">
        
        <input type="number" name="recordno" id="snumber" placeholder="Enter Serial number">
        <input type="date" name="date" id="date" placeholder="Enter date">
        <input type="text" name="name" id="name" placeholder="Enter name">
        <input type="phone" name="phone" id="phone" placeholder="Enter Phone number">
        <!-- <input type="email" name="email" id="email" placeholder="Enter email"> -->
        <input type="text" name="model" id="model" placeholder="Enter model">
        <input type="text" name="cable" id="cable" placeholder="Enter Cables">
        <input type="text" name="charger" id="charger" placeholder="Enter Yes or No">
        <input type="text" name="problem" id="problem" placeholder="Enter Problem">
        <!-- <input type="text" name="Solution" id="Solution" placeholder="Enter Solution">
        <input type="text" name="amount" id="amount" placeholder="Enter AMOUNT"> -->
        <!-- <input type="text" name="status" id="status" placeholder="Enter Current status Pending or Completed"> -->
        <input type="date" name="deliver" id="deliver" placeholder="Deliverd On">
        
        <textarea name="other" id="desc" cols="30" rows="10" placeholder="Enter any other information or Feedback"></textarea>
        <button class="btn">Submit</button>
       <!-- <button class="btn">Reset</button>-->
    
    </form>
</div>
    <script src="index.js"></script>

    

</body>
</html>