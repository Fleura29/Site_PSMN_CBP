.. _x2go:

Utilisation de x2go au Centre Blaise Pascal
===========================================

Ce qu'il faut retenir pour utiliser x2go !
------------------------------------------

* Activer son accès SSH auprès de la DSI de l'établissement
* Installer le client x2go sur son ordinateur
* Configurer l'accès à une des machines de la salle de formation
* Choisir judicieusement sa machine dans la `liste <http://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_

Introduction
------------

Le Centre Blaise Pascal dispose de plateaux techniques, notamment  des noeuds de clusters, destinés :

  * à l'initiation au calcul scientifique, notamment `MPI <http://en.wikipedia.org/wiki/Message_Passing_Interface>`_, `OpenMP <http://en.wikipedia.org/wiki/OpenMP>`_, `CUDA <http://en.wikipedia.org/wiki/CUDA>`_ `OpenCL <http://en.wikipedia.org/wiki/Opencl>`_
  * au développement d'applications dans le domaine du calcul scientifique
  * à l'intégration de démonstrateurs agrégeant des technologies matures dans un ensemble original
  * au passage de l'expérience scientifique ("la paillasse") à la technologie de production ("le génie des procédés")
  * à l'exploration de "domaine de vol" des applications scientifiques (paramètres de parallélisation, audit de code)
  * à la réalisation de prototypes pour la mise en place de nouveaux services informatiques

Pour accéder aux ressources du CBP de l'extérieur de l'établissement

Ouverture de son accès SSH 
--------------------------

- Se connecter sur `L'Espace Numérique de Travail <http://ent.ens-lyon.fr>`_ de l'ENS-Lyon 

.. container:: text-center

    .. image:: ../../_static/x2go/ent-ssh-1.png
        :class: img-fluid pb-2
        :alt: Image ent-ssh-1

- Cliquer sur **Accès SSH** pour *Activer votre accès à la passerelle SSH*

.. container:: text-center

    .. image:: ../../_static/x2go/ent-ssh-2.png
        :class: img-fluid pb-2
        :alt: Image ent-ssh-2

- Cliquer sur le bouton **Je demande l'activation de mon accès SSH**
- Une notification d'activation ou un message comme le suivant apparait

.. container:: text-center

    .. image:: ../../_static/x2go/ent-ssh-3.png
        :class: img-fluid pb-2
        :alt: Image ent-ssh-3

Choix d'un poste de travail distant
-----------------------------------

Les 28 postes de la salle de formation sont accessibles par x2go.

A ces machines s'ajoutent 40 autres machines : consultez donc la :ref:`liste <listex2go>`.

Pour résumer, les machines qui ne sont pas dans la salle disposent :
  
  * d'une mémoire de 16 GB à 2 TB de RAM ou équivalent
  * de 8 coeurs à 128 coeurs physiques
  * de 8 threads à 256 threads logiques
  * de 500 GB à 12 TB d'espace local

Installation du client x2go
---------------------------

La `X2GoClient <http://wiki.x2go.org/doku.php/doc:installation:x2goclient>`_ offre tout le nécessaire pour l'installation

Voici quelques liens pour les platesformes les plus courantes :

  * pour Debian `x2goclient <https://packages.debian.org/stable/x2goclient>`_ fait partie de l'archive standard depuis Jessie
  * Pour toutes les versions `Windows depuis XP <http://code.x2go.org/releases/X2GoClient_latest_mswin32-setup.exe>`_
    
    * **Attention !** Un redémarrage COMPLET de Windows semble nécessaire.
  
  * Pour MacOSX `version 10.9 <https://code.x2go.org/releases/binary-macosx/x2goclient/main/4.1.2.2/x2goclient-4.1.2.2.20200213.OSX_10_9.dmg>`_, `version 10.11 <https://code.x2go.org/releases/binary-macosx/x2goclient/main/4.1.2.2/x2goclient-4.1.2.2.20200213.OSX_10_11.dmg>`_ et `version 10.13 <https://code.x2go.org/releases/binary-macosx/x2goclient/main/4.1.2.2/x2goclient-4.1.2.2.20200213.OSX_10_13.dmg>`_.
    
    * l'installation de la dernière version de `XQuartz <https://dl.bintray.com/xquartz/downloads/XQuartz-2.7.11.dmg>`_ est indispensable
    * **Attention !** Un redémarrage COMPLET de MacOSX semble nécessaire pour XQuartz

Paramétrage du client x2go
--------------------------

.. container:: text-center

    .. container:: bg-warning-subtle pt-2 pb-1 mb-2 rounded fs-14

        Le nom de machine, illustré par **mastation** doit être remplacé impérativement par le nom de la 
        machine. La liste des machines de la salle de formation est disponible sur 
        :ref:`machines2xgo <listex2go>`

Lors de la création d'une nouvelle session cliente x2go, les éléments suivants doivent être définis :

* **Session Name** ou **Nom de la session** : nom de la session, plutôt de la forme *MaStation au CBP*
* **Host** ou **Hôte** : le nom de la machine destination, 

    * nécessairement de la forme "mastation.cbp.ens-lyon.fr"

