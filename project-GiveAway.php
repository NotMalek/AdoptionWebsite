<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Have a pet to give away</title>
    <link rel="stylesheet" href="project-style.css">
</head>
<body onload=display_();>
<script src="project.js"></script>

<?php
error_reporting (0);
include ('header.php');
include('menu.php');
include ('footer.php');
include ('project-session.php');
?>


<div class="content">

    <form method="get">
        Username:  <input type="text"  name="username">
        Password: <input type="text"  name="password">
        <input type="submit" value="Submit">
    </form>

    <?php
    $data_user = $_GET["username"];
    $data_pass = $_GET["password"];
    $data = $data_user . ":" . $data_pass . PHP_EOL;
    if (strpos(file_get_contents("login.txt"),$data) !== false) {
        $_SESSION["user"]="$data_user";
        $_SESSION["pass"]="$data_pass";
        echo "Successfully connected!";
        echo"<form action='#' method='post'>

        <div>
         <label>Is your pet a cat or a dog?</label>
            <select name='Animal'>
                <option value='Cat'>Cat</option>
                <option value='Dog'>Dog</option>
           </select>
        </div>
        
        <div>
            <label>What breed is it?</label>
            <select name='Breedtype'>
                <option value='Bulldog'>Bulldog</option>
                <option value='German Shepherd'>German Shepherd</option>
                <option value='Labrador Retriever'>Labrador Retriever</option>
                <option value='Persian Cat'>Persian Cat</option>
                <option value='Bengal Cat'>Bengal Cat</option>
                <option value='Scottish Fold'>Scottish Fold</option>
            </select>
        </div>
        
        <div>
            <label>Choose an age</label>
            <select name='Age'>
                <option value='Young'>0-24 months</option>
                <option value='Mature'>2-6 years</option>
                <option value='Old'>6-11 years</option>
            </select>
        </div>
        
        <div>
            <label>Choose a Gender</label>
            <select name='Gender'>
                <option value='Male'>Male</option>
                <option value='Female'>Female</option>
            </select>
        </div>

        <div>
            <p>Who does he get along with?</p>
            <input type='checkbox' name='gettingAlong[]' value='Dog'>
            <label>Dog</label>
            <input type='checkbox' name='gettingAlong[]' value='Cat'>
            <label>Cat</label>
        </div>

        <div>
        <label>Is he suitable for a family with small children?</label>
            <select name='Suitable'>
                <option value='Yes'>Yes</option>
                <option value='No'>No</option>
            </select>
        </div>

        <div>
            <label>You can say anything about your pet here</label>
            <input type='text' name='bragging'>
        </div>
        <div>
            <label>Please give your full name (family name and given name)</label>
            <input type='text' name='text' required>

        </div>
        <div>
            <label>Please type email</label>
            <input type='email' required pattern='(?!(^[.-].*|[^@]*[.-]@|.*\.{2,}.*)|^.{254}.)([a-zA-Z0-9!#$%&*+\/=?^_{|}~.-]+@)(?!-.*|.*-\.)([a-zA-Z0-9-]{1,63}\.)+[a-zA-Z]{2,15}' id='current_email' name='email'>
        </div>
        <div><input type='submit' value='Submit'></div>
    </form>";

        $type = $_POST['Animal'];
        $breed = $_POST["Breedtype"];
        $age = $_POST["Age"];
        $gender = $_POST["Gender"];
        $getAlong = "";
        foreach ($_POST["gettingAlong"] as $animal){
            $getAlong = $getAlong . $animal;
        }
        if($getAlong==""){$getAlong = "neither";}
        $suitableChildren = $_POST["Suitable"];
        $animal = $type.":".$breed.":".$age.":".$gender.":".$getAlong.":".$suitableChildren;

        $searchFor1 = "Yes";
        $searchFor2 = "No";
        $fileContent = file_get_contents('petInfo.txt');
        $count = substr_count($fileContent, $searchFor1) + substr_count($fileContent, $searchFor2) + 1;
        $entry = $count . ":" . $_SESSION["user"]. ":" . $animal . PHP_EOL;

        if($type=='Cat' or $type=='Dog'){
            file_put_contents("petInfo.txt", $entry, FILE_APPEND);
        }

    }
    else{
        $connected = false;
        echo "Username or password is wrong, please try again.";
    }



    ?>

</div>

</body>
</html>
