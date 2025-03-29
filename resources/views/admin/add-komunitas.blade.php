<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecozyne | Tambah Komunitas</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ecozyne.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Tambahkan Bootstrap Icons jika belum ada -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>

  <x-sidebar-admin /> <!-- Panggil Sidebar -->

  <!--  Main wrapper -->
  <div class="body-wrapper">

    @include('components.header') <!-- Panggil Header -->

    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tambah Komunitas</h5>
          <hr>
          <!-- Formulir Pendaftaran -->
          <form method="POST" action="/register-post">
            @csrf
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" id="namaLengkap"
                    placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email"
                    required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="noTelp" class="form-label">No Telp</label>
                  <input type="text" class="form-control" name="no_telp" id="noTelp"
                    placeholder="Masukkan nomor telepon" required minlength="12" maxlength="12">
                </div>

                <div class="col-md-4 mb-3">
                  <label for="kecamatan" class="form-label">Kecamatan</label>
                  <select class="form-control" name="kecamatan" id="kecamatan" required>
                    <option value="" disabled selected>Pilih Kecamatan</option>
                    <option value="batu ampar">Batu Ampar</option>
                    <option value="bengkong">Bengkong</option>
                    <option value="lubuk baja">Lubuk Baja</option>
                    <option value="sekar batu">Sekupang</option>
                    <option value="batam kota">Batam Kota</option>
                    <option value="sei beduk">Sei Beduk</option>
                    <option value="sagulung">Sagulung</option>
                    <option value="batu aji">Batu Aji</option>
                    <option value="nongsa">Nongsa</option>
                    <option value="galang">Galang</option>
                    <option value="bulang">Bulang</option>
                    <option value="belakang padang">Belakang Padang</option>
                  </select>
                </div>
                <div class="col-md-8 mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3"
                    placeholder="Masukkan alamat lengkap" required></textarea>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="namaPengguna" class="form-label">Nama Pengguna</label>
                  <input type="text" class="form-control" name="username" id="namaPengguna"
                    placeholder="Masukkan nama pengguna" required>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="kataSandi" class="form-label">Kata Sandi</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" id="kataSandi"
                      placeholder="Masukkan kata sandi" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                      <i id="eyeIcon" class="bi bi-eye-slash"></i>
                    </button>
                  </div>
                </div>

                <script>
                  function togglePassword() {
                    var passwordField = document.getElementById("kataSandi");
                    var eyeIcon = document.getElementById("eyeIcon");

                    if (passwordField.type === "password") {
                      passwordField.type = "text";
                      eyeIcon.classList.remove("bi-eye-slash");
                      eyeIcon.classList.add("bi-eye");
                    } else {
                      passwordField.type = "password";
                      eyeIcon.classList.remove("bi-eye");
                      eyeIcon.classList.add("bi-eye-slash");
                    }
                  }
                </script>

              </div>

              <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 mt-4 rounded-2">Daftar</button>
            </div>
          </form>

          <script>
            @if(session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: "{{ session('success') }}",
          showConfirmButton: false,
          timer: 2500
        });
      @elseif(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Gagal!',
      text: "{{ session('error') }}",
      showConfirmButton: true
    });
  @endif
          </script>

        </div>
      </div>
    </div>

  </div>
  </div>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>