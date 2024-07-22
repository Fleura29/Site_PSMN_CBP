.. _liste-diff:

Liste de diffusion
==================

Si vous souhaitez vous **inscrire** à la liste de diffusion du Centre Blaise Pascal, il vous suffit de remplir le formulaire suivant : 

.. container:: border-form mb-2
    
    Demande d'inscription à la liste de diffusion CBP

    .. raw:: html
        
        <form id="userForm" method="post" class="mx-2" data-nom="liste_inscr">
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
                <label class="me-2" for="human" id="human-question"></label>
                <input class="captcha fs-13" id="human-answer" type="text"/> 
            </div>

            <div id="bloc" class="text-center"></div>
            
            
            <div class="text-center mt-3">
                <button class="btn btn-submit mb-3" type="submit" value="submit" >Soumettre</button>
            </div>
        </form>     

Si vous souhaitez vous **désinscrire**, merci de valider le formulaire suivant : 

.. container:: border-form 
    
    Désinscription de la liste de diffusion CBP

    .. raw:: html

        <form id="userForm2" method="post" class="mx-2" data-nom="liste_desinscr">
            <div class="mb-2">
                <label for="inputEmail2">Email*</label>
                <input type="text" class="form-control form-style" id="inputEmail2" name="emailDesinscription" required>
            </div>
            <p class="mt-2 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="d-flex justify-content-center">
                <label class="me-2" for="human" id="human-questio2"></label>
                <input class="captcha fs-13" id="human-answer2" type="text"/> 
            </div>

            <div id="bloc2" class="text-center"></div>

            <div class="text-center mt-3">
                <button class="btn btn-submit mb-3" type="submit" value="submit" >Soumettre</button>
            </div>
        </form> 
        <script src="../../_static/Formulaires/Formulaires.js"></script>
