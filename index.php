<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$hName = $_GET['name'] ?? '';
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
                <div class="card-body">

                    <div class="card-body">
                        <div class="mb-3">
                            <label>Nome Hotel</label>
                            <input type="text" placeholder="Inserisci l'hotel da cercare" class="form-control" name="name">
                            <select class="form-select form-select-lg mb-3 my-3" aria-label="Large select example">
                                <option selected>Seleziona il numero di stelle</option>
                                <option value="1">Una stella</option>
                                <option value="2">Due Stelle</option>
                                <option value="3">Tre Stelle</option>
                                <option value="3">Quattro Stelle</option>
                                <option value="3">Cinque Stelle</option>
                            </select>
                        </div>

                        <div class="container">
                                <!-- singola riga da moltiplicare nel foreach -->
                            <?php
                              foreach ($hotels as $singleHotel) {

                                  // devo stampare l'html della card del prodotto
                              ?>
                                <ul class="list-group list-group-horizontal">
                                  <li class="list-group-item"><h5><?php echo $singleHotel ?></h5></li>
                                  <li class="list-group-item">A second item</li>
                                  <li class="list-group-item">A third item</li>
                                </ul>

                            <?php } ?>  



                        </div>




                    </div>

                    <button class="btn btn-primary mx-auto" type="submit">conferma</button>

                </div>
            </form>

        </div>
    </div>





</body>

</html>