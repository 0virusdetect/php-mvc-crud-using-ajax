<div class="row">
<?php if (empty($data)): ?>
<tr>
<td colspan="4">No data found</td>
</tr>
<?php else: ?>
<?php foreach ($data as $row): ?>
<div class="col-4">
<p><span><?php echo $row['name'];?></span></p>
<p><span><?php echo $row['email'];?></span></p>
<p><span><?php echo $row['mobile_number'];?></span></p>
<button onclick='deleteUser(<?php echo $row["id"]; ?>, this.parentNode)'>Delete</button>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>