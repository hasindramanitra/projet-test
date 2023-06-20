<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function show(val)
        {
                if(val == <?=$modePaiement[0]['ID']?>)
                {
                    document.getElementById('essai').addEventListener('change', function(){
                        document.getElementById("money").style.display="block"
                    });
                }
                if(val == <?=$modePaiement[1]['ID']?>)
                {
                    document.getElementById("essai").addEventListener('change', function(){
                        document.getElementById("money").style.display="block"
                    });
                    console.log(<?=$modePaiement[1]['ID']?>);
                }
                
            
                
            
           
        }
        
    </script>
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
            <label for="NOM">Entrez nom</label><br>
            <input type="text" name="NOM" id=""><br>
            <label for="PRENOM">Entrez prenom</label><br>
            <input type="text" name="PRENOM" id=""><br>
            <label for="ADRESSE">Entrez l'adresse</label><br>
            <input type="text" name="ADRESSE" id=""><br>
            <label for="TELEPHONE">Entrez le téléphone</label><br>
            <input type="number" name="TELEPHONE" id=""><br>
            <label for="EMAIL">Entrez l'email</label><br>
            <input type="email" name="EMAIL" id=""><br>
            <label for="MODE_PAIEMENT">selectionner le mode de paiement</label><br>
            <?php foreach($modePaiement as $mode):?>
                <input type="radio" name="MODE_PAIEMENT" id="essai" onclick="show(<?=$mode['ID']?>)" value="<?=$mode['ID']?>"><?=$mode['NOM']?><br>
            <?php endforeach?>
            <div id="money" style="display: none;">
                <label for="MONEY">Entrez l'argent en espéce</label><br>
                <input type="number" name="MONEY" id="myEspece"><br>
            </div>
            <div id="carte" style="display: none;" >
                <label for="carte">for the carte</label><br>
                <input type="text" name="CARTE" id="myCarte"><br>
            </div>
            <div id="trans" style="display: none;">
                <label for="trans">for the trans</label><br>
                <input type="text" name="TRANSFERT" id="myTrans"><br>
            </div>
            <button type="submit">valider</button>
            <?=form_close()?>
        </div>
</body>
</html>

