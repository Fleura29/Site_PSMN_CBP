.. _sidusen:

Errata for Linux Journal article about SIDUS
============================================

Some errors occured in Linux Journal `article <http://www.linuxjournal.com/content/november-2013-issue-linux-journal-system-administration>`_ of November 2013 about SIDUS. 

If you follow step-by-step the :ref:`documentation complète <sidusdoc>` about SIDUS, these errors are corrected. 

''Next-Server'' page 102
------------------------

On page 102, we purpose as IP address for TFTP server 172.16.20.251. It's incoherent with the rest of the article.

If we place the TFTP server on the same machine as NFSroot serveur, the line next-server in /etc/dhcp/dhcpd.conf file has to replaced by : 

.. code-block:: bash
    
    next-server 10.13.20.13;

MyInclude & MyExclude page 104
------------------------------

On page 104, we purpose to use MyInclude and MyExclude variables to install via `debootstrap <https://wiki.debian.org/Debootstrap>`_ a selected set of packages and to exlude others.  

Some of them are in “base” installation via debootstrap. SIDUS demands the kernel (linux-image-3.2.0-4-amd64 for AMD64 architecture) and initrd tools (initramfs-tools). Others are useful to recognize large amount of peripherals (firmware) or to investigate inside the system (metrology tools). 

We purpose as MyInclude : 

.. code-block:: bash
    
    export MyInclude="adduser,apt,apt-utils,aptitude,aptitude-common,aspell,aspell-en,aufs-tools,bsdmainutils,btrfs-tools,busybox,ca-certificates,clusterssh,console-setup,cpio,cron,cups-pdf,debian-archive-keyring,dmidecode,dselect,emacs,environment-modules,ethtool,firmware-bnx2,firmware-linux,firmware-linux-nonfree,gnupg,gpgv,groff-base,htop,hwinfo,hwloc,iftop,ifupdown,info,initramfs-tools,install-info,iotop,iperf,ipmitool,iproute,iptables,iputils-ping,isc-dhcp-client,isc-dhcp-common,kmod,ldap-utils,less,libapt-inst1.5,libapt-pkg4.12,libboost-iostreams1.49.0,libcwidget3,libept1.4.12,libgcrypt11,libgdbm3,libgnutls26,libgpg-error0,libidn11,libkmod2,libncursesw5,libnet-ldap-perl,libnewt0.52,libnfnetlink0,libnss-ldap,libp11-kit0,libpam-ldap,libpipeline1,libpopt0,libprocps0,libreadline6,libsigc++-2.0-0c2a,libsqlite3-0,libssl1.0.0,libstdc++6,libtasn1-3,libudev0,libusb-0.1-4,libxapian22,linux-headers-3.2.0-4-amd64,linux-image-3.2.0-4-amd64,locales,logrotate,lsof,man-db,manpages,mbw,mtr,mutt,nano,net-tools,netbase,netcat-traditional,nfs-common,nscd,ntpdate,open-iscsi,openssh-server,pciutils,procps,python-ldap,readline-common,rsyslog,screen,scsitools,sdparm,ssh,ssmtp,sudo,tasksel,tasksel-data,tmux,traceroute,tshark,udev,usbutils,vim,wget,whiptail,xinit,python-html2text"

In MyExclude, we exclude all packages seem to be in clnflict with others packages in these statement, software servers we don't want to launch on SIDUS client.

We purpose as MyExclude : 

.. code-block:: bash

    export MyExclude="nano,exim,mysql-server,mysql-server-5.5,mysql-server-core-5.5,network-manager,apache2,apache2-mpm-worker,apache2-utils,apache2.2-bin,apache2.2-common,libapache2-mod-dnssd,libapache2-mod-php5,r-cran-fecofin,libmpich1.0gf,gerris,gspiceui,qucs,ktimetrace,kseg,ghdl,earth3d,libopenigtlink1,qtdmm,scilab-overload,gmsh,klogic,g++-doc,openturns-wrapper,xorsa,r-cran-rpvm,labplot,zygrib,libteem1,magnus,libcomplearn-dev,libtorque2,torque-common,torque-server,gridengine-client,gridengine-exec,gridengine-master,gridengine-qmon,gnuplot,gnuplot-nox,rtai,rtai-doc,libhdf5-dev,libhdf5-1.8,libgd2-xpm"

Hook ''policy-rc.d'' page 104
-----------------------------

On page 104, we purpose to delete after installation process the hook ${SIDUS}/usr/sbin/policy-rc.d.

It can be useful to keep it for administration process in order not to launch service just after installation.

''rootaufs'' page 106
---------------------

On page 106, we purpose a wget to download and install the core of SIDUS boot. It's incomplete. It's already necessary to add some execution rights on it !

Please replace the lines by : 

.. code-block:: bash
    
    wget -O ${SIDUS}/etc/initramfs-tools/scripts/init-bottom/rootaufs http://www.cbp.ens-lyon.fr/sidus/rootaufs
    chmod 755 ${SIDUS}/etc/initramfs-tools/scripts/init-bottom/rootaufs

''vmlinux-Sidus'' et ''initrd-Sidus'' page 107
----------------------------------------------

On page 107, there are references on a vmlinux-Sidus and a initrd-Sidus to copy the kernel and the initrd in TFTP folder. The filenames are incoherent with the definition in /srv/tftp/pxelinux.cfg/default.

Please replace the lines by: 

.. code-block:: bash

    cp ${SIDUS}/vmlinuz /srv/tftp/vmlinuz-Sidus
    cp ${SIDUS}/srv/nfsroot/boot/initrd /srv/tftp/initrd.img-Sidus

`Emmanuel Quemener <mailto:emmanuel.quemener@ens-lyon.fr>`_ 2013/11/07 10:41
