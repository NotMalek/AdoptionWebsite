<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find a dog/cat</title>
    <link rel="stylesheet" href="project-style.css">
</head>
<body onload=display_();>
<script src="project.js"></script>

<?php
error_reporting (0);
include ('header.php');
include('menu.php');
include ('footer.php');
?>


<div class="content">
    <div>
        <form action='#' method='post'>
        <label>Choose a cat or a dog</label>
        <select name='Animal'>
            <option value='Cat'>Cat</option>
            <option value='Dog'>Dog</option>
        </select>
    </div>

    <div>
        <label>Choose a breed</label>
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
        <p>Who does he need to get along with?</p>
        <input type='checkbox' name='gettingAlong[]' value='Dog'>
        <label>Dog</label>
        <input type='checkbox' name='gettingAlong[]' value='Cat'>
        <label>Cat</label>
    </div>

    <div><button>Find a Friend</button></div>
    </form>

    <?php
        $type = $_POST['Animal'];
        $breed = $_POST["Breedtype"];
        $age = $_POST["Age"];
        $gender = $_POST["Gender"];
        $getAlong = "";
        foreach ($_POST["gettingAlong"] as $animal){
            $getAlong = $getAlong . $animal;
        }
        if($getAlong==""){$getAlong = "neither";}

        $animal = $type.":".$breed.":".$age.":".$gender.":".$getAlong;


    if( strpos(file_get_contents("petInfo.txt"),$animal) !== false) {
        echo "An animal matches your description, come visit him at our location!";
    }
    else{
        echo "Unfortunately, no animal matches your description.";
    }

    ?>

</div>
</body>
</html>
