

<div id="error-container">
    <div id="error-container-content">
        <h1> Erreur </h1>
        <?php if(isset($messageError)): ?>
        <h2><?= $messageError ?></h2>
        <?php endif ?>
        <a class="btn-go-home" href="account">Retour</a>
        </div>
</div> 