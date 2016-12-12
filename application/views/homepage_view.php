    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-university  fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><span class="timer1" data-from="0" data-to="{totalMoney}"></span>
                            </div>
                            <div>Bakery Funds (cent)</div>
                        </div>
                    </div>
                </div>
                <a href="/Welcome/resetFunds">
                    <div class="panel-footer">
                        <span class="pull-left">Reset Funds</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><span class="timer2" data-from="0" data-to="{totalSales}"></span>
                            </div>
                            <div>Total Sales (cent)</div>
                        </div>
                    </div>
                </div>
                <a href="/Sales">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-eyedropper fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><span class="timer3" data-from="0" data-to="{totalIngredientsConsumed}"></span>
                            </div>
                            <div>Ingredients Consumed (cent)</div>
                        </div>
                    </div>
                </div>
                <a href="/Sales">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-balance-scale fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><span class="timer4" data-from="0" data-to="{totalReceiving}"></span>
                            </div>
                            <div>Spent on Supplies (cent)</div>
                        </div>
                    </div>
                </div>
                <a href="/Welcome/resetPurchases">
                    <div class="panel-footer">
                        <span class="pull-left">Reset Purchases</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Receiving Logs Dump (from data/buy-logs.txt) </h3>
        </div>
        <div class="panel-body">
            {transactionLogs}
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Sales Log Dump (from data/orders_) </h3>
        </div>
        <div class="panel-body">
            {Orders}
            Reciept # <a href="/Sales/examine/{number}">{number}</a>, total of ${total} in sales - {datetime}
            <br><br>
            {/Orders}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-coffee fa-fw"></i> Use Cases
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge primary"><i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Admin</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Allows editing of data-tables {Admin}</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Production</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Displays all the recipes {Admin, User}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge success"><i class="fa fa-key"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Receiving</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Displays list of items in pantry, allowing to order more. {Admin, User}</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Sales</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Displays items available for order for point of sale {Admin, User, Guest}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
    </div>
    <!-- /.row -->



