.. _openvpn:

Création d'un serveur OpenVPN
=============================

Introduction
------------

Dans le cadre de la pandémie grippale de 2009, les établissements de l'enseignement supérieur ont imposé des plans de continuité d'activité. 

Pour proposer aux personnels administratifs un accès aux ressources de l'établissement leur permettant d'effectuer les missions décidées comme stratégiques, il a été proposé de généraliser l'usage de VPN. Cependant, si les établissements disposent de VPN de type concentrateur VPN IPsec, ces derniers sont rarement dimensionnés pour absorber plusieurs dizaines voire centaines d'utilisateurs.

Il apparaît indispensable de pouvoir proposer une alternative à ces plate-formes souvent onéreuses pour faire face rapidement à la pandémie. La solution décrite ci-après utilise une solution complètement libre et ouverte, basée sur OpenVPN.

CQQCOQP
-------

Comme tout projet qui se respecte, et pour définir sa portée plus que le simple tryptique "où on en est ? Où on va ? Comment on y va ?", il est préférable de se rapprocher de l'allographe http://fr.wikipedia.org/wiki/CQQCOQP .

* **Pourquoi** : permettre un accès VPN complet en appui de l'accès VPN IPsec déjà disponible
* **Quoi** : étudier le déploiement d'une passerelle OpenVPN et vérifier que les clients des 3 plates-formes classiques du campus (Linux, MacOSX et Windows) peuvent bien l'utiliser
* **Quand** : rendre opérationnelle cette nouvelle passerelle avant que la pandémie n'oblige les personnels à organiser le télétravail
* **Qui** : la totalité des personnes disposant d'un compte à l'ENS-Lyon doit pouvoir utiliser cette passerelle. L'authentification doit utiliser les modes couramment utilisés (Ldap)
* **Combien** : l'utilisation de logiciels libres étant privilégiée dans le déploiement de nouveaux outils, le coût se limitera à une machine virtuelle hébergée sur un des Dom0 et le temps passé à son élaboration
* **Où** : la passerelle devra être accessible de partout sur Internet. Le client OpenVPN sera installé à discrétion sur tous les postes utilisateurs nécessitant cet accès.
* **Comment** : les phases classiques seront utilisées dans l'élaboration de ce projet : prototypage sur une machine virtuelle de l'ENS, étude de l'accessibilité des différents clients sur les différentes plate-formes, proposition de la plate-forme en test, déploiement sur une plate-forme de production, test de montée en charge, publication de la disponibilité.

Pourquoi OpenVPN
----------------

La solution de VPN OpenVPN se distingue des autres solutions par la nécessité d'installer un composant logiciel complémentaire.

Si cette caractéristique peut apparaître à certains comme un inconvénient, OpenVPN a cependant bien des avantages :
  
* nécessitant uniquement les librairies OpenSSL pour le chiffrement
* portable sur toutes les plates-formes systèmes
* fonctionnant soit en UDP/IP, soit en TCP/IP sur un port réservé et publié dans une RFC (le port 1194)
* permettant le fonctionnement en tunnel (TUN) ou en pont Ethernet (TAP)
* s'authentifiant grâce à PAM donc permettant presque toutes les authentifications possibles.

Liens Utiles
------------

* Le site source : http://www.openvpn.net/
* Le site Debian du paquet pour la distribution éponyme : http://packages.debian.org/search?keywords=openvpn
* Le site de la version pour MacOSX avec une interface graphique : http://code.google.com/p/tunnelblick/
* Le site de la version pour Windows avec une interface graphique : http://openvpn.se/
* Un site présentant une expérience de configuration `VogelWeith <http://www.vogelweith.com/debian_server/10_openvpn.php>`_

Configuration générale du serveur
---------------------------------

Les spécifications fonctionnelles suivantes doivent être respectées :

* la totalité du trafic réseau transite via le tunnel VPN une fois son activation
* l'authentification utilisera le tuple identifiant/mot de passe traditionnel
* il sera possible de tester la validité de la configuration lors d'une installation sur site facilement. 

