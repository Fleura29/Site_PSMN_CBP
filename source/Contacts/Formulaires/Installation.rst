Demande d'installation ou de mise à jour d'un logiciel
======================================================

.. |br| raw:: html

   <br>

.. container:: text-center d-inline-block bg-warning-subtle pt-3 mb-3 rounded fs-13

    **IMPORTANT NOTICE** |br|
    We (psmn administrators) **DO NOT** register for softwares. |br|
    But, of course, we agree to set whatever permissions, if asked to. |br|
    If a user want a registered software, he has to register himself, obtain the software (Linux x86_64 version, or sources, if avalaible), then give it to PSMN admins in order to install it. |br|
    Please let us know when, and where (your /home@psmn, for example), the software you want will be available.

Il reste à la charge de la personne, de l'équipe ou du laboratoire demandeur, d'obtenir les droits d'usage du logiciel (achat ou inscription, et téléchargement). 

.. container:: pt-2 border border-secondary-subtle 

    .. raw:: html

        <form class="ms-2 me-2">
            <div class="row ">
                <div class="col ">
                    <div class="mb-2">
                        <label for="inputSurname" >Nom*</label>
                        <input type="text" class="form-control form-style" id="inputSurname" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputPrenom">Prénom*</label>
                        <input type="text" class="form-control form-style" id="inputPrenom" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail">Email*</label>
                        <input type="email" class="form-control form-style" id="inputEmail" required>
                    </div>
                    <div class="mb-2" >
                        <label for="inputTeam">Equipe</label>
                        <input type="text" class="form-control form-style"  id="inputTeam">
                    </div>
                </div>
                <div class="col">
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
                </div>
            </div>

            <div class="border-top border-secondary-subtle mt-1 pt-1">
                Logiciel:
                <div class="row mt-1">
                    <div class="col ">
                        <div class="mb-2">
                            <label for="inputLabo">Type de demande*</label>
                            <select class="form-select form-style" id="inputLabo" style="padding: 0 0 0 11px;" required>
                                <option selected>Installation</option>
                                <option>Mise à jour</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="inputLabo">Statut du logiciel*</label>
                            <select class="form-select form-style" id="inputLabo" style="padding: 0 0 0 11px;" required>
                                <option selected>Free Software</option>
                                <option>Registered</option>
                                <option>Licensed</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="inputEmail">Nom du logiciel*</label>
                            <input type="email" class="form-control form-style" id="inputEmail" required>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="mb-2" >
                            <label for="inputTeam">Version*</label>
                            <input type="text" class="form-control form-style"  id="inputTeam" required>
                        </div>
                            
                        <div class="mb-2" >
                            <label for="inputOther">URL de téléchargement</label>
                            <input type="text" class="form-control form-style"  id="inputOther" placeholder="http://">
                        </div>
                    </div>
                </div>
            </div>
            
            <p class="mt-3 fs-12"><i>Les champs marqués d'une étoile (*) sont obligatoires !</i></p>

            <div class="text-center">
                <button type="submit" class="btn mb-4" style="border-color: #E69645;">Soumettre</button>
            </div>
        </form>   

        