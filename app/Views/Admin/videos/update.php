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
        <label for="TITLE">Title</label>
        <input type="text" name="TITLE" value="<?=$video['TITLE']?>">
        <label for="TIME">Time</label>
        <input type="text" name="TIME" value="<?=$video['TIME']?>">
        <label for="PRICE">Price</label>
        <input type="number" name="PRICE" value="<?=$video['PRICE']?>">
        <label for="DESCRIPTION">Description</label>
        <input type="text" name="DESCRIPTION" value="<?=$video['DESCRIPTION']?>">
        <label for="IMAGE">Image</label>
        <img src="<?=base_url('Uploads/').$video['IMAGE']?>" height="50px" width="50px">
        <input type="file" name="IMAGE" value="<?=base_url('Uploads/').$video['IMAGE']?>">
        <label for="CATEGORIE_ID">Categorie</label>
        <?php foreach($categories as $categorie):?>
            <input type="radio" name="CATEGORIE_ID" <?php echo ($video['CATEGORIE_ID'] == $categorie['ID'] ? 'checked' : null); ?> value="<?=$categorie['ID']?>"><?=$categorie['NOM']?>
        <?php endforeach?>
        <button type="submit">Save</button>
    <?=form_close()?>
</body>
</html>