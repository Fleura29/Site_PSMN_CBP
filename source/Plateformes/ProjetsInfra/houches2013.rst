.. _houches2013:

* :ref:`Projets d'infrastructure <projinfra>`

Third School on Computational Physics : from DNA to Evolution
=============================================================

.. image:: ../../_static/img_projets/houches.png
    :width: 150px
    :class: img-float pe-2
    :alt: Houches

Organisateur : Ralf Everaers, CBP, ENS-Lyon

Maîtrise d'oeuvre : Emmanuel Quemener, CBP, ENS-Lyon

Projet
------

Fournir une infrastructure informatique complète permettant les travaux pratiques de calcul numérique en appoint des cours magistraux de la 3ème école des Houches dédiée 

Cette troisième  des Houches en *computational physics* sur le thème `From ADN  to evolution <#>`_ nécessitait pour ses travaux pratiques des besoins particuliers en appoint des cours magistraux : des logiciels dont Lammps ou VMD allaient être découverts puis utilisés par les auditeurs.

Contribution du Centre Blaise Pascal à ce projet
------------------------------------------------

L'école de physique des Houches dispose d'un cadre magnifique mais les installations informatiques y sont vétustes. Il est impossible de s'y déplacer avec le matériel permettant la réalisation de travaux pratiques d'informatique pour 70 personnes. En outre, il est impensable d'installer sur chaque poste le prérequis indispensable aux logiciels nécessaires aux formations.

Le Centre Blaise Pascal a fourni une infrastruture complète permettant l'accès à l'environnement numérique complet par 3 voies : 
  
* deux versions autonomes 32 et 64 bits formées d'images virtuelles pour VirtualBox comprenant tout et installables sur tous les OS
* deux versions réseau 32 et 64 bits formées d'une image virtuelle minimaliste démarrant en réseau et installables sur tous les OS
* une version sous forme d'un portable prêté et démarrant directement sur le réseau

Les cours, la communication entre auditeurs et intervenants est proposée au travers d'une portail collaboratif.

Toute l'infrastructure se compose :
  
* de commutateurs réseau
* d'un serveur dédié intégrant les services NTP, DNS, DHCP, TFTP, NFS, Ldap, WWW pour le portail collaboratif
* d'une passerelle locale assurant les services de Masquerading, de Traffic Shaping
* de l'ingénieur disponible sur place notamment pour l'intégration des codes
