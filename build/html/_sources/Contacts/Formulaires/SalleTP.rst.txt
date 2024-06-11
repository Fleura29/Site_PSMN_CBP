.. _salle-tp:

Réservation de la salle de TP numériques du CBP
===============================================

`Calendrier de disponibilité de la salle de TP numériques du CBP <calendrier>`_ 

.. container:: text-center

    .. container:: d-inline-block bg-body-secondary pt-3 mb-3 rounded fs-13

        N'oubliez pas de consulter le :ref:`calendrier de disponibilité de la salle <calendrier>` avant de réserver

.. container:: pt-2 border border-secondary-subtle 
    
    .. raw:: html

        <form id="userForm" method="post" class="ms-2 me-2" data-nom="salleTP">
            <div class="row">
                <div class="col col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputNom" >Nom*</label>
                        <input type="text" class="form-control form-style" id="inputNom" name="nom" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputPrenom">Prénom*</label>
                        <input type="text" class="form-control form-style" id="inputPrenom" name="prenom" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputMail">Email*</label>
                        <input type="email" class="form-control form-style" id="inputMail" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire*</label>
                        <input type="text" class="form-control form-style" id="inputLabo" name="labo" required>
                    </div>  
                    <div class="mb-2">
                        <label for="inputEvenement">Titre de l'évènement*</label>
                        <input type="text" class="form-control form-style" id="inputEvenement" name="evenement" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputSalle">Salle*</label>
                        <select class="form-select form-style" id="inputSalle" style="padding: 0 0 0 10px;" name="salle" value="" required> 
                            <option selected>Choisir une salle </option>
                            <option value="Salle de formation 25 places M7-1H04">Salle de formation 25 places M7-1H04</option>
                            <option value="Salle de formation 12 places M7-1H19">Salle de formation 12 places M7-1H19</option>
                        </select>
                    </div>
                </div>
                <div class="col col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputDateDeb">Date de début*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;" id="inputDateDeb" name="datedeb"  value="" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputHoraireDeb">Horaire de début*</label>
                        <select class="form-select form-style" style="padding: 0 0 0 10px;" id="inputHoraireDeb" name="horairedeb" required>
                            <option selected>Choisir un horaire </option>
                        </select>
                    </div>
                    <div class="mb-2" >
                        <label for="inputDateFin">Date de fin*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputDateFin" name="datefin"  value="" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputHoraireFin">Horaire de fin*</label>
                        <select class="form-select form-style"  style="padding: 0 0 0 10px;" id="inputHoraireFin" name="horairefin" required>
                            <option selected>Choisir un horaire </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="inputNbParticipants">Nombre estimatif de participants</label>
                        <input type="number" class="form-control form-style" id="inputNbParticipants" name="nbparticipants" >
                    </div>
                </div>
            </div>
            
            <p class="fs-12"> Toutes nos salles sont désormais équipées de vidéo-projecteurs fixes.</p>
            
            <div class="form-floating">
                <textarea class="form-control" id="TextAreaAutre" style="height: 100px; border-color: #E69645;"></textarea>
                <label for="TextAreaAutre">Autres renseignements</label>
            </div>
            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>
            <div class="container text-center">
                <p class=" bg-warning-subtle pt-3 pb-3 rounded fs-13">
                    Toute réservation dans la salle de formation suppose l'acceptation et le respect 
                    des <a href="../../Plateformes/Autres/Conditions.html">Conditions Générales d'Utilisation</a>.
                </p>
            </div>

            <div class="d-flex justify-content-center">
                <label class="me-1" for="human" id="human-question"></label>
                <input id="human-answer" type="text"/> 
            </div>
            <div id="bloc" class="text-center"></div>
            <script src="../../_static/Formulaires/Formulaires.js"></script>

            <div class="text-center mt-2">
                <button type="submit" value="submit" class="btn mb-3" style="border-color: #E69645;">Soumettre</button>
            </div>    
        </form>          

.. container:: mt-3 fs-13

    L'équipement de la salle M1H19 a été réalisé dans le cadre du programme COMESUP avec le concours financier de la `Région Auvergne-Rhône-Alpes <https://www.auvergnerhonealpes.fr/>`_ .  
