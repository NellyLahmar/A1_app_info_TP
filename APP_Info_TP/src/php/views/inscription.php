<!-- Lahmar Nelly | Formulaires d'inscription et de connexion | CSS inexistant -->

<!-- Formulaires d'inscription / connexion  -->

<div id="Inscription">
	<h1>Inscription</h1>
	<form method="post" action="../controllers/utilisateur.php">
	
		<input type="hidden" name='form' value='inscription'>
			
		<p><label>Nom : <br>
	    <input type="text" name="nom" size="39" placeholder="Votre nom" required/></label></p>
		
		<p><label>Prénom : <br>
			<input type="text" name="prenom" size="39" placeholder="Votre prénom" required/></label></p>
					
		<p><label>Login : <br>
			<input type="text" name="login" size="39" placeholder="Votre login" required/></label></p>
					
		<p><label>Password : <br>
			<input type="password" name="password" size="39" required/></label></p>
					
		<p><label>Password confirmation : <br>
			<input type="password" name="password_confirmation" size="39" required/></label></p>
					
		<button type = "submit"> Envoyer </button>
					
	</form>
</div>

<div id="Connexion">
	<h1>Déjà inscrit ?</h1>

    <form method="POST" action="../controllers/utilisateur.php">
    
    <input type="hidden" name='form' value='connexion'>
    
            <p><label>Login<br>
                    <input type="text" name="login" size="39" required/></label></p>

            <p><label>Password<br>
                    <input type="password" name="password" size="39" required/></label></p>

            <p class="connexion_button">
                <button type="submit" name="connexion_submit" class="submit_button">Connexion</button>
            </p>
            
	</form>
</div>