.. _cerdl:

Circumstellar environments reconstruction with deep learning
============================================================

.. role:: underline
    :class: underline

.. |br| raw:: html

   <br>

.. image:: ../../_static/img_projets/rhapsodie.png
    :class: img-float pe-2
    :width: 150px
    :alt: Image rhapsodie

**Assia Chahid** (stagiaire, LabPhys, ENS-Lyon), |br|
**Nelly Pustelnik** (CR, LabPhys, ENS-Lyon) |br|
Expertise IT : **Emmanuel Quémener** (CBP, ENS-Lyon)

Polarimetric imaging is one of the most effective techniques for high-contrast imaging and characterization of circumstellar environments.These environments can be characterized through direct-imaging polarimetry at near-infrared wavelengths. The Spectro-Polarimetric High-contrast Exoplanet REsearch (SPHERE)/IRDIS instrument installed on the Very Large Telescope in its dual-beam polarimetric imaging (DPI) mode, offers the capability to acquire polarimetric images at high contrast and high angular resolution. However dedicated image processing is needed to get rid of the contamination by the stellar light, of instrumental polarization effects and of the blurring by the instrumental point spread function. In [1] we propose a reconstruction strategy to deconvolve the near-infrared polarization signal from circumstellar environments. This reconstruction method relies on variational techniques including weighted data fidelity term, smooth penalization, and additional constraints. The method improves the overall performances in particular for low SNR/small polarized flux compared to standard methods.

Following recent advances in deep learning for image restoration [2], the objective of this new work is to explore such framework in the context of high-contrast reconstruction for studying cIrcumstellar environments. Using as a starting point the direct model and the algorithmic strategy provided in [1], we will unroll the iterations to fit a deep learning formalism.

:underline:`Références :`

* [1] L. Denneulin, M. Langlois, E. Thiebaut, and N. Pustelnik, RHAPSODIE : Reconstruction of High-contrAst Polarized SOurces and Deconvolution for cIrcumstellar Environments, submitted, 2020.
* [2] M. Jiu, N. Pustelnik, A deep primal-dual proximal network for image restoration, accepted to IEEE JSTSP, 2021.
* [3] A. Pohl et al., New constraints on the disk characteristics and companion candidates around T Cha with VLT/SPHERE, Astronomy & Astrophysics, 605, 2017. 

Contribution du CBP
-------------------

Le Centre Blaise Pascal met à disposition toute son infrastructure pour permettre des calculs de Machine Learning.