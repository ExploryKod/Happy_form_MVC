<main>

        <div style="text-align: center; border: 2px solid green; margin: 5px; padding: 5px;">
            <div>
                <?php foreach($_SESSION as $session): ?>
                    <ul style="">
                        <li><?= $session ?></li>
                    </ul>
                <?php endforeach ?>
            </div>
          <div>
              <?php foreach($_POST as $post): ?>
                  <ul>
                      <li><?= $post ?></li>
                  </ul>
              <?php endforeach ?>
          </div>
        </div>

        <form action="login" method="POST">

        <div>
            <p><?= $message ?></p>
        </div>

        <label for="username">Pseudo: <span>*</span> :</label>
        <input class="input"  id="username" type="text" name="username" maxlength="250" required>

        <label for="password">Mot de passe: <span>*</span> :</label>
        <input class="input" id="password" type="text" name="password" maxlength="250" required>

        <div id="btn-container">
            <input type="submit" value="S'inscrire" name="account_register">
            <input type="submit" value="Se connecter" name="account_login">
        </div>
    </form>


    <?php if(isset($_SESSION['user'])): ?>
        <p>Vous êtes connecté en tant que <?= $_SESSION['user'] ?></p>
        <a href="out"> se déconnecter </a>
        <a href="accueil"> Accés au dashboard</a>
    <?php endif ?>
</main>