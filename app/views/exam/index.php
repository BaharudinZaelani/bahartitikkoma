<div class="container card">
	<div class="card-body">
		<div>
			<h1 class="display-6">Example Data From Database!</h1>
			<i>Akulirik Database</i>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>id Thumbnail</th>
					<th>description</th>
					<th>View</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['posts'] as $row): ?>
					<tr>
						<td><?= $row['id'] ?></td>
						<td><?= $row['judulLagu'] ?></td>
						<td><?= $row['thumb_id'] ?></td>
						<td><?= $row['description'] ?></td>
						<td><?= $row['view'] ?></td>
						<td><a href="exam/show/<?= $row['thumb_id']; ?>">View As SSSS</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>