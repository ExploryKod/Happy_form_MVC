

<main>
<section class="table-container">

<div class="table">
    <div class="table-row" id="table-header">
        <div>Identifiant</div>
        <div>Nom</div>
        <div>Prénom</div>
        <div class="address-cell">Adresse</div>
        <div>Téléphone</div>
        <div>Rendez-vous le:</div>
        <div>Compte Créé le:</div>
    </div>
  <?php foreach($clients as $client): ?>
    <a class="body-row" href="formulaire&id=<?= $client["id"]?>">
        <div><?= $client["id"] ?></div>
        <div><?= $client["first_name"] ?></div>
        <div><?= $client["last_name"] ?></div>
        <div class="address-cell"><?= $client["address"] ?></div>
        <div><?= $client["telephone"] ?></div>
        <div><?= $client["meeting"] ?></div>
        <div><?= $client["createdDate"] ?></div>
    </a>
    <?php endforeach; ?>
</div>

</section>

<section id="btn-section">
    <h1 id="no-client"></h1>
    <a id="btn-create-client" href="formulaire">Créer un client</a>
</section>
   
</main>

