<title>Admin_login</title>
<?php echo form_open('admin/login'); ?>
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4">
                <h1 class="text-center"><?php echo $title; ?></h1>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    <?php echo form_close(); ?>