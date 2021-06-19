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
        <div id="dataBasePower" >
            
            <header class="text-center" id="headerBase">
             
                <br>
                <br>
                <br>
                
                <h1 id="headerLogo">Livre de la Classe DEFENSE</h1>
                
                <br>
                <br>
            
            </header>
            

            <div class="container admin">
                <div class="row bg-light">
                    <h1>
                        <strong> Liste des Eleves </strong> 
                        <a href="insert.php" class="btn btn-success">
                            <span class="bi bi-plus-circle"></span>
                            Ajouter
                        </a>
                        <a href="../index.php" class="btn btn-warning">
                            <span class="bi bi-plus-circle"></span>
                            Accéder au Site Web
                        </a>
                    </h1>

                    <table class="table table-striped table-bordered bg-light">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom de famille</th>
                                <th>Prénom</th>
                                <th>Voeu</th>
                                <th>Classe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // brancher la base de données en appelant la fonction connect() dans le fichier database.php
                                require 'database.php';
                                $db=Database::connect();
                                
                                // récupérer les informations
                                $statement = $db->query('SELECT students.id,
                                students.fname,
                                students.lname,
                                students.vow,
                                students.image,
                                classroom.name AS classroom 
                                FROM students LEFT JOIN classroom ON students.classroom = classroom.id
                                ORDER by students.id DESC');
                                // lire chacune des lignes jusqu'à la fin mot clé = FETCH()
                                // afficher grâce à echo dans la page HTML
                                while ($students = $statement->fetch()) {
                                    echo '<tr>';

                                    echo '<td><img class="tinyBox" src="../images/' . $students['image'] . '" alt="photo"><p>'. $students['image'] . '</p></td>';

                                    echo '<td>' . $students['lname'] . '</td>';
                                    echo '<td>' . $students['fname'] . '</td>';
                                    echo '<td>' . $students['vow'] . '</td>';
                                    echo '<td>' . $students['classroom'] . '</td>';
                                    echo '<td width=400>';
                                    echo '<a href="view.php?id=' . $students['id'] . '" class="btn btn-outline-dark btnView"><span class="bi bi-image"> Voir</span></a>';
                                    echo ' ';
                                    echo  '<a href="update.php?id=' . $students['id'] . '" class="btn btn-primary btnUpdate"><span class="bi bi-pen"> Modifier</span></a>';
                                    echo ' ';
                                    echo '<a href="delete.php?id=' . $students['id'] . '" class="btn btn-danger btnDelete"><span class="bi bi-x-circle"> Supprimer</span></a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }

                                // libérer et déconnecter la base de données pour libérer le flux
                                Database::disconnect();

                            ?>
                          
                        </tbody>
                    
                    
                    </table>











                </div>

            </div>
       



                            
        <footer class="footPage text-center">
        <br>

        copyright 2021 - anahoa studio
        <br>

        </footer>

    </div>

    </body>

</html>