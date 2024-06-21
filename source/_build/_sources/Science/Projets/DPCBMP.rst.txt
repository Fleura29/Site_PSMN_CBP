.. _dpcbmp:

Descriptive and predictive cell-based models for the emergence of shape in plants
=================================================================================

.. role:: underline
    :class: underline

.. |br| raw:: html

   <br>

.. image:: ../../_static/img_projets/vasculature.png
    :class: img-fluid mb-2
    :alt: A dynamical model for leaf vasculature

:underline:`Coordination :` Arezki Boudaoud 

* Annamaria Kiss
* Olivier Hamant
* Pradeep Das

:underline:`Associated members :`

* Centre national de la recherche scientifique (CNRS)
* Institut national de la recherche agronomique (INRA)
* Université Claude Bernard Lyon I
* Ecole normale supérieure de Lyon (ENS de Lyon)

Research project
----------------

How shape emerges in a developing organism is still a mystery. We conduct an interdisciplinary research on plant development, using biological, biophysical and computational approaches. On the computational side, we combine the analysis of large sets of spatial experimental data and the predictive modelling of cell and tissue shape.

On the one hand, we quantify the dynamics of a growing organ (e.g. a flower as in the figure below). We start from optical images and obtain 3D segmented images where pixels are attributed to cell volumes. This computationally intensive pipeline was developed in collaboration with the Virtual Plants team (INRIA, Montpellier) and is part of the OpenAlea platform for plant modelling; we also use MorphoGraphX, a CUDA-based platform for the visualization and processing of 3D biological datasets. We build cell graphs containing quantitative data on morphology and growth; we analyse these graphs using statistical clustering methods. Doing so, we aim at identifying specific cellular domains in relation with morphogenesis.

.. container:: text-center mb-3
    
    .. image:: ../../_static/img_projets/flower_bud.png
        :class: img-fluid
        :alt: Computer-assisted reconstruction of a growing flower bud

The 3D image was assembled from the fusion of three confocal stacks using a non-linear optimization of the overlap between the stacks, and cells were segmented using a watershed algorithm.

On the other hand, we build cell-based dynamical models of morphogenesis or continuous models with partial differential equations, incorporating biochemical and mechanical components. For instance, cell-based models describe the viscoelastic mechanics of individual cell walls, the coupling of mechanics with biochemical fields, and the reaction-diffusion-transport of these biochemical fields, leading to high-dimensional systems of stochastic differential equations, which we solve numerically. Thus we test hypotheses formulated from observations and improve our knowledge of the underlying mechanisms, as shown below for leaf vasculature.

A cell-based model incorporating cell mechanics and differentiation reproduces the geometrical features of vasculature in leaves.

Selection of publications
-------------------------

* K. Alim, O. Hamant & A. Boudaoud. Regulatory role of cell division rules on tissue growth heterogeneity. Front. Plant Sci. 3,174 (2012).
* M. Uyttewaal, A. Burian, K. Alim, B. Landrein, D. Borowska-Wykret, A. Dedieu, A. Peaucelle, M. Ludynia, J. Traas, A. Boudaoud, D. Kwiatkowska & O. Hamant. Mechanical Stress Acts via Katanin to Amplify Differences in Growth Rate between Adjacent Cells in Arabidopsis. Cell 149, 439-451 (2012).
* V. Mirabet, F. Besnard, T. Vernoux & A. Boudaoud. Noise and robustness in phyllotaxis. PLoS Comput. Biol. 8, e1002389 (2012).
* R. Fernandez, P. Das, V. Mirabet, E. Moscardi, J. Traas, J.-L. Verdeil, G. Malandain & C. Godin. (2010) Imaging plant growth in 4D : robust tissue reconstruction and lineaging at cell resolution. Nat. Methods 7, 547-53.
* F. Corson, M. Adda-Bedia & A. Boudaoud. In silico leaf venation networks : growth and reorganisation driven by mechanical forces. J. Theor. Biol. 259, 440–448 (2009).

Links
-----

http://www.ens-lyon.fr/RDP/Biophysique-et-developpement |br|
http://www.ens-lyon.fr/Joliot-Curie/spip.php?rubrique53 |br|
http://openalea.gforge.inria.fr/dokuwiki/doku.php |br|
http://www.morphographx.org/ 

CBP contribution to the project
-------------------------------

The CBP provides a unique environment for advanced scientific computing - the use of graphics cards, parallelization of software, advice on methods, all of which are beneficial to this project.