<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/ecozyne.png" />
    <style>

        /* Loader Styles */
        #loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #f4f4f4;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease;
        }

        /* Animated Loader */
        .loader {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            position: relative;
            background: linear-gradient(45deg, #00c853, #00bf46);
            box-shadow: 0 0 15px rgba(0, 255, 132, 0.8);
            animation: pulse 1.5s infinite ease-in-out;
        }

        .loader::before, .loader::after {
            content: "";
            position: absolute;
            border-radius: inherit;
            inset: 0;
            box-shadow: 0 0 20px rgba(0, 191, 95, 0.769);
            animation: ripple 1.5s infinite linear;
        }

        .loader::after {
            animation-delay: -0.75s;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

         /* Sembunyikan konten sampai loader selesai */
        .content {
            display: none;
        }

    </style>
</head>

<body>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.addEventListener("load", function () {
                const loader = document.getElementById("loader");
                const content = document.querySelector(".content");

                setTimeout(function () {
                    loader.style.opacity = "0";
                    loader.style.transition = "opacity 0.5s ease";

                    setTimeout(function () {
                        loader.style.display = "none";
                        content.style.display = "block";
                    }, 200);
                }, 200);
            });
        });
    </script>

    <!-- Loader -->
    <div id="loader">
        <div class="loader"></div>
    </div>

</body>

</html>