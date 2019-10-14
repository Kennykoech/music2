<title>Admin search song</title>
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
            <h3>List of Searched Song</h3>
                <?php if($songs): ?>
                    <?php foreach($songs as $val): ?>
                <tr class="">
                    <td><?php echo $val->id ?></td>
                    <td><?php echo $val->artist ?></td>
                    <td><?php echo $val->song ?></td>
                    <td><?php echo $val->type ?></td>
                    <td><?php echo $val->song_url ?></td>
                    <td><?php echo $val->created_at ?></td>
                <td>
                    <?php echo anchor("admin/view/{$val->id}", 'View Song', ['class' => 'btn btn-primary']);?>
                    <?php echo anchor("admin/update/{$val->id}", 'Update Song', ['class' => 'btn btn-success']);?>
                    <?php echo anchor("admin/delete/{$val->id}", 'Delete Song', ['class' => 'btn btn-danger']);?>
                </td>
                </tr>
                <?php endforeach; ?>
                <?php else:?>
                <tr>
                    <td>No Song Found!</td>
                </tr>
                <?php endif; ?>
            </tbody>
            </table> 
        </div>