<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All about this facture</h1>
    <table>
        <thead>
            <tr>
                <td>Numero facture</td>
                <td>quantite des videos</td>
                <td>Montant Total</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allAboutFactures as $all):?>
                <tr>
                    <td><?=$all['total_prix_produits']?></td>
                    <td><?=$all['quantite']?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>