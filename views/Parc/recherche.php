<h2><a>Affichage des Machines</a></h2>
<?php 
if (isset($record[0])) { //si il existe des machines
	echo "<table border=1 width=\"100%\">";
	$liste_indices=array_keys($record[0]);
	echo "<tr>";
        //print_r($liste_indices);
	foreach($liste_indices as $indice)    {   
		 echo "<th>";   
		 echo $indice;    
		 echo "</th>";   
	}
	echo "</tr>";

	foreach($record as $ligne)    {    
		 echo "<tr>";   
		 foreach($ligne as $valeur)        {        
			echo "<td align=center>";        
			echo $valeur;        
			echo "</td>";       
		 }  
		 echo "</tr>";    
	}
	echo "</table>";
}
else {
	echo "Il n'existe pas de machines suivant vos critères.";
}	
 ?>