* **Login** ou **identifiant** : l'identifiant ENS-Lyon de l'utilisateur
* Utilisation du proxy ENS-Lyon :

    * Pour activer le proxy, cliquer 

        * soit sur **Use Proxy server for SSH connection**
        * soit sur **Utiliser un serveur mandataire pour la connexion SSH**

* **Type** : SSH
* **Host** ou **Hôte** : "ssh.ens-lyon.fr"
* Pour définir l'identifiant et le mot de passe sur le serveur Proxy, cliquer :

    * soit **Même identifiant que sur le serveur X2Go** et **Même mot de passe que sur le serveur X2Go**
    * soit **Same login as on X2Go Server** et **Same password on X2Go Server**

* **Session type** ou **Type de session**, sélectionner "XFCE" 

.. container:: text-center

    .. image:: ../../_static/x2go/x2go_session_preferences-monaccesgalaxy_014.png
        :class: img-fluid pb-2
        :alt: Image x2go_session_preferences-monaccesgalaxy_014


Sur le deuxième onglet, **Connection** ou **Connexion**

* Pour **Connection speed** ou **Vitesse de connexion**, sélectionner **LAN**

.. container:: text-center

    .. image:: ../../_static/x2go/x2go_session_preferences-monaccesgalaxy_015.png
        :class: img-fluid pb-2
        :alt: Image x2go_session_preferences-monaccesgalaxy_015

Sur le troisième onglet, **Input/Output** ou **Entrées/Sorties**

* Pour **Display**, sélectionner **Custom** ou **Personnalisé** 
    
    * avec **Width** mis à "1024" et **Height** mis à "768"

.. container:: text-center

    .. image:: ../../_static/x2go/x2go_session_preferences-monaccesgalaxy_016.png
        :class: img-fluid
        :alt: Image x2go_session_preferences-monaccesgalaxy_016


Sur le quatrième onglet, **Media**

  * Désactiver **Enable sound support** ou **Activer le son**
  * Désactiver **Client side printing support** ou **Gestion de l'impression côté client**

.. container:: text-center
        
    .. image:: ../../_static/x2go/x2go_session_preferences-monaccesgalaxy_014.png
        :class: img-fluid pb-2
        :alt: Image x2go_session_preferences-monaccesgalaxy_014


Lancement d'une session x2go
----------------------------

.. container:: text-center
        
    .. image:: ../../_static/x2go/x2go_page.png
        :class: img-fluid
        :alt: Image x2go_page

    .. image:: ../../_static/x2go/x2go_distant.png
        :class: img-fluid
        :alt: Image x2go_distant

Usages particuliers
-------------------

Export d'un dossier local
~~~~~~~~~~~~~~~~~~~~~~~~~

.. container:: text-center
        
    .. image:: ../../_static/x2go/x2go_session_preferences-monaccesgalaxy_019.png
        :class: img-fluid 
        :alt: Image x2go_session_preferences-monaccesgalaxy_019

    .. image:: ../../_static/x2go/x2go_session_preferences-monaccesgalaxy_020.png
        :class: img-fluid
        :alt: Image x2go_session_preferences-monaccesgalaxy_020

    .. image:: ../../_static/x2go/x2go_partage.png
        :class: img-fluid
        :alt: Image x2go_partage

Lancement d'une application OpenGL
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Certaines applications graphiques (comme matlab ou vmd) peuvent exiger un affichage graphique accéléré. 

`VirtualGL <https://www.virtualgl.org/>`_ permet d'exploiter le circuit graphique embarqué sur la machine distante pour accélérer le rendu.

Pour lancer son application graphique en utilisant cet outil VirtualGL, il suffit de préfixer dans un terminal la commande de lancement de l'application avec "vglrun".

**Exemple pour le logiciel VMD**

Par exemple, pour lancer l'application de visualisation `VMD <https://www.ks.uiuc.edu/Research/vmd/>`_, dans un terminal : "vglrun vmd"

.. container:: text-center
        
    .. image:: ../../_static/x2go/vglrun1.png
        :class: img-fluid pb-2
        :alt: Image vglrun1

Le résultat apparaît. En bas à droite, vous pouvez voir que cette application VMD exploite le GPU pour les calculs (les "C" pour la colonne "Type") mais aussi pour l'affichage (le "C+G").

.. container:: text-center
        
    .. image:: ../../_static/x2go/vglrun2.png
        :class: img-fluid
        :alt: Image vglrun2

**Exemple pour le pachyderme Matlab**

Par exemple, pour lancer l'application de visualisation `VMD <https://www.ks.uiuc.edu/Research/vmd/>`_, dans un terminal : "vglrun /opt/MatLab/R1017B/bin/matlab"

.. container:: text-center
        
    .. image:: ../../_static/x2go/vglrun3.png
        :class: img-fluid pb-2
        :alt: Image vglrun3

Le résultat apparaît. En bas à droite, vous pouvez voir que Matlab exploite le GPU pour (le "G").

.. container:: text-center
        
    .. image:: ../../_static/x2go/vglrun4.png
        :class: img-fluid
        :alt: Image vglrun4


