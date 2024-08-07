<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="stylesheet" href="./view/css/clientsList.css">
    <link rel="stylesheet" href="./view/css/form.style.css">

    <title>Gestion des clients</title>
</head>

<body>
    <main>
           
        <section class="form-container">
            <form action="" method="post">

                <div id="tel-validation"></div>

                <label for="first_name">Prénom <span>*</span> :</label>
                <input class="input" type="text" name="first_name" id="first_name" aria-required="true"  maxlength="250" required>

                <label for="last_name">Nom <span>*</span> :</label>
                <input class="input" type="text" name="last_name" id="last_name" aria-required="true"  maxlength="250" required>

                <label for="address">Adresse <span>*</span> :</label>
                <textarea class="input" name="address" id="address" cols="30" rows="4"  maxlength="950" placeholder="Indiquez ici: n° de rue, rue, ville, code-postal" onfocus="this.onfocus=null;" aria-required="true" required></textarea>

                <label for="tel">Tél (format français: xx xx xx xx xx) <span>*</span> :</label>
                <input class="input" type="tel" name="tel" id="tel" aria-required="true" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" required>

                <label for="date">Date de rendez-vous <span>*</span> :</label>
                <input class="input" type="date" name="meeting" id="date" aria-describedby="date-format" aria-required="true" min="2022-06-01" max="2025-06-30" required>

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

<script type="module" src="./view/javaScript/general.js?<?php echo time(); ?>"></script>
<script type="module" src="./view/javaScript/ManageClientsTable.js?<?php echo time(); ?>"></script>
<script type="module" src="./view/javaScript/getData.js?<?php echo time(); ?>"></script>
<script type="module" src="./view/javaScript/postData.js?<?php echo time(); ?>"></script>
<script type="module" src="./view/javaScript/InputsValidation.js?<?php echo time(); ?>"></script>
<script type="module" src="./view/javaScript/openCloseForm.js?<?php echo time(); ?>"></script>

</html>