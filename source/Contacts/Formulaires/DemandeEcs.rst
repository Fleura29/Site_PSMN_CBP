Demande d'expertise en Calcul Scientifique et HPC
=================================================

Dans le cadre des projets de recherche, le CBP peut fournir aux chercheurs de l'ENS de Lyon et plus généralement de l'Université de Lyon une expertise avancée en calcul scientifique et HPC incluant :

* le portage de codes sur différentes plateformes de calcul, leur profilage, déboggage, développement, analyse des performances, optimisation, valorisation, ...
* le choix et l'utilisation des bibliothèques de calcul
* le développement des méthodes numériques et leur implémentation

Cette expertise implique un travail collaboratif entre les chercheurs impliqués dans les projets et les ingénieurs du CBP.

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
            
            <div class="form-floating mt-2">
                <textarea class="form-control textarea" id="textAreaProjet" required></textarea>
                <label for="textAreaProjet">Projet de recherche :*</label>
            </div>
            <div class="form-floating mt-3"> 
                <textarea class="form-control textarea" id="textAreaDesc" required></textarea>     
                <label for="textAreaDesc">Description de l'expertise sollicitée :*</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="text-center">
                <button type="submit" class="btn mb-3" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        