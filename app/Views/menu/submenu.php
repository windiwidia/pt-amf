<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg">
            <?php if ($validation->getError('')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError(''); ?>
                </div>
            <?php } ?>
            <?= session()->getFlashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewSubMenuModal">Add New Submenu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title_menu']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><i class="<?= $sm['icon']; ?>"></i></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <a href="" class="badge badge-pill badge-success">Edit</a>

                                <a href="/menu/deletesubmenu/<?= $sm['id']; ?>" class="badge badge-pill badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal -->

<div class="modal fade" id="NewSubMenuModal" tabindex="-1" aria-labelledby="NewSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/menu/submenuAdd" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('title_menu')) ? 'is-invalid' : ''; ?>" id="title_menu" name="title_menu" placeholder="Submenu title">
                        <div class="invalid-feedback ml-3">
                            <?= $validation->getError('title_menu'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control <?= ($validation->hasError('menu')) ? 'is-invalid' : ''; ?>">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback ml-3">
                            <?= $validation->getError('menu_id'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('url')) ? 'is-invalid' : ''; ?>" id="url" name="url" placeholder="Submenu url">
                        <div class="invalid-feedback ml-3">
                            <?= $validation->getError('url'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control <?= ($validation->hasError('icon')) ? 'is-invalid' : ''; ?>" id="icon" name="icon" placeholder="Submenu icon">
                        <div class="invalid-feedback ml-3">
                            <?= $validation->getError('icon'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>