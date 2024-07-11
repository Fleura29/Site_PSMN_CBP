Demande d'ouverture de compte sur les équipements du CBP
========================================================

Le Centre Blaise Pascal dispose de plusieurs équipements en libre-service, leur accès nécessite d'être connu du système d'information de l'école donc d'être rattaché à un laboratoire de l'établissement ou le CBP lui même.

Ensuite, il est nécessaire de remplir la demande d'ouverture de compte suivante : votre identifiant et votre mot de passe ENS vous permettront de vous connecter sans soucis à ces ressources. 

.. container:: border-form

    .. raw:: html

        <form id="userForm" method="post" class="mx-2" data-nom="doce">
            <div class="row ">
                <div class="col-12 col-sm-6">
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
                        <label for="inputCourriel">Courriel de la personne marraine*</label>
                        <input type="email" class="form-control form-style" id="inputCourriel" name="courriel" required>
                    </div>
                    
                    
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputEtablissement">Établissement*</label>
                        <input type="text" class="form-control form-style" id="inputEtablissement" name="etablissement" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire ou Département*</label>
                        <input type="text" class="form-control form-style" id="inputLabo" name="labo" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputDateDeb">Date de début*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;" id="inputDateDeb" name="datedeb"  value="" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputDateFin">Date de fin*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;" id="inputDateFin" name="datefin"  value="" required>
                    </div>
                </div>
            </div>
            
            <div class="form-floating mt-2">
                <textarea class="form-control textArea" id="textAreaDescr" name="descriptif"></textarea>
                <label for="textAreaDescr">Descriptif du domaine</label>
            </div>
            <div class="form-floating mt-3"> 
                <textarea class="form-control textArea" id="textAreaLogiciels" name="logiciels"></textarea>     
                <label for="textAreaLogiciels">Logiciels ou bibliothèques utilisés</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="d-flex justify-content-center">
                <label class="me-2" for="human" id="human-question"></label>
                <input id="human-answer" type="text"/> 
            </div>

            <div id="bloc" class="text-center"></div>
            <script src="../../_static/Formulaires/Formulaires.js"></script>

            <div class="text-center mt-2">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        