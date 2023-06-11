<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>New video</h1>
    <?=form_open_multipart()?>
        <label for="TITLE">Enter the title</label>
        <input type="text" name="TITLE" >
        <label for="TIME">Enter the time of video</label>
        <input type="text" name="TIME" >
        <label for="PRICE">Enter the price</label>
        <input type="number" name="PRICE" >
        <label for="DESCRIPTION">Enter the description</label>
        <input type="text" name="DESCRIPTION" >
        <label for="IMAGE">Enter the image of video</label>
        <input type="file" name="IMAGE" >
        <label for="CATEGORIE_ID">Choose the categorie of video</label>
        <?php foreach($categories as $categorie):?>
            <input type="radio" name="CATEGORIE_ID" value="<?=$categorie['ID']?>"><?=$categorie['NOM']?>
        <?php endforeach?>
        <button type="submit">Save</button>
    <?=form_close()?>
</body>
</html>