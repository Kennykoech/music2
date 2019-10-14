    <title>Admin add product</title>
    <div class="container"> 
        <?php echo form_open_multipart('admin/save', ['class' => 'form-horizontal']); ?>
            <h2><?php echo $title;?></h2>
            <?php if($msg = $this->session->flashdata('msg')):?>
            <?php echo $msg;?>
            <?php endif;?>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="col-md-2 control-label">Artist_cover</label><br>
                        <input type="file" name="cover_file" size="20"><br>
                    <label for="exampleInputEmail1" class="col-md-2 control-label">Artist</label>
                        <?php echo form_input(['name' => 'artist', 'placeholder' => ' Enter artist', 'class' => 'form-control']);?>                   
                    <label for="exampleInputEmail1" class="col-md-2 control-label">Song</label>
                        <?php echo form_input(['name' => 'song', 'placeholder' => ' Enter song', 'class' => 'form-control']);?>                   
                    <label for="exampleInputEmail1" class="col-md-2 control-label">File</label><br>
                        <input type="file" name="userfile" size="20"><br>               
                        <?php echo form_error('song', '<div class="text-danger">','</div>');?>       
                        <label for="exampleInputPassword1" class="col-md-2 control-label">Type</label>
                        <?php echo form_input(['name' => 'type', 'placeholder' => ' Enter type', 'class' => 'form-control']);?>               
                    <?php echo form_error('type', '<div class="text-danger">','</div>');?>
                    
                    </fieldset>
                    <?php echo form_submit(['name' => 'submit', 'value' => 'Add +', 'class' => 'btn btn-primary']);?>
                    <?php echo anchor('admin', 'Back', ['class' => 'btn btn-primary']);?>
                </div>
        </fieldset>
        <?php echo form_close();?> 
    </div>

