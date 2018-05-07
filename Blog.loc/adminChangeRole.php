<?php require_once 'adminHeader.php'; ?>
<?php
if (isset($_GET['changeID']) && !empty($_GET['changeID'])) {
    changeRole($_GET);
    unset($_GET['changeID']);
    unset($_GET['flag']);
    header('Location: /adminChangeRole.php');
    exit();
}
?>

<div class="content-wrapper">
    <div class="container-fluid">


        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-users"></i> All Users
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
                        <?php if (getAllUsers()): ?>
                            <?php foreach (getAllUsers() as $user): ?>
                                <tr>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['last_name']; ?></td>
                                    <td><?= $user['login']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['role']; ?></td>
                                    <?php if ($user['role'] == 'user'): ?>
                                        <td><a href="adminChangeRole.php?changeID=<?= $user['id'];?>&flag=admin">Change to Admin</a>
                                        </td>
                                    <?php else: ?>
                                        <td><a href="adminChangeRole.php?changeID=<?= $user['id'];?>&flag=user">Change to User</a>
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
</div>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php require_once 'adminFooter.php'; ?>
