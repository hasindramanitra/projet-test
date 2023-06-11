<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Mode de paiement</h1>
    <?=form_open()?>
        <label for="NOM">Name</label>
        <input type="text" name="NOM" value="<?=$modePaiement['NOM']?>">
        <button type="submit">Save</button>
    <?=form_close()?>
</body>
</html>