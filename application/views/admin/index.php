<!-- <script>
    load_data();

    $(document).ready(function(){
        function load_data(query){
            $.ajax({
                url:"<?php echo base_url(); ?>ajaxsearch/fetch",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#result').html(data);
                }
            })
        }

        $('#search_text').keyup(function(){

            var Search = $(this).val();
            if(Search != ''){
                load_data(Search);
            }else{
                load_data();
            }
        });
    });
</script> -->

<title>Admin Home</title>
<div class="container">
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Artist</th>
        <th scope="col">Song</th>
        <th scope="col">Type</th>
        <th scope="col">File</th>
        <th scope="col">Created_at</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
   
    <tbody>
            <h3>List of All Songs</h3>
        <?php if(count($songs)): ?>
            <?php foreach($songs as $song): ?>
        <tr class="">
            <td><?php echo $song->id ?></td>
            <!-- <td><?php echo $song->artist_cover ?></td> -->
            <td><?php echo $song->artist ?></td>
            <td><?php echo $song->song ?></td>
            <td><?php echo $song->type ?></td>
            <td><?php echo $song->song_url ?></td>
            <td><?php echo $song->created_at ?></td>
        <td>
            <?php echo anchor("admin/view/{$song->id}", 'View Song', ['class' => 'btn btn-primary']);?>
            <?php echo anchor("admin/update/{$song->id}", 'Update Song', ['class' => 'btn btn-success']);?>
            <?php echo anchor("admin/delete/{$song->id}", 'Delete Song', ['class' => 'btn btn-danger']);?>
        </td>
        </tr>
        <?php endforeach; ?>
        <?php else:?>
        <tr>
            <td>No Songs Found!</td>
        </tr>
        <?php endif; ?>
    </tbody>
    </table> 
</div>
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>