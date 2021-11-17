<?php
    $dsn = 'mysql:host=localhost; dbname=demoregistration';
    $username = ; // Insert username
    $password = ; // Insert password

    $db = new PDO($dsn, $username, $password);

    session_start();
    $umid = $_SESSION['UMID'];
    $time_slot = $_GET["uid"];

    $query1 = "UPDATE `demoregistration`.`STUDENTS`
                SET Time_Slot = '$time_slot'
                WHERE UMID = '$umid'";
    
    $statement1 = $db->prepare($query1);
    $statement1->execute();


    $query2 = "SELECT UMID, Fname, Lname, Project_Title, Email_Address, Phone_Number
                FROM `demoregistration`.`STUDENTS`
                WHERE Time_Slot < 7 AND Time_Slot > 0";
    $statement2 = $db->prepare($query2);
    $statement2->execute();
    $students_section1 = $statement2->fetchAll();
    $statement2->closeCursor();

    $query3 = "SELECT UMID, Fname, Lname, Project_Title, Email_Address, Phone_Number
                FROM `demoregistration`.`STUDENTS`
                WHERE Time_Slot < 13 AND Time_Slot > 6";
    $statement3 = $db->prepare($query3);
    $statement3->execute();
    $students_section2 = $statement3->fetchAll();
    $statement3->closeCursor();

    $query4 = "SELECT UMID, Fname, Lname, Project_Title, Email_Address, Phone_Number
                FROM `demoregistration`.`STUDENTS`
                WHERE Time_Slot < 19 AND Time_Slot > 12";
    $statement4 = $db->prepare($query4);
    $statement4->execute();
    $students_section3 = $statement4->fetchAll();
    $statement4->closeCursor();

    $query5 = "SELECT UMID, Fname, Lname, Project_Title, Email_Address, Phone_Number
                FROM `demoregistration`.`STUDENTS`
                WHERE Time_Slot < 25 AND Time_Slot > 18";
    $statement5 = $db->prepare($query5);
    $statement5->execute();
    $students_section4 = $statement5->fetchAll();
    $statement5->closeCursor();

    $query6 = "SELECT UMID, Fname, Lname, Project_Title, Email_Address, Phone_Number
                FROM `demoregistration`.`STUDENTS`
                WHERE Time_Slot < 31 AND Time_Slot > 24";
    $statement6 = $db->prepare($query6);
    $statement6->execute();
    $students_section5 = $statement6->fetchAll();
    $statement6->closeCursor();

    $query7 = "SELECT UMID, Fname, Lname, Project_Title, Email_Address, Phone_Number
                FROM `demoregistration`.`STUDENTS`
                WHERE Time_Slot < 37 AND Time_Slot > 30";
    $statement7 = $db->prepare($query7);
    $statement7->execute();
    $students_section6 = $statement7->fetchAll();
    $statement7->closeCursor();
?>

<!DOCTYPE html>

<html lang="en" style="background-color: #121212; color:#cccc00;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>List</title>
        <link rel="stylesheet" href="css/list.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>

    <body style="background-color:#121212;">
        <header>
            
        </header>

        <div class = "container-fluid">    
            <div class="row"> 
                <div id = "box">
                    <p id = "title">REGISTRATION SUCCESSFUL</p>

                    <p id = "first-slot">
                        12/9/2021 6pm-7pm
                        <ul id="first-slot-list">
                            
                        </ul> 
                    </p>

                    <p id = "second-slot">
                        12/9/2021 7pm-8pm
                        <ul id="second-slot-list">
                            
                        </ul> 
                    </p>

                    <p id = "third-slot">
                        12/9/2021 8pm-9pm
                        <ul id="third-slot-list">
                            
                        </ul> 
                    </p>

                    <p id = "fourth-slot">
                        12/10/2021 6pm-7pm
                        <ul id="fourth-slot-list">
                            
                        </ul> 
                    </p>

                    <p id = "fifth-slot">
                        12/10/2021 7pm-8pm
                        <ul id="fifth-slot-list">
                            
                        </ul> 
                    </p>

                    <p id = "sixth-slot">
                        12/10/2021 8pm-9pm
                        <ul id="sixth-slot-list">
                            
                        </ul> 
                    </p>

                    <a href="index.html">Back to main page</a> 
                </div>                               
            </div>
        </div>
    
    </body>

</html>

<script>
    var section1Objects = <?php echo json_encode($students_section1); ?>;
    var section2Objects = <?php echo json_encode($students_section2); ?>;
    var section3Objects = <?php echo json_encode($students_section3); ?>;
    var section4Objects = <?php echo json_encode($students_section4); ?>;
    var section5Objects = <?php echo json_encode($students_section5); ?>;
    var section6Objects = <?php echo json_encode($students_section6); ?>;

    var firstSection = document.getElementById('first-slot-list');
    var secondSection = document.getElementById('second-slot-list');
    var thirdSection = document.getElementById('third-slot-list');
    var fourthSection = document.getElementById('fourth-slot-list');
    var fifthSection = document.getElementById('fifth-slot-list');
    var sixthSection = document.getElementById('sixth-slot-list');

    for (var i = 0; i < section1Objects.length; i++){
        firstSection.innerHTML += "<li>" + section1Objects[i].UMID + " | " + section1Objects[i].Fname + " " + section1Objects[i].Lname + " | " + section1Objects[i].Phone_Number + " | " + section1Objects[i].Project_Title + " | " + section1Objects[i].Email_Address + " </li> "
    }

    for (var i = 0; i < section2Objects.length; i++){
        secondSection.innerHTML += "<li>" + section2Objects[i].UMID + " | " + section2Objects[i].Fname + " " + section2Objects[i].Lname + " | " + section2Objects[i].Phone_Number + " | " + section2Objects[i].Project_Title + " | " + section2Objects[i].Email_Address + " </li> "
    }

    for (var i = 0; i < section3Objects.length; i++){
        thirdSection.innerHTML += "<li>" + section3Objects[i].UMID + " | " + section3Objects[i].Fname + " " + section3Objects[i].Lname + " | " + section3Objects[i].Phone_Number + " | " + section3Objects[i].Project_Title + " | " + section3Objects[i].Email_Address + " </li> "
    }

    for (var i = 0; i < section4Objects.length; i++){
        fourthSection.innerHTML += "<li>" + section4Objects[i].UMID + " | " + section4Objects[i].Fname + " " + section4Objects[i].Lname + " | " + section4Objects[i].Phone_Number + " | " + section4Objects[i].Project_Title + " | " + section4Objects[i].Email_Address + " </li> "
    }

    for (var i = 0; i < section5Objects.length; i++){
        fifthSection.innerHTML += "<li>" + section5Objects[i].UMID + " | " + section5Objects[i].Fname + " " + section5Objects[i].Lname + " | " + section5Objects[i].Phone_Number + " | " + section5Objects[i].Project_Title + " | " + section5Objects[i].Email_Address + " </li> "
    }

    for (var i = 0; i < section6Objects.length; i++){
        sixthSection.innerHTML += "<li>" + section6Objects[i].UMID + " | " + section6Objects[i].Fname + " " + section6Objects[i].Lname + " | " + section6Objects[i].Phone_Number + " | " + section6Objects[i].Project_Title + " | " + section6Objects[i].Email_Address + " </li> "
    }
</script>
