<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All clients</h1>
    <table>
        <thead>
            <tr>
                <td>Numero</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Adresse</td>
                <td>Téléphone</td>
                <td>Email</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clients as $values):?>
                <tr>
                    <td><?=$values['ID']?></td>
                    <td><?=$values['NOM']?></td>
                    <td><?=$values['PRENOM']?></td>
                    <td><?=$values['ADRESSE']?></td>
                    <td><?=$values['TELEPHONE']?></td>
                    <td><?=$values['EMAIL']?></td>
                    <td><a href="<?=base_url('Admin/DeleteClient/'.$values['ID'])?>">Delete</a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>