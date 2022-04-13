Deploy to your own server
=========================

nbpickup is free and open-source. You can deploy it on your server and take a full ownership with all of your data.

nbpickup suppors standard PHP web server, that is most likely hosting your current school webiste.

* Requires PHP 7+
* MySQL

Required Files
----------------
Source code available from `GitHub<https://github.com/jjur/nbpickup-server>`_

Database Schema from `GitHub<https://github.com/jjur/nbpickup-server/blob/main/database.sql>`_

Installation
----------------

1. Upload files to webserver
2. Make sure that public folder is publicly accessible from the domain
3. Import Database Schema to your SQL database
4. Configure database connection in env or `app/Config/Database.php` file.
5. Enjoy app running on your server

Note:
If you are using nbpickup on your own server, make sure to always add a line of code after importing nbpickup to
set the working server URL::

    import nbpickup

    nbpickup.change_server("YOUR_SERVER_URL)

This will make sure that your client is always connecting to the right server

Default Admin account
---------------------

nbpickup uses `IonAuth<https://github.com/benedmunds/CodeIgniter-Ion-Auth/tree/4>`_ library, which comes with default admin account as follows:
    email: admin@admin.com
    password: password

**Please change the default password after deployment to your server!!!**

