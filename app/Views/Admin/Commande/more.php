<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Commande Details</h1>
    <table>
        <thead>
            <tr>
                <th>Nom du client</th>
                <th>Email du client</th>
                <th>Adresse du client</th>
                <th>Titre des videos</th>
                <th>Quantité des videos</th>
                <th>Date du commande</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($details as $detail):?>
                <tr>
                    <td><?=$detail['nom']?></td>
                    <td><?=$detail['email']?></td>
                    <td><?=$detail['adresse']?></td>
                    <td><?=$detail['title']?></td>
                    <td><?=$detail['quantite']?></td>
                    <td><?=$detail['created_at']?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>