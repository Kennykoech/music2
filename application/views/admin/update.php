<title>Admin Update Song</title>
<div class="container"> 
    <?php echo form_open("admin/change/{$song->id}", ['class' => 'form-horizontal']); ?>
        <h2>Update Song</h2>
        <!-- <h2><?php echo $title;?></h2> -->
        <?php if($msg = $this->session->flashdata('msg')):?>
           <?php echo $msg;?>
        <?php endif;?>
        <fieldset>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-md-2 control-label">Song</label>
                <?php echo form_input(['name' => 'song', 'placeholder' => ' Enter song', 'class' => 'form-control', 'value' => set_value('songs', $song->song)]);?>
            </div>
            <div class="form-group">
                <?php echo form_error('song', '<div class="text-danger">','</div>');?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="col-md-2 control-label">Type</label>
                <?php echo form_input(['name' => 'type', 'placeholder' => ' Enter type', 'class' => 'form-control', 'value' => set_value('type', $song->type)]);?>
            </div>
            <div class="form-group">
            <?php echo form_error('type', '<div class="text-danger">','</div>');?>
            </div>
            </fieldset>
            <?php echo form_submit(['name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary']);?>
            <?php echo anchor('admin', 'Back', ['class' => 'btn btn-primary']);?>
        </fieldset>
    <?php echo form_close();?>
 
</div>
