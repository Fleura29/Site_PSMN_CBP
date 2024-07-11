.. _demande-eis:

Demande d'expertise en informatique scientifique
================================================

.. container:: text-center
    
    .. container:: bg-warning-subtle pt-2 pb-1 mb-3 rounded fs-13

        Toutes les personnes non permanentes (étudiantes, stagiaires, doctorantes, …) doivent IMPERATIVEMENT être parrainées par une personne permanente de l'établissement, soit dans votre laboratoire de recherche, soit dans votre département d'enseignement. 

.. container:: border-form

    .. raw:: html

        <form id="userForm" method="post" class="mx-2" data-nom="eis">
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
                        <label for="inputCourriel">Courriel de la personne marraine *</label>
                        <input type="email" class="form-control form-style" id="inputCourriel" name="courriel" required>
                    </div>
                    
                </div>
                <div class="col-12 col-sm-6">
                    <div class="mb-2">
                        <label for="inputDemande">Demande*</label>
                        <select class="form-select form-style" id="inputDemande" style="padding: 0 0 0 10px;" name="demande" required>
                            <option selected>Séléctionner une demande </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="inputPlateau">Plateau technique*</label>
                        <select class="form-select form-style" id="inputPlateau" style="padding: 0 0 0 10px;" name="plateau" required>
                            <option selected>Choisir un plateau technique  </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="inputEntite">Entite*</label>
                        <select class="form-select form-style" id="inputEntite" style="padding: 0 0 0 10px;" name="entite" required>
                            <option selected>Choisir une entite </option>
                        </select>
                    </div>
                    <div class="mb-2" >
                        <label for="inputAutre">Autre (si entité non ENS)</label>
                        <input type="text" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputAutre" name="autre">
                    </div>             
                </div>
            </div>
            
            <div class="form-floating mt-2">
                <textarea class="form-control textarea" id="textAreaProjet" name="projet" required></textarea>
                <label for="textAreaProjet">Projet de recherche :*</label>
            </div>
            <div class="form-floating mt-3"> 
                <textarea class="form-control textarea" id="textAreaDescription" name="description" required></textarea>     
                <label for="textAreaDescription">Description de l'expertise sollicitée :*</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="d-flex justify-content-center">
                <label class="me-2" for="human" id="human-question"></label>
                <input id="human-answer" type="text"/> 
            </div>

            <div id="bloc" class="text-center"></div>
            <script src="../../_static/Formulaires/Formulaires.js"></script>

            <div class="text-center mt-2">
                <button type="submit" class="btn mb-3" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        