<!doctype html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecozyne | Tambah Artikel</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ecozyne.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Tambahkan Bootstrap Icons jika belum ada -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>

  @include('components.loader') <!-- Panggil Loader -->

  <x-sidebar-admin /> <!-- Panggil Sidebar -->

  <!--  Main wrapper -->
  <div class="body-wrapper">

    @include('components.header') <!-- Panggil Header -->

    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tambah Artikel</h5>
          <hr>
          <!-- Formulir Pendaftaran -->
          <form method="POST" action="{{ route('artikel.post') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="judul" class="form-label">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Artikel"
                    required>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="foto" class="form-label">Foto</label>
                  <input type="file" class="form-control" name="foto" id="foto" required>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="isi" class="form-label">Isi</label>
                  <textarea class="form-control" name="isi" id="isi" rows="6" placeholder="Masukkan Isi Artikel"
                    required></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 mt-4 rounded-2">Buat Artikel</button>
            </div>
          </form>

          <script>
            document.addEventListener("DOMContentLoaded", function () {
              document.querySelector("form").addEventListener("submit", function (event) {
                event.preventDefault(); // Mencegah pengiriman form default

                let formData = new FormData(this);
                let actionUrl = this.getAttribute("action");
                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content"); // Ambil dari meta

                fetch(actionUrl, {
                  method: "POST",
                  body: formData,
                  headers: {
                    "X-CSRF-TOKEN": csrfToken
                  }
                })
                  .then(response => response.json().catch(() => ({ error: true, message: "Format respons tidak valid" }))) // Tangani error jika response bukan JSON
                  .then(data => {
                    if (data.success) {
                      Swal.fire({
                        title: "Berhasil!",
                        text: "Artikel berhasil ditambahkan!",
                        icon: "success",
                        timer: 3500, // Menutup otomatis dalam 3,5 detik
                        showConfirmButton: false
                      }).then(() => {
                        window.location.href = "/admin/view-artikel"; // Redirect setelah swal selesai
                      });
                    } else {
                      Swal.fire({
                        title: "Gagal!",
                        text: data.message || "Terjadi kesalahan saat menambahkan data.",
                        icon: "error",
                        confirmButtonText: "Coba Lagi"
                      });
                    }
                  })
                  .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                      title: "Error!",
                      text: "Terjadi kesalahan pada server.",
                      icon: "error",
                      confirmButtonText: "Coba Lagi"
                    });
                  });
              });
            });
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