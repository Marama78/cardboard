<?php

    require "database.php";

    //$nameError = $descriptionError = $categoryError = $priceError = $imageError = $name = $description = $price = $category = $image = "";
    $fname = $fnameError = $lname = $lnameError = $vow = $vowError = $image = $imageError = $classroom = $classroomError = "";

    if(!empty($_POST))
    {
        $fname= checkInput($_POST['fname']);
        $lname= checkInput($_POST['lname']);
        $vow= checkInput($_POST['vow']);
        $classroom= checkInput($_POST['classroom']);
        $image= checkInput($_FILES['image']['name']);
        $imagePath='../images/' . basename($image);
        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
        $isSuccess = true;
        $isUploadSuccess = false;


        if(empty($fname))
        {
            $fnameError = "Veuillez entrer un prénom svp";
            $isSuccess = false;
        }
        if(empty($lname))
        {
            $lnameError = "Veuillez entrer un nom de famille svp";
            $isSuccess = false;
        }
        if(empty($vow))
        {
            $vowError = "ce champs ne peux pas être vide : veuillez taper votre voeu svp";
            $isSuccess = false;
        }
        if(empty($classroom))
        {
            $classroomError = "ce champs ne peux pas être vide";
            $isSuccess = false;
        }
        
        if(empty($image))
        {
            $imageError = "ce champs ne peux pas être vide";
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess=true;
            
            if($imageExtension != "jpg" && $imageExtension !="png" && $imageExtension!="jpeg" && $imageExtension!="gif")
            {
                $imageError = "les fichiers autorisés dont : .jpg .png .jpeg et .gif";
                $isUploadSuccess = false;
            }
           /* if(file_exists($imagePath))
            {
                $imageError = "Le fichier existe déja";
                $isUploadSuccess = false;
            }*/
            if($_FILES["image"]["size"] > 5000000) // 5M0
            {
                $imageError = "le fichier ne doit pas dépasser 5 Mo";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess)
            {
               if(!move_uploaded_file($_FILES["image"]["tmp_name"],$imagePath))
               {
                $imageError = "impossible de charger l'image";
                $isUploadSuccess = false;
               }
            }
        } // end else

        if($isSuccess && $isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO students (fname,lname,vow,image,classroom) VALUES ( ? , ? , ? , ? , ? )");
            $statement->execute(array($fname,$lname,$vow,$image,$classroom));
            Database::disconnect();
            header("Location: index.php");


        }

    }


    function checkInput($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
    
        return $data;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Burger code</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


        <link rel="stylesheet" href="../css/styles.css">
    </head>

    <body id="planche">
        <div id="dataBasePower" style="height: 1000px">
            <header class="text-center">
                <br>
                <br>
                <br>
                <h1 id="headerLogo"> 
                        </span id=headerLogo>Ajouter un élève</span>
                       
                </h1>
            </header>
            <br>
            <br>
    
        <div class="container admin">
            <div class="row">
                    
                <h1>
                    <strong>Ajouter un élève</strong>
                </h1>
                
                <br>
                
                
                <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                    <div class = "form-group">
                        <label for="fname"><strong>Prénom: </strong></label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder = "Nom" value="<?php echo $fname; ?>">
                            <span class="help-inline"><?php echo $fnameError; ?></span>
                    </div>

                    <div class="form-group">
                    <label for="lname"><strong>Nom de Famille: </strong> </label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder = "Nom de famille" value="<?php echo $lname; ?>">
                            <span class="help-inline"><?php echo $lnameError; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="vow"><strong>Voeu: </strong> </label>
                        <input type="text" class="form-control" id="vow" name="vow" placeholder = "Voeu" value="<?php echo $vow; ?>">
                            <span class="help-inline"><?php echo $vowError; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="classroom"><strong>Choisir la classe: </strong> </label>
                        <select class="form-control" id="classroom" name="classroom">
                            <?php
                                $db = Database::connect();

                                    foreach($db->query("SELECT * FROM classroom") as $row)
                                    {
                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                    }

                                Database::disconnect();
                            ?>
                        </select>
                            <span class="help-inline"><?php echo $classroomError; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="image"><strong>Sélectionner une image: </strong> </label>
                        <br>
                        <input type="file" id="image" name = "image"></input>
                        <br>
                        <span class="help-inline"><?php echo $imageError; ?></span>
                    </div>

                    

                    
                    
                    
                    <div class="form-group">
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success" ><span class="bi bi-pen"> </span> Ajouter </button>
                        <a href="index.php" class="btn btn-primary"><span class="bi bi-backspace"> </span> Retour </a>
                        </div>

                </form>


            </div>
        </div>


        <footer class="footPage text-center">
            <br>
            copyright 2021 - anahoa studio
            <br>
        </footer>



    </body>
</html>