<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body{
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <h1>Make the client's command</h1>
    <div class="body" >
        <div class="left">
            <?php foreach($videos as $video):?>
                <div class="video-cart">
                    <img src="" alt="">
                    <h3 class="title"><?=$video['TITLE']?></h3>
                    <p class="price"><?=$video['PRICE']?>Ariary</p>
                    <button type="submit"><a href="<?=base_url("Add/".$video['ID'])?>">ADD</a></button>
                </div>
            <?php endforeach?>
        </div>
        
    </div>
    
    
</body>
</html>