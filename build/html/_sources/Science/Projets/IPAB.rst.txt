.. _ipab:

Image processing : Anisotropic Blur
===================================

* **Anisotropic Blur** : PDE-based algorithm to reduce noise in grey-scale image (2D or 3D) from biology, using a diffusion process.

Coordination : Cerasela Calugaru et Annamaria Kiss

Etudiante stagiaire : Typhaine Moreau


* **Why ?**

To study plant morphogenesis, we need to follow the evolution of a plant during time. We can use real-time imaging and image segmentation to reconstruct the plant development at a cell level. 
The real-time 3D images obtained by confocal microscopy are noisy. In order to segment them, we need to reduce this noise. 
The easiest way is to use a gaussian blur, which will smooth the image intensity. It will indeed remove the noise, but we might also lose some important informations, as the localization of the cell walls. That's why we implement an anisotropic blur, which reduce the noise without blurring the cell walls.

The filter develop by Weickert is a diffusion process using a PDE (Partial Differential Equation). The image will evolve in time according to its gradient and a diffusion tensor (anisotropic) or a diffusion coefficient (isotropic). 
The diffusion process is similar to a smoothing or blurring process.

The filter develop by Schmidt is anisotropic and heterogeneous : there is a diffusion tensor D for each voxel. D is compute using the eigenvectors and the eigenvalues of the Hessian matrix (second derivative of the image intensity). The diffusion tensor D is a 3 by 3 matrix with values between 0 and 1. 

Inside the cells, where the image is globally homogeneous, the diffusion is isotropic and equal to 1.
Near the cell walls, the diffusion is anisotropic : it is strong along the walls, and small perpendicularly to the walls.

    * **Results**

From left to right :

- original image
- anisotropic blur K=0.1 / sigma=6 / gamma=1 / nb_it=150
- gaussian blur

.. container:: text-center

    .. image:: ../../_static/ab1.png
        :alt: Image ab1  	

* **References**

The algorithm is based on a filter developed by Weickert, using a formula from Schmidt

- J. Weickert. Anisotropic Diffusion In Image Processing. B.G. Teubner Stuttgart, 1998.
- Schmidt, T., Pasternak, T., Liu, K., Blein, T., Aubry-Hivet, D., Dovzhenko, A., Duerr, J., Teale, W., Ditengou, F. A., Burkhardt, H., Ronneberger, O. and Palme, K. (2014), The iRoCS Toolbox – 3D analysis of the plant root apical meristem at cellular resolution. The Plant Journal, 77: 806–814. doi: 10.1111/tpj.12429

.. container:: text-center
    
    .. raw:: html

        <p class="d-inline-block bg-body-secondary p-3 rounded fs-13">
            This project has been performed during the stage of Master of <B>Typhaine Moreau</B> at ENS Lyon 
            (Reproduction et Developpement des Plantes and Centre Blaise Pascal) coordinated by 
            <B>Annamaria Kiss and Cerasela Calugaru</B>
        </p>