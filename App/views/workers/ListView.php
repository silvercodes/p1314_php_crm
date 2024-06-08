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
            <button class="btn btn-primary" id="btn_create_worker">
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
                <tbody id="tbl_body_workers">
                    <?php foreach($workers as $worker): ?>
                        <tr data-worker-id="<?= $worker->id ?>">
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
                                <button class="btn btn-warning btn-sm" data-action="edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-action="delete">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--    modal worker-->
    <div class="modal" tabindex="-1" id="mdl_create_worker">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create a new worker</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First name</label>
                        <input name="first_name" type="text" class="form-control" id="first_name">
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name</label>
                        <input name="last_name" type="text" class="form-control" id="last_name">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="phone" type="text" class="form-control" id="phone">
                    </div>

                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input name="salary" type="number" class="form-control" id="salary">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Active</label>
                        <input name="status" type="checkbox" class="form-check-input" id="status">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_save_worker">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--    toast-->
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast" id="created_toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">SUCCESS</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Worker created successfully
            </div>
        </div>
    </div>


</div>

<script src="js/workers.js"></script>