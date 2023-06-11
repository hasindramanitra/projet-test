<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All commande</h1>
    <table>
        <thead>
            <tr>
                <td>Numero</td>
                <td>Date de création</td>
                <td>Nom du client</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commande as $value):?> 
                <tr>
                    <td><?=$value['ID']?></td>
                    <td><?=$value['CREATED_AT']?></td>
                    <td><?=$value['CLIENTS_ID']?></td>
                    <td><a href="#">Delete</a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>