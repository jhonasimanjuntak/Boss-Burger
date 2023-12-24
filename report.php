<?php
include "proses/connect.php";

$query = "SELECT * FROM Pendaftaran";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'] ?? '';
  $nik = $_POST['nik'] ?? '';
  $jenis_poli = $_POST['jenis_poli'] ?? '';
  $kategori = $_POST['kategori'] ?? '';

  $sql = "INSERT INTO pendaftaran (nama, nik, jenis_poli, kategori) VALUES ('$nama', '$nik', '$jenis_poli', '$kategori')";

  if (mysqli_query($conn, $sql)) {
    echo "Data pendaftaran berhasil ditambahkan";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>

<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">
      Halaman Pendaftaran
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Daftar</button>
        </div>
      </div>
      <!-- Modal Daftar-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_daftar.php" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
                      <label for="nama">Nama</label>
                      <div class="invalid-feedback">
                        Masukkan Nama.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" required>
                      <label for="nik">NIK</label>
                      <div class="invalid-feedback">
                        Masukkan NIK.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="jenis_poli" placeholder="Jenis Poli" name="jenis_poli"
                        required>
                      <label for="jenis_poli">Jenis Poli</label>
                      <div class="invalid-feedback">
                        Masukkan Poli.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="kategori" required>
                        <option selected hidden value="">Kategori</option>
                        <option value="Kontrol">Kontrol</option>
                        <option value="Rujukan">Rujukan</option>
                        <option value="Rawat Inap">Rawat Inap</option>
                        <option value="Pengobatan">Pengobatan</option>
                      </select>
                      <label for="kategori">Pilih Kategori</label>
                      <div class="invalid-feedback">
                        Pilih Jenis Kategori.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir modal daftar-->
      <?php
      if (empty($result)) {
        echo "Data Pendaftaran tidak ada";
      } else {
        foreach ($result as $row) {
          ?>

          <!-- Modal View -->
          <div class="modal fade" id="ModalView<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pendaftaran</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate>
                  <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="nama"
                            value="<?php echo $row['jenis_poli']; ?>">
                          <label for="nama">Nama</label>
                          <div class="invalid-feedback">
                            Masukkan Nama.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="nik"
                            value="<?php echo $row['nik']; ?>">
                          <label for="nik">NIK</label>
                          <div class="invalid-feedback">
                            Masukkan NIK.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="jenis_poli"
                            value="<?php echo $row['jenis_poli']; ?>">
                          <label for="jenis_poli">Jenis Poli</label>
                          <div class="invalid-feedback">
                            Masukkan Jenis Poli.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="kategori"
                            value="<?php echo $row['kategori']; ?>">
                          <label for="kategori">Kategori</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="waktu_daftar"
                            value="<?php echo $row['waktu_daftar']; ?>">
                          <label for="kategori">Waktu Daftar</label>
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

          <?php
        }
        ?>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="text-nowrap">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Jenis Poli</th>
                <th scope="col">Kategori</th>
                <th scope="col">Waktu Daftar</th>
                <th scope="col">Aksi</th>
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
                      <?php echo $row['nama'] ?>
                    </td>
                    <td>
                      <?php echo $row['nik'] ?>
                    </td>
                    <td>
                      <?php echo $row['jenis_poli'] ?>
                    </td>
                    <td>
                      <?php echo $row['kategori'] ?>
                    </td>
                    <td>
                      <?php echo $row['waktu_daftar'] ?>
                    </td>
                    <td>
                      <!-- Tombol aksi untuk setiap baris -->
                      <div class="d-flex">
                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                          data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
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