Les spécifications logicielles et matérielles suivantes seront utilisées :

* favoriser le COTS : *Component On The Shelf* (composant sur étagère...)

    * utilisation d'une plate-forme virtuelle DomU sur Xen sur une Debian Lenny
    * utilisation du paquet Debian standard OpenVPN

* aménager de la configuration
    
    * utilisation de la classe non-routée 10.140.77.0/24 pour les tunnels des clients VPN
        
        * il est nécessaire de choisir une classe ne permettant pas d'ambiguité avec les classes généralement utilisées sur les sites : proscrire donc les 192.168.0.0/24, les 172.16.0.0/24 ou les 10.0.0.0/24
    * utilisation d'un NAT avec Masquerading : tout le trafic des machines clientes apparaîtra comme venant de la passerelle
    * déclaration d'une interface Ethernet correspondant à la classe utilisée dans le tunnel pour maintenir l'interface visible
    * utilisation de l'authentification PAM pour la passerelle OpenVPN
    * utilisation du protocole Ldap pour l'authentification PAM

Installation de l'autorité de certification de GlobalSign
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Importation du fichier `GlobalSign_Educational_CA.crt <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/GlobalSign_Educational_CA.crt>`_ dans le document : **/etc/ssl/certs/GlobalSign_Educational_CA.crt**
* Changement des droits sur le fichier : 

.. code-block:: bash
    
    chmod 644 /etc/ssl/certs/GlobalSign_Educational_CA.crt 

Configuration de OpenVPN
~~~~~~~~~~~~~~~~~~~~~~~~

Installation de OpenVPN
~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: bash
    
    apt-get install openvpn

La configuration de OpenVPN se compose des fichiers de configuration suivants :

* **dh1024.pem** : fichier de paramètre Diffie Hellman propre au serveur, généré par la commande suivante :
  
    .. code-block:: bash
        
        openssl dhparam -out dh1024.pem 1024

* **openvpn.ens-lyon.fr.key** : clé OpenSSL générée localement par le RSSI
* **openvpn.ens-lyon.fr.pem** : certificat signé par GlobalSign
* **cle_serveur.key** : clé symétrique générée par 

.. code-block:: bash
    
    openvpn --genkey --secret 2009.key

* **openvpn.conf** : configuration générale du serveur 

.. code-block:: bash

    # OpenVPN pour l'acces a l'entite  
    # Adresse IP locale
    local <Mon>.<IP>.<Quatre>.<Octets>
    # port d'attaque de la passerelle, fourni par la RFC
    port 1194
    # utilisation du VPN de type IP (pas le tap de type Ethernet)
    dev tun0
    # indication de l'utilisation en serveur
    tls-server
    mode server
    # configuration de la liaison tunnel PPP entre le serveur et le client
    ifconfig 10.140.77.3 10.140.77.4
    # domaine de distributions des adresses IP
    ifconfig-pool 10.140.77.5 10.140.77.254
    script-security 2
    # definition de l'authentification PAM
    plugin /usr/lib/openvpn/openvpn-auth-pam.so openvpn
    # utilisation de l'identifiant comme login
    username-as-common-name
    client-cert-not-required
    # certificat propre au serveur Diffie Hellman
    # generation par : openssl dhparam -out dh1024.pem 1024
    dh /etc/openvpn/dh1024.pem
    # pour l'instant, on utilise une cle symetrique
    # generation par : openvpn --genkey --secret cle_serveur.key
    tls-auth /etc/openvpn/cle_serveur.key 0
    # definition de l'autorite de certification
    ca /etc/ssl/certs/GlobalSign_Educational_CA.crt
    # definition du certificat signe
    cert /etc/openvpn/openvpn.chez-moi.fr.pem
    # definition de la cle du serveur
    key /etc/openvpn/openvpn.chez-moi.fr.key
    duplicate-cn
    # definition du nombre maximum de clients
    max-clients 100
    # pour l'activation du Masquerading
    # activation d'un script externe
    up "/etc/scripts/openvpn-start.sh"
    down "/etc/scripts/openvpn-stop.sh"
    # pour l'ajout de la route en local sur la passerelle
    route-up "/sbin/route add -net 10.140.77.0/24 tun0"
    # pour l'ajout de la route sur le client
    push "route 10.140.77.0 255.255.255.0"
    # redirection totale
    push "redirect-gateway"
    # fourniture du DNS local
    push "dhcp-option DNS <Mon>.<IP>.<DNS>.<Interne>"

    persist-tun
    persist-key
    # autorisation de test pour estimer le MTU optimal
    mtu-test
    mssfix 1450
    # compression de la liaison
    comp-lzo
    status-version 2
    # definition des fichiers de logs
    status /var/log/openvpn/openvpn-status.log
    log-append  /var/log/openvpn/openvpn.log
    verb 4 

