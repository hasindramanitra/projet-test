<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All facture</h1>
    <table>
        <thead>
            <tr>
                <td>Numero de la facture</td>
                <td>Numero de la commande</td>
                <td>Nom du client</td>
                <td>Email du client</td>
                <td>Total de la facture</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($factures as $facture):?>
                <tr>
                    <td><?=$facture['id']?></td>
                    <td><?=$facture['commande_id']?></td>
                    <td><?=$facture['nom']?></td>
                    <td><?=$facture['email']?></td>
                    <td><?=$facture['total']?></td>
                    <td><a href="#">Delete</a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>