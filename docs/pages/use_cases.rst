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

Insert this code to the student´s notebook and you are ready to release it.

After submitting, you will be able to open and review all students submissions.

------------
B: Migrating existing nbgrader projects
------------

Lorem Ipsum

------------
C: Full Featured and start from scratch
------------

Lorem Ipsum