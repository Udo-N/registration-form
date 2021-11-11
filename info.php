<?php
    // $dsn = 'mysql:host=localhost; dbname=demoregistration';
    // $username = 'pma';
    // $password = 'W0lver1ne.';

    // $db = new PDO($dsn, $username, $password);

    // $query = 'INSERT INTO `demoregistration`.`STUDENTS`
    //         VALUES (88888888,'Chibu','Joku','A title','udonjoku99@gmail.com', 2896808387)';

    // $statement = $db->prepare($query);
    // $statement->execute();

    $umid = $_POST['umid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $p_title = $_POST['p-title'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
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

                    <p id = "first-slot">12/9/2021 6pm-7pm 6 seats left<button id="first">JOIN</button></p>
                    <p id = "second-slot">12/9/2021 7pm-8pm 6 seats left<button id="second">JOIN</button></p>
                    <p id = "third-slot">12/9/2021 8pm-9pm 6 seats left<button id="third">JOIN</button></p>
                    <p id = "fourth-slot">12/10/2021 6pm-7pm 6 seats left<button id="fourth">JOIN</button></p>
                    <p id = "fifth-slot">12/10/2021 7pm-8pm 6 seats left<button id="fifth">JOIN</button></p>
                    <p id = "sixth-slot">12/10/2021 8pm-9pm 6 seats left<button id="sixth">JOIN</button></p>

                    <a href="index.html">Back</a> 
                </div>

            </div>
        </div>
    
    </body>

</html>