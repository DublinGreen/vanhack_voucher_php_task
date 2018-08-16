<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Main</li>
                <li <?php echo($pageTitle === 'Dashboard' ? ' class="active" ' :  ''); ?>><a href="<?php echo(base_url() . "index.php/welcome/index"); ?>"><i class="ti-home"></i> Dashboard </a></li>
                <li <?php echo($pageTitle === 'Manage Recipient' ? ' class="active" ' :  ''); ?>><a href="<?php echo(base_url() . "index.php/welcome/manageRecipients"); ?>"><i class="ti-user"></i> Voucher Recipients</a></li>
				<li <?php echo($pageTitle === 'Manage Special Offers' ? ' class="active" ' :  ''); ?>><a href="<?php echo(base_url() . "index.php/welcome/manageOffers/"); ?>"><i class="ti-heart"></i> Special Offers</a></li>	
				<li <?php echo($pageTitle === 'Manage Voucher' ? ' class="active" ' :  ''); ?>><a href="<?php echo(base_url() . "index.php/welcome/manageVoucher"); ?>"><i class="ti-ticket"></i> Vouchers</a></li>	
				<li <?php echo($pageTitle === 'Service Key' ? ' class="active" ' :  ''); ?>><a href="<?php echo(base_url() . "index.php/welcome/manageServiceKey"); ?>"><i class="ti-exchange-vertical"></i> <span>Service Key</span></a></li>
				<li <?php echo($pageTitle === 'Help' ? ' class="active" ' :  ''); ?>><a href="<?php echo(base_url() . "index.php/welcome/help"); ?>"><i class="ti-help-alt"></i> <span>Help</span></a></li>
            </ul>
           
        </div>
    </div>
</div><!-- /# sidebar -->

