<title>Admin Sign_up</title>
<?php echo validation_errors();?>
    <?php echo form_open('admin/sign_up'); ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1 class="text-center"><?= $title;?></h1> 
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign_up</button>
            </div>
        </div>
</form>
