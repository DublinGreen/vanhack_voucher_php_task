<div class="header">
    <div class="pull-left">
        <div class="logo"><a href="<?php echo(base_url()); ?>"><span><?php echo($appName); ?></span></a></div>
        <div class="hamburger sidebar-toggle">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>

    <div class="pull-right p-r-15">
        <ul>
            <li class="header-icon dib visible-lg visible-md">
            <li class="header-icon dib"><i class="ti-bell">
                    <?php
                    if (!empty($notification) && $notification > 1) {
                        echo('<span class="badge">' . count($notification) . '</span>');
                    }
                    ?>
                </i>
                <div class="drop-down">
                    <div class="dropdown-content-heading">
                        <span class="text-left">Recent Notifications</span>
                    </div>
                    <div class="dropdown-content-body">
                        <ul>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
