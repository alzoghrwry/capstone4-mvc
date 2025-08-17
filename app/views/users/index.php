<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <p>Here is your user:</p>
    <ul>
    <?php
        
        foreach($users as $user){
            echo "<li>".$user['name']."</li>";
            echo "<li>".$user['email']."</li>";
            echo "<li>".$user['phone']."</li>";
        }
    ?>
    </ul>
</body>
</html>