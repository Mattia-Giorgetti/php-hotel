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
$parkingInput = $_GET['freePark'];
$ratingInput = $_GET['rating'];
if ((!empty($parkingInput)) || (!empty($ratingInput))) {
    var_dump($parkingInput);
    var_dump($ratingInput);
    $filteredArray = [];
    foreach ($hotels as $hotel) {
        // true & false
        if (!(($hotel['parking'] xor ($parkingInput == 'true')))) {
            $filteredArray[] = $hotel;
        }

    }
    $hotels = $filteredArray;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>PHP Hotels</title>
</head>

<body>
    <h1>Hotels</h1>
    <div class="mb-4">
        <form action="index.php" method="GET">
            <select name="freePark">
                <option value="">All</option>
                <option value="true">Parcheggio incluso</option>
                <option value="false">Parcheggio non incluso</option>
            </select>
            <select name="rating" class="mx-3">
                <option value="">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit">Cerca</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Hotel</th>
                <th scope="col">Description</th>
                <th scope="col">Vote</th>
                <th scope="col">Distance to center</th>
                <th scope="col">Parking</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $item) { ?>
            <tr>
                <td>
                    <?php echo $item['name'] ?>
                </td>
                <td>
                    <?php echo $item['description'] ?>
                </td>
                <td>
                    <?php echo $item['vote'] ?>
                </td>
                <td>
                    <?php echo $item['distance_to_center'] . ' ' . 'Km' ?>
                </td>
                <td>
                    <?php if ($item['parking']) {
                    echo 'Si';
                } else {
                    echo 'No';
                }
                ; ?>
                </td>
            </tr>
            <?php }
            ;
            ?>
        </tbody>
    </table>


</body>

</html>