<?php
    $animals = ["cat","donkey","dog","human","gorilla"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Embed PHP in HTML</title>
</head>
<body>
    <h1>Animals in a zone of danger</h1>
    <ol>
        <?php foreach($animals as $animal): ?>
            <li><?= $animal ?></li>  <!-- Short echo -->
        <?php endforeach ?>
    </ol>
</body>

</html>