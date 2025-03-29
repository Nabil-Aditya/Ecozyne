<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecozyne | Detail Data Komunitas</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>

  <x-sidebar-admin />

  <!--  Main wrapper -->
  <div class="body-wrapper">

    @include('components.header') <!-- Panggil Header -->

    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Data Komunitas</h5>
          <hr>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nama Pengguna</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Email</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No Telp</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Aksi</h6>
                  </th>
                </tr>
              </thead>

              <tbody>

                @foreach ($komunitas as $data_pengguna)

          <tr>
            <td class="border-bottom-0">
            <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
            </td>
            <td class="border-bottom-0">
            <p class="mb-0 fw-normal">{{ $data_pengguna->user->username }}</p>
            </td>
            <td class="border-bottom-0">
            <p class="mb-0 fw-normal">{{ $data_pengguna->user->email }}</p>
            </td>
            <td class="border-bottom-0">
            <p class="mb-0 fw-normal">{{ $data_pengguna->no_telp }}</p>

            </td>
            <td class="border-bottom-0">
            <div class="d-flex align-items-center gap-2">
              <button class="btn btn-primary fw-normal rounded-2"
              onclick="window.location.href='view-komunitas'">
              <i class="fa fa-eye"></i>
              </button>
            </div>
            </td>
            </td>
          </tr>
        @endforeach

              </tbody>
            </table>
          </div>
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