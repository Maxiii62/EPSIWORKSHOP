<?php

	/*session_start();

	include_once('helper.php');
	const PATH_WEBSERVICES = '../ws';

	// Retourne le nom du fichier PHP --> WS_GENRE par exemple
	$serviceName = 'WS_'.ucfirst(strtolower($_POST['ws']));
	// permet de gerer l'orthographe du fichier
	$servicePath = PATH_WEBSERVICES.'//'.$serviceName.'.php';

	//$servicePath = PATH_WEBSERVICES.'/'.$serviceName.'.php';
	// Test si le fichier existe
	if (!file_exists($servicePath))
		Helper::ThrowAccessDenied();
	$method = "do".ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
	// ajoute la référence du fichier
	require_once($servicePath);
	$service = new $serviceName(); // instanciation
	// execution de la méthode
	$result = $service->$method();
	// si il y a un résultat, on retourne se résultat

  // à voir si on fait la connexion
	if ($_POST['action'] == 'verifUser' && $_POST['ws'] == 'utilisateur'){
		//$_SESSION['monUserCo'] = $result;
		echo "ozguegk";
	}*/

	/*if ($result !== null)
		echo json_encode($result);*/

	session_start();
	include_once('helper.php');
	const PATH_WEBSERVICES = '../ws';
	if(!isset($_POST['ws']))
		Helper::ThrowAccessDenied();
	// Retourne le nom du fichier PHP --> WS_GENRE par exemple
	$serviceName = 'WS_'.ucfirst(strtolower($_POST['ws']));
	// permet de gerer l'orthographe du fichier
	$servicePath = PATH_WEBSERVICES.'//'.$serviceName.'.php';
	//$servicePath = PATH_WEBSERVICES.'/'.$serviceName.'.php';
	// Test si le fichier existe
	if (!file_exists($servicePath))
		Helper::ThrowAccessDenied();
	$method = "do".ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
	// ajoute la référence du fichier
	require_once($servicePath);
	$service = new $serviceName(); // instanciation
	// execution de la méthode
	$result = $service->$method();
	// si il y a un résultat, on retourne se résultat
	if ($_POST['action'] == 'verifUser' && $_POST['ws'] == 'utilisateur')
		$_SESSION['monUserCo'] = $result;
	if ($result !== null)
		echo json_encode($result);

?>