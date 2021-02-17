<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $nama_menu; ?></h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="..." class="card-img" alt=".">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $tb_users['NAME']; ?></h5>
                    <p class="card-text"><?= $tb_users['EMAIL']; ?></p>
                    <p class="card-text"><?= $tb_users['NO_TELP']; ?></p>
                    <p class="card-text"><?= $tb_users['ALAMAT']; ?></p>
                    <p class="card-text">menjadi member mulai <?= date('d F Y', $tb_users['CREATED']); ?></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->