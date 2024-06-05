Demande d'accès aux ressources du PSMN
======================================

.. container:: text-center w-75

    .. container:: bg-danger-subtle pt-2 pb-1 mb-3 rounded fs-13

        Les ressources du PSMN ne sont pas ouvertes au grand public. Vous devez justifier d'une 
        appartenance, ou collaboration, à un laboratoire membre ou partenaire du PSMN.
        Seuls les emails **professionnels**, en relation avec les laboratoires membres, sont acceptés 
        (les adresses en gmail, hotmail, yahoo… **SERONT REFUSÉES !!**).

    .. container:: bg-warning-subtle pt-2 pb-1 mb-3 rounded fs-13

        Les comptes sont effacés régulièrement, **sans avertissements**, lorsque nous n'avons plus de moyens 
        de contacts avec l'utilisateur (email, collaboration).

    .. container:: bg-success-subtle pt-2 pb-1 mb-3 rounded fs-13

        Fermeture pour raison de sécurité : Un compte peut être bloqué, fermé ou banni, à tout moment et 
        sans préavis sur décision de la Direction du PSMN et/ou du RSSI de l'ENS de Lyon. 

.. container:: pt-2 border border-secondary-subtle 

    .. raw:: html

        <form class="ms-2 me-2">
            <div class="row ">
                <div class="col ">
                    <div class="mb-2">
                        <label for="inputSurname" >Nom*</label>
                        <input type="text" class="form-control form-style" id="inputSurname" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputPrenom">Prénom*</label>
                        <input type="text" class="form-control form-style" id="inputPrenom" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputDateNaiss">Date de naissance*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;" id="inputDateNaiss"  value="" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail">Email*</label>
                        <input type="email" class="form-control form-style" id="inputEmail">
                    </div>
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire*</label>
                        <select class="form-select form-style" id="inputLabo" style="padding: 0 0 0 10px;" required>
                            <option selected>Choisir un laboratoire </option>
                        </select>
                    </div>
                    <div class="mb-2" >
                        <label for="inputOther">Autre</label>
                        <input type="text" class="form-control form-style"  id="inputOther">
                    </div>
                </div>
                <div class="col">
                    
                    <div class="mb-2">
                        <label for="inputEmailOther">Équipe (ou Groupe, Projet)</label>
                        <input type="text" class="form-control form-style" id="inputEmailOther">
                    </div>
                    <div class="mb-2">
                        <label for="inputAdminStatut">Statut administratif*</label>
                        <select class="form-select form-style" id="inputAdminStatut" style="padding: 0 0 0 10px;">
                            <option selected>Autre</option>
                        </select>
                    </div>
                    <div class="mb-2" >
                        <label for="inputOther">Autre</label>
                        <input type="text" class="form-control form-style"  id="inputOther">
                    </div>
                    <div class="mb-2" >
                        <label for="inputResp">Responsable d'ouverture de compte* </label>
                        <input type="text" class="form-control form-style"  id="inputResp" required>
                    </div>
                    <div class="mb-2" >
                        <label for="exampleInputEmail1">Date de fin*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputEndDate"  value="" required>
                    </div>
                </div>
                
            </div>
            <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        No compute (accès data uniquement)
                    </label>
            </div>

            <div class="form-floating mt-2">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea1" style="height: 100px; border-color: #E69645;"></textarea>
                <label for="floatingTextarea1">Descriptif du domaine scientifique :</label>
            </div>
            <div class="form-floating mt-3"> 
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; border-color: #E69645;"></textarea>     
                <label for="floatingTextarea2">Pour les membres des laboratoires hors du site de Gerland, justifier cette demande :</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="border-top border-secondary-subtle mt-1 pt-1">
                Langues:
                <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Français
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        English
                    </label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        