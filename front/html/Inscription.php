<?php $title = "Inscription";?>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../../materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Inscription</title>
	</head>
	<body>
		<div id="login-page" class="row">
			<div class="transparence">
				<div id="Register_Container" class="row card horizontal">
					<form class="col s12">
						<div class="row">
							<div class="input-field col s6">
								<input id="first_name" type="text" class="validate">
								<label for="first_name"><i class="tiny material-icons">mode_edit</i>Prénom</label>
							</div>
							<div class="input-field col s6">
								<input id="last_name" type="text" class="validate">
								<label for="last_name"><i class="tiny material-icons">mode_edit</i>Nom</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="password" type="password" class="validate">
								<label for="password"><i class="tiny material-icons">lock</i>Mot de passe</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="email" type="email" class="validate">
								<label for="email"><i class="tiny material-icons">email</i>Email</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="telephone" type="email" class="validate">
								<label for="telephone"><i class="tiny material-icons">phone</i>Telephone</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="datepicker_register" type="date" class="validate" placeholder="Date de naissance">
							</div>
						</div>
						<span><button class="btn waves-effect waves-light" type="button" id="valider" name="action">Valider</button></span>
						<button class="btn waves-effect waves-light" type="button reset" value="Reset!" id="reset" name="action">Effacer</button>
					</span>
					<a href="/epsiworkshop/front/html/Login.php"><button class="btn waves-effect waves-light" type="button" id="back" name="action">Retour</button></a>
					<br>
					<p></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php include '../../fragments/footer.php';?>
