.. _lsm:

Image segmentation: Optimization of Level Set Methods for biological image segmentation (LSM)
=============================================================================================
    
Coordination : Cerasela Calugaru et Annamaria Kiss

Etudiante stagiaire : Typhaine Moreau

An automatic way to segment grayscale 3D images of cells.

* **Why ?**

To study plant morphogenesis, one need to follow the evolution of a plant during time. We can use real-time live imaging and image segmentation to reconstruct the plant development at a cell level.
A first pipeline, MARS-ALT, has been develop by the RDP laboratory in collaboration with the Virtual Plants team (INRIA, Montpellier), as a part of the OpenAlea platform for plant modelling. The 3D image are assembled from the fusion of three confocal stacks, and cells are segmented using a watershed algorithm. With 3D segmented images of the same plant at different steps of development, ALT can reconstruct the lineage between cells.
To improve the segmentation part of the pipeline, a new method was implement in 3 steps :
* Detect exterior shape of the organ with LSM
* Perform a watershed algorithm to have a first segmentation, given the exterior shape
* Improve segmentation by re-detecting each cell shape with LSM  
From left to right : original image, contour detect by LSM, watershed segmentation, cells detect by LSM

.. container:: text-center pb-3

    .. image:: ../../_static/img_projets/lsm1.png
        :alt: Image lsm1  	

Intervention of PSMN/CBP
------------------------

This new method give better results but had a major downside : the computation time. The running time for only the first step on a floral meristem was about 8h. The aim of this project was to reduce the computation time and the amount of memory used.

* **Level Set Method**

The main idea of the level set method in segmentation is to evolve a contour until it fits a desire shape. 
A function is define on the image (one value per pixel), and the contour is define as it's zero crossing points. The function is positive inside the contour and negative outside it. At each time step, the values of the function are update in each pixel, and thus the zero crossing points change and the contour evolve. The function can be seen as an energy to minimize. It usually based on the image properties (gradient, intensity...) and the geometrical aspect of the contour (curvature, size...).

**LSM to detect exterior shape (LSM detect contour)**

The LSM is initialize with a linear threshold, which roughly separate the background from the cells. The threshold is linear to adjust for the image intensity variation along the z-axis. The function takes +c0 values inside the initial contour and -c0 outside, the area in the contour being the background.
The contour evolves attracted mainly by the maximum gradient, corresponding to the edge of the cell walls. There are also a curvature term, to obtain a smoother contour, and an inflate term to push the contour towards the boundaries.
Each time step, the background growth is measure. The algorithm stops when the growth stays in a small interval near zero for ten consecutive iterations. The background is then fixed and will not move during the watershed segmentation and the LSM cell detection.

**LSM to detect cells (LSM cells)**

The detection of the cells shapes is done in 3 step :

* Eroding the watershed segmentation and initialize a function for each cell
* Evolve independently each cell's contour, attract by the maximal gradient (the inside edge of the cell walls)
* Evolve simultaneously every cell's contour, attract by the maximal intensity (center of the cell walls)


In the last step, every cell evolve for one iteration and then possible overlap are checked. An overlap region is consider not segmented. A cell can't evolve in an other cell area : overlap can only happen in a same iteration. At each iteration, the growth of the segmented areas is measured, and the algorithm stop when this growth become null.
Theoretically, the algorithm should stop when all the image is segmented. In practice, the segmentation growth is more and more slow and some area between cells are never segmented, or too slowly. It's more efficient to stop the LSM and to use another algorithm to fill the remaining holes.

From left to right : watershed, eroded watershed (step 1), evolve towards edge (step 2), final segmentation (step 3)

.. container:: text-center

    .. image:: ../../_static/img_projets/lsm2.png
        :alt: Image lsm2  	

* **Program optimization**

**Translation and shortcuts**

The codes were first translate from Python to C++, without major modifications. The python codes use the OpenAlea library whereas the C++ translation use the CImg library.
The computation time was divided by 4.5 from Python to C++ in the LSM detect contour. The amount of memory used was also slightly diminish.

Some part of the code were then optimize by changing the way to loop over images and by removing unnecessary computation. Those modifications divided the computation time by 2.5. We try to implement a narrow-band method but it wasn't conclusive.

For the LSM detect contour, the final C++ code is approximately 11 time faster than the original Python code. It also use thrice as less memory.

**Parallelization**

The LSM detect contour was parallelized but it wasn't successful, so we keep the sequential version.

The original Python for LSM cell was already parallelized, but only on the step 1 on 2 when the cells evolve independently. After a sequential translation and optimization in C++, the code was fully parallelized, including step 3. With the same number of threads, the C++ parallel version is 10 time faster than the Python version.

* **New features and script**

Several versions were implement in order to :

* change more parameters (LSM cells)
* change the stop criteria (LSM contour)
* initialize with a given contour (LSM contour)
* segment only a list of cells (LSM cells)
* restart at the third step (LSM cells)

.. container:: text-center
    
    .. raw:: html

        <p class="d-inline-block bg-body-secondary p-3 rounded fs-13">
            This project has been performed during the stage of Master of <B>Typhaine Moreau</B> at ENS Lyon 
            (Reproduction et Developpement des Plantes and Centre Blaise Pascal) coordinated by 
            <B>Annamaria Kiss and Cerasela Calugaru</B>
        </p>