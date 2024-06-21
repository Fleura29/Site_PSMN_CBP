.. _tobe:

To be a planet, or not to be, that is the question
==================================================

.. |br| raw:: html

   <br>
 
.. image:: ../../_static/img_projets/phantommcfost.png
    :class: img-float pe-2
    :alt: Image phantommcfost

**CRAL, ENS-Lyon** : Guillaume Laibe |br|
**CRAL, ENS-Lyon** : Guillaume Brochier |br|
**Centre Blaise Pascal :** Emmanuel Quémener

La formation des planètes dans des systèmes stellaires tels que notre système solaire reste relativement mystérieuse. Une des voies possible de leur formation serait la fragmentation des disques protoplanétaires.
Dans ce but, nous réalisons des simulations de "Smoothed Hydrodynamics Particles" (SPH), grâce au code PHANTOM. C'est-à-dire que nous résolvons les équations de l'hydrodynamique, pour déterminer l'évolution du disque. Nous faisons en sorte que celui-ci soit gravitationnellement instable. Ainsi, au bout de nombreuses orbites des "fragments" se forment. Sur la vidéo ci-contre, réalisées avec 5 millions de particules, cela correspond aux de fortes densités qui se développent. 
Le but est d'ensuite extraire de ces simulations des informations observables par télescope (tel que ALMA) pour étudier le présence, ou non, de tels disques dans l'univers. Pour réaliser cela, on utilise le fait que les fragments déforment le champ gravitationnel proche. Ainsi les particules de gaz sont accélérées / ralenties par un fragment (note : cela est visible sur l'image v_diff_m_r, qui provient d'une autre simulation, je n'ai pas encore d'équivalent pour la simulation jointe en vidéo).
Puis, nous utilisons un autre code, MCFOST, qui nous permet d'observer les lignes d'émission de certaines molécules. La différence de vitesse serait alors visible puisque l'effet Doppler modifie légèrement la fréquence d'émission des molécules présentes dans les zones accélérées / ralenties par le fragment ! (je n'ai pas encore d'image pour cet effet malheureusement).
Finalement, la comparaison entre les positions des lignes d'émission dans les simulations et des observations permettrait de justifier l'hypothèse de la fragmentation lors de la formation planétaire.

Ainsi, de nombreuses simulations informatiques sont nécessaires pour l'aboutissement de ce projet, notamment les simulations hydrodynamiques qui nécessitent un temps et une puissance de calcul très importants (ou nous pouvons attendre la résolution des équations de Navier Stokes, mais c'est sans doute encore plus long ;-) ).

Contribution du CBP
-------------------

Le Centre Blaise Pascal fournit :

* ressources informatiques matérielles  : calcul, stockage
* temps ingénieur pour l'intégration logicielle
