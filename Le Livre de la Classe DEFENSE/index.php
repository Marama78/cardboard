<!DOCTYPE html>
<html>
    <head>
        <title>Le Livre de la Classe Defense</title>
        <meta charset='utf-8'/>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


        <link rel="stylesheet" href="css/mainStyles.css">







    </head>
    <body> 

        <div class="title" >
            <h1>Le Livre de la Classe Défense</h1>
            <h2>Collège de Taravao</h2>
            <h3>Mme TEHAAMEAMEA Eléonore</h3>
        </div>

        <div class="container col-md-12">
            <div id="mainPage">            </div>
           
            <div class="screenBox">
                <div class="screenBox1">


                    <div class="card col-sm-6 col-md-4 col-xl-3">
                        <div class="card-header">
                             <img class="cardImg" id="screen1" src="images/mainPage/classe1.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                           <div class="classroomName">TE RORO NO TE TAU</div>
                          
                           <a class="btn price1" href="trombinoscope.php">Trombinoscope</a>
                           
                           
                           
                           
                           <a class="btn price2">L'année scolaire</a>
                          
                          
                          
                           <a class="btn price3">Le projet de l'Année</a>
                        </div>
                    </div>













                    <div class="card col-sm-6 col-md-4 col-xl-3">
                        <div class="card-header"> 
                            <img class="cardImg"  id="screen1" src="images/mainPage/classe1.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                           
                            <p>Te roro no te tau</p>
                            <p>Trombinoscope</p>
                        </div>
                    </div>
                    
                    <div class="card col-sm-6 col-md-4 col-xl-3">
                        <div class="card-header">
                             <img class="cardImg" id="screen1" src="images/mainPage/classe1.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                           
                            <p>Te roro no te tau</p>
                            <p>Trombinoscope</p>
                        </div>
                    </div>

                   


                    <div class="card col-sm-6 col-md-4 col-xl-3">
                        <div class="card-header">
                             <img class="cardImg" id="screen1" src="images/mainPage/classe1.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                           
                            <p>Te roro no te tau</p>
                            <p>Trombinoscope</p>
                        </div>
                    </div>

                    <div class="card col-sm-6 col-md-4 col-xl-3">
                        <div class="card-header">
                             <img class="cardImg" id="screen1" src="images/mainPage/classe1.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                           
                            <p>Te roro no te tau</p>
                            <p>Trombinoscope</p>
                        </div>
                    </div>

                    <div class="card col-sm-6 col-md-4 col-xl-3">
                        <div class="card-header">
                             <img class="cardImg" id="screen1" src="images/mainPage/classe1.png" alt="" srcset="">
                        </div>
                        <div class="card-body">
                           
                            <p>Te roro no te tau</p>
                            <p>Trombinoscope</p>
                        </div>
                    </div>
                    
                    <p></p>
                </div>
                
            </div>
           
       </div> 
       <div>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
       </div>

       <div class="footBase">
           <br>
           <p>Projet numérique Classe DEFENSE</p>
           <br>
       </div>
    </body>












    <script>
        $(".card").hover(
            function(){

                $(this).click(function(){
        $(this).find(".classroomName").show();
        $(this).children(".card-body").children(".price1").hide();
        $(this).children(".card-body").children(".price1").animate({
            width: "=100%", height: "toggle", fontSize: "1.8em"},
            500);

            $(this).children(".card-body").children(".price2").hide();
        $(this).children(".card-body").children(".price2").animate({
            width: "=100%", height: "toggle", fontSize: "1.8em"},
            500);

            $(this).children(".card-body").children(".price3").hide();
        $(this).children(".card-body").children(".price3").animate({
            width: "=100%", height: "toggle", fontSize: "1.8em"},
            500);

        $(this).find(".price1").css({"visibility" : "visible", });
        $(this).find(".price2").css({"visibility" : "visible"});
        $(this).find(".price3").css({"visibility" : "visible"});
                });
        },
        function(){
            $(this).children(".card-body").children(".price1").fadeOut(1000);
            $(this).children(".card-body").children(".price2").fadeOut(1000);
            $(this).children(".card-body").children(".price3").fadeOut(1000);
       
        });
</script>
</html>