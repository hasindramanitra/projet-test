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
                <td>Numero du commande</td>
                <td>Date de création</td>
                <td>Email du client</td>
                <td>Titre des videos</td>
                <td>Quantite commandée de chaque video</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commande as $value):?> 
                <tr>
                    <td><?=$value['id']?></td>
                    <td><?=$value['created_at']?></td>
                    <td><?=$value['email']?></td>
                    <td><a href="<?=base_url('/Admin/DetailsCommande/'.$value['id'])?>">See More</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>