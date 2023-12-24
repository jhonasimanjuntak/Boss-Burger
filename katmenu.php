<?php
include "proses/connect.php";

$query = "SELECT * FROM kategori_menu"; 
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_pelanggan = $_POST['nama_pelanggan'] ?? ''; 
  $jenis_menu = $_POST['jenis_menu'] ?? ''; 
  $kategori = $_POST['kategori'] ?? ''; 

  $sql = "INSERT INTO kategori_menu (nama_pelanggan, jenis_menu, kategori) VALUES ('$nama_pelanggan', '$jenis_menu', '$kategori')";

  if (mysqli_query($conn, $sql)) {
    echo "Data menu berhasil ditambahkan";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
  }
}
?>

<div class="col-lg-9 mt-2 ">
  <div class="card">
    <div class="card-header">
      Halaman Menu
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah
            Menu</button>
        </div>
      </div>
      <!-- Modal menambah menu baru-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_katmenu.php" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="nama_dokter" placeholder="nama_dokter"
                        name="nama_menu" required>
                      <label for="nama_pelanggan">Nama Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Nama Pelanggan.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="jenis_menu" placeholder="jenis_menu" name="jenis_menu"
                        required>
                      <label for="jenis_menu">Jenis Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Jenis Menu
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="kategori" required>
                        <option selected hidden value="">Kategori</option>
                        <option value="Premium">Premium</option>
                        <option value="Gold">Gold</option>
                        <option value="Silver">Silver</option>
                        <option value="Bronze">Bronze</option>
                      </select>
                      <label for="kategori">Pilih Kategori</label>
                      <div class="invalid-feedback">
                        Pilih Jenis Kategori.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_poli_validate" value="12345">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Modal Tambah pasien-->
      <?php
      if (empty($result)) {
        echo "Data menu tidak ada";
      } else {
        foreach ($result as $row) {
          ?>

          <!-- Modal view-->
          <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pelanggan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="nama_pelanggan"
                            value="<?php echo $row['nama_pelanggan'] ?>">
                          <label for="nama_pelanggan">Nama Pelanggan</label>
                          <div class="invalid-feedback">
                            Masukkan Nama Pelanggan.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="jenis_menu"
                            value="<?php echo $row['jenis_poli'] ?>">
                          <label for="jenis_poli">Jenis Menu</label>
                          <div class="invalid-feedback">
                            Masukkan Jenis Menu.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="kategori"
                            value="<?php echo $row['kategori'] ?>">
                          <label for="kategori">Kategori</label>
                          <div class="invalid-feedback">
                            Pilih Kategori.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal view -->

          <!-- Modal edit -->
          <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pasien</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_poli.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="nama_pelanggan" placeholder="Nama Pelanggan"
                            name="nama_dokter" required value="<?php echo $row['nama_dokter'] ?>">
                          <label for="nama_dokter">Nama Pelanggan</label>
                          <div class="invalid-feedback">
                            Masukkan Nama Pelanggan.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="jenis_poli" placeholder="Jenis Menu" name="jenis_menu"
                            required value="<?php echo $row['jenis_poli'] ?>">
                          <label for="jenis_poli">Jenis Menu</label>
                          <div class="invalid-feedback">
                            Masukkan Jenis Menu.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <select class="form-select" aria-label="Default select example" name="kategori" required>
                            <option selected hidden value="">Pilih Kategori</option>
                            <option value="Kontrol" <?php if ($row['premium'] === 'Premium')
                              echo 'selected'; ?>>
                              Premium
                            </option>
                            <option value="Rujukan" <?php if ($row['gold'] === 'Gold')
                              echo 'selected'; ?>>
                              Gold
                            </option>
                            <option value="Rawat Inap" <?php if ($row['silver'] === 'Silver')
                              echo 'selected'; ?>>
                              Silver
                            </option>
                            <option value="Pengobatan" <?php if ($row['bronze'] === 'Bronze')
                              echo 'selected'; ?>>
                              Bronze
                            </option>
                          </select>
                          <label for="kategori">Kategori</label>
                          <div class="invalid-feedback">
                            Pilih Kategori.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary" name="edit_pasien" value="<?php echo $row['id'] ?>">
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- end modal edit -->

          <!-- Modal delete -->
          <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Menu</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_poli.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="col-lg-12">
                      Apakah Anda yakin ingin menghapus data menu? <b>
                        <?php echo $row['nama_pelanggan'] ?>
                      </b>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-danger" name="input_user_validate"
                        value="<?php echo $row['id'] ?>">
                        Hapus
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal delete -->

          <?php
        }
        ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Jenis Menu</th>
                <th scope="col">Kategori</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($result as $row) {
                ?>
                <tr>
                  <th scope="row">
                    <?php echo $no++ ?>
                  </th>
                  <td>
                    <?php echo $row['nama_pelanggan'] ?>
                  </td>
                  <td>
                    <?php echo $row['jenis_menu'] ?>
                  </td>
                  <td>
                    <?php echo $row['kategori'] ?>
                  </td>
                  <td>
                    <div class="d-flex">
                      <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                      <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
                    </div>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>

        <?php
      }
      ?>
    </div>
  </div>
</div>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>