Demande d'ouverture de compte sur les équipements du CBP
========================================================

Le Centre Blaise Pascal dispose de plusieurs équipements en libre-service, leur accès nécessite d'être connu du système d'information de l'école donc d'être rattaché à un laboratoire de l'établissement ou le CBP lui même.

Ensuite, il est nécessaire de remplir la demande d'ouverture de compte suivante : votre identifiant et votre mot de passe ENS vous permettront de vous connecter sans soucis à ces ressources. 

.. container:: pt-2 border border-secondary-subtle 

    .. raw:: html

        <form class="ms-2 me-2">
            <div class="row ">
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
                        <label for="inputEtablissement">Établissement*</label>
                        <input type="text" class="form-control form-style" id="inputEtablissement" aria-describedby="emailHelp">
                    </div>
                    
                </div>
                <div class="col col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire ou Département*</label>
                        <input type="text" class="form-control form-style" id="inputLabo">
                    </div>
                    <div class="mb-2">
                        <label for="inputEmailAutre">Courriel de la personne marraine *</label>
                        <input type="text" class="form-control form-style" id="inputEmailAutre">
                    </div>
                    <div class="mb-2">
                        <label for="inputDateDeb">Date de début*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;" id="inputDateDeb" name="datedeb"  value="" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputDateFin">Date de Fin*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;" id="inputDateFin" name="datefin"  value="" required>
                    </div>
                </div>
            </div>
            
            <div class="form-floating mt-2">
                <textarea class="form-control" id="floatingTextarea1" style="height: 100px; border-color: #E69645;"></textarea>
                <label for="floatingTextarea1">Descriptif du domaine</label>
            </div>
            <div class="form-floating mt-3"> 
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; border-color: #E69645;"></textarea>     
                <label for="floatingTextarea2">Logiciels ou bibliothèques utilisés</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="text-center">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        