.. _infaqua:

Implémentation de nouvelles fonctionnalites dans le code AquaSol
================================================================

.. |br| raw:: html

   <br>

.. container:: mb-3
    
    .. image:: ../../_static/img_projets/figureaquasol.png
        :class: img-fluid img-float
        :alt: Image figureaquasol

    * **Contact** : Cerasela Calugaru, Ralf Everaers, Sam Meyer |br|
    * **Objectif** :  Optimisation (nouveaux algorithmes, parallélisation), implémentation des nouvelles fonctionnalités, analyse du comportement numérique et informatique du code AquaSol

    ➢	**Extraction des valeurs de la solution en 1D** (ligne à l’intérieur du domaine 3D) à partir de la solution 3D fournie par AquaSol, la « solution » pouvant être le potentiel, les densités du nombre et de charges d’ions, la densité d’énergie, et la densité des dipôles d’eau. Cette fonctionnalité facilite les diverses analyses comparatives et la visualisation dans une zone d’intérêt. 

➢	**Distribution gaussienne des charges des atomes fixes**

En plus des distributions « trilinéaire » et « sphérique » déjà implémentées pour discrétiser les charges fixes, il nous a semblé pertinent de s’intéresser à des distributions de type « gaussien » centrées au centre de l’atome. 
Ainsi, nous avons implémenté plusieurs possibilités et notamment une gaussienne tridimensionnelle  globale (qui est définie sur tout le domaine) et une gaussienne localisée (en tronquant au seul domaine sphérique de l’atome, suivie d’une rénormalisation). L’écart type sigma peut être choisi fixé pour tous les atomes (des simulations avec la valeur sigma=0.35 ont été effectuées, cette valeur assurant une distribution de la charge d’environ 99% à l’intérieur de la sphère atomique de rayon unitaire) ou calculé en fonction du rayon atomique.
Le choix de la méthode (trilinéaire, sphérique ou gaussiennne) est étroitement lié à la manière de modéliser les charges des atomes fixes à l’échelle d’étude : par une distribution de Dirac au centre atomique ou par une distribution constante dans la sphère atomique ou par une distribution gaussienne tronquée à la sphère atomique. Ainsi, des réflexions ont été menées concernant la capacité des trois modèles à représenter les charges des atomes fixes dans le cas de nos problèmes. En effet, à l’échelle de notre étude (de l’ordre de l’Angström), la modélisation des charges fixes par une distribution gaussienne semble bien adaptée dès lors que la discrétisation spatiale est suffisamment fine (ce qui implique un nombre suffisant de points dans la sphère atomique).

➢	**Charges fixes, charges des ions libres, charges correspondant a la divergence de la polarisation locale** : calcul de toutes les charges intervenant dans l’équation et obtention des fichiers de sortie avec des cartes des toutes ces charges

➢	**Energie électrostatique** : calcul de l’énergie électrostatique avec la formule basée sur la connaissance du gradient du potentiel électrostatique (en plus de la méthode «self-energy» déjà implémentée) 