<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Qui si vedono solo bei sederi',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Esattamente come immaginate temperatura media 40° in stanza e tifoni casuali',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Abbiamo problemi di acqua alta',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Come dice il nome si vedono tizie in topless',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Luogo di soggiorno per maranza',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$search = $_GET['search'] ?? '';
$searched = '';
$hStars = $_GET['stars']  ?? '';
$prckCheck = $_GET['Pcheck'] ?? 'null';/**/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhP_Hotel</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <h1 class="text-center">PHP HOTELS <i class="fa-regular fa-star" style="color: #000000;"></i></h1>

        <div class="row">

            <form action="index.php" class="card" method="GET">
                <div class="card-body text-center">

                    <div class="card-body">
                        <div class="mb-3">

                            <input type="text" placeholder="Inserisci l'hotel da cercare" class="form-control" name="search">

                    <!--////////////////////////////////////////////////////////////////////  filtri selezione ////////////////////////////////////////////////////////////////////-->
                            <select name="stars" class="form-select form-select-lg mb-3 my-3" aria-label="Large select example">    
                                <option selected>Seleziona il numero di stelle</option>
                                <option value="1">Una stella</option>
                                <option value="2">Due Stelle</option>
                                <option value="3">Tre Stelle</option>
                                <option value="3">Quattro Stelle</option>
                                <option value="3">Cinque Stelle</option>
                            </select>

                            <div class="d-flex text-center w-100">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Pcheck" id="flexRadioDefault1" value="0" >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nessun Parcheggio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Pcheck" id="flexRadioDefault2" value="1" > 
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Parcheggio Riservato
                                    </label>
                                </div>

                            </div>


                        </div>

                    </div>

                    <button class="btn btn-primary" type="submit">conferma</button>

                </div>
            </form>

            <div class="container my-5">

                    <!--/////////   casella dinamica  /////////-->

                <ul class="list-group list-group-horizontal text-center ">
                    <li class="list-group-item col-2"> Nome Hotel</li>
                    <li class="list-group-item d-flex flex-grow-1"> Descrizione</li>
                    <li class="list-group-item col-1"> voto</li>
                    <li class="list-group-item col-1"> distanza dal centro</li>
                </ul>


                <!--/////////   elemento clonato  /////////-->

                    <?php
                foreach ($hotels as $key => $singleHotel) {

                    $toPrint = (!$search && $prckCheck == 'null' && !$hStars) //NO PARKing SELECTED, NO SRCH AND NO VOTES
                                || ( $search && str_contains(strtolower($singleHotel['name']), strtolower($search)) && $prckCheck == 'null' && !$hStars) //SRC BUT NO PARKing AND NO VOTES
                                || ( $search && str_contains(strtolower($singleHotel['name']), strtolower($search)) && $prckCheck == $singleHotel['parking'] && !$hStars) //SRC AND PARKing BUT NO VOTES
                                || ( !$search && $prckCheck == $singleHotel['parking'] && !$hStars) //PARKing SELECTED BUT NO SRCH AND NO VOTES
                                || (!$search && $prckCheck == 'null' && $hStars >= $singleHotel['vote']) //NO PARKing SELECTED AND NO SRCH BUT VOTES 
                                || ( $search && str_contains(strtolower($singleHotel['name']), strtolower($search)) && $prckCheck == 'null' && $hStars >= $singleHotel['vote'])//SRC AND VOTES BUT NO PARKing
                                || ( !$search && $prckCheck == $singleHotel['parking'] && $hStars >= $singleHotel['vote'])//PARKing SELECTED AND VOTES BUT NO SRCH 
                                || ( $search && str_contains(strtolower($singleHotel['name']), strtolower($search)) && $prckCheck == $singleHotel['parking'] && $hStars >= $singleHotel['vote']);//SRC AND PARKING AND VOTES
                    if($toPrint){
                ?>
                    <ul class="list-group list-group-horizontal  text-center">
                        <li class="list-group-item col-2">
                            <h5><?php echo $singleHotel['name'] ?></h5>
                        </li>
                        <li class="list-group-item d-flex flex-grow-1"><?php echo $singleHotel['description'] ?></li>

                        <li class="list-group-item col-1"><?php echo $singleHotel['vote'] ?></li>
                        <li class="list-group-item col-1"><?php echo $singleHotel['distance_to_center'] ?></li>
                    </ul>

                <?php
                }//chiusura if
                }//chiusura foreach 
                ?>



            </div>


        </div>
    </div>





</body>

</html>