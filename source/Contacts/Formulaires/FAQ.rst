Suggérer une entrée de F.A.Q.
=============================

.. container:: border-form

    .. raw:: html

        <form id="userForm" method="post" class="mx-2" data-nom="faq">
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
                    <div class="mb-2" >
                        <label for="inputAutre">Autre</label>
                        <input type="text" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputAutre" name="autre">
                    </div>
                </div>
            </div>

            <div class="border-top border-secondary-subtle mt-1 pt-1">
                <u>Problème :</u>
                <div class="row mt-1">
                    <div class="col-12 col-sm-6">
                        <div class="mb-2">
                            <label for="inputCategorie">Catégorie*</label>
                            <input type="text" class="form-control form-style" id="inputCategorie" name="categorie" required>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-2" >
                            <label for="inputProbleme">Problème*</label>
                            <input type="text" class="form-control form-style"  id="inputProbleme" name="probleme" required>
                        </div>
                    </div>
                </div>

                <div class="form-floating mt-2">
                    <textarea class="form-control textarea" id="textAreaResol" name="resolution" required></textarea>
                    <label for="textAreaResol">Résolution proposée :*</label>
                </div>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="d-flex justify-content-center">
                <label class="me-2" for="human" id="human-question"></label>
                <input class="captcha fs-13" id="human-answer" type="text"/> 
            </div>

            <div id="bloc" class="text-center"></div>
            <script src="../../_static/Formulaires/Formulaires.js"></script>

            <div class="text-center mt-2">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   
