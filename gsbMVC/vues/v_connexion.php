<div class="row">
	<form class="col s12" method="POST" action="index.php?uc=connexion&action=valideConnexion">
		<h3><center>Authentification utilisateur</center></h3>
		<div class="row">
			<div class="input-field col s6 offset-s3">
				<input id="login" type="text" name="login" class="validate">
				<label for="first_name">Login</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6 offset-s3">
				<input id="mdp" type="password" name="mdp" class="validate">
				<label for="password">Password</label>
			</div>
		</div>

		<button class="btn waves-effect waves-light col s6 offset-s3" type="submit" name="valider">S'authentifier
			<i class="material-icons right">send</i>
		</button>
	</form>
</div>
