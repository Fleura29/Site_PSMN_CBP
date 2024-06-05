.. _demande-eis:

Demande d'expertise en informatique scientifique
================================================

.. container:: text-center w-75 
    
    .. container:: d-inline-block bg-warning-subtle pt-3 mb-3 rounded fs-13

        Toutes les personnes non permanentes (étudiantes, stagiaires, doctorantes, …) doivent IMPERATIVEMENT être parrainées par une personne permanente de l'établissement, soit dans votre laboratoire de recherche, soit dans votre département d'enseignement. 

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
                        <label for="inputPrenom">Prénom(s)*</label>
                        <input type="text" class="form-control form-style" id="inputPrenom">
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail">Email*</label>
                        <input type="email" class="form-control form-style" id="inputEmail">
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail">Courriel de la personne marraine *</label>
                        <input type="email" class="form-control form-style" id="inputEmail">
                    </div>
                    
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="inputDem">Demande*</label>
                        <select class="form-select form-style" id="inputDem" style="padding: 0 0 0 10px;">
                            <option selected>Séléctionner une demande </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="inputPlat">Plateau technique *</label>
                        <select class="form-select form-style" id="inputPlat" style="padding: 0 0 0 10px;">
                            <option selected>Choisir un plateau technique  </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="inputEntity">Entite*</label>
                        <select class="form-select form-style" id="inputEntity" style="padding: 0 0 0 10px;">
                            <option selected>Choisir une entite </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="inputOther">Autre (si entité non ENS)</label>
                        <input type="text" class="form-control form-style" id="inputOther">
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

        