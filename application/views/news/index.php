<div style="text-align: center;">
	<h2><b><?php echo $title; ?></b></h2>
</div>
<div style="text-align: right;">
	<a  href="<?php echo base_url('News/create/') ?>"  class="btn btn-primary">Add News</a>
</div>
<br>
<div class="row">
	<table id="db_news" class="table table-striped">
			<thead> 
				<tr>
					<td>#</td>
					<td>Title</td>
					<td>Description</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody> 
				<?php $count = 1; ?>
				<?php foreach ($news as $news_item): ?>
					<tr>
					        <td><?php echo  $count++; ?></td>
					        <td><?php echo $news_item['title']; ?></td>
					        <td><?php echo $news_item['text']; ?></td>
					        <td>
						        	<a class="btn btn-default btn-sm" href="<?php echo base_url('news/'.$news_item['slug']); ?>">View</a>
						        	<a class="btn btn-warning btn-sm" href="<?php echo base_url('news/edit/'.$news_item['slug']); ?>">Edit</a>
					        </td>
				        </tr>
				<?php endforeach; ?>
			</tbody>	
	</table>	
	<script type="text/javascript"> 
        $(document).ready(function() { 
            $("#db_news").dataTable(); 
        }); 
    </script> 
</div>