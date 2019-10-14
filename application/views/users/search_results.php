<title>search_song</title>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>               
                <th scope="col">Artist</th>
                <th scope="col">Song</th>
                <th scope="col">Type</th>
                <th scope="col">File</th>
            </tr>
        </thead>          
        <tbody>
            <h3>Searched Song</h3>
                <?php if($songs): ?>
                    <?php foreach($songs as $val): ?>
                <tr class="">           
                    <td><?php echo $val->artist ?></td>
                    <td><?php echo $val->song ?></td>
                    <td><?php echo $val->type ?></td>
                    <td><a href="<?php echo $val->song_url ?>"><?php echo $val->song_url ?></a></td>
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