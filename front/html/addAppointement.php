<!DOCTYPE html>
<html>
	<head>
		<?php $title = "Créer un rendez-vous";include '../../fragments/header.php';?>
		<title>Créer un rendez-vous</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../materialize/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/google.css">
	</head>
	<body>
		<input id="pac-input" class="controls" type="text"placeholder="Saisissez un endroit où manger">
		<div id="type-selector" class="controls">
			<input type="radio" name="mode" id="changetype-all" value="DRIVING" checked="checked">
			<label for="changetype-all" style="color:white;">Voiture</label>
			<input type="radio" name="mode" id="changetype-establishment" value="WALKING">
			<label for="changetype-establishment" style="color:white;">Marche</label>
			<input type="radio" name="mode" id="changetype-address" value="BICYCLING">
			<label for="changetype-address" style="color:white;">Vélo</label>
			<input type="radio" name="mode" id="changetype-geocode" value="TRANSIT">
			<label for="changetype-geocode" style="color:white;">Transport en commun</label>
		</div>
		<div id="right-panel"></div>
		<div id="map"></div>
		<div class="row">
			<div class="card">
				<div class="card-image col s12 m3">
					<img src="" id="photoMagasin" width="100" height="200"/>
					<span class="card-title" id="nomMagasin"></span>
				</div>
				<div class="card-content col s12 m3">
					<div>
						<p>
							ADRESSE : 
							<span id="adresseMagasin"></span>
						</p>
					</div>
					<div>
						<p>
							TELEPHONE : 
							<span id="telephoneMagasin"></span>
						</p>
					</div>
					<div>
						<p>
							SITE WEB : 
							<a href="" id="siteWebMagasin"></a>
						</p>
					</div>
					<div id="statut">
						<p>
							STATUT : 
							<span id="estOuvert" style="font-weight: bold;"></span>
						</p>
					</div>
					<div>
						<p>
							NOTE : 
							<span id="noteMagasin"></span>
						</p>
					</div>
					<button class="btn waves-effect waves-light blue" id="createRdv" type="button" name="goto">J'y fonce !<i class="material-icons right">send</i></button>
				</div>
			</div>
		</div>
		<?php include '../../fragments/footer.php';?>
		<div id="modalConnexion" class="modal">
			<div class="row">
				<div class="modal-content">
					<h4>Création d'un rendez-vous</h4>
					<hr>
					<div class="row">
						<div class="input-field col s10">
							<i class="material-icons prefix">perm_contact_calendar</i>
							<input id="datepicker_register" type="date" class="datepicker">
							<label for="icon_prefix">Date</label>
							<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
						</div>
						<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../../materialize/js/materialize.js" ></script>
<script type="text/javascript" src="../../materialize/js/init.js" ></script>
<script type="text/javascript" src="../js/main.js" ></script>
<script type="text/javascript" src="../../materialize/js/script.js"></script>
						<div class="input-field col s10">
							<div id="dateRDV" class="input-field col s12">
								<select>
									<option id="dateRDV" value="" disabled selected>Horaire souhaité</option>
									<option id="dateRDV" value="11h30">11h30</option>
									<option id="dateRDV" value="11h45">11h45</option>
									<option id="dateRDV" value="12h00">12h00</option>
									<option id="dateRDV" value="12h15">12h15</option>
									<option id="dateRDV" value="12h30">12h30</option>
									<option id="dateRDV" value="12h45">12h45</option>
									<option id="dateRDV" value="13h00">13h00</option>
									<option id="dateRDV" value="13h15">13h15</option>
									<option id="dateRDV" value="13h30">13h30</option>
									<option id="dateRDV" value="13h45">13h45</option>
									<option id="dateRDV" value="14h00">14h00</option>
								</select>
								<label>Horaire</label>
							</div>
						</div>
						<div class="input-field col s10">
							<i class="material-icons prefix">accessibility</i>
							<input id="nbPlaces" type="text" class="validate">
							<label for="icon_prefix">Nombre de places</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a class="modal-action modal-close waves-effect waves-green btn-flat" id="creationRDV" >Création</a>
					<a class="modal-action modal-close waves-effect waves-green btn-flat closeModal">Annuler</a>
				</div>
			</div>
			</div>
		</body>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgaxtdS0y_Mwk-ennUmyB9mHlpQbBGHLg&libraries=places&callback=initMap" async defer></script>
		<script src="../js/google.js" />
			  <script>  $('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control monthselectYears: 15 // Creates a dropdown of 15 years to control year 
			});
		</script>
		<script>
			  $('select').material_select();
			initMap();
			$('#mode').material_select();
		</script>
	</html>
