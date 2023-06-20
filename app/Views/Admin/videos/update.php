<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update video</h1>
    <?=form_open_multipart()?>
        <label for="TITLE">Title</label><br>
        <input type="text" name="TITLE" value="<?=$video['TITLE']?>"><br>
        <label for="TIME">Time</label><br>
        <input type="text" name="TIME" value="<?=$video['TIME']?>"><br>
        <label for="PRICE">Price</label><br>
        <input type="number" name="PRICE" value="<?=$video['PRICE']?>"><br>
        <label for="DESCRIPTION">Description</label><br>
        <input type="text" name="DESCRIPTION" value="<?=$video['DESCRIPTION']?>"><br>
        <label for="IMAGE">Image</label><br>
        <img src="<?=base_url('Uploads/').$video['IMAGE']?>" height="50px" width="50px"><br>
        <input type="file" name="IMAGE" value="<?=base_url('Uploads/').$video['IMAGE']?>"><br>
        <label for="CATEGORIE_ID">Categorie</label>
        <?php foreach($categories as $categorie):?>
            <input type="radio" name="CATEGORIE_ID" <?php echo ($video['CATEGORIE_ID'] == $categorie['ID'] ? 'checked' : null); ?> value="<?=$categorie['ID']?>"><?=$categorie['NOM']?><br>
        <?php endforeach?>
        <button type="submit">Save</button>
    <?=form_close()?>
</body>
</html>