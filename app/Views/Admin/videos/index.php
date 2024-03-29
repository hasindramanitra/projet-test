<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script  defer>
        function clicked(e)
        {
            if(confirm('Are you sure?')) {
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>
<body>
    <h1>All videos</h1>
    <?php if(session()->getFlashdata('status')):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong><?=session()->getFlashdata('status');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?>
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
                        <img src="<?=base_url('Uploads/').$video['IMAGE']?>" height="50px" width="50px">
                    </td>
                    <td><a href="<?=base_url('Admin/UpdateVideo/'.$video['ID'])?>">Update</a></td>
                    <td><a href="<?=base_url('Admin/DeleteVideo/'.$video['ID'])?>" onclick=" return clicked()">Delete</a></td>
                </tr>
                
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>