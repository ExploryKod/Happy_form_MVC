<main>
    <form action="login" method="POST">
        <label for="username">Pseudo: <span>*</span> :</label>
        <input class="input"  id="username" type="text" name="username" maxlength="250" required >

        <label for="password">Mot de passe: <span>*</span> :</label>
        <input class="input" id="password" type="text" name="password" maxlength="250" required >

        <div id="btn-container">
            <input type="submit" value="S'inscrire" name="account_register">
            <input type="button" value="Se connecter" name="account_login">
        </div>
    </form>
</main>