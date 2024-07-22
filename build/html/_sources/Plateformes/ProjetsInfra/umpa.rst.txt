.. _umpaProj:

* :ref:`Projets d'infrastructure <projinfra>`

Evolution de l'infrastructure de l'UMPA
=======================================
 
.. container:: d-flex

    .. image:: ../../_static/img_projets/umpa.gif
        :alt: Image umpa 

    Maîtrise d'oeuvre : Emmanuel Quemener, CBP, ENS-Lyon

Projet
------

L'Unité de Mathématiques Pures et Appliquées, suite à l'indisponibilité de son informaticien, nécessite une reprise en profondeur de son infrastructure informatique, allant de la distribution de son réseau jusqu'aux services proposés à ses utilisateurs.

Contribution du Centre Blaise Pascal à ce projet
------------------------------------------------

L'objectif est de faire revenir l'UMPA sur un "standard" de laboratoire Monod auprès de la DSI avec les 4 chantiers suivants :

- Exploitation du SI global : brève échéance (opérationnel en septembre 2013)
    
    * Où en est-on ? Des comptes locaux permettent l'accès aux ressources propres. L'accès à ces ressources est séparé entre le secrétariat et le reste du laboratoire.
    * Où va-t-on ? Le SI global sera le socle d'identification et d'authentification. Cela comprend l'usage de Ldap (pour cette partie, pas de souci) mais également la gestion des groupes intégrés à la gestion des groupes de la DSI (comme pour le LJC et l'IGFL). L'usage du Ldap est "libre". La gestion des groupes "Samba" via l'ENT semble être une exclusivité pour le LJC et l'IGFL.
- Migration des réseaux privés vers le réseau public de l'ENS-Lyon : brève échéance (opérationnel en septembre 2013)
    
    * Où en est-on ? la distribution du réseau est réalisée par l'usage de réseaux Ethernet séparés et des classes non routées.
    * Où va-t-on ? Passer toutes la distribution sur un unique réseau
- Passage de l'UMPA sur la dorsale réseau 10G du site Monod :
    
    * Où en est-on : l'interconnexion se réalise avec deux câbles en paires torsadées, en Gigabit Ethernet
    * Où va-t-on : pour que l'UMPA soit considéré comme tout autre laboratoire de Monod, elle nécessiterait une arrivée 10G directement connectée sur la dorsale de l'établissement (via vraisemblablement le 3eme étage).
- Fiabilisation du réseau informatique : phase 1 en septembre 2013, phase 2 à évaluer avec la DSI
   
    * Où en est-on ? La distribution du réseau repose sur 5 commutateurs de 12 à 48 ports 3com dont 4 distribuent du GE. Les 5 sont hors garantie. La distribution exploite massivement des duplicateurs de ports (4 paires -> 2x2 paires) et ne permet une interconnexion qu'en Fast Ethernet.
    * Où va-t-on ? La gestion des commutateurs de distribution revient sous la responsabilité de la DSI. Le Gigabit Ethernet est proposé à la prise terminal. Les duplicateurs de ports sont éradiqués. 
