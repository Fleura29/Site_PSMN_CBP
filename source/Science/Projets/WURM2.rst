.. _wurm2:

WURM project
============

.. role:: underline
    :class: underline
    
.. |br| raw:: html

   <br>

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/wurm1.jpg
        :class: img-fluid
        :alt: Image wurm

    .. container::

        Coordinator : Razvan Caracas |br|
        ENS Researcher: Ema Bobocioiu |br|
        Contact: Razvan Caracas & Cerasela Calugaru 

        `Website of the project <http://www.wurm.info>`_

**A database of computed physical properties of minerals** 

The database provides the crystal structure, the parameters of the calculations, the dielectric properties, the Raman spectra with both peak positions and intensities and the infrared spectra with peak positions for minerals. The calculations are performed within the framework of the density-functional theory and the density-functional perturbation theory, using the ABINIT code. 

Presentation
------------

Each chemical substance, be it solid mineral or molecule, liquid or polymer, useful or harmful, has a distinct Raman signature. Thus Raman spectroscopy offers a unique unambiguous way for phase identification. The method is non-destructive, cheap and fast.

This project aims to build a freely accessible web-based database of computed Raman spectra for minerals. The database provides for each mineral the computed Raman spectra with both peak position and intensity, but also the frequency, the symmetry assignment and the atomic displacement patterns for all the zone-center vibrational modes and gives the Raman tensors.

The database contains additional information about the crystal structures, infrared spectra, comparison of single-crystal and powder spectra, as well as other physical properties of minerals. The target-audience is scientists and research laboratories, museums and schools, small and medium enterprises.

In our project we are creating a complete set of high quality spectral data from well characterized minerals and we are developing the technology to share this information with the world. Our computed and collected data provide standards for mineralogists, geoscientists, gemologists and the general public for the identification of minerals both on earth and for planetary exploration.

The Raman spectra is plotted interactively, the user being able to visualize both single-crystal spectra and powder spectra and also to personalize the plots by rescaling, coloring etc. The information regarding the spectra is freely available for download. The database contains static tables for presenting the crystal structure information, for listing the frequency and the symmetry identification of the different modes in the zone-center and for reporting the Raman tensors. Interactive jmol-based animations illustrate the atomic displacement patterns of the different modes. Single-Raman spectra are available as a function of crystal orientation, for a basis of building a Raman microscope: 

.. container:: text-center
    
    .. image:: ../../_static/img_projets/wurm2.jpg
        :class: img-fluid
        :alt: Image wurm

The WURM project supports NASA Mars2020 exploration mission, by offering the theoretical background for the Raman spectra. Mars2020 will carry two Raman spectrometers on the surface of Mars (Supercam instrument, co-developed in the Laboratory of Geology of Lyon, will be mounted on the rover of the NASA). We also compute energies of formation and hydration to help interpret the water and volatile cycles on Mars, to determine the effect of hydration on the Raman spectra, and to predict the isotope partitioning.

We perform the first-principles calculations using the `ABINIT package <http://www.abinit.org/>`_. ABINIT is a package whose main program allows finding the total energy, charge density and electronic structure of systems made of electrons and nuclei (molecules and periodic solids) within Density Functional Theory (DFT), using pseudopotentials and a planewave basis. ABINIT also includes options to optimize the geometry according to the DFT forces and stresses, namely to find the stable theoretical crystal structure, to generate dynamical (vibrations - phonons) properties, like the Raman and infrared spectra, to compute the dielectric, mechanical or thermodynamical properties, etc. ABINIT is available through a `GNU General Public Licence (GPL) <http://www.gnu.org/copyleft/gpl.html>`_: the code-source is freely accessible and all contributions in the public domain are made available to the whole community of developers and users.

As of January 1st, 2017, the database contains 450 spectra covering 322 minerals. Selected calculations are performed at high pressures, several instabilities are identified and structural phase transitions are predicted at low temperatures. 

Creative Commons License: The WURM project is licensed under a `Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported License <http://creativecommons.org/licenses/by-nc-sa/3.0/>`_. 

:underline:`Associated publications :`

* R. Caracas, E. Bobocioiu, **The WURM project – a freely available web-based repository of computed physical data for minerals**, American Mineralogist, 96, 437–443 (2011).

* Jin Liu, Razvan Caracas, Dawei Fan, Ema Bobocioiu, Dongzhou Zhang, Wendy L. Mao, **High-pressure compressibility and vibrational properties of (Ca,Mn)CO3**, American Mineralogist, 101, 2723-2730 (2016).

* E. Bobocioiu, R. Caracas, **Stability and spectroscopy of Mg sulfate minerals: Role of hydration on sulfur isotope partitioning**, American Mineralogist, 99, 1216-1220 (2014).

* G. Montagnac, R. Caracas, E. Bobocioiu, F. Vittoz, B. Reynard, **Anharmonicity of graphite at high temperature**, Carbon, 54, 68-75 (2013). 

* Avril, C., Malavergne, V., Caracas, R., Zanda, B., Reynard, B., Charon, E., Bobocioiu, E., Brunet, F., Borensztajn, S., Pont, S., Tarrida, M., Guyot, F., **Raman spectroscopic properties and Raman identification of CaS-MgS-MnS-FeS-Cr2FeS4 sulfides in meteorites and reduced sulfur-rich systems**. Meteoritics & Planetary Science, 48, 1415–1426 (2013). 

* **Theoretical modeling of Raman spectra**, R. Caracas and E. Bobocioiu in Raman Spectroscopy Applied to Earth Sciences and Cultural Heritage EMU Notes in Mineralogy volume 12, Eds. J. Dubessy, M.-C. Caumon, F. Rull. Publisher: EMU (2012).

CBP contribution to the project
-------------------------------

Dans le cadre de ce projet, on est intéressés entre autres, à l’application et l’implémentation d’une méthode d’ordre élevé pour le calcul de l’énergie dans le code  ABINIT (Laboratoire de Géologie, Equipe de R. Caracas, Chercheur associé Ema Bobocioiu). 
Le travail de Cerasela Calugaru consiste à apporter une expertise dans l’application et l’implémentation des méthodes numériques associées. 
En fonction des besoins des membres du projet, elle assure la mise à jour du code Abinit sur les serveurs du PSMN et son optimisation selon le compilateur utilisé. 

