    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Help</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo(base_url() . "index.php/welcome/index/"); ?>">Dashboard</a></li>
                                    <li class="active"><a href="<?php echo(base_url() . "index.php/welcome/help/"); ?>">Help</a></li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body"><br>
                                    <p>Email Support : <?php echo($this->config->item('email3')); ?></p>
                                    <hr>
                                    <p>If you have any problems with the system, please send an email.</p>
                                    
                                    <hr>
                                    
                                    <code>
										All service calls are implemented from the Service controller.<br>
										For purpose of documentation the base_url = 'http://localhost/DEV/vanhack_voucher/index.php'
										<hr>
										Methods in the Service Controller
										createVoucher();
										createServiceKey();
										createVoucher();
										useVoucher();
										<hr>
										All service calls need a service key. To create a service key call createServiceKey($phrase).<br>
										Example  base_url/service/createServiceKey("keyPhrase")<br><br>
										 The $phrase variable will be the a unique phrase. Choose whatever phrase you like but all service keys must be unique. After a key has been created, add a user with that service key by clicking the service key link at the main side nav. Use the created service key as the key. Ensure user status is ACTIVE
										 <hr>
										 The next service call is createVoucher($serviceKey,$recipientID,$offerID,$offerDiscount). It requires all parameters. The offer discount is simply the discount for the offer. Did this just to make it harder to passby.<br>
										 Example base_url/service/createVoucher/a28c88c0766b3dacd49a30f51ea2be3a/2/2/10<br>
										 This will return the voucher code and create a new voucher for the recipient, for that offer.<hr>
										 From the web shop a service call will be made when a voucher is presented to checkVoucher($serviceKey,$voucherCode)<br>
										 Example base_url/service/checkVoucher/a28c88c0766b3dacd49a30f51ea2be3a/10JUL1532917584<br>
										 This return the voucher resultSet if the voucher code is valid. The voucher resultSet can then be used to process the cart and when payment is done and all.<br>
										 A call to useVoucher($serviceKey,$voucherCode,$recipientID,$offerID) is critical. This tags the voucher as used.<br>
										 Example base_url/service/useVoucher/a28c88c0766b3dacd49a30f51ea2be3a/10JUL1532917584/2/2<br><br>
										 
										 I really hope this simple documentation was useful. Thanks for your time and a blessed day. :)
                                    </code>
                                </div>
                            </div>
                        </div><!-- /# column -->
                    </div><!-- /# row -->
                </div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div><!-- /# content wrap -->
