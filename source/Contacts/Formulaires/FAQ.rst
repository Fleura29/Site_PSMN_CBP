Suggérer une entrée de F.A.Q.
=============================

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
                </div>
                <div class="col col-12 col-sm-6">
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
                    <div class="col col-12 col-sm-6">
                        <div class="mb-2">
                            <label for="inputEmail">Catégorie*</label>
                            <input type="text" class="form-control form-style" id="inputEmail" required>
                        </div>
                    </div>
                    <div class="col col-12 col-sm-6">
                        <div class="mb-2" >
                            <label for="inputTeam">Problème*</label>
                            <input type="text" class="form-control form-style"  id="inputTeam" required>
                        </div>
                    </div>
                </div>

                <div class="form-floating mt-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea1" style="height: 100px; border-color: #E69645;"></textarea>
                    <label for="floatingTextarea1">Résolution proposée :*</label>
                </div>
            </div>
            
            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="text-center">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        