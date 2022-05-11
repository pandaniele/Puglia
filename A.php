<html>
<body>

<?php
session_start();
session_unset();
try{
   
    //stringa di collegamento
    $utente=$_GET["cognome"];
    $password=$_GET["pwd"];


$col='mysql:host=localhost;dbname=operator';

//connessionje al database tramite oggetto PDP

$db=new PDO($col, 'root', '');



$ciao=$db->prepare('SELECT * FROM operatore');
$ciao->execute();



    while ($row = $ciao->fetch(PDO::FETCH_ASSOC)) {
   
if($utente==$row['cognome']){
if($password==$row['pwd']){
    $_SESSION["Id"]=$row['Id'];
}
} 
        }
        
    }




catch(PDOException $e) {
    // notifica in caso di errorre
    echo 'Attenzione: '.$e->getMessage();
   }


if(isset($_SESSION['Id'])){
    echo("<form method='get' action='B.php'>");

	echo("<h1> PRENOTAZIONE  </h1>");
	echo ("<br/>");
	echo ("<br/>");

            echo ("<div> ID PRENOTAZIONE </div>");
            echo ("<input type='number' name='IdPre' required>");
            echo ("<br/>");
            echo ("<br/>");

            echo ("<div> DURATA </div>");
            echo ("<input type='number' name='durata' required>");
            echo ("<br/>");
            echo ("<br/>");

	        echo ("<div> DATA di prenotazione </div>");
			echo ("<input type='text' name='dataP' required>");
			echo ("<br/>");
			echo ("<br/>");

			echo ("<div> Persone </div>");
			echo ("<input type='number' name='persone' required>");
			echo ("<br/>");
			echo ("<br/>");


			

	try{

		//stringa di collegamento
	
	$col='mysql:host=localhost;dbname=operator';
	
	//connessionje al database tramite oggetto PDP
	
	$db=new PDO($col, 'root', '');


		
			$ciao=$db->prepare('SELECT IdApp FROM appartamento');
			$ciao->execute();
		 
		  
				 echo ("<div> Id Appartamento </div>");
		 
				 echo("<select name='IdApp'>");
		 
				 $i=0;
				 while ($row = $ciao->fetch(PDO::FETCH_ASSOC)) {
					 
		 
				 
		// 
		echo(" <option value=".$row['IdApp']."> ".$row['IdApp']." </option>");
		 
					 
					 }
					 
					 echo("</select>");
					 echo ("<br/>");
					 echo ("<br/>");
		}
	
	
	
	
	catch(PDOException $e) {
		// notifica in caso di errorre
		echo 'Attenzione: '.$e->getMessage();
	   }
	   




echo("<input type='submit' value='INVIA'/>");
echo("</form>");
    }

    else{
        echo "ACCESSO NEGATO";
    }
?>

</body>
</html>