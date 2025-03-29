<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecozyne | Data Artikel</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ecozyne.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles-view-artikel.css" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                    <h5 class="card-title fw-semibold mb-2">Data Artikel</h5>
                  
                    <hr>
                    <div class="mb-1">
                      <input type="text" id="searchInput" class="form-control" placeholder="Cari Artikel...">
                    </div>
                    <hr>

                    <div class="row" id="artikelContainer">
                        @foreach($artikels as $artikel)
                            <div class="col-sm-6 col-xl-3 mt-4 artikel-card">
                                <div class="card overflow-hidden rounded-2 h-100">
                                    <div class="position-relative">
                                        <a href="{{ route('artikel.show', $artikel->id_artikel) }}">
                                            <img src="{{ asset('storage/' . $artikel->foto) }}"
                                                class="card-img-top rounded-0 img-fluid artikel-img"
                                                alt="{{ $artikel->judul }}">
                                        </a>
                                    </div>
                                    <div class="card-body pt-3 p-4 d-flex flex-column">
                                        <h6 class="fw-semibold fs-4 artikel-title">{{ $artikel->judul }}</h6>
                                        <p class="text-muted artikel-date">{{ $artikel->created_at }}</p>
                                        <p class="text-muted artikel-teks">{{ $artikel->isi }}</p>
                                        <a href="{{ route('artikel.show', $artikel->id_artikel) }}"
                                            class="btn btn-primary mt-2 mb-0">Edit Artikel</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <script>
                    function searchArtikel() {
                        let input = document.getElementById('searchInput').value.toLowerCase();
                        let artikelCards = document.querySelectorAll('.artikel-card');

                        artikelCards.forEach(card => {
                            let title = card.querySelector('.artikel-title').innerText.toLowerCase();
                            let content = card.querySelector('.artikel-teks').innerText.toLowerCase();

                            if (title.includes(input) || content.includes(input)) {
                                card.style.display = "block";
                            } else {
                                card.style.display = "none";
                            }
                        });
                    }
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