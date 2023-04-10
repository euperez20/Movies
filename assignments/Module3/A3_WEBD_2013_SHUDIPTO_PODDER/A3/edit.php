<?php

/*******w******** 
    
    Name: Shudipto Podder
    Date: February 4,2023
    Description: Editing the blog

****************/

require('connect.php');
require('authenticate.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//deleting
if (isset($_POST['delete'])) {
    $id=$_POST['id'];
    $statement = $db->prepare("DELETE FROM myblogg WHERE id = :id");
    $statement->bindValue(':id', $id);
    $statement->execute();

    header('Location: index.php');
    exit;
}
//updating
if (isset($_POST['update'])) { 
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id=$_POST['id'];
    if (empty(strlen($title)<1 && strlen($content)<1)) {
       $statement = $db->prepare("UPDATE myblogg SET title = :title, content = :content WHERE id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);
        $statement->bindValue(':id', $id);
        $statement->execute();   
        header("Location: index.php");
        exit();

    }
}



// using get and id
if($_GET&& !empty($_GET['id'])){
    $statement = $db->prepare("SELECT * FROM myblogg WHERE id = :id");
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();
    $output = $statement->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Edit this Post!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
<h1>My Personal Blog</h1>
        <a href="index.php">My Personal Blog</a>
    
        <h1>Edit Blog</h1>
        <form id="edit" action="edit.php" method="post">
            <fieldset>
                <legend></legend>
            <ul>

                <p>
                    <label for="title">Title</label>
                </p>
                <p>
                    <input type="text" id="title" name="title" value="<?= $output['title'] ?>" size="100">
                </p>
                

            </ul>

            <ul>

                <p>
                    <label for="content">Content</label>
                </p>
                <p>
                    <textarea name="content" id="content" cols="100" rows="15"><?=$output['content']?></textarea>
                </p>
            </ul>
        <input type="hidden" name="id" value="<?= $output['id']; ?>">
        <input type="submit" name="update" value="UPDATE & SUBMIT">
        <input type="submit" name="delete" value="Delete">

    </form>
</fieldset>
    </div> 
</body>
</html>