<title>users sign_up</title>
<div class="users_sign_up" align="center">
    <?php echo validation_errors();?>
    <?php echo form_open('users/sign_up'); ?>
        <div class="row" >
            <div class="col-md-4 col-md-offset-4">
                <h1 class="text-center" style="color:skyblue;"><?= $title;?></h1> 
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">

                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </form>
</div>