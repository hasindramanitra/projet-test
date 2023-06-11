<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="right">
            <h2><a href="<?=base_url('AllVideo')?>">All video</a></h2>
            <h1>Commande</h1>
            
            <table>
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>qte</td>
                        <td>Price</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                <?=form_open()?>
                    <?php foreach($dataPanier as $key =>$value ):?>
                        <tr>
                            <td name="TITLE" value="<?=$value['videos']['TITLE']?>"><?=$value['videos']['TITLE']?></td>
                            <td><?=$value['quantite']?></td>
                            <td><?=$value['quantite']*$value['videos']['PRICE']?>Ar</td>
                            <td><a href="<?=base_url('Add/'.$value['videos']['ID'])?>">+</a></td>
                            <td><a href="<?=base_url('Remove/'.$value['videos']['ID'])?>">-</a></td>
                            <td><a href="<?=base_url('DeleteCommande/'.$value['videos']['ID'])?>">Delete</a></td>
                        </tr>
                    <?php endforeach?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                        <td><?=$total?>Ar</td>
                        <td><a href="<?=base_url('DeleteAllCommande')?>">Delete All</a></td>
                    </tr>
                </tfoot>
            </table>
            <label for="NOM">Entrez nom</label>
            <input type="text" name="NOM" id="">
            <label for="PRENOM">Entrez prenom</label>
            <input type="text" name="PRENOM" id="">
            <label for="ADRESSE">Entrez l'adresse</label>
            <input type="text" name="ADRESSE" id="">
            <label for="TELEPHONE">Entrez le téléphone</label>
            <input type="number" name="TELEPHONE" id="">
            <label for="EMAIL">Entrez l'email</label>
            <input type="email" name="EMAIL" id="">
            <label for="MONEY">Entrez l'argent en espéce</label>
            <input type="number" name="MONEY" id="">
            <label for="MODE_PAIEMENT">selectionner le mode de paiement</label>
            <?php foreach($modePaiement as $mode):?>
                <input type="radio" name="MODE_PAIEMENT" value="<?=$mode['ID']?>"><?=$mode['NOM']?>
            <?php endforeach?>
            <button type="submit">valider</button>
            <?=form_close()?>
        </div>
</body>
</html>

