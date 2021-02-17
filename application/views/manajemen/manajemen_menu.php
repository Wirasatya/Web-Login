<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $nama_menu; ?></h1>


</div>
<div class="row ml-3">
    <div class="col-lg-6">
        <?= validation_errors(); ?>
        <?php echo $this->session->flashdata('message');; ?>
        <a href="" class="btn  btn-primary mb-3 " data-toggle="modal" data-target="#newMenuModal"> Tambah menu baru</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftar_menu as $dm) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $dm['NAMA_MENU']; ?></td>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('manajemen'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="menubaru" id="menubaru" placeholder="nama menu">
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