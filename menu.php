<?php
include "proses/connect.php";

$query = "SELECT * FROM tb_pelanggan";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_pelanggan = $_POST['nama_pelanggan'] ?? '';
  $tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
  $alamat = $_POST['alamat'] ?? '';
  $no_hp = $_POST['no_hp'] ?? '';
  $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
  $sql = "INSERT INTO Pelanggan (nama_pelanggan, tanggal_lahir, alamat, no_hp, jenis_kelamin) VALUES ('$nama_pelanggan', '$tanggal_lahir', '$alamat', '$no_hp', '$jenis_kelamin')";

  if (mysqli_query($conn, $sql)) {
    echo "Data pelanggan berhasil ditambahkan";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="col-lg-9 mt-2 ">
  <div class="card">
    <div class="card-header">
      Halaman Data Pelanggan
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah
            Pelanggan</button>
        </div>
      </div>
      <!-- Modal menambah Pelanggan baru-->
      <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pelanggan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="nama_pasien"
                        name="nama_pasien" required>
                      <label for="floatingInput">Nama Pelanggan</label>
                      <div class="invalid-feedback">
                        Masukkan Nama Pelanggan.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="floatingInput" placeholder="tanggal_lahir"
                        name="tanggal_lahir" required>
                      <label for="floatingInput">Tanggal Lahir</label>
                      <div class="invalid-feedback">
                        Masukkan Tanggal Lahir.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="alamat" name="alamat">
                      <label for="floatingPassword">Alamat</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="no_hp" name="no_hp"
                        required>
                      <label for="floatingInput">Nomor HP</label>
                      <div class="invalid-feedback">
                        Masukkan Nomor HP.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                        <option selected hidden value="">Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <label for="floatingInput">Jenis Kelamin</label>
                      <div class="invalid-feedback">
                        Pilih Jenis Kelamin.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Modal menambah pelanggan-->
      <?php
      if (empty($result)) {
        echo "Data pelanggan tidak ada";
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
                          <input disabled type="text" class="form-control" id="floatingInput"
                            value="<?php echo $row['nama_pelanggan'] ?>">
                          <label for="floatingInput">Nama Pelanggan</label>
                          <div class="invalid-feedback">
                            Masukkan Nama Pelanggan.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingInput"
                            value="<?php echo $row['tanggal_lahir'] ?>">
                          <label for="floatingInput">Tanggal Lahir</label>
                          <div class="invalid-feedback">
                            Masukkan Tanggal Lahir.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingInput"
                            value="<?php echo $row['alamat'] ?>">
                          <label for="floatingPassword">Alamat</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingInput"
                            value="<?php echo $row['no_hp'] ?>">
                          <label for="floatingInput">Nomor HP</label>
                          <div class="invalid-feedback">
                            Masukkan Nomor HP.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingInput"
                            value="<?php echo isset($row['jenis_kelamin']) ? $row['jenis_kelamin'] : ''; ?>">
                          <label for="floatingInput">Jenis Kelamin</label>
                          <div class="invalid-feedback">
                            Pilih Jenis Kelamin.
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

          <!-- Modal edit-->
          <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pelanggan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="Nama Pelanggan"
                            name="nama_pelanggan" required value="<?php echo $row['nama_pelanggan'] ?>">
                          <label for="floatingInput">Nama Pelanggan</label>
                          <div class="invalid-feedback">
                            Masukkan Nama Pelanggan.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Lahir"
                            name="tanggal_lahir" value="<?php echo $row['tanggal_lahir'] ?>">
                          <label for="floatingInput">Tanggal Lahir</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingInput" placeholder="Alamat" name="alamat"
                            value="<?php echo $row['alamat'] ?>">
                          <label for="floatingPassword">Alamat</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <input type="tel" class="form-control" id="floatingInput" placeholder="Nomor HP" name="no_hp"
                            value="<?php echo $row['no_hp'] ?>">
                          <label for="floatingInput">Nomor HP</label>
                          <div class="invalid-feedback">
                            Masukkan Nomor HP.
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-floating mb-3">
                          <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                            <option selected hidden value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" <?php if ($row['jenis_kelamin'] === 'Laki-laki')
                              echo 'selected'; ?>>
                              Laki-laki
                            </option>
                            <option value="Perempuan" <?php if ($row['jenis_kelamin'] === 'Perempuan')
                              echo 'selected'; ?>>
                              Perempuan
                            </option>
                          </select>
                          <label for="floatingInput">Jenis Kelamin</label>
                          <div class="invalid-feedback">
                            Pilih Jenis Kelamin.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

          <!-- Modal delete-->
          <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pelanggan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate action="proses/proses_delete_pasien.php" method="POST">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                    <div class="col-lg-12">
                      Apakah Anda yakin ingin menghapus pelanggan <b>
                        <?php echo $row['nama_pelanggan'] ?>
                      </b>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="input_user_validate"
                        value="<?php echo $row['id'] ?>">
                        Delete
                      </button>
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
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
                <th scope="col">Aksi</th>
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
                    <?php echo $row['tanggal_lahir'] ?>
                  </td>
                  <td>
                    <?php echo $row['alamat'] ?>
                  </td>
                  <td>
                    <?php echo $row['no_hp'] ?>
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