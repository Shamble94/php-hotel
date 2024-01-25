<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => "Si",
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => "Si",
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => "No",
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => "No",
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => "Si",
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filtered_hotels = $hotels;
    if(isset($_GET["parcheggio"])){
        $temp_hotels = [];
        $parcheggio = $_GET["parcheggio"]; 
        

        foreach($filtered_hotels as $hotel){
            if($hotel["parking"] == $parcheggio) {
                $temp_hotels[] =  $hotel;
          
            
            };
        } 
        $filtered_hotels = $temp_hotels;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include __DIR__."/header.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-6">

                <form action="./index.php" method="GET">
                     <select name="parcheggio" id="parcheggio">
                        <option value="">Filtra per presenza parcheggio</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <!--  <input type="text" class="form-control form-control-sm mt-2" placeholder="filtra per presenza parcheggio" name="parcheggio">  -->
                    <button type="submit" class="btn btn-primary"> Cerca </button>
                </form>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Desrizione</th>
                            <th>Parcheggio</th>
                            <th>Voto</th>
                            <th>Distanza dal centro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($filtered_hotels as $hotel) { ?>
                            <tr>
                                <td> 
                                    <?php echo $hotel["name"];  ?>
                                </td>
                                <td> 
                                    <?php echo $hotel["description"];  ?>
                                </td>
                                <td> 
                                <?php echo $hotel["parking"];  ?>
                                </td>
                                <td> 
                                    <?php echo $hotel["vote"];  ?>
                                </td>
                                <td> 
                                    <?php echo $hotel["distance_to_center"];  ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include __DIR__."/footer.php"; ?>
    </body>
</html>