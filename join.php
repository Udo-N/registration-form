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
    $existing_slot = 0;

    $query1 = "SELECT Fname FROM `demoregistration`.`STUDENTS` WHERE UMID = '$umid'";
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $existing_student = $statement1->fetch();
    $statement1->closeCursor();

    if (empty($existing_student)){
        $query2 = "INSERT INTO `demoregistration`.`STUDENTS` (UMID, FName, LName, Project_Title, Email_Address, Phone_Number)
                    VALUES ('$umid', '$fname', '$lname', '$p_title','$email', '$phone')";
        $statement2 = $db->prepare($query2);
        $statement2->execute();
    }
    else{
        $query4 = "SELECT Time_Slot FROM `demoregistration`.`STUDENTS` WHERE UMID = '$umid'";
        $statement4 = $db->prepare($query4);
        $statement4->execute();
        $existing_slot = $statement4->fetch();
        $statement4->closeCursor();
        $query5 = "UPDATE `demoregistration`.`STUDENTS`
                    SET FName = '$fname',
                        LNAME = '$lname', 
                        Project_Title = '$p_title',
                        Email_Address = '$email', 
                        Phone_Number = '$phone'
                    WHERE UMID = '$umid'";
        $statement5 = $db->prepare($query5);
        $statement5->execute();
    }    

    $query3 = "SELECT Time_Slot FROM `demoregistration`.`STUDENTS`";
    $statement3 = $db->prepare($query3);
    $statement3->execute();
    $time_slots = $statement3->fetchAll();
    $statement3->closeCursor();

    session_start();
    $_SESSION['UMID'] = $umid;
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
                    <p id = "disclaimer" style="display:none;">Our records show that you have already selected a time slot for your presentation. Selecting a new time slot will overwrite your previously selected slot</p>
                    
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
    var existingSlot = <?php echo json_encode($existing_slot); ?>;
    var timeSlots = [];
    var arr1 = [];
    var arr2 = [];
    var arr3 = [];
    var arr4 = [];
    var arr5 = [];
    var arr6 = [];

    for (var i = 0; i < timeSlotObject.length; i++){
        timeSlots.push(timeSlotObject[i].Time_Slot)
    }

    for (var i = 0; i < timeSlots.length; i++){
         if (timeSlots[i] > 0 && timeSlots[i] < 7){
            arr1.push(timeSlots[i])
        }
        else if (timeSlots[i] > 6 && timeSlots[i] < 13){
            arr2.push(timeSlots[i])
        }
        else if (timeSlots[i] > 12 && timeSlots[i] < 19){
            arr3.push(timeSlots[i])
        }
        else if (timeSlots[i] > 18 && timeSlots[i] < 25){
            arr4.push(timeSlots[i])
        }
        else if (timeSlots[i] > 24 && timeSlots[i] < 31){
            arr5.push(timeSlots[i])
        }
        else if (timeSlots[i] > 30 && timeSlots[i] < 37){
            arr6.push(timeSlots[i])
        }
    }    

    document.getElementById("first-slot").innerHTML = "12/9/2021 | 6pm-7pm | "+(6-arr1.length)+" seats left<button id='first'>JOIN</button>"
    document.getElementById("second-slot").innerHTML = "12/9/2021 | 7pm-8pm | "+(6-arr2.length)+" seats left<button id='second'>JOIN</button>"
    document.getElementById("third-slot").innerHTML = "12/9/2021 | 8pm-9pm | "+(6-arr3.length)+" seats left<button id='third'>JOIN</button>"
    document.getElementById("fourth-slot").innerHTML = "12/10/2021 | 6pm-7pm | "+(6-arr4.length)+" seats left<button id='fourth'>JOIN</button>"
    document.getElementById("fifth-slot").innerHTML = "12/10/2021 | 7pm-8pm | "+(6-arr5.length)+" seats left<button id='fifth'>JOIN</button>"
    document.getElementById("sixth-slot").innerHTML = "12/10/2021 | 8pm-9pm | "+(6-arr6.length)+" seats left<button id='sixth'>JOIN</button>"

    if (existingSlot.Time_Slot){
        document.getElementById("disclaimer").style.display = "block";
    }
    if (arr1.length >= 6){
        document.getElementById("first").style.display = "none";
    }
    if (arr2.length >= 6){
        document.getElementById("second").style.display = "none";
    }
    if (arr3.length >= 6){
        document.getElementById("third").style.display = "none";
    }
    if (arr4.length >= 6){
        document.getElementById("fourth").style.display = "none";
    }
    if (arr5.length >= 6){
        document.getElementById("fifth").style.display = "none";
    }
    if (arr6.length >= 6){
        document.getElementById("sixth").style.display = "none";
    }

    document.addEventListener("DOMContentLoaded", () => {
        var slot = 0;
        var join1 = document.querySelector("#first");
        var join2 = document.querySelector("#second");
        var join3 = document.querySelector("#third");
        var join4 = document.querySelector("#fourth");
        var join5 = document.querySelector("#fifth");
        var join6 = document.querySelector("#sixth");

        join1.addEventListener("click", () => {          
            if (arr1.length < 6){
                for(var i = 1; i < 7; i++){
                    if (!arr1.includes(i.toString())){
                        slot = i
                        console.log(slot)
                        location.href = "list.php";
                        window.location.href="list.php?uid="+slot;
                        i = 7
                    }
                }
            }
        });
        join2.addEventListener("click", () => {
            if (arr2.length < 6){
                for(var i = 7; i < 13; i++){
                    if (!arr2.includes(i.toString())){
                        slot = i
                        location.href = "list.php";
                        window.location.href="list.php?uid="+slot;
                        i = 13
                    }
                }
            }
        });
        join3.addEventListener("click", () => {
            if (arr3.length < 6){
                for(var i = 13; i < 19; i++){
                    if (!arr3.includes(i.toString())){
                        slot = i
                        location.href = "list.php";
                        window.location.href="list.php?uid="+slot;
                        i = 19
                    }
                }
            }
        });
        join4.addEventListener("click", () => {
            if (arr4.length < 6){
                for(var i = 19; i < 25; i++){
                    if (!arr4.includes(i.toString())){
                        slot = i
                        location.href = "list.php";
                        window.location.href="list.php?uid="+slot;
                        i = 25
                    }
                }
            }
        });
        join5.addEventListener("click", () => {
            if (arr5.length < 6){
                for(var i = 25; i < 31; i++){
                    if (!arr5.includes(i.toString())){
                        slot = i
                        location.href = "list.php";
                        window.location.href="list.php?uid="+slot;
                        i = 31
                    }
                }
            }
        });
        join6.addEventListener("click", () => {
            if (arr6.length < 6){
                for(var i = 31; i < 37; i++){
                    if (!arr6.includes(i.toString())){
                        slot = i
                        location.href = "list.php";
                        window.location.href="list.php?uid="+slot;
                        i = 37
                    }
                }
            }
        });
    });
    
</script>
