.. _probleme:

Signaler un problème
====================

ou poser une question...

.. container:: note note-important

    Seuls les emails **professionnels**, en relation avec les laboratoires membres, sont acceptés (pas de gmail, hotmail, yahoo…). 

.. container:: note note-info
        
    **N'oubliez pas de préciser, quand vous les connaissez, le job_id, le nom de la machine, du cluster et tout ce qui est pertinent pour régler votre problème.**

.. container:: border-form

    .. raw:: html

        <form id="userForm" method="post" class="mx-2" data-nom="probleme">
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
                    
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire*</label>
                        <select class="form-select form-style" id="inputLabo" style="padding: 0 0 0 10px;" name="labo" value="" required>
                            <option selected>Choisir un laboratoire </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="inputSujet">Sujet*</label>
                        <input type="text" class="form-control form-style" id="inputSujet" name="sujet" required>
                    </div>
                    <div class="mb-2" >
                        <label for="inputAutre">Autre</label>
                        <input type="text" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputAutre" name="autre">
                    </div>
                </div>
            </div>
            
            <div class="form-floating mt-2">
                <textarea class="form-control textarea" id="textAreaCommentaire" name="commentaire"></textarea>
                <label for="textAreaCommentaire">Commentaire</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="d-flex justify-content-center">
                <label class="me-2" for="human" id="human-question"></label>
                <input id="human-answer" type="text"/> 
            </div>

            <div id="bloc" class="text-center"></div>
            <script src="../../_static/Formulaires/Formulaires.js"></script>

            <div class="text-center mt-2">
                <button class="btn btn-submit mb-3" type="submit" value="submit">Soumettre</button>
            </div>
        </form>   

        