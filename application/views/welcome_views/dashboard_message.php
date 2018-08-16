    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <!--<h1>Dashboard</h1>-->
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo(base_url() . "office/"); ?>">Dashboard</a></li>
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
										<h4><?php echo(ucwords($appName)); ?> Summary</h4>
									</div>
									<div class="sales-chart">
																				  
										<div class="col-lg-3">
											<div class="card bg-success">
												<div class="stat-widget-six">
													<div class="stat-icon p-15">
														<i class="ti-user"></i>
													</div>
													<div class="stat-content p-t-12 p-b-12" style="padding-left: 10%;">
														<div class="text-left dib">
															<div class="stat-heading"> Recipients</div>
															<div class="stat-text text-center"><strong style="font-size: 5em;"> <?php echo($totalRecipients); ?></strong></div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-3">
											<div class="card bg-primary">
												<div class="stat-widget-six">
													<div class="stat-icon p-15">
														<i class="ti-heart"></i>
													</div>
													<div class="stat-content p-t-12 p-b-12" style="padding-left: 10%;">
														<div class="text-left dib">
															<div class="stat-heading">Offers</div>
															<div class="stat-text text-center"><strong style="font-size: 5em;"> <?php echo($totalOffers); ?></strong></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-lg-3">
											<div class="card bg-danger">
												<div class="stat-widget-six">
													<div class="stat-icon p-15">
														<i class="ti-ticket"></i>
													</div>
													<div class="stat-content p-t-12 p-b-12" style="padding-left: 10%;">
														<div class="text-left dib">
															<div class="stat-heading">Vouchers</div>
															<div class="stat-text text-center"><strong style="font-size: 5em;"> <?php echo($totalVouchers); ?></strong></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-lg-3">
											<div class="card bg-info">
												<div class="stat-widget-six">
													<div class="stat-icon p-15">
														<i class="ti-exchange-vertical"></i>
													</div>
													<div class="stat-content p-t-12 p-b-12" style="padding-left: 10%;">
														<div class="text-left dib">
															<div class="stat-heading">Keys</div>
															<div class="stat-text text-center"><strong style="font-size: 5em;"> <?php echo($totalServiceKeys); ?></strong></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									   
									   <div class="clearfix"></div>
									   
									</div>
								</div>
						</div>
					</div>
					
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
                                <div class="card-body">
                                    <h4>Used Vouchers</h4><br>

                                    <?php
                                    if (empty($recentlyUsedVouchers)) {
                                        ?>
                                        <div class = "alert alert-info alert-dismissible" role = "alert">
                                            <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true">&times;
                                                </span></button>
                                            <p class = "text-muted">No voucher has been used.</p>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <table class="table table-responsive table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Offer ID</th>
                                                    <th>Recipient ID</th>
                                                    <th>Voucher Code</th>
                                                    <th>Time Used</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                foreach ($recentlyUsedVouchers as $voucher) {
                                                    ?>
                                                    <tr>
                                                        <td class="color-success"><?php echo($voucher->status); ?></td>
                                                        <td><?php echo($voucher->offer); ?></td>
                                                        <td><?php echo($voucher->recipient); ?></td>
                                                        <td><?php echo($voucher->voucher); ?></td>
                                                        <td><?php echo($voucher->time_used); ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    ?>
                                    <hr><br>
                                </div>
                            </div>
                        </div><!-- /# column -->
                    </div><!-- /# row -->
                    
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
                                <div class="card-body">
                                    <h4>Unused Vouchers</h4><br>

                                    <?php
                                    if (empty($recentlyUnusedVouchers)) {
                                        ?>
                                        <div class = "alert alert-info alert-dismissible" role = "alert">
                                            <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close"><span aria-hidden = "true">&times;
                                                </span></button>
                                            <p class = "text-muted">All vouchers has been used.</p>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <table class="table table-responsive table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Offer ID</th>
                                                    <th>Recipient ID</th>
                                                    <th>Voucher Code</th>
                                                    <th>Time Added</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                foreach ($recentlyUnusedVouchers as $voucher) {
                                                    ?>
                                                    <tr>
                                                        <td class="color-warning"><?php echo($voucher->status); ?></td>
                                                        <td><?php echo($voucher->offer); ?></td>
                                                        <td><?php echo($voucher->recipient); ?></td>
                                                        <td><?php echo($voucher->voucher); ?></td>
                                                        <td><?php echo($voucher->time_added); ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    ?>
                                    <hr><br>
                                </div>
                            </div>
                        </div><!-- /# column -->
                    </div><!-- /# row -->
                </div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div><!-- /# content wrap -->
