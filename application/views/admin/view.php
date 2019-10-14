<title>Admin View Song</title>
<div class="container">
    <h2>Update Song</h2>
    <h4><?php echo $song->song;?></h4><br>
    <h4><?php echo $song->type;?></h4>
    <p> <?php echo anchor('admin', 'Back', ['class' => 'btn btn-primary']);?></p>
</div>