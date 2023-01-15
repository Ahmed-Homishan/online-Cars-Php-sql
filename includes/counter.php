<?php
session_start();
error_reporting(0);
function HitCounter()
{
	
$TextFile = fopen("includes/counter.txt", "r");
	
	$HitValue = (int) fread ($TextFile,20) ;
	
	fclose ($TextFile) ;
	if(!isset($_SESSION['vistors'])){   
	    $HitValue++ ;
		unset($_SESSION['vistors']);
    }
	
$TextFile =  fopen("includes/counter.txt", "w" ) ;

fwrite($TextFile,$HitValue) ;

fclose ($TextFile) ;

}

function display(){
$TextFile = fopen("../includes/counter.txt", "r");

    $HitValue = (int) fread ($TextFile,20) ;
	
	fclose ($TextFile) ;

	
	return $HitValue ;	
}

?>