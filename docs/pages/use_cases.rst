Use cases
===========================

For the full nbpickup experience, cases B and C are recommended. Case A provides introduction to nbpickup with easy assignment submission using python library or submission link.

------------
A: Minimal - Assignment submission with nbpickup
------------

For very light start, you can use nbpickup for assingment submission with your existing coding assignments.
It is a great way to get familiar with nbpickup and later add more features or autograding tests.

How does it work?
-----------------
You just need a nbpickup user account and create an assignment in the dashboard. After creating of the assignment,
on the **Submission Options** screen, you can find working code for submitting your assignment::

    # !pip install nbpickup  # Uncomment when used outside of binder
    import nbpickup.submissions as nbpickup
    email = "INSERT_YOUR_EMAIL"
    if nbpickup.set_email(email):
        nbpickup.submit_ipynb("UNIQUE_ASSIGNMENT_CODE")

.. figure:: /_static/nbpickup_python_submission.gif
   :scale: 100 %
   :alt: screen capture of assignment submission using Python library

Or submission Url:
    https://nbpick.org/student/submit/UNIQUE_ASSIGNMENT_CODE

.. figure:: /_static/nbpickup_url_submission.gif
   :scale: 100 %
   :alt: screen capture of assignment submission using Python library

Insert this code to the student´s notebook and you are ready to release it.

After submitting, you will be able to open and review all students submissions.

------------
B: Migrating existing nbgrader projects
------------

We are preparing content for this section. Please follow instructions in section C instead.

------------
C: Full Featured and start from scratch
------------

Review the series of following videos to learn more:

Intro and Authoring of notebooks
--------------------------------

.. raw:: html

    <iframe src="https://www.loom.com/embed/5ed9b81c0312485fb6f2cdba98973f37" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>

Developing Autogradable notebooks
---------------------------------

.. raw:: html

   <iframe src="https://www.loom.com/embed/d1bbb0a96f0b430189dd529a4b3ac1a2" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>

Sharing Notebooks with students
-------------------------------

.. raw:: html
   <iframe src="https://www.loom.com/embed/1e977f324eed44b2a17ebbf03dca4b72" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>

Submitting notebooks
--------------------

.. raw:: html

   <iframe src="https://www.loom.com/embed/5bcdd6aec64b4212a2672c1127367676" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>

Autograding with nbgrader
-------------------------

Hello World

.. raw:: html

   <iframe src="https://www.loom.com/embed/452ef9113cb943e0b5641c140db9b8c0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>

Hello World


Manual Grading and Summary
--------------------------

Hello World

.. raw:: html

   <iframe width="640" height="360" src="https://www.loom.com/embed/630108da2894451c9d00f3956017dd05" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

Hello Again

.. raw:: html

   <iframe width="560" height="315" src="https://www.youtube.com/embed/CvIiwRC-7CM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
