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

function Horaire(){
    const selectHoraireDebut= document.querySelector("#inputHoraireDeb");
    const selectHoraireFin= document.querySelector("#inputHoraireFin");
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

let laboratoires= [
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

function Laboratoire(){
    const selectLabo= document.querySelector("#inputLabo");
    laboratoires.map((o) => {
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

function Demande(){
    const selectDemande= document.querySelector("#inputDemande");
    demandes.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        selectDemande.appendChild(option);
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

function Plateau(){
    const selectPlateau= document.querySelector("#inputPlateau");
    plateaux.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        selectPlateau.appendChild(option);
    })
}

const entités=[
    "Laboratoire Monod",
    "Laboratoire Descartes",
    "Département Monod",
    "Département Descartes",
    "Entité hors ENS-Lyon"
];

function Entité(){
    const selectEntité= document.querySelector("#inputEntite");
    entités.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        selectEntité.appendChild(option);
    })
}

const statutAdmins=[
    "Professeur",
    "MCF",
    "DR",
    "CR",
    "AGPR",
    "IGR",
    "Post-Doc",
    "Etudiant"
];

function StatutAdmin(){
    const selectStatut= document.querySelector("#inputStatutAdmin");
    statutAdmins.map((o) => {
        const option= document.createElement("option");
        option.value= o;
        option.textContent= o;
        selectStatut.appendChild(option);
    })
}

document.addEventListener("DOMContentLoaded", function() {
    
    if (document.querySelector("#inputHoraireDeb") && document.querySelector("#inputHoraireFin")) {
        Horaire();
    }
    if (document.querySelector("#inputLabo")) {
        Laboratoire();
    }
    if (document.querySelector("#inputDemande")) {
        Demande();
    }
    if (document.querySelector("#inputPlateau")) {
        Plateau();
    }
    if (document.querySelector("#inputEntite")) {
        Entité();
    }
    if (document.querySelector("#inputStatutAdmin")) {
        StatutAdmin();
    }
});

document.addEventListener("DOMContentLoaded", (event) => {
    const toggleButton = document.querySelector("#theme");
    const logo_cbp_light = document.querySelector("#logo_cbp_light");
    const logo_cbp_dark = document.querySelector("#logo_cbp_dark");
    const logo_ens_light = document.querySelector("#logo_ens_light");
    const logo_ens_dark = document.querySelector("#logo_ens_dark");
    const currentMode = localStorage.getItem("dark") || "light";
    document.body.classList.add(currentMode);

    if (document.body.classList.contains("light")) {
        logo_cbp_light.style.display = "block";
        logo_cbp_dark.style.display = "none";
        logo_ens_light.style.display = "block";
        logo_ens_dark.style.display = "none";
    } else{
        logo_cbp_light.style.display = "none";
        logo_cbp_dark.style.display = "block";
        logo_ens_light.style.display = "none";
        logo_ens_dark.style.display = "block";
    }

    toggleButton.addEventListener("click", () => {
        if (document.body.classList.contains("dark")) {
            document.body.classList.remove("dark");
            document.body.classList.add("light");
            localStorage.setItem("dark", "light");
            toggleButton.innerHTML = "&#9789";
            logo_cbp_light.style.display = "block";
            logo_cbp_dark.style.display = "none";
            logo_ens_light.style.display = "block";
            logo_ens_dark.style.display = "none";
        } else {
            document.body.classList.remove("light");
            document.body.classList.add("dark");
            localStorage.setItem("dark", "dark");
            toggleButton.innerHTML = "&#9788";
            logo_cbp_light.style.display = "none";
            logo_cbp_dark.style.display = "block";
            logo_ens_light.style.display = "none";
            logo_ens_dark.style.display = "block";
        }
    });
});