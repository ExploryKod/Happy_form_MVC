<main>

    <pre>
        <div style="text-align: center; border: 2px solid green; background: yellow;">
        SESSION: <?php echo $_SESSION['user'] ?><br>
            <p style="color:black;"><?php $message ?></p>
        <?php foreach($_POST as $post): ?>
            <ul>
                <li><?= $post ?></li>
            </ul>
        <?php endforeach ?>
        </div>
    </pre>
        <form action="login" method="POST">

        <label for="username">Pseudo: <span>*</span> :</label>
        <input class="input"  id="username" type="text" name="username" maxlength="250" required >

        <label for="password">Mot de passe: <span>*</span> :</label>
        <input class="input" id="password" type="text" name="password" maxlength="250" required >

        <div id="btn-container">
            <input type="submit" value="S'inscrire" name="account_register">
            <input type="submit" value="Se connecter" name="account_login">
        </div>
    </form>
</main>