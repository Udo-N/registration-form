<?php
    $dsn = 'mysql:host=localhost; dbname=demoregistration';
    $username = 'pma';
    $password = 'W0lver1ne';

    $db = new PDO($dsn, $username, $password);

    $umid = $_POST['umid'];
    $fname = $_POST["fname"];
    $lname = $_POST['lname'];
    $p_title = $_POST['p-title'];
    $email = $_POST['email'];
    $phone = $_POST["phone"];

    $query1 = "INSERT INTO `demoregistration`.`STUDENTS` (UMID, FName, LName, Project_Title, Email_Address, Phone_Number)
            VALUES ('$umid', '$fname', '$lname', '$p_title','$email', '$phone')";
    $statement1 = $db->prepare($query1);
    $statement1->execute();

    $query2 = "SELECT Time_Slot FROM `demoregistration`.`STUDENTS`";
    $statement2 = $db->prepare($query2);
    $statement2->execute();
    $time_slots = $statement2->fetchAll();
    $statement2->closeCursor();
?>

<!DOCTYPE html>

<html lang="en" style="background-color: #121212; color:#cccc00;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Join</title>
        <link rel="stylesheet" href="css/join.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>

    <body style="background-color:#121212;">
        <header>
            
        </header>

        <div class = "container-fluid">    
            <div class="row"> 
                <div id = "box">
                    <p id = "title">SELECT TIME SLOT</p>

                    <p id = "first-slot">12/9/2021 | 6pm-7pm | 6 seats left<button id="first">JOIN</button></p>
                    <p id = "second-slot">12/9/2021 | 7pm-8pm | 6 seats left<button id="second">JOIN</button></p>
                    <p id = "third-slot">12/9/2021 | 8pm-9pm | 6 seats left<button id="third">JOIN</button></p>
                    <p id = "fourth-slot">12/10/2021 | 6pm-7pm | 6 seats left<button id="fourth">JOIN</button></p>
                    <p id = "fifth-slot">12/10/2021 | 7pm-8pm | 6 seats left<button id="fifth">JOIN</button></p>
                    <p id = "sixth-slot">12/10/2021 | 8pm-9pm | 6 seats left<button id="sixth">JOIN</button></p>

                    <a href="index.html">Back</a> 
                </div>

            </div>
        </div>
    
    </body>

</html>

<script>
    var timeSlotObject = <?php echo json_encode($time_slots); ?>;
    var timeSlots = [];
    var timeSlotsAdjusted = [];
    var adjustedInstance = [];

    for (var i = 0; i < timeSlotObject.length; i++){
        timeSlots.push(timeSlotObject[i].Time_Slot)
    }

    for (var i = 0; i < timeSlots.length; i++){
        if (timeSlots[i] != null){
            timeSlotsAdjusted[i] = parseInt((timeSlots[i] - 1)/6);
        }
    }

    for (const num of timeSlotsAdjusted){
        adjustedInstance[num] = (adjustedInstance[num] || 0) + 1;
    }

    document.getElementById("first-slot").innerHTML = "12/9/2021 | 6pm-7pm | "+((6-adjustedInstance[0]) || 6)+" seats left<button id='first'>JOIN</button>"
    document.getElementById("second-slot").innerHTML = "12/9/2021 | 7pm-8pm | "+((6-adjustedInstance[1]) || 6)+" seats left<button id='second'>JOIN</button>"
    document.getElementById("third-slot").innerHTML = "12/9/2021 | 8pm-9pm | "+((6-adjustedInstance[2]) || 6)+" seats left<button id='third'>JOIN</button>"
    document.getElementById("fourth-slot").innerHTML = "12/10/2021 | 6pm-7pm | "+((6-adjustedInstance[3]) || 6)+" seats left<button id='fourth'>JOIN</button>"
    document.getElementById("fifth-slot").innerHTML = "12/10/2021 | 7pm-8pm | "+((6-adjustedInstance[4]) || 6)+" seats left<button id='fifth'>JOIN</button>"
    document.getElementById("sixth-slot").innerHTML = "12/10/2021 | 8pm-9pm | "+((6-adjustedInstance[5]) || 6)+" seats left<button id='sixth'>JOIN</button>"

</script>