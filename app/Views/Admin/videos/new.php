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
        <label for="TITLE">Enter the title</label><br>
        <input type="text" name="TITLE" ><br>
        <label for="TIME">Enter the time of video</label><br>
        <input type="text" name="TIME" ><br>
        <label for="PRICE">Enter the price</label><br>
        <input type="number" name="PRICE" ><br>
        <label for="DESCRIPTION">Enter the description</label><br>
        <input type="text" name="DESCRIPTION" ><br>
        <label for="IMAGE">Enter the image of video</label><br>
        <input type="file" name="IMAGE" ><br>
        <label for="CATEGORIE_ID">Choose the categorie of video</label><br>
        <?php foreach($categories as $categorie):?>
            <input type="radio" name="CATEGORIE_ID" value="<?=$categorie['ID']?>"><?=$categorie['NOM']?><br>
        <?php endforeach?>
        <button type="submit">Save</button>
    <?=form_close()?>
</body>
</html>