* Création du répertoire de log : 

.. code-block:: bash
    
    mkdir /var/log/openvpn

Configuration de l'authentification par PAM
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Dans **/etc/pam.d**, créer un fichier **openvpn** contenant les références à l'authentification Ldap : 

.. code-block:: bash

    auth       required     pam_env.so # [1]
    auth       required     pam_env.so envfile=/etc/default/locale
    auth    sufficient      pam_ldap.so
    account    required     pam_nologin.so
    account    sufficient     pam_ldap.so
    session    sufficient     pam_ldap.so
    session    optional     pam_motd.so # [1]
    session    optional     pam_mail.so standard noenv # [1]
    session    required     pam_limits.so

Configuration du serveur Ldap pour le PAM
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Installer les composants permettant une authentification Ldap 

.. code-block:: bash
    
    apt-get install libpam-ldap

* Configurer l'accès au serveur Ldap dans le fichier **/etc/ldap/ldap.conf** :

.. code-block:: bash

    #
    # LDAP Defaults
    #
    BASE	ldap://ldap.chez-moi.fr:389 ldaps://ldap.chez-moi.fr:636
    TLS_CACERT /etc/ssl/certs/GlogalSign_Educational_CA.crt

    SIZELIMIT	 10000	
    TIMELIMIT 15
    DEREF never

* Configurer l'authentification par Ldap sous PAM dans le fichier **/etc/pam_ldap.conf** : 

.. code-block:: bash

    base ou=people,dc=chez-moi,dc=fr
    uri ldaps://ldap.chez-moi.fr/
    ldap_version 3
    scope sub
    pam_password crypt
    ssl on
    tls_checkpeer yes
    tls_cacertdir /etc/ssl/certs

Configuration réseau
~~~~~~~~~~~~~~~~~~~~

* Définition des interfaces réseau dans **/etc/network/interfaces** 

.. code-block:: bash

    # This file describes the network interfaces available on your system
    # and how to activate them. For more information, see interfaces(5).

    # The loopback network interface
    auto lo
    iface lo inet loopback

    # The primary network interface
    auto eth0
    iface eth0 inet static
    address <Mon>.<IP>.<Publique>.<Locale>
    gateway <Ma>.<Passerelle>.<IP>.<Locale>
    netmask 255.255.255.0

    # The OpenVPN network interface
    auto eth1
    iface eth1 inet static
    address 10.140.77.1
    netmask 255.255.255.0

* Définition de l'activation ou de l'arrêt du masquage d'adresse contrôlé par OpenVPN
    
    * création d'un répertoire de scripts : 
    
    .. code-block:: bash
        
        mkdir /etc/scripts

    * création de l'activation du NAT : **/etc/scripts/openvpn-start.sh**

    .. code-block:: bash

        #!/bin/sh
        DNS=140.77.167.2
        /sbin/iptables -t nat -A PREROUTING -s 10.140.77.0/24 -p tcp --dport 53 -j DNAT --to $DNS:53
        /sbin/iptables -t nat -A PREROUTING -s 10.140.77.0/24 -p udp --dport 53 -j DNAT --to $DNS:53
        /sbin/iptables -t nat -A POSTROUTING -s 10.140.77.0/24 -o eth0 -j MASQUERADE

    * création de la désactivation du NAT : **/etc/scripts/openvpn-stop.sh**

    .. code-block:: bash

        #!/bin/sh
        /sbin/iptables -t nat -F

    * modification des droits des fichiers :
    
    .. code-block:: bash
        
        chmod 755 /etc/scripts/openvpn-st*
        
