.. _houches2012:

* :ref:`Projets d'infrastructure <projinfra>`

Second School on Computational Physics : DFT
============================================
 
.. image:: ../../_static/img_projets/houches.png
    :width: 150px
    :class: img-float pe-2
    :alt: Houches

Organisateur : Xavier Blase, Institut Néel, Grenoble

Maîtrise d'oeuvre : Emmanuel Quemener, Centre Blaise Pascal, ENS-Lyon

Projet
------

Cette seconde école des Houches en *computational physics* sur la `DFT <#>`_ nécessitait pour ses travaux pratiques des besoins particuliers en appoint des cours magistraux : les logiciels ABinit, Siesta, Quantum Expresso allaient être découverts puis utilisés par les auditeurs.


Contribution du Centre Blaise Pascal à ce projet
------------------------------------------------

L'école de physique des Houches dispose d'un cadre magnifique mais les installations informatiques y sont vétustes. Il est impossible de s'y déplacer avec le matériel permettant la réalisation de travaux pratiques d'informatique pour 70 personnes. En outre, il est impensable d'installer sur chaque poste le prérequis indispensable aux logiciels nécessaires aux formations.

Le Centre Blaise Pascal a fourni une infrastruture complète permettant l'accès à l'environnement numérique complet par 3 voies : 

* une version autonome formée d'une image virtuelle pour VirtualBox comprenant tout et installable sur tous les OS
* une version réseau formée d'une image virtuelle minimaliste démarrant en réseau et installable sur tous les OS
* une version sous forme d'un portable prêté et démarrant directement sur le réseau

Les cours, la communication entre auditeurs et intervenants est proposée au travers d'une portail collaboratif.

Toute l'infrastructure se compose :

* de commutateurs réseau
* d'un serveur dédié intégrant les services NTP, DNS, DHCP, TFTP, NFS, Ldap, WWW pour le portail collaboratif
* d'une passerelle locale assurant les services de Masquerading, de Traffic Shaping, de VPN
* d'une passerelle à l'ENS-Lyon pour assurer l'interconnexion des réseau avec le service de VPN
* d'un cluster de 16 noeuds x41 à l'ENS-Lyon 

Les cours sont restés accessibles au sein de l'ENS-Lyon durant 2 années.