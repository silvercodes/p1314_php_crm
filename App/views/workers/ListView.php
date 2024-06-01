<?php
    use App\Models\Worker;
?>

<div class="container mt-4">

    <!--    header-->
    <div class="row">
        <h1 class="display-4">Workers</h1>
    </div>

    <!--    common buttons-->
    <div class="row justify-content-center text-end">
        <div class="col-md-10">
            <button class="btn btn-primary">
                Create new
            </button>
        </div>
    </div>

    <!--    table-->
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>
                            <a href="/workers?order=first_name&dir=<?php if ($dir === 'asc') echo 'desc'; else echo 'asc'; ?>">First name</a>
                        </td>
                        <td>
                            <a href="/workers?order=last_name&dir=<?php if ($dir === 'asc') echo 'desc'; else echo 'asc'; ?>">Last name</a>
                        </td>
                        <td>Phone</td>
                        <td>Status</td>
                        <td>Salary</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($workers as $worker): ?>
                        <tr>
                            <td><?= $worker->first_name ?></td>
                            <td><?= $worker->last_name ?></td>
                            <td><?= $worker->phone ?></td>
                            <td>
                                <?php if ($worker->status === Worker::WORKER_STATUS_ACTIVE): ?>
                                    <img src="img/green_led.png" alt="active status">
                                <?php else: ?>
                                    <img src="img/red_led.png" alt="inactive status">
                                <?php endif; ?>
                            </td>
                            <td><?= $worker->salary ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>