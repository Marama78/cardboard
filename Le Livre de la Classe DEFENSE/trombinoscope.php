<!DOCTYPE html>
<html>
    <head>
        <title>Le livre de la classe DEFENSE</title>
        <meta charset='utf-8'/>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="CSS/styles.css">
     <?php   
    require 'admin/database.php';
    echo'
    <script>

        // all the variables needed for the mainpage
        // the "snacks" with the corresponding panel "#panel6" was added recently
        // two solutions : 
        //1 - correct the html
        //2 - move the argument inside the script
        // I ve choosen the second option, you are free to use the first one. :)

        
        
        // se connecter sur la base de données
        var contentMenu = [];
        var contentTabPanel = [];
        ';
        $db = Database::connect();
        // accéder aux données de la table [catégories]
        $statement = $db->query("SELECT * FROM classroom");
        $classroom = $statement->fetchAll();
        
        $menu = "";

        foreach($classroom as $state)
        {
        echo 'contentMenu.push("' . $state["name"] . '");';
        echo 'contentTabPanel.push("#panel' . $state["id"] . '");';
        }
        
        echo'   
        
        var _index;
        var target;
        var oldTarget;


        function ScrollToUp(){
            target=contentTabPanel[_index];

            // hide the .footpage class  items
            $(".footPage").hide(0);

            // .menuSpy is show on mobile
            $("#menuSpy").css({"width":"10"});   
        

            if(target!=oldTarget){
                $(target).fadeOut(40);
                $(target).find(".card").hide(0);

                window.scrollTo(0,0) ;
                $(target).fadeIn(500);
            $(".card").show(200);

                oldTarget = target;
            };
            $(".footPage").show(500);


            if(  $(".navbar-collapse").hasClass("show"))
            {
                $(".nav-item").hover(
                    function(){
                        $(this).css({"background":"#fff"});
                    },
                    function(){
                        $(this).css({"background":"rgba(0,0,0,0)"});
                    }
                )
            }
            
            $("#toggleButton").attr("aria-expanded","false");
            $(".navbar-collapse").removeClass("show");
           // $("#menuSpy").html(contentMenu[_index]);
           $(".footPage").html("<br>" +  contentMenu[_index] +"<br>");


        };
     </script>';
     ?>
    </head>


    <body id="couverture">
    
    <div >
        <header class="text-center">
            <h1 id="headerLogo"> Le Livre de la classe DEFENSE</h1>
        </header>

    <?php   
        echo'    
        <div id="planche">
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container-fluid" id="Enseigne">
                    <div class="navbar-brand">
                            <button  id="toggleButton" class="navbar-toggler col-md" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMenu">
                                <span class="navbar-toggler-icon"></span>
                            
                            <a id="menuSpy">Classe Defense</a></button>
                    </div>

                    <div class="collapse navbar-collapse" id = "collapseMenu">
                        <div class="container-md" id="boutonColapse">
                             <ul class="nav nav-tabs navbar-nav mr-auto"  role="tablist">';
                                   
                                    

                                   

                                        // créer le menu principal
                                        foreach($classroom as $category)
                                        {
                                            if($category['id']=='1')
                                            {
                                                echo ' 
                                                <li class="nav-item">
                                                <button onclick="ScrollToUp()" class="nav-link active" data-bs-toggle="tab" data-bs-target="#panel'. $category['id'] .'"  role="tab">' . $category['name'] . '</button>
                                                </li>';
                                            }
                                            else
                                            {
                                                echo'
                                                <li class="nav-item">
                                                <button onclick="ScrollToUp()"  class="nav-link" data-bs-toggle="tab" data-bs-target="#panel'. $category['id'] .'"   role="tab"  >' . $category['name'] . '</button>
                                                </li>';
                                            }
                                        }


                                echo'
                            </ul>
                        </div>
                    </div>

                </div>
            </nav>    
        </div>

   
        


        <div class="tab-content">';

            foreach($classroom as $category)
            {

                    if($category['id']=='1')
                    {
                        echo ' 
                        <div class="tab-pane  show active"   id="panel' . $category['id'] . '" role="tabpanel">';
                        
                    }
                    else
                    {
                        echo ' 
                        <div class="tab-pane"   id="panel' . $category['id'] . '" role="tabpanel">';
                    }

                    echo '<div class="container-md " data-bs-offset="0" >
                    <div class="row myOnglet">';

                    $statement = $db->prepare("SELECT * FROM students WHERE students.classroom = ?");
                    $statement->execute(array($category['id']));

                    while($item=$statement->fetch())
                    {
                        echo'
                        <div class="card col-sm-6 col-md-4 col-xl-3">
                        <div class="vignette">
                            <div class="card-header">
                                <img class="card-img funImg" style="filter:grayscale(100%);" src="images/' . $item['image'] . '" alt="Menu Classic" srcset=""> 
                                
                            
                        
                            </div>
                        
                            <div class="card-body">
                                
                                    <p class="lname">' . $item['lname'] . '</p>
                                    <p class="fname">' . $item['fname'] . '</p>
                                    <p class="ticket-text">' . $item['vow'] . '</p>
                            </div>

                         
                        </div>           
                    </div>';

                    }

                    // ferme les div précédentes
                    echo '</div>
                    </div>
                    </div>';

            }

            Database::disconnect(); 

        ?>

    
    </div>
    
    <script >

        //change the size of the elements of the HTML if the height of the menu is more than 60px
        var _currentHeight = $(".container-md").height();

        //update permanent of the index
        $("li").hover(function(){

            _index = $("li").index(this);
            
            $("#menuSpy").html(contentMenu[_index]);
            
            target = contentTabPanel[_index];
        });

        //to do if click
        $(".nav-link").click(ScrollToUp());

        //todo if hover on button
        $(".vignette").hover(
            function(){
                
            $(this).css({
                
                    "background":"linear-gradient(24deg, #104999 0%, #ffd2e1 25%, #fff 50%,#ffd2e1 75%,#104999 100%)",
                    "background-size":"600% 600%",
                    "animation": "AnimeGradient 10s ease infinite",
                });
                $(this).children(".card-header").children("img").css({
                    "filter":"grayscale(0%)",
                    "box-shadow":"5px 5px 5px #333"
                    });

           

                $(this).click(function(){
                    $(this).css({
                        "background":"linear-gradient(0deg, #fff 0%, #757059  100%)",
                        "background-size":"600% 600%",
                        "animation": "AnimeGradient 4s ease 1",
                    });
                })

            },
            function(){
                $(this).css({"background":"#fff"});

                $(this).children(".card-header").children("img").css({
                    "filter":"grayscale(100%)",
                    "box-shadow":"none"
                     });

            }
        )

        
    </script>


    <footer class="footPage">
        <br>
        Classe Defense Collège de Taravao
        <br>
    </footer>


</body>

</html>