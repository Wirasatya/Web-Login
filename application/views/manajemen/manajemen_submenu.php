<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $nama_menu; ?></h1>


</div>
<div class="row ml-3">
    <div class="col-lg">
        <?= validation_errors(); ?>
        <?php echo $this->session->flashdata('message');; ?>
        <a href="" class="btn  btn-primary mb-3 " data-toggle="modal" data-target="#newSubmenuModal"> Tambah submenu baru</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Submenu</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Is_active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftar_submenu as $dsm) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $dsm['NAMA_SUBMENU']; ?></td>
                        <td><?= $dsm['NAMA_MENU']; ?></td>
                        <td><?= $dsm['URL']; ?></td>
                        <td><?= $dsm['ICON']; ?></td>
                        <td><?= $dsm['IS_ACTIVE']; ?></td>
                        <td>
                            <a href="#" class="badge badge-success">edit</a>
                            <a href="#" class="badge badge-danger">hapus</a>
                        </td>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('manajemensubmenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="submenubaru" id="submenubaru" placeholder="nama menu">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">menu id?</label>
                        <select class="form-control" id="idmenu" name="idmenu">
                            <option>pilih menu</option>
                            <?php foreach ($daftar_menu as $dm) : ?>
                                <option value="<?php echo $dm['ID_MENU'] ?>"><?php echo $dm['NAMA_MENU'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="urlsubmenubaru" id="urlsubmenubaru" placeholder="url submenu">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="iconsubmenubaru" id="iconsubmenubaru" placeholder="icon submenu">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="isactive" name="isactive" checked>
                            <label class="form-check-label" for="isactive">
                                active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">add</button>
                </div>
            </form>
        </div>
    </div>
</div>