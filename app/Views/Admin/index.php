<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All categories</h1>
    <h2><a href="<?=base_url('Admin/CreateCategorie')?>">Add New category</a></h2>
    <table>
        <thead>
            <tr>
                <td>Numero</td>
                <td>Nom</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $categorie):?>
                <tr>
                    <td><?=$categorie['ID']?></td>
                    <td><?=$categorie['NOM']?></td>
                    <td><a href="<?=base_url('Admin/UpdateCategory/'.$categorie['ID'])?>">Update</a></td>
                    <td><a href="<?=base_url('Admin/DeleteCategory/'.$categorie['ID'])?>">Delete</a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>