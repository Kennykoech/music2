<title>Home</title>
  </div>
</nav>
<div class="container">
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col" style="color:skyblue;">Artist</th>
        <th scope="col" style="color:skyblue;" >Song</th>
        <th scope="col" style="color:skyblue;">Type</th>
        <th scope="col" style="color:skyblue;">Download link</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($songs)): ?>
            <?php foreach($songs as $song): ?>
        <tr class="">
            <td style="color:lightseagreen;"><?php echo $song->artist ?></td>
            <td style="color:lightseagreen;"><?php echo $song->song ?></td>
            <td style="color:lightseagreen;"><?php echo $song->type ?></td>
        <td>
        <?php if($this->session->userdata('logged_in')) : ?>
            <a href="<?php echo $song->song_url ?>"><?php echo $song->song_url ?></a>
        <?php endif;?>
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
        <!-- <?php echo $pagination; ?> -->
</div>

 
