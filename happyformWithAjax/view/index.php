
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="./css/clientsList.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Gestion des clients</title>
</head>
<body>

<main>
    <section class="form-container">
            <form action="../data/register.php" method="POST">

                <label for="first_name">Prénom <span>*</span> :</label>
                <input type="text" name="first_name" id="first_name" aria-required="true" required>

                <label for="last_name">Nom <span>*</span> :</label>
                <input type="text" name="last_name" id="last_name" aria-required="true" required>
                
                <label for="address">Adresse <span>*</span> :</label>
                <textarea name="address" id="address" cols="30" rows="4" placeholder="Indiquez ici: n° de rue, rue, ville, code-postal" onfocus="this.onfocus=null;" aria-required="true" required></textarea>

                <label for="tel">Tél <span>*</span> :</label>
                <input type="text" name="tel" id="tel" required>

                <label for="date">Date de rendez-vous <span>*</span> :</label>
                <input type="text" name="meeting" id="date" min="2022-06-01" max="2025-06-30" required>
            
                <input type="hidden" name="client-id" id="client-id">

                <div id="btn-container">

                    <input type="submit" value="Enregistrer" name="register" id="register-client"> 
                    <input type="button" value="Supprimer" id="open-confirm-panel">
                    <input type="button" value="Annuler" id="cancel-button"> 

                    <div id="confirm-container">
                        <div id="confirm-container-content">
                        <span class="close">&times;</span>
                        <h2>Confirmez-vous la suppression totale de ce client de la base de données ?</h2>
                            <div class="modal-btn-container">
                            <input type="button" value="Confirmer" name="delete" id="delete-btn">
                            <div>
                        </div>
                    </div> 

                </div>       
            </form>
        
     </section>
  
<section class="table-container">

    <div id="table">

        <div id="table-header">
            <div id="header-datas">
                <div class="header-cell">Identifiant</div>
                <div class="header-cell">Nom</div>
                <div class="header-cell">Prénom</div>
                <div class="header-cell">Adresse</div>
                <div class="header-cell">Téléphone</div>
                <div class="header-cell">Rendez-vous le:</div>
                <div class="header-cell">Compte Créé le:</div>
            </div>
        </div>

        <div id="clients-list">
      
        </div>
    </div>

    <div id="open-form-container">
      <h1 id="no-client"></h1>
      <button type="button">Créer un client</button>
    </div>
</section>

    </main>
</body>
<script src="scripts/fetchData.js?<?php echo time(); ?>"></script>
<script src="scripts/script.js?<?php echo time(); ?>"></script>
</html>