* activation du proxy-arp dans le noyau (entre eth1 et le tunnel tun0) : 
     
    * rajouter dans **/etc/sysctl.conf** 

    .. code-block:: bash

        net.ipv4.conf.default.proxy_arp = 1
        net.ipv4.conf.all.proxy_arp = 1

    * activation de l'option : 
    
    .. code-block:: bash
        
        /etc/init.d/procps restart

* activation du routage dans le noyau : 
    
    * décommenter dans **/etc/sysctl.conf** 

    .. code-block:: bash
        
        net.ipv4.ip_forward=1

    * activation de l'option : 
    
    .. code-block:: bash
        
        /etc/init.d/procps restart
 
 
  * Activation de l'enregistrement des traces par ULog : 

    * Installation de Ulog-acctd : 
    
    .. code-block:: bash
        
        apt-get install ulog-acctd

    * Création d'un script d'activation dans NetFilter : **/etc/scripts/ulog.sh**

    .. code-block:: bash

        #!/bin/sh
        /sbin/iptables -A INPUT -i ! lo -j ULOG
        /sbin/iptables -A OUTPUT -o ! lo -j ULOG
        /sbin/iptables -A FORWARD -i ! lo -o ! lo -j ULOG

    * Modification des droits d'exécution : 
    
    .. code-block:: bash
        
        chmod 755 /etc/scripts/ulog.sh

    * Ajout dans **/etc/network/interfaces** dans la définition de eth0 : 

    .. code-block:: bash
        
        post-up /etc/scripts/ulog.sh

Configuration des services internes
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Installer le serveur NTP 

.. code-block:: bash
    
    sudo apt-get install ntp

* Installer une métrologie de l'usage du tunnel OpenVPN

Configurations complémentaires
------------------------------

Addition Filtrage Ldap
~~~~~~~~~~~~~~~~~~~~~~

Afin de ne pas ouvrir à tout l'annuaire Ldap l'accès à ce service, il peut être utilisé un filtrage sur un champ Ldap.

Quels champs Ldap ?
"""""""""""""""""""

L'examen des attributs d'un Ldap standard présente 2 possibilités :

* ''dialupAccess'' semble le plus approprié. Il est placé à ''TRUE'' pour un utilisateur disposant d'un accès ou ''FALSE'' dans le cas contraire.
* ''radiusFramedProtocol'' peut aussi être utilisé. Il est placé à ''PPP'' pour un ayant droit, et n'existe pas dans le cas contraire, pour ceux disposant d'un annuaire Radius configuré pour un accès PPP.

