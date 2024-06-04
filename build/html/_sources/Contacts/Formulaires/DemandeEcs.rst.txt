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
                <div class="col ">
                    <div class="mb-2">
                        <label for="inputSurname" >Nom*</label>
                        <input type="text" class="form-control form-style" id="inputSurname" >
                    </div>
                    <div class="mb-2">
                        <label for="inputName">Prénom(s)*</label>
                        <input type="text" class="form-control form-style" id="inputName">
                    </div>
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire*</label>
                        <select class="form-select form-style" id="inputLabo" style="padding: 0 0 0 10px;">
                            <option selected>Choisir un laboratoire </option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="inputOther">Autre</label>
                        <input type="text" class="form-control form-style" id="inputOther">
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail">Email*</label>
                        <input type="email" class="form-control form-style" id="inputEmail">
                    </div>
                    
                </div>
            </div>
            
            <div class="form-floating mt-2">
                <textarea class="form-control textarea" placeholder="Leave a comment here" id="floatingTextarea1" required></textarea>
                <label for="floatingTextarea1">Projet de recherche :*</label>
            </div>
            <div class="form-floating mt-3"> 
                <textarea class="form-control textarea" placeholder="Leave a comment here" id="floatingTextarea2" required></textarea>     
                <label for="floatingTextarea2">Description de l'expertise sollicitée :*</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="text-center">
                <button type="submit" class="btn mb-3" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        