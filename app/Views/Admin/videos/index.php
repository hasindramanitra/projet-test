<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All videos</h1>
    <h2><a href="<?=base_url('Admin/CreateVideo')?>">Add new video</a></h2>
    <table>
        <thead>
            <tr>
                <td>Numero</td>
                <td>Title</td>
                <td>Price</td>
                <td>Description</td>
                <td>Time</td>
                <td>Image</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($videos as $video):?>
                <tr>
                    <td><?=$video['ID']?></td>
                    <td><?=$video['TITLE']?></td>
                    <td><?=$video['PRICE']?></td>
                    <td><?=$video['DESCRIPTION']?></td>
                    <td><?=$video['TIME']?></td>
                    <td>
                        <img src="<?="Uploads/".$video['IMAGE']?>" >
                    </td>
                    <td><a href="<?=base_url('Admin/UpdateVideo/'.$video['ID'])?>">Update</a></td>
                    <td><a href="<?=base_url('Admin/DeleteVideo/'.$video['ID'])?>">Delete</a></td>
                </tr>
                
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>