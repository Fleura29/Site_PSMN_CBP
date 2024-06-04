.. _wurm:

WURM project
============

.. |br| raw:: html

   <br>

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/wurm.png
        :class: img-fluid
        :alt: Image wurm

    .. container::

        Coordinator : Razvan Caracas |br|
        Contact : Razvan Caracas & Cerasela Calugaru 

        `Website of the project <http://www.wurm.info>`_

**A database of computed physical properties of minerals** 

The database provides the crystal structure, the parameters of the calculations, the dielectric properties, the Raman spectra with both peak positions and intensities and the infrared spectra with peak positions for minerals. The calculations are performed within the framework of the density-functional theory and the density-functional perturbation theory, using the ABINIT code. 

Presentation
------------

Each chemical substance, be it solid mineral or molecule, liquid or polymer, useful or harmful, has a distinct Raman signature. Thus Raman spectroscopy offers a unique unambiguous way for phase identification. The method is non-destructive, cheap and fast.

This project aims to build a freely accessible web-based database of computed Raman spectra for minerals. The database provides for each mineral the computed Raman spectra with both peak position and intensity, but also the frequency, the symmetry assignment and the atomic displacement patterns for all the zone-center vibrational modes and gives the Raman tensors.

The database contains additional information about the crystal structures, infrared spectra, comparison of single-crystal and powder spectra, as well as other physical properties of minerals. The target-audience is scientists and research laboratories, museums and schools, small and medium enterprises.

In our project we are creating a complete set of high quality spectral data from well characterized minerals and we are developing the technology to share this information with the world. Our computed and collected data provide standards for mineralogists, geoscientists, gemologists and the general public for the identification of minerals both on earth and for planetary exploration.

The Raman spectra is plotted interactively, the user being able to visualize both single-crystal spectra and powder spectra and also to personalize the plots by rescaling, coloring etc. The information regarding the spectra is freely available for download. The database also contains static tables for presenting the crystal structure information, for listing the frequency and the symmetry identification of the different modes in the zone-center and for reporting the Raman tensors. Interactive jmol-based animations illustrate the atomic displacement patterns of the different modes. With time additional features are added, like orientation-dependent infrared spectra, interactive visualization of single-crystal spectra, etc.

We perform the first-principles calculations using the `ABINIT package <http://www.abinit.org/>`_. ABINIT is a package whose main program allows finding the total energy, charge density and electronic structure of systems made of electrons and nuclei (molecules and periodic solids) within Density funcal Theory (DFT), using pseudopotentials and a planewave basis. ABINIT also includes options to optimize the geometry according to the DFT forces and stresses, namely to find the stable theoretical crystal structure, to generate dynamical (vibrations - phonons) properties, like the Raman and infrared spectra, to compute the dielectric, mechanical or thermodynamical properties, etc. ABINIT is available through a `GNU General Public Licence (GPL) <http://www.gnu.org/copyleft/gpl.html>`_: the code-source is freely accessible and all contributions in the public domain are made available to the whole community of developers and users.

Creative Commons License The WURM project is licensed under a `Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported License <http://creativecommons.org/licenses/by-nc-sa/3.0/>`_. 

PSMN/CBP contribution to the project
------------------------------------

Dans le cadre de ce projet, nous nous sommes intéressé entre autres, à l’application et l’implémentation d’une méthode d’ordre élevé pour le calcul de l’énergie dans le code ABINIT (Laboratoire de Géologie, Equipe de R. Caracas). 
Le travail de Cerasela Calugaru (CBP/PSMN) a consisté à apporter une expertise dans l’application et l’implémentation des méthodes numériques associées. 
En fonction des besoins des membres du projet, elle assure la mise à jour du code Abinit sur les serveurs du PSMN et son optimisation selon le compilateur utilisé. A partir de novembre 2013, Loïs Taulelle (PSMN) a pris en charge l'aspect installation du code ABINIT.