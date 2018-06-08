<div class="content-wrapper">
	<div class="container-fluid">


		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-users"></i> <?= Model::getCountTable('users'); ?> Users
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>Name</th>
							<th>Last Name</th>
							<th>Login</th>
							<th>Email</th>
							<th>Role</th>
							<th>Change Role</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							<th>Name</th>
							<th>Last Name</th>
							<th>Login</th>
							<th>Email</th>
							<th>Role</th>
							<th>Change Role</th>
						</tr>
						</tfoot>
						<tbody>
						<?php if ($data): ?>
							<?php foreach ($data as $dat): ?>
								<tr>
									<td><?= $dat->name; ?></td>
									<td><?= $dat->last_name; ?></td>
									<td><?= $dat->login; ?></td>
									<td><?= $dat->email; ?></td>
									<td><?= $dat->role; ?></td>
									<?php if ($dat->role == 'user'): ?>
										<td><a href="/admin/role?<?= $dat->id; ?>?admin">Change to Admin</a>
										</td>
									<?php else: ?>
										<td><a href="/admin/role?<?= $dat->id; ?>?user">Change to User</a>
										</td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<p>Users not found!</p>
						<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
</div>