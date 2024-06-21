.. _liste-diff:

Liste de diffusion
==================

Si vous souhaitez vous **inscrire** à la liste de diffusion du Centre Blaise Pascal, il vous suffit de remplir le formulaire suivant : 

.. container:: border-form mb-2
    
    Demande d'inscription à la liste de diffusion CBP

    .. raw:: html

        <form id="userForm" method="post" class="ms-2 me-2" data-nom="liste">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputNom" >Nom*</label>
                        <input type="text" class="form-control form-style" id="inputNom" name="nom" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputPrenom">Prénom*</label>
                        <input type="text" class="form-control form-style" id="inputPrenom" name="prenom" required>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputMail">Email*</label>
                        <input type="email" class="form-control form-style" id="inputMail" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire*</label>
                        <input type="text" class="form-control form-style" id="inputLabo" name="labo" required>
                    </div>
                </div>
            </div>
            <p class="mt-2 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="d-flex justify-content-center">
                <label class="me-1" for="human" id="human-question"></label>
                <input id="human-answer" type="text"/> 
            </div>

            <div id="bloc" class="text-center"></div>
            <script src="../../_static/Formulaires/Formulaires.js"></script>
            
            <div class="text-center">
                <button type="submit" class="btn mb-3 mt-2" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>     

Si vous souhaitez vous **désinscrire**, merci de valider le formulaire suivant : 

.. container:: border-form 
    
    Désinscription de la liste de diffusion CBP

    .. raw:: html

        <form class="ms-2 me-2">
            <div class="mb-2">
                <label for="inputEmail">Email*</label>
                <input type="text" class="form-control form-style" id="inputEmail" name="mailDesinscription" required>
            </div>
            <p class="mt-2 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="d-flex justify-content-center">
                <label class="me-1" for="human" id="human-question"></label>
                <input id="human-answer" type="text"/> 
            </div>

            <div id="bloc" class="text-center"></div>
            <script src="../../_static/Formulaires/Formulaires.js"></script>

            <div class="text-center mt-2">
                <button type="submit" class="btn mb-3 mt-2" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form> 
