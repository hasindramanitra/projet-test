<?php
namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\CommandeModel;
use App\Models\DetailsCommandes;
use App\Models\Facture;
use App\Models\FacturePaiement;
use App\Models\ModePaimentModel;
use App\Models\VideoModel;

class CommandeController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function commande()
    {
        if($this->request->getMethod() == 'get')
        {
            $panier = session()->get("panier", []);
            $dataPanier = [];
            $total = 0;
            foreach ($panier as $id => $quantite) {
                $videos = new VideoModel();
                $oneVideo = $videos->find($id);
                $dataPanier[]= [
                    "videos"=>$oneVideo,
                    "quantite"=>$quantite
                ];
                $total +=$oneVideo['PRICE'] * $quantite;
            }
            $modePaiement = new ModePaimentModel();
            return view('commande', [
                'dataPanier'=>$dataPanier,
                'total'=>$total,
                'modePaiement'=>$modePaiement->findAll()
            ]);
        }else if($this->request->getMethod() == 'post')
        {
            $panier = session()->get("panier", []);
            $dataPanier = [];
            $total = 0;
            foreach ($panier as $id => $quantite) {
                $videos = new VideoModel();
                $oneVideo = $videos->find($id);
                $dataPanier[]= [
                    "videos"=>$oneVideo,
                    "quantite"=>$quantite
                ];
                $total +=$oneVideo['PRICE'] * $quantite;
            }
            if($this->validate([
                'NOM'=>'required|min_length[3]',
                'PRENOM'=>'required|min_length[3]',
                'ADRESSE'=>'required|min_length[8]',
                'TELEPHONE'=>'required|numeric',
                'EMAIL'=>'required|valid_email'
            ])){
                $client = new ClientModel();
                
                $email = $this->request->getVar('EMAIL');
                
                $is_email = $client->where('EMAIL', $email)->first();
                $video = new VideoModel();
                $is_video = $video->where('ID', $oneVideo['ID'])->first();
                
                if($is_email && ($is_video['QUANTITE_EN_STOCK'] >= $quantite))
                {
                    $commande = new CommandeModel();
                    $dataCommande = [
                        'CLIENTS_ID'=>$is_email['ID']
                    ];
                    $newCommande = $commande->insert($dataCommande);
                    $total=0;
                    foreach ($dataPanier as $value) {
                        $produits_id= $value['videos']['ID'];
                        $total_price = $value['videos']['PRICE']*$value['quantite'];
                        $quantite_en_stock = $value['videos']['QUANTITE_EN_STOCK'] - $value['quantite'];
                        $quantite = $value['quantite'];
                        $detailsCommande = new DetailsCommandes();
                        $dataDetails = [
                            'COMMANDE_ID'=>$newCommande,
                            'PRODUIT_ID'=>$produits_id,
                            'TOTAL_PRIX_PRODUITS'=>$total_price,
                            'QUANTITE'=>$quantite
                        ];
                        $total +=$value['videos']['PRICE'] * $quantite;
                        $detailsCommande->insert($dataDetails);
                        $video = new VideoModel();
                        $isVideo = $video->where('ID', $value['videos']['ID'])->first();
                        $dataVideo = [
                            'QUANTITE_EN_STOCK'=>$quantite_en_stock
                        ];
                        $updateVideo = $video->update($isVideo['ID'], $dataVideo);
                        
                        
                    }
                    $facture = new Facture();
                    $moneyClient = $this->request->getVar('MONEY');
                    $dataFacture = [
                        'COMMANDE_ID'=>$newCommande,
                        'TOTAL'=>$total,
                        'CLIENT_MONEY'=>$moneyClient,
                        'REST_MONEY_CLIENT'=>$moneyClient - $total
                    ];
                    $newFacture = $facture->insert($dataFacture);
                    $facturePaiement = new FacturePaiement();
                    $modePaiement = $this->request->getVar('MODE_PAIEMENT');
                    $dataFacturePaiement = [
                        'FACTURE_ID'=>$newFacture,
                        'MODE_PAIEMENT_ID'=>$modePaiement
                    ];
                    $newFacturePaiement = $facturePaiement->insert($dataFacturePaiement);
                    session()->set("panier", []);
                    return redirect()->to('AllVideo');

                }else if(!$is_email && ($is_video['QUANTITE_EN_STOCK'] >= $quantite)){
                    $nom = $this->request->getVar('NOM');
                    $prenom= $this->request->getVar('PRENOM');
                    $adresse = $this->request->getVar('ADRESSE');
                    $telephone = $this->request->getVar('TELEPHONE');
                    $email = $this->request->getVar('EMAIL');

                    $client = new ClientModel();
                    $dataClient = [
                        'NOM'=>$nom,
                        'PRENOM'=>$prenom,
                        'ADRESSE'=>$adresse,
                        'TELEPHONE'=>$telephone,
                        'EMAIL'=>$email
                    ];
                    $newClient = $client->insert($dataClient);
                    $commande = new CommandeModel();
                    $dataCommande = [
                        'CLIENTS_ID'=>$newClient
                    ];
                    $newCommande = $commande->insert($dataCommande);
                    $total = 0;
                    foreach ($dataPanier as $value) {
                        $produits_id= $value['videos']['ID'];
                        $total_price = $value['videos']['PRICE']*$value['quantite'];
                        $quantite_en_stock = $value['videos']['QUANTITE_EN_STOCK'] - $value['quantite'];
                        $quantite = $value['quantite'];
                        $quantite_en_stock = $is_video['QUANTITE_EN_STOCK'] - $value['quantite'];
                        $detailsCommande = new DetailsCommandes();
                        $dataDetails = [
                            'COMMANDE_ID'=>$newCommande,
                            'PRODUIT_ID'=>$produits_id,
                            'TOTAL_PRIX_PRODUITS'=>$total_price,
                            'QUANTITE'=>$quantite
                        ];
                        $total +=$value['videos']['PRICE'] * $quantite;
                        $detailsCommande->insert($dataDetails);
                        $video = new VideoModel();
                        $isVideo = $video->where('ID', $value['videos']['ID'])->first();
                        $dataVideo = [
                            'QUANTITE_EN_STOCK'=>$quantite_en_stock
                        ];
                        $updateVideo = $video->update($isVideo['ID'], $dataVideo);
                    
                }
                    $facture = new Facture();
                    $moneyClient = $this->request->getVar('MONEY');
                    $dataFacture = [
                        'COMMANDE_ID'=>$newCommande,
                        'TOTAL'=>$total,
                        'CLIENT_MONEY'=>$moneyClient,
                        'REST_MONEY_CLIENT'=>$moneyClient - $total  
                    ];
                    $newFacture = $facture->insert($dataFacture);
                    $facturePaiement = new FacturePaiement();
                    $modePaiement = $this->request->getVar('MODE_PAIEMENT');
                    $dataFacturePaiement = [
                        'FACTURE_ID'=>$newFacture,
                        'MODE_PAIEMENT_ID'=>$modePaiement
                    ];
                    $newFacturePaiement = $facturePaiement->insert($dataFacturePaiement);
                    session()->set("panier", []);
                    return redirect()->to('AllVideo');
                
            }else{
                return redirect('commande')->with('status', 'erreur');
            }
            
        }
        
    }

    }
    public function addCommande($id)
    {
        $panier = session()->get("panier", []);
        $video = new VideoModel();
        $findVideo = $video->find($id);
        $videoCommande = $findVideo['ID'];
        if(!empty($panier[$videoCommande]))
        {
            $panier[$videoCommande]++;
        }else{
            $panier[$videoCommande] = 1;
        }
        session()->set("panier", $panier);
        return redirect()->to("commande");
    }

    public function removeCommande($id)
    {
        $panier = session()->get("panier", []);
        $video = new VideoModel();
        $findVideo = $video->find($id);
        $videoCommande = $findVideo['ID'];
        if(!empty($panier[$videoCommande]))
        {
            if($panier[$videoCommande] >1)
            {
                $panier[$videoCommande]--;
            }else{
                unset($panier[$videoCommande]);
            }
            
        }
        session()->set("panier", $panier);
        return redirect()->to("commande");
    }

    public function delete($id)
    {
        $panier = session()->get("panier", []);
        $video = new VideoModel();
        $findVideo = $video->find($id);
        $videoCommande = $findVideo['ID'];
        if(!empty($panier[$videoCommande]))
        {
            unset($panier[$videoCommande]);
            
        }
        session()->set("panier", $panier);
        return redirect()->to('commande');
    }

    public function deleteAll()
    {
        session()->set("panier", []);
        return redirect()->to("commande");
    }

    
}