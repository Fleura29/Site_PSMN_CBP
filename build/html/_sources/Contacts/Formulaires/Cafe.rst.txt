.. _cafe:

Suggérer une question ou un thème pour le café du Jeudi
=======================================================

Nous vous attendons dans les bureaux du PSMN (M7 1H02 et/ou 1H03), préférentiellement le Jeudi. 

.. container:: pt-2 border border-secondary-subtle 

    .. raw:: html

        <form class="ms-2 me-2">
            <div class="row ">
                <div class="col ">
                    <div class="mb-2">
                        <label for="inputSurname" >Nom*</label>
                        <input type="text" class="form-control form-style" id="inputSurname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="inputName">Prénom*</label>
                        <input type="text" class="form-control form-style" id="inputName" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail">Email*</label>
                        <input type="email" class="form-control form-style" id="inputEmail">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire*</label>
                        <select class="form-select form-style" id="inputLabo" style="padding: 0 0 0 10px;">
                            <option selected>Choisir un laboratoire </option>
                        </select>
                    </div>
                    <div class="mb-2" >
                        <label for="inputStartDate">Autre</label>
                        <input type="text" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputStartDate" value="">
                    </div>
                </div>
            </div>
            
            <div class="form-floating mt-2">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea1" style="height: 100px; border-color: #E69645;"></textarea>
                <label for="floatingTextarea1">Question ou thème : *</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="text-center">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        