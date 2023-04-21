
<main>
        <?php if(isset($_GET["id"])):?>
        <div id="modify-message">
            <h1>Bienvenue dans le formulaire de modification </h1>
            <p> Ici vous pouvez modifier ou supprimer le client n°<?=$client[0]["id"] ?>: <span><?= $client[0]["first_name"]." ".$client[0]["last_name"] ?></span>.</p>
        </div>
        <?php endif; ?>

        <?php if(isset($_GET["id"]) && !empty($_GET["id"])):?>
        <form action="formulaire&id=<?=$_GET["id"]?>" method="POST">
        
        <?php else: ?>
        <form action="formulaire" method="POST">
        <?php endif; ?>
           
                <label for="first_name">Prénom <span>*</span> :</label>
                <input class="input"  id="first_name" type="text" name="first_name" maxlength="250"
                <?php if(isset($_GET["id"])): ?>value="<?= $client[0]["first_name"] ?>"<?php endif; ?> required >

                <label for="last_name">Nom <span>*</span> :</label>
                <input class="input" id="last_name" type="text" name="last_name" maxlength="250"
                <?php if(isset($_GET["id"])): ?>value="<?= $client[0]["last_name"] ?>"<?php endif; ?> required >
                
                <label for="address">Adresse <span>*</span> :</label>
                <textarea class="input" id="address" name="address"  cols="30" rows="4" placeholder="Indiquez ici: n° de rue, rue, ville, code-postal" onfocus="this.onfocus=null;" maxlength="950" required ><?php if(isset($_GET["id"])): ?><?= $client[0]["address"]?> <?php endif; ?></textarea>

                <label for="tel">Tél <span>*</span> :</label>
                <input class="input" id="tel" type="tel" name="tel" aria-required="true" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}"
                <?php if(isset($_GET["id"])): ?>value="<?= $client[0]["telephone"] ?>"<?php endif; ?> required >

                <label for="date">Date de rendez-vous <span>*</span> :</label>
                <input class="input" id="date" type="date" name="meeting"  min="2022-05-30" max="2032-05-30" aria-describedby="date-format"
                <?php if(isset($_GET["id"])): ?> value="<?= $client[0]["meeting"] ?>"<?php endif; ?> required >
                
                <input  id="client-id" type="hidden" name="id_client" <?php if(isset($_GET["id"])): ?>value="<?= $_GET["id"] ?>"<?php endif; ?> >

            <div id="btn-container">
        <?php 
        if(isset($_GET["id"])): ?>
            <input type="submit" value="Modifier" name="modify"> 
            <input type="button" value="Annuler" id="cancel-button">
            <input type="button" value="Supprimer" id="suppress">

            <div id="confirm-container">
                <div id="confirm-container-content">
                <span class="close">&times;</span>
                <h2>Confirmez-vous la suppression totale de ce client de la base de données ?</h2>
                    <div class="modal-btn-container">
                    <input type="submit" value="Confirmer" name="delete" id="confirm-suppress-btn">
                    <div>
                </div>
            </div> 
            
            <?php else: ?>
            <input type="submit" value="Enregistrer" name="register"> 
            <input type="button" value="Annuler" id="cancel-button">
            <?php endif; ?>
        </div>
        </form>
    </main>
