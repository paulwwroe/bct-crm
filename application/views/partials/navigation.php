<div class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
    
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="navbar-default sidebar">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu" role="navigation">
                
                <li class="sidebar-search">
                    <div class="custom-search-form">
                        <input type="text" id="sidebar-search" class="form-control" placeholder="Search..." role="search" />
                    </div>
                </li>

                <li>
                    <ul id="sidebar-search-suggestions" class="nav"></ul>
                </li>

                <?php foreach ($this->config->item('main_menu')['items'] as $menu_item) : ?>
                
                <li>
                    <a href="<?php echo base_url($menu_item['url']); ?>">
                        <i class="fa <?php echo $menu_item['icon']; ?> fa-fw"></i> <?php echo $menu_item['title']; ?>
                    </a>
                </li>

                <?php endforeach; ?>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</div>