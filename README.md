## starter-quotes

This project is the starting repository for COMP4711 (fall 2016) lab #4.

This starter builds on [CodeIgniter3.1-starter2](https://github.com/jedi-academy/CodeIgniter3.1-starter2),
adding a Quotes model and tailoring the homepage view to suit this.

**controllers/Welcome.php** has been modified to provide a table of quotations,
and the view template has been modified to use Bootstrap.

The **application/config/autoload.php** configuration has been modified
to preload the template parser library, the url helper, and the Quotes model.

The **application/config/config.php** configuration has been modified
to specify menu navbar choices.

The **application/views** folder holds the master template, as well as some relevant view
fragments.

Configure your web server or virtual host so that your project's
document root maps to this **public** folder inside your project.
