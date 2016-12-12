<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{pagetitle}</title>

    <!-- Bootstrap Core CSS/JS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>

    <!-- MetisMenu CSS -->
    <link href="/assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS/JS -->
    <link href="/assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<h1 class="text-center header-title" align="center">Lebron James Bakery</h1>

<div id="wrapper">
    <!-- application/views/_menubar.php -->
    {navbar}
    <!-- /application/views/homepage_view.php -->
    <div id="page-wrapper">               
        <div class="row">  
            <div class='col-md-9'>
                {items}
            </div>
            <div class='col-md-3'>
                <div class="row">
                    {receipt}
                </div>
                <div class="row">
                    <a class="btn btn-primary" role="button" href="/Sales/checkout">Checkout</a>
                    <a class="btn btn-default" role="button" href="/Sales/cancel">Cancel This Order</a>
                </div>
            </div>       
        </div>
    {content}
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/countTo.js"></script>
<script src="/assets/js/sb-admin-2.js"></script>
<script src="/assets/js/metisMenu/metisMenu.min.js"></script>

<script type="text/javascript">
    $('.timer1').countTo();
    $('.timer2').countTo();
    $('.timer3').countTo();
    $('.timer4').countTo();
    $('.timer5').countTo();
    $('.timer6').countTo();
    $('.timer7').countTo();
    $('.timer8').countTo();

</script>

</body>
</html>
