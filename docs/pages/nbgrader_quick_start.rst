Quick start with nbgrader
===========================

To fully utilize the nbpickup, it is recommended to get familiar with nbgrader python library. nbpickup uses nbgrader to generate a student version of the test and autograding of submitted notebooks. If you are not interested in autograding features, you can skip this page.

------------
What is nbgrader?
------------

    nbgrader is a tool that facilitates creating and grading assignments in the Jupyter notebook.
    It allows instructors to easily create notebook-based assignments that include
    both coding exercises and written free-responses. nbgrader then also provides a streamlined
    interface for quickly grading completed assignments.
        `nbgrader documentation <https://nbgrader.readthedocs.io/en/stable/>`_

------------
How to use it?
------------

1st STEP: Generate Student
----------------

nbgrader allows to create various types of tasks, answers and test cells in the standard jupyter
notebooks. To start, we create a new notebook in the  ``/source/`` directory. This notebook is
our source notebook and it is the only file that we should be editing. We will use this notebook later
to generate a release version.

**Release version** (or Student version) of the notebook contains a few changes compared to source:
* Read only task description cells
* Removed solution code
* Removed hidden autograding tests

During the generation process, any solutions and hidden autograding tests are saved in the nbgrader
database file. This file will be later required during autograding process.

.. figure:: /_static/nbgrader_release.gif
   :scale: 100 %
   :alt: animation of assignment release process

You should *not* edit the release version. Do changes in the source version and generate the new release.

Learn more `nbgrader docs - Creating and Grading Assingments <https://nbgrader.readthedocs.io/en/stable/user_guide/creating_and_grading_assignments.html>`_

Grading of Assignments
---------------------------

Learn more `nbgrader docs - Autograding Assignments <https://nbgrader.readthedocs.io/en/stable/user_guide/creating_and_grading_assignments.html#autograde-assignments>`_

------------
Official nbgrader documentation
------------

`Homepage <https://nbgrader.readthedocs.io/en/stable/>`_

