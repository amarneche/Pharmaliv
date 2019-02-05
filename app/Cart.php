<?php
namespace App;


 class Cart {
        public $produits=null ;

        public $ordonnanceID=null;
        public $photo =null;
        public $total=0;
        
        public function __construct($oldCart){
            if($oldCart){
                $this->produits=$oldCart->produits;
                $this->ordonnanceID=$oldCart->ordonnanceID;
                $this->photo=$oldCart->photo;
            }
        }
        
        public function add($produit ,$qte){
            if($this->produits){
                if(!array_key_exists($produit->id,$this->produits)){
                    
                    $this->produits[$produit->id]=[$produit,$qte];
                   
                }
            }
            else $this->produits[$produit->id]=[$produit,$qte];
            $this->total();
             
            
        }
        public function delete($id){
            if($this->produits){
                if(array_key_exists($id,$this->produits)){
                   unset( $this->produits[$id]);
                }
            }
            $this->total();
        }
        public function setOrdonnance($id,$photo){
            $this->ordonnanceID=$id;
            $this->photo=$photo;
           
        }
        public  function total(){
            $this->total=0.0;
            foreach ($this->produits as $produit) {
                $this->total+=(intval($produit[1])* intval($produit[0]->prix));
            }
        }

}

?>