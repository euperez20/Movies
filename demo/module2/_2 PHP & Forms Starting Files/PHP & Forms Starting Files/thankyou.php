<?php
    // Ensure data was entered
    if(isset($_POST['fname'])){
        $content = "Thank you for your submission, {$_POST['fname']}.";
    }

    // Validate The student number
    function filterinput(){
    return filter_input(INPUT_POST, 'studentnum', FILTER_VALIDATE_INT);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Thank you for Your Submission</title>
        <link rel="stylesheet" type="text/css" href="formstyle.css"/>
    </head>    

    <body>
        <div id="wrapper">
            <h4><?= $content ?></h4>

<?php if(filterinput()): ?>

            <table>
                <tr>
                    <td>Name</td>
                    <td><?= $_POST['fname']. " " . $_POST['lname'] ?></td>
                </tr>
                <tr>
                    <td>Student #:</td>
                    <td><?= $_POST['studentnum'] ?></td>
                </tr>
                <tr>
                    <td>Program:</td>
                    <td><?= $_POST['program'] ?></td>                    
                </tr>

                <?php  // If the user chose bit || ba, show their major
                    if($_POST['program'] == "BIT"):
                ?>
                    <tr>
                        <td>Major:</td>
                        <td><?= $_POST['bitmajor'] ?></td>
                    </tr>
                <?php endif ?>

                <?php  // If the user chose bit || ba, show their major
                    if($_POST['program'] == "BA"):
                ?>
                    <tr>
                        <td>Major:</td>
                        <td><?= $_POST['bamajor'] ?></td>
                    </tr>
                <?php endif ?>
            </table>

            <?php else: ?>
                <h4>You did not supply an appropiate student number.</h4>
            <?php endif ?>

        </div>
            
    </body>
    
</html>
