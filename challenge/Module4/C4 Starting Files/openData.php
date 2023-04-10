<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://data.winnipeg.ca/resource/hfwk-jp4h.json",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_0,
    CURLOPT_CUSTOMREQUEST => "GET",
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$data = json_decode($response, true);

$park_names = array_column($data, 'park_name');

$park_names = array_unique($park_names);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Winnipeg Parks Data</title>
</head>
<body>
    <h1>List of Winnipeg Parks</h1>
  
    <table>
        <tr>
            <th>Tree Id</th>
            <th>Botanical Name</th>
            <th>Common Name</th>
            <th>Park</th>
            <th>Location Class</th>
            <th>Street</th>
        </tr>
        <?php foreach($data as $item){ ?>
            <tr>
                <td><?php echo $item['tree_id']; ?></td>
                <td><?php echo $item['botanical_name']; ?></td>
                <td><?php echo $item['common_name']; ?></td>           
                <td><?php echo $item['park']; ?></td>
                <td><?php echo $item['location_class']; ?></td>                
                <td><?php echo $item['street']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>