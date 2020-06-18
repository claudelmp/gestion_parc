<?php 
class Controller{   	
	var $vars = array();    
	var $layout = 'default';   
        var $data=array();
	function __construct(){         
		if(isset($_POST)){            
			$this->data = $_POST;  //quand on saisit un formulaire      
		} 
		if(isset($this->models)){   
			foreach($this->models as $v){ 
                                $nom_model= strtolower($v);
				$this->$nom_model=$this->loadModel($v);   //chargement du modèle, ici parc_model       
			}         
		}
	} 
	
	function set($d){    
		$this->vars = array_merge($this->vars,$d);  //fusionne les tableaux $this->vars et $d  
	}
	
	// inclusion du fichier passé en paramétre     
	function render($filename){ 
		extract($this->vars);   //Importe les variables dans la table des symboles.     
		ob_start();      //démarre la temporisation de sortie.  
		require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');        
		$content_for_layout = ob_get_clean();  //Lit le contenu courant du tampon de sortie puis l'efface  
		//Cela permet de récupérer le contenu de la vue et de le stocker dans la variable $content_for_layout
		require(ROOT.'views/layout/'.$this->layout.'.php');  //affichage du layout default.php       
	} 
	
	function loadModel($name){  
		require_once(ROOT.'models/'.strtolower($name).'.php');        
		return new $name();    
	} 
} ?>