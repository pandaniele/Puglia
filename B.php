

<body>
<?php
session_start();

try{

    //stringa di collegamento

$col='mysql:host=localhost;dbname=operator';

//connessionje al database tramite oggetto PDP

$db=new PDO($col, 'root', '');




    $varUno=$_GET["IdPre"];
    $varDue=$_GET["durata"];
    $varTre=$_GET["dataP"];//
    $varQuattro=$_GET["persone"];
    $varSei=$_GET["IdApp"];



    $r1 = "INSERT INTO prenotazione (IdPre, durata, dataP, persone, Id,
    IdApp)
    VALUES (:IdPre, :durata, :dataP, :persone, :Id, :IdApp)";
                                                //
    
   
    $ciao=$db->prepare($r1);
    $ciao->bindParam(':IdPre', $varUno,PDO::PARAM_INT );
    $ciao->bindParam(':durata', $varDue,PDO::PARAM_INT );
    $ciao->bindParam(':dataP', $varTre );
    $ciao->bindParam(':persone', $varQuattro, PDO::PARAM_INT );
    $ciao->bindParam(':Id', $_SESSION['Id'],PDO::PARAM_INT );
    $ciao->bindParam(':IdApp', $varSei,PDO::PARAM_INT );
  
    $ciao->execute();

    echo "New Record Prenotazione created successfully";
    echo("<br>");
    
    

}


catch(PDOException $e) {
    // notifica in caso di errorre
    echo 'Attenzione: '.$e->getMessage();
   }
   


?>
</body>