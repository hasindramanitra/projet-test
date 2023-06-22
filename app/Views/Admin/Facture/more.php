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
                <td>Montant total de chaque videos</td>
                <td>Titre de chaque videos</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allAboutFactures as $all):?>
                <tr>
                    <td><?=$all['id']?></td>
                    <td><?=$all['quantite']?></td>
                    <td><?=$all['videos.price*details_commandes.quantite']?></td>
                    <td><?=$all['title']?></td>
                </tr>
            <?php endforeach?>
            <tr>
                <td colspan="2" >Total:</td>
                <td><?=$total[0]['sum(videos.price*details_commandes.quantite)']?></td>
            </tr>
            
        </tbody>
    </table>
</body>
</html>