Comment le configurer ?
"""""""""""""""""""""""

Dans ''/etc/pam_ldap.conf'', il est seulement nécessaire de rajouter la ligne 

.. code-block:: bash
    
    pam_filter radiusFramedProtocol=PPP
    
ou 

.. code-block:: bash
    
    pam_filter dialupAccess=TRUE
    
pour activer le filtrage.

Addition d'un support TCP
~~~~~~~~~~~~~~~~~~~~~~~~~

Après quelques mois d'exploitation, il apparaît que l'utilisation de l'UDP standard pour OpenVPN pose des difficultés dans la pratique : des sites s'obstinent à empêcher l'utilisation de connexions sortantes en UDP.

Pour contrer cette difficulté, il est possible d'associer un second serveur OpenVPN au premier, en TCP celui là. Le client n'aura qu'à remplacer UDP par TCP dans sa configuration pour disposer du même service.

* **openvpn.conf** : configuration générale du serveur 

.. code-block:: bash

    # OpenVPN pour l'acces a l'entite  
    # Adresse IP locale
    local <Mon>.<IP>.<Quatre>.<Octets>
    # port d'attaque de la passerelle, fourni par la RFC
    port 1194
    # utilisation du VPN de type IP (pas le tap de type Ethernet)
    # une nouvelle interface tun1 est utilisee
    dev tun1
    # utilisation en TCP
    proto tcp-server
    # indication de l'utilisation en serveur
    tls-server
    mode server
    # configuration de la liaison tunnel PPP entre le serveur et le client
    # une nouvelle classe est utilisee pour ce nouveau tunnel
    ifconfig 10.140.78.3 10.140.78.4
    # domaine de distributions des adresses IP
    # pendant de la nouvelle classe utilisee
    ifconfig-pool 10.140.78.5 10.140.78.254
    script-security 2
    # definition de l'authentification PAM
    plugin /usr/lib/openvpn/openvpn-auth-pam.so openvpn
    # utilisation de l'identifiant comme login
    username-as-common-name
    client-cert-not-required
    # certificat propre au serveur Diffie Hellman
    # generation par : openssl dhparam -out dh1024.pem 1024
    dh /etc/openvpn/dh1024.pem
    # pour l'instant, on utilise une cle symetrique
    # generation par : openvpn --genkey --secret cle_serveur.key
    tls-auth /etc/openvpn/cle_serveur.key 0
    # definition de l'autorite de certification
    ca /etc/ssl/certs/GlobalSign_Educational_CA.crt
    # definition du certificat signe
    cert /etc/openvpn/openvpn.chez-moi.fr.pem
    # definition de la cle du serveur
    key /etc/openvpn/openvpn.chez-moi.fr.key
    duplicate-cn
    # definition du nombre maximum de clients
    max-clients 100
    # pour l'activation du Masquerading
    # activation d'un script externe
    up "/etc/scripts/openvpn-start.sh"
    down "/etc/scripts/openvpn-stop.sh"
    # pour l'ajout de la route en local sur la passerelle
    route-up "/sbin/route add -net 10.140.78.0/24 tun1"
    # pour l'ajout de la route sur le client
    push "route 10.140.78.0 255.255.255.0"
    # redirection totale
    push "redirect-gateway"
    # fourniture du DNS local
    push "dhcp-option DNS <Mon>.<IP>.<DNS>.<Interne>"

    persist-tun
    persist-key
    # autorisation de test pour estimer le MTU optimal
    mtu-test
    mssfix 1450
    # compression de la liaison
    comp-lzo
    status-version 2
    # definition des fichiers de logs
    status /var/log/openvpn/openvpn-TCP-status.log
    log-append  /var/log/openvpn/openvpn-TCP.log
    verb 4 

Même chose pour la configuration des scripts de démarrage et d'arrêt pour la mise en place du masquage d'adresses :

* création de l'activation du NAT : **/etc/scripts/openvpn-TCP-start.sh**

.. code-block:: bash

    #!/bin/sh
    DNS=140.77.167.2
    /sbin/iptables -t nat -A PREROUTING -s 10.140.78.0/24 -p tcp --dport 53 -j DNAT --to $DNS:53
    /sbin/iptables -t nat -A PREROUTING -s 10.140.78.0/24 -p udp --dport 53 -j DNAT --to $DNS:53
    /sbin/iptables -t nat -A POSTROUTING -s 10.140.78.0/24 -o eth0 -j MASQUERADE

* création de la désactivation du NAT : **/etc/scripts/openvpn-TCP-stop.sh**

.. code-block:: bash

    #!/bin/sh
    /sbin/iptables -t nat -F

Configuration des clients
-------------------------

Les clients nécessitent deux ou trois fichiers de configurations :

* openvpn.conf ou openvpn.ovpn pour la configuration générale
* cle_serveur.key pour la clé associée au
* le certificat de l'autorité de certification (pas nécessaire)

Configuration pour GNU/Linux Debian : "files only"
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Installer le client :

    * sous Debian Linux : 
    
    .. code-block:: bash
        
        sudo apt-get install openvpn

    * sous les autres distributions Linux, ...
* Installer les certificats des autorités de certifications :

    * sous Debian Linux : 
    
    .. code-block:: bash
        
        sudo apt-get install ca-certificates

    *  sous les autres distributions Linux, ...
* Télécharger les fichiers de configuration :

    * `openvpn_Linux.conf <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/openvpn_MacOSX.conf>`_
    * `cle_serveur.key <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/cle_serveur.key>`_
    * `GlobalSign_Educational_CA.crt <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/GlobalSign_Educational_CA.crt>`_
    * `pwd.txt <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/pwd.txt>`_
* Copier les fichiers de configurations dans le répertoire de configuration :
* Remplacer dans **/etc/openvpn/pwd.txt** *<identifiant>* par votre identifiant et *<mot de passe>* par votre mot de passe
* Changer les droits en lecture seule pour root de ce fichier : 

    * Taper : 

    .. code-block:: bash
        
        sudo chmod 600 /etc/openvpn/pwd.txt

* Démarrer OpenVPN : 

    .. code-block:: bash
    
        /etc/init.d/openvpn restart

.. container:: note note-important

    Certaines implémentations d'OpenVPN sur des distributions Linux empêchent catégoriquement le recours à ce fichier texte. Il est donc nécessaire d'entrer sont identifiant/mot de passe à chaque lancement

Configuration pour GNU/Linux : via NetworkManager
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La configuration se réalise via l'interface gnome-network-manager. TBD

Configuration pour MacOSX
~~~~~~~~~~~~~~~~~~~~~~~~~

* Télécharger le client Tunnelblick : cliquer sur `Tunnelblick version 3.0 <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/Tunnelblick_3.0b16.dmg>`_
* Installer le client Tunnelblick
* Télécharger les fichiers de configuration :

    * `openvpn_MacOSX.conf <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/openvpn_MacOSX.conf>`_
    * `cle_serveur.key <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/cle_serveur.key>`_
    * `GlobalSign_Educational_CA.crt <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/GlobalSign_Educational_CA.crt>`_
  
* Créer le dossier de configuration de openvpn pour l'utilisateur :

    * Ouvrir un terminal
    * Taper : 
    
    .. code-block:: bash
        
        mkdir Library/openvpn
        
* Copier les fichiers de configurations dans le répertoire de configuration :

     * Taper : 
     
    .. code-block:: bash
        
        cd ~/Library/openvpn
        tar xvzf ~/Downloads/OpenVPN-MacOSX.tgz
        
* Démarrer Tunnelblick : une icône en haut à droite sous forme d'une entrée de tunnel s'affiche en grisé
* Sélectionner ens-lyon dans la liste des VPN disponibles
* A l'invite, entrer son idenfiant et son mot de passe : si l'authentification est exacte et le tunnel opérationnelle, l'icône du tunnel semble s'ouvrir

Configuration pour Windows
~~~~~~~~~~~~~~~~~~~~~~~~~~

* Télécharger le client OpenVPN : cliquer sur `OpenVPN GUI version 2.0.9 <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/openvpn-2.0.9-gui-1.0.3-install.exe>`_
* Installer le client OpenVPN 
* Télécharger les fichiers de configuration :

    * `openvpn.ovpn <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/openvpn.ovpn>`_
    * `cle_serveur.key <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/cle_serveur.key>`_
    * `GlobalSign_Educational_CA.crt <http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/OpenVPN/configurations/GlobalSign_Educational_CA.crt>`_
* Copier les fichiers dans **C:\Program Files\OpenVPN\config**
* Démarrer OpenVPN : une icône en bas à droite de couleur avec des moniteurs de couleur rouge s'affiche
* Sélectionner **ens-lyon** dans la liste des VPN disponibles
* A l'invite, entrer son idenfiant et son mot de passe : si l'authentification est exacte et le tunnel opérationnelle, l'icône devient jaune

Licence
-------

Cette documentation est distribuée sous FDL.

L'auteur remercie les auteurs de OpenVPN et tous ceux qui, par la lecture de ces lignes, déploieront de manière opérationnelle cet outil.
