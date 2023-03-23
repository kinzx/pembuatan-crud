<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lowongan | <?= $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="<?= base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url('dashboard')?>">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= base_url('dashboard')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="<?= base_url('siswa')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-back-alt"></i></div>
                                Informasi Loker
                            </a>
                        </div>  
                    </div>
                    
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $title ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> <a href="<?= base_url('dashboard')?>">Home</a>  / <?= $title ?></li>
                        </ol>
                        

                        <?= $this->session->flashdata('pesan')?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="<?= base_url('siswa/tambah')?> " class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah table</a>
                                <a href="<?= base_url('siswa/print')?> " class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print</a>
                            </div>
                            <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pekerjaan</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Gaji</th>
                                    </tr>
                                </thead>

                                <?php $no = 1 ;
                                foreach($siswa as $ssw) :  ?>

                                <tbody>
                                    <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $ssw->nama_pekerjaan ?></td>
                                    <td><?= $ssw->deskripsi ?></td>
                                    <td><?= $ssw->lokasi ?></td>
                                    <td><?= $ssw->gaji ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit<?= $ssw->id_pekerjaan ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <a href="<?= base_url('siswa/delete/' . $ssw->id_pekerjaan)?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i></a>
                                    </td>
                                    </tr>
                                </tbody>

                                <?php endforeach ?>

                                </table>

                        </div>
                    </div>

                        <!-- Modal Edit -->
                        <?php foreach($siswa as $ssw) : ?>
                            
                        <div class="modal fade" id="edit<?= $ssw->id_pekerjaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Lowongan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('siswa/edit/' . $ssw->id_pekerjaan)?>" method="POST" class="container-fluid px-4">

                                    <div class="form-group">
                                        <label> Nama Pekerjaan</label>
                                        <input type="text" name="nama_pekerjaan" class="form-control" value="<?= $ssw->nama_pekerjaan ?>">
                                        <?= form_error('nama_pekerjaan', '<div class="text-small text-danger">', '</div>') ;?>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control" value="<?= $ssw->deskripsi ?>">
                                        <?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>') ;?>
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" value="<?= $ssw->lokasi ?>">
                                        <?= form_error('lokasi', '<div class="text-small text-danger">', '</div>');?>
                                    </div>
                                    <div class="form-group">
                                        <label>Gaji</label>
                                        <input type="text" name="gaji" class="form-control" value="<?= $ssw->gaji ?>">
                                        <?= form_error('gaji', '<div class="text-small text-danger">', '</div>');?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
                                    </div>
                            </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php endforeach ?>


                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
