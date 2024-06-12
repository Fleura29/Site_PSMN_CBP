Demande d'accès aux ressources du PSMN
======================================

.. container:: text-center 

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
                    <div class="mb-2">
                        <label for="inputBirthDate">Date de naissance*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;" id="inputBirthDate"  value="" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputLabo">Laboratoire*</label>
                        <select class="form-select form-style" id="inputLabo" style="padding: 0 0 0 10px;" name="labo" value="" required>
                            <option selected>Choisir un laboratoire </option>
                        </select>
                    </div>
                    <div class="mb-2" >
                        <label for="inputAutreLabo">Autre</label>
                        <input type="text" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputAutreLabo" name="autreLabo">
                    </div>
                </div>
                <div class="col col-12 col-sm-6">
                    
                    <div class="mb-2">
                        <label for="inputEquipe">Équipe (ou Groupe, Projet)</label>
                        <input type="text" class="form-control form-style" id="inputEquipe" name="equipe">
                    </div>
                    <div class="mb-2">
                        <label for="inputStatutAdmin">Statut administratif*</label>
                        <select class="form-select form-style" id="inputStatutAdmin" style="padding: 0 0 0 10px;" name="admin" required>
                            <option selected>Autre</option>
                        </select>
                    </div>
                    <div class="mb-2" >
                        <label for="inputAutreStatut">Autre</label>
                        <input type="text" class="form-control form-style"  id="inputAutreStatut" name="autreStatut">
                    </div>
                    <div class="mb-2" >
                        <label for="inputResp">Responsable d'ouverture de compte* </label>
                        <input type="text" class="form-control form-style"  id="inputResp" name="responsable" required>
                    </div>
                    <div class="mb-2" >
                        <label for="inputDateFin">Date de fin*</label>
                        <input type="date" class="form-control form-style" style="padding: 0 0 0 10px;"  id="inputDateFin"  value="" name="datefin" required>
                    </div>
                </div>
                
            </div>
            <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" value="" id="flexCheckDefault" name="check">
                    <label class="form-check-label" for="flexCheckDefault">
                        No compute (accès data uniquement)
                    </label>
            </div>

            <div class="form-floating mt-2">
                <textarea class="form-control" id="textAreaDescr" style="height: 100px; border-color: #E69645;" name="textAreaDescr"></textarea>
                <label for="textAreaDescr">Descriptif du domaine scientifique :</label>
            </div>
            <p class="mt-2" style="margin-bottom: 0;">Pour les membres des laboratoires hors du site de Gerland: </p>
            <div class="form-floating " style="overflow-x: auto;"> 
                <textarea class="form-control" id="textAreaJust" style="height: 100px; border-color: #E69645;"></textarea>     
                <label for="textAreaJust">justifier cette demande</label>
            </div>

            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="border-top border-secondary-subtle mt-1 pt-1">
                Langue(s):
                <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" value="" id="checkFr" name="checkFr">
                    <label class="form-check-label" for="checkFr">
                        Français
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input checkbox" type="checkbox" value="" id="checkEn" name="checkEn">
                    <label class="form-check-label" for="checkEn">
                        English
                    </label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        