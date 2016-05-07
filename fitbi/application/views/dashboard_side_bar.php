<?php $userid = $_SESSION['userid']; ?>
<div class="row">
    <div class="col-md-2 col-padding-zero">
        <div class="list-group list-width">
            <?php if($userid==1||$userid==2){ ?>
                <a class="list-group-item admin-list" href="<?php echo site_url('admin/get_posts'); ?>">Articles<span id="forarticles" class="badge"></span></a>
            <?php } 
                else if($userid !=1 || $userid!=2){ ?>
                <a class="list-group-item admin-list" href="<?php echo site_url('admin/get_posts/'.$userid); ?>">Articles<span id="forarticles" class="badge"></span></a>
            <?php } ?> 
            <a class="list-group-item admin-list" href="<?php echo site_url('admin/get_users'); ?>">Users<span id="forusers" class="badge"></span></a>
            <a class="list-group-item admin-list" href="<?php echo site_url('admin/get_media'); ?>">Media<span id="formedia" class="badge"></span></a>
            <a class="list-group-item admin-list" href="<?php echo site_url('admin/get_comments'); ?>">Comments<span id="forcomments" class="badge"></span></a>
        </div>
    </div>

            