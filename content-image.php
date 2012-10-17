<?php

// Get the post ID
    $iPostID = $post->ID;

the_content();
    
if($images =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID )){
   foreach($images as $id => $attachment ){
          
        $meta = wp_get_attachment_metadata($id);   
?>

<table class="table">      
	<tbody>
		<tr>
			<th>Credit:</th>
			<td><?php echo $meta['image_meta']['credit'];?></td>
		</tr>
		<tr>
			<th>Camera:</th>
			<td><?php echo $meta['image_meta']['camera'];?></td>
		</tr>
		<tr>
			<th>Focal length:</th>
			<td><?php echo $meta['image_meta']['focal_length'];?></td>
		</tr>
		<tr>
			<th>Aperture:</th>
			<td><?php echo $meta['image_meta']['aperture'];?></td>
		</tr>
		<tr>
			<th>ISO:</th>
			<td><?php echo $meta['image_meta']['iso'];?></td>
		</tr>
		<tr>
			<th>Shutter speed:</th>
			<td><?php echo '1/' . 1/$meta['image_meta']['shutter_speed'] . ' s';?></td>
		</tr>
		<tr>
			<th>Time Stamp:</th>
			<td><?php echo date( 'd-m-Y H:i:s', $meta['image_meta']['created_timestamp'] );?></td>
		</tr>
		<tr>
			<th>Copyright:</th>
			<td><?php echo $meta['image_meta']['copyright'];?></td>
		</tr>
	</tbody>
</table>


<?php

   }
}
