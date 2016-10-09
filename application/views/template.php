<?php
if (!defined('APPPATH'))
	exit('No direct script access allowed');
/**
 * views/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--<link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand logo -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">
                            <img id="img-logo" src="/assets/images/logo.png"/>
                        </a>
                    </div>
                    <!-- Collect the nav links -->
                    <div class="collapse navbar-collapse">
                        {menubar} 
                    </div>
                </div>
            </nav>           
            <div id="content">

                <a href="#">Inbox <span class="badge">42</span></a>

                <button class="btn btn-primary" type="button">
                    Messages <span class="badge">4</span>
                </button>

                <h1>{pagetitle}</h1>
                {content}
            </div>
            <div id="footer" class="span12">
                footer: Copyright &copy; 2016.
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--<script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>-->
    </body>
</html>
