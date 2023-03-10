<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="presentation/css/styles.css">
    <link rel="stylesheet" href="presentation/css/users.css">
</head>

<body>
    <?php include("partials.php");
    ?>
    <h1>User Data</h1>
    <table>
        <thead>
            <tr>
                <th>cursist ID</th>
                <th>email</th>
                <th>wachtwoord</th>
                <th>aantal bestellingen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user["cursistId"]; ?></td>
                <td><?= $user["email"]; ?></td>
                <td><?= $user["wachtwoord"]; ?></td>
                <td style="text-align: center;"><?= $user["aantal bestellingen"]; ?></td>
            </tr>
            <?php } ?>
            <?php
            ?>
        </tbody>
    </table>
</body>

</html>