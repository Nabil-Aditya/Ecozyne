<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecozyne | Data Komunitas</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ecozyne.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  @include('components.loader')
  <x-sidebar-admin />
  <div class="body-wrapper">
    @include('components.header')
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Data Komunitas</h5>
          <hr>
          <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari Komunitas...">
          </div>
          <hr>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle" id="dataTable">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">Id</th>
                  <th class="border-bottom-0">Nama Pengguna</th>
                  <th class="border-bottom-0">Email</th>
                  <th class="border-bottom-0">No Telp</th>
                  <th class="border-bottom-0">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($komunitas as $data_pengguna)
                <tr>
                  <td class="border-bottom-0">{{ $loop->iteration }}</td>
                  <td class="border-bottom-0 nama-pengguna">{{ $data_pengguna->user->username }}</td>
                  <td class="border-bottom-0">{{ $data_pengguna->user->email }}</td>
                  <td class="border-bottom-0">{{ $data_pengguna->no_telp }}</td>
                  <td class="border-bottom-0">
                    <div class="d-flex align-items-center gap-2">
                      <button class="btn btn-primary fw-normal rounded-2" onclick="window.location.href='view-komunitas'">
                        <i class="fa fa-eye"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <hr>
          <div class="d-flex justify-content-between mt-3">
            <button id="prevPage" class="btn btn-secondary">Sebelumnya</button>
            <span id="pageInfo" class="align-self-center"></span>
            <button id="nextPage" class="btn btn-secondary">Selanjutnya</button>
          </div>
          <hr>
        </div>
        <hr>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      let rowsPerPage = 10;
      let table = document.querySelector('#dataTable tbody');
      let rows = Array.from(table.querySelectorAll('tr'));
      let currentPage = 1;
      let totalPages = Math.ceil(rows.length / rowsPerPage);

      function displayRows() {
        rows.forEach((row, index) => {
          row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) ? '' : 'none';
        });
        document.getElementById('pageInfo').textContent = `Halaman ${currentPage} dari ${totalPages}`;
      }

      document.getElementById('prevPage').addEventListener('click', function () {
        if (currentPage > 1) {
          currentPage--;
          displayRows();
        }
      });

      document.getElementById('nextPage').addEventListener('click', function () {
        if (currentPage < totalPages) {
          currentPage++;
          displayRows();
        }
      });

      document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        rows.forEach(row => {
          let text = row.textContent.toLowerCase();
          row.style.display = text.includes(filter) ? '' : 'none';
        });
      });
      displayRows();
    });
  </script>
</body>

</html>