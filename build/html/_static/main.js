const contenu= document.querySelector("#contenu");
const li= document.querySelectorAll("li.nav-item.dropdown");

li.forEach((o) => {
    o.addEventListener("mouseenter", () => {
        contenu.style.opacity = "0.5"; 
    });

    o.addEventListener("mouseleave", () => {
        contenu.style.opacity = "1"; 
    });
});

let horaires= [
    "09:00",
    "09:30",
    "10:00",
    "10:30",
    "11:00",
    "11:30",
    "12:00",
    "12:30",
    "13:00",
    "13:30",
    "14:00",
    "14:30",
    "15:00",
    "15:30",
    "16:00",
    "16:30",
    "17:00",
    "17:30",
    "18:00",
    "18:30",
    "19:00",
];

function insertTime(){
    const selectHoraireDebut= document.querySelector("#inputStartTime");
    const selectHoraireFin= document.querySelector("#inputEndTime");
    horaires.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        selectHoraireDebut.appendChild(option);
    });
    horaires.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        selectHoraireFin.appendChild(option);
    })
}

let laboratories= [
    "CIRI - U1111 UMR5308",
    "CRAL - UMR 5574",
    "EVS - UMR 5600",
    "ICBMS - UMR 5246",
    "ICJ - UMR 5208",
    "IGFL - UMR 5242",
    "IHRIM - UMR 5317",
    "ILM - UMR 5306 (MMCI)",
    "ILM - UMR 5306 (PT)",
    "ISA - UMR 5280",
    "LBMC - UMR 5239",
    "LCH - UMR 5182",
    "LIP - UMR 5668",
    "LMFA-ECL - UMR C5509",
    "LMFA-Lyon1 - UMR C5509",
    "LMFA-INSA - UMR C5509",
    "LPH - UMR 5672",
    "LGL - UMR 5276",
    "RDP - UMR 5667",
    "UMPA - UMR 5669",
    "CRMN - FRE 3008",
    "IBCP - FR 3302",
    "CBP",
    "IXXI",
    "PALGEN",
    "CSSI"
];

function insertLabo(){
    const selectLabo= document.querySelector('#inputLabo');
    laboratories.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        selectLabo.appendChild(option);
    })
}

const demandes=[
    "Accès général aux ressources",
    "Création d'un espace projet",
    "Création d'un groupe d'utilisateurs",
    "Assistance technique",
    "Privatisation d'un équipement",
    "Exploitation d'un plateau technique",
    "Installation de logiciel",
    "Qualification de matériel",
    "Animation 3IP",
    "Création Paillasse numérique",
    "Formation ressources CBP",
    "Prise en main SIDUS",
    "Extension de quota"
];

function insertRequest(){
    const demande= document.querySelector("#inputDem");
    demandes.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        demande.appendChild(option);
    })
}

const plateaux=[
    "multi-noeuds (MPI)",
    "multi-coeurs (MPI,OpenMP,OpenCL)",
    "multi-shaders (GPU avec CUDA, OpenCL, Kokkos, OpenACC)",
    "Salle 3IP",
    "Compute On My Own Device",
    "Galaxy",
    "Forge",
    "intégration (Ubuntu, Centos, Debian)"
];

function insertPlat(){
    const plateau= document.querySelector("#inputPlat");
    plateaux.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        plateau.appendChild(option);
    })
}

const entities=[
    "Laboratoire Monod",
    "Laboratoire Descartes",
    "Département Monod",
    "Département Descartes",
    "Entité hors ENS-Lyon"
];

function insertEntity(){
    const entity= document.querySelector("#inputEntity");
    entities.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        entity.appendChild(option);
    })
}

const Adminstatut=[
    "Professeur",
    "MCF",
    "DR",
    "CR",
    "AGPR",
    "IGR",
    "Post-Doc",
    "Etudiant"
];

function insertStatut(){
    const adminStatut= document.querySelector("#inputAdminStatut");
    Adminstatut.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        adminStatut.appendChild(option);
    })
}

document.addEventListener('DOMContentLoaded', function() {
    
    if (document.querySelector('#inputStartTime') && document.querySelector("#inputEndTime")) {
        insertTime();
    }
    if (document.querySelector('#inputLabo')) {
        insertLabo();
    }
    if (document.querySelector('#inputDem')) {
        insertRequest();
    }
    if (document.querySelector('#inputPlat')) {
        insertPlat();
    }
    if (document.querySelector('#inputEntity')) {
        insertEntity();
    }
    if (document.querySelector('#inputAdminStatut')) {
        insertStatut();
    }
});
