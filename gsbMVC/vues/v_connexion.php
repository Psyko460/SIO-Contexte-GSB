<div class="z-depth-4 card-panel">
  <form class="col s12" method="POST" action="index.php?uc=connexion&action=valideConnexion">
    <div class="row">
      <div class="input-field col s12 center">
        <h4>Authentification utilisateur</h4>
        <p class="center">Laboratoire Galaxy Swiss Bourdin</p>
      </div>
    </div>
    <div class="row margin">
      <div class="input-field col s12">
      <input id="login" type="text" name="login" class="center-align">
    <label for="first_name" class="center-align">Login</label>
      </div>
    </div>
    <div class="row margin">
    <div class="input-field col s12">
      <input id="mdp" type="password" name="mdp" class="center-align">
      <label for="password" class="center-align">Password</label>
      </div>
    </div>
    <div class="row">
    <button class="btn waves-effect waves-light col s6 offset-s3" type="submit" name="valider">S'authentifier
    <i class="material-icons right">send</i>
  </button>
      <div class="input-field col s12">
        <p class="margin center medium-small sign-up">Mot de passe oublié ? <a href="#">Reset son mot de passe</a></p>
      </div>
    </div>
  </form>
</div>
