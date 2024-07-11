let numbers = ["zero", "un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf", "dix"];
let num1 = Math.floor(Math.random() * 10);
let num2 = Math.floor(Math.random() * 10);

document.querySelector("#human-question").textContent = "Quel est le résultat de " + numbers[num1] + " plus " + numbers[num2] + " ? ";

const question2 = document.querySelector("#human-questio2");

if(question2){
    let num_desc1 = Math.floor(Math.random() * 10);
    let num_desc2 = Math.floor(Math.random() * 10);
    question2.textContent = "Quel est le résultat de " + numbers[num_desc1] + " plus " + numbers[num_desc2] + " ? ";

    const formulaireDescinsc = document.querySelector("#userForm2");

    formulaireDescinsc.addEventListener('submit', function(event) { 
        event.preventDefault();
        lien = "EnvoiFormDesinsc.php";
        let formData = new FormData(formulaireDescinsc);

        let sum = document.querySelector('#human-answer2').value;

        if(Number.parseInt(sum) != num_desc1 + num_desc2){
            alert("Désolé, votre calcul est incorrect, cela laisse penser que vous êtes un robot.");
            return false;
        } else {
            fetch('../../_static/Formulaires/'+ lien, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv= document.createElement("div");
    
                if (data.status === "success") {
                    messageDiv.style.color = "green";
                } else {
                    messageDiv.style.color = "red";
                }
                
                messageDiv.textContent = data.message;
                const bloc2= document.querySelector("#bloc2");
                bloc2.append(messageDiv);
            })
            .catch(error => {
                document.querySelector('#bloc2').textContent = 'Erreur lors de l\'envoi de l\'e-mail : ' + error;
                document.querySelector('#bloc2').style.color = "red";
            });
        }
    })
}

const formulaire = document.querySelector('#userForm');

let lien = "";

switch(formulaire.dataset.nom){
    case 'cafe':
        lien = "EnvoiFormCafe.php";
        break;
    case 'salleTP':
        lien = "EnvoiFormTP.php";
        break;
    case 'ecs':
        lien = "EnvoiFormEcs.php";
        break;
    case 'eis':
        lien = "EnvoiFormEis.php";
        break;
    case 'doce':
        lien = "EnvoiFormDemandeOuverture.php";
        break;
    case 'dr':
        lien = "EnvoiFormDemandeRessources.php";
        break;
    case 'faq':
        lien = "EnvoiFormFAQ.php";
        break;
    case 'dimaj':
        lien = "EnvoiFormDimaj.php";
        break;
    case 'probleme':
        lien = "EnvoiFormProbleme.php";
        break;
    case 'liste_inscr':
        lien = "EnvoiFormInsc.php";
        break;
}

formulaire.addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(formulaire);
    
    let sum = document.querySelector('#human-answer').value;

    if(Number.parseInt(sum) != num1 + num2){
        alert("Désolé, votre calcul est incorrect, cela laisse penser que vous êtes un robot.");
        return false;
    } else {
        fetch('../../_static/Formulaires/'+ lien, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const messageDiv= document.createElement("div");

            if (data.status === "success") {
                messageDiv.style.color = "green";
            } else {
                messageDiv.style.color = "red";
            }
            
            messageDiv.textContent = data.message;
            const bloc= document.querySelector("#bloc");
            bloc.append(messageDiv);
        })
        .catch(error => {
            document.querySelector('#bloc').textContent = 'Erreur lors de l\'envoi de l\'e-mail : ' + error;
            document.querySelector('#bloc').style.color = "red";
        });
    }
});

