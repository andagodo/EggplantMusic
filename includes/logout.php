<?php

////////////////////////////// ARREGLAR SECCIÓN DE TIMEOUT ///////////////////////////////
	// Almacena la última actividad del usuario
/*
if (isset($_SESSION['LAST_ACTIVITY'])) {

  if (time() - $_SESSION['LAST_ACTIVITY'] > 5) {

     // session timed out
     session_unset();     // unset $_SESSION variable for the run-time 
     session_destroy();   // destroy session data in storage
  }elseif (time() - $_SESSION['LAST_ACTIVITY'] > 1) {
	  
	$_SESSION['LAST_ACTIVITY'] = time();
    // session ok

 }
}
*/

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

//////////////////////////////////////////////////////////////////////////////////////////