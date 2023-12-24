<?php
include "proses/connect.php";
$query = "SELECT * FROM kategori_menu";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jenis_poli= $_POST['jenis_menu'] ?? '';
  $ = $_POST['tb_kategori_menu'] ?? '';
  $sql = "INSERT INTO Pasien (jenis_poli, kategori) VALUES ('$jenis_menu', '$kategori')";

  if (mysqli_query($conn, $sql)) {
    echo "Data kategori menu berhasil ditambahkan";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="col-lg-9 mt-2 ">
  <div class="card">
    <div class="card-header">
      Halaman Kategori Menu
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Kategori
            Menu</button>
        </div>
      </div>
      <!-- Modal tambah kategori po baru-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_order.php" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Poli"
                        name="jenis_poli" required>
                      <label for="floatingInput">Jenis Poli</label>
                      <div class="invalid-feedback">
                        Masukkan Jenis Menu.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="kategori" required>
                        <option selected hidden value="">Premium</option>
                        <option value="Kontrol">Gold</option>
                        <option value="Rujukan">Silver</option>
                        <option value="Rawat Inap">Bronze</option>
                      </select>
                      <label for="floatingInput">Pilih Kategori</label>
                      <div class="invalid-feedback">
                        Pilih Jenis Kategori.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Modal Tambah kategori poli-->
      <?php
      if (empty($result)) {
        echo "Data Kategori menu tidak ada";
      } else {
        foreach ($result as $row) {
          ?>
          <!-- Modal view-->
          <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Menu</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="jenis_poli"
                            value="<?php echo $row['jenis_poli'] ?>">
                          <label for="jenis_poli">Jenis Menu</label>
                          <div class="invalid-feedback">
                            Masukkan Jenis Menu.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="kategori"
                            value="<?php echo $row['kategori'] ?>">
                          <label for="kategori">Kategori</label>
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

          <!-- Modal edit-->
          <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Menu</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_order.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="jenis_poli" placeholder="Jenis Poli" name="jenis_poli"
                            required value="<?php echo $row['jenis_poli'] ?>">
                          <label for="jenis_poli">Jenis Menu</label>
                          <div class="invalid-feedback">
                            Masukkan Jenis Menu.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="kategori" placeholder="Kategori" name="kategori"
                            required value="<?php echo $row['kategori'] ?>">
                          <label for="kategori">Kategori</label>
                          <div class="invalid-feedback">
                            Masukkan Kategori.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary" name="edit_poli" value="<?php echo $row['id'] ?>">
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- end modal edit -->

          <!-- Modal delete-->
          <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Menu</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="col-lg-12">
                      Apakah Anda yakin ingin menghapus menu <b>
                        <?php echo isset($row['jenis_poli']) ? $row['jenis_poli'] : ''; ?>
                      </b>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-danger" name="delete_poli" value="<?php echo $row['id'] ?>">
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
                <th scope="col">Jenis Menu</th>
                <th scope="col">Kategori</th>
              </tr>
            </thead>
            <tbody>

              <?php
              if ($result) {
                $no = 1;
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <th scope="row">
                      <?php echo $no++ ?>
                    </th>
                    <td>
                      <?php echo $row['jenis_menu'] ?>
                    </td>
                    <td>
                      <?php echo $row['kategori'] ?>
                    </td>
                    <td>
                      <!-- Tombol aksi untuk setiap baris -->
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