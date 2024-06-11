var numbers = ["zero", "un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf", "dix"];
var num1 = Math.floor(Math.random() * 10);
var num2 = Math.floor(Math.random() * 10);
document.querySelector('#human-question').innerHTML = "Quel est le résultat de " + numbers[num1] + " plus " + numbers[num2] + " ? ";

const formulaire= document.querySelector('#userForm');
var lien="";

switch(formulaire.dataset.nom){
    case 'cafe':
        lien= "EnvoiFormCafe.php";
        break;
    case 'salleTP':
        lien= "EnvoiFormTP.php";
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