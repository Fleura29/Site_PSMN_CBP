async function loadNews() {
    const newsDir = '/News/'; // Chemin vers le répertoire des nouvelles
    const rssLinkElem = document.getElementById('rss-link'); // Élément où afficher le lien RSS

    try {
        const response = await fetch(newsDir);
        const files = await response.json(); // Supposons que le serveur renvoie une liste de fichiers JSON

        // Création du contenu XML pour le flux RSS
        let rssContent = `<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
    <title>Flux RSS des Nouvelles</title>
    <link>${window.location.origin}/news-rss.xml</link>
    <description>Flux RSS des dernières nouvelles</description>
`;

        // Boucler à travers les fichiers pour ajouter des éléments d'article au flux RSS
        files.forEach(file => {
            // Supposons que chaque fichier contient des données JSON avec des champs comme titre, lien, description, etc.
            rssContent += `
    <item>
        <title>${file.title}</title>
        <link>${window.location.origin}${newsDir}${file.filename}</link>
        <description>${file.description}</description>
    </item>`;
        });

        // Fermeture du flux RSS
        rssContent += `
</channel>
</rss>`;

        // Création du lien RSS
        const rssBlob = new Blob([rssContent], { type: 'text/xml' });
        const rssUrl = URL.createObjectURL(rssBlob);
        rssLinkElem.href = rssUrl;
        rssLinkElem.textContent = 'Flux RSS des Nouvelles';
    } catch (error) {
        console.error('Erreur lors du chargement des nouvelles :', error);
    }
}

// Appel de la fonction pour charger les nouvelles et créer le lien RSS au chargement de la page
document.addEventListener('DOMContentLoaded', loadNews);