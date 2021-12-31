<div>
    @section('css')
        <style wire:ignore>
            @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap");

            .page-contain {
                display: flex;
                justify-content: center;
                background: #E7F3F1;
                border: 0.75em solid white;
                font-family: "Open Sans", sans-serif;
                flex-flow: wrap;
            }

            .data-card {
                display: flex;
                flex-direction: column;
                max-width: 12em;
                min-height: 11em;
                max-height: 11em;
                overflow: hidden;
                border-radius: 0.5em;
                text-decoration: none;
                background: white;
                margin: 1em;
                padding: 20px;
                box-shadow: 0 1.5em 2.5em -0.5em rgba(0, 0, 0, 0.1);
                transition: transform 0.45s ease, background 0.45s ease;
            }

            .data-card h3 {
                color: #2E3C40;
                font-size: 1.5em;
                font-weight: 600;
                line-height: 1;
                padding-bottom: 0.5em;
                margin: 0 0 0.142857143em;
                border-bottom: 2px solid #753BBD;
                transition: color 0.45s ease, border 0.45s ease;
            }

            .data-card h4 {
                color: #627084;
                text-transform: uppercase;
                font-size: 13px;
                font-weight: 700;
                line-height: 1;
                letter-spacing: 0.1em;
                margin: 0 0 1.777777778em;
                transition: color 0.45s ease;
            }

            .data-card p {
                opacity: 0;
                color: #FFFFFF;
                font-weight: 600;
                line-height: 1.8;
                margin: 0 0 1.25em;
                transform: translateY(-1em);
                transition: opacity 0.45s ease, transform 0.5s ease;
            }

            .data-card .link-text {
                display: block;
                color: #753BBD;
                font-size: 1.125em;
                font-weight: 600;
                line-height: 1.2;
                margin: auto 0 0;
                transition: color 0.45s ease;
            }

            .data-card .link-text svg {
                margin-left: 0.5em;
                transition: transform 0.6s ease;
            }

            .data-card .link-text svg path {
                transition: fill 0.45s ease;
            }

            .data-card:hover {
                background: #753BBD;
                transform: scale(1.02);
            }

            .data-card:hover h3 {
                color: #FFFFFF;
                border-bottom-color: #A754C4;
            }

            .data-card:hover h4 {
                color: #FFFFFF;
            }

            .data-card:hover p {
                opacity: 1;
                transform: none;
            }

            .data-card:hover .link-text {
                color: #FFFFFF;
            }

            .data-card:hover .link-text svg {
                -webkit-animation: point 1.25s infinite alternate;
                animation: point 1.25s infinite alternate;
            }

            .data-card:hover .link-text svg path {
                fill: #FFFFFF;
            }

            @-webkit-keyframes point {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(0.125em);
                }
            }

            @keyframes point {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(0.125em);
                }
            }

        </style>
    @stop
    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stop
    <section class="page-contain">
        <a href="{{ url('/admin/pengunjung') }}" class="data-card">
            <h3>{{ $jumlahPengunjung ?? 0 }}</h3>
            <h4>Jumlah pengunjung hari ini</h4>
            <span class="link-text">
                Detail
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                        fill="#753BBD" />
                </svg>
            </span>
        </a>

        <a href="{{ url('/admin/se/pendaftar') }}" class="data-card">
            <h3>{{ $jumlahSE ?? 0 }}</h3>
            <h4>Jumlah Mahasiswa Exchange</h4>
            <span class="link-text">
                Detail
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                        fill="#753BBD" />
                </svg>
            </span>
        </a>

        <a href="{{ url('/admin/ojt/pendaftar') }}" class="data-card">
            <h3>{{ $jumlahMagang ?? 0 }}</h3>
            <h4>Jumlah Mahasiswa Magang</h4>
            <span class="link-text">
                Detail
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                        fill="#753BBD" />
                </svg>
            </span>
        </a>

        <a href="{{ url('/admin/jawara/pendaftar') }}" class="data-card">
            <h3>{{ $jumlahJawara ?? 0 }}</h3>
            <h4>Jumlah Mahasiswa Jawara</h4>
            <span class="link-text">
                Detail
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                        fill="#753BBD" />
                </svg>
            </span>
        </a>

        <a href="{{ url('/admin/jumlah-practice') }}" class="data-card">
            <h3>{{ $jumlahPractice ?? 0 }}</h3>
            <h4>Orang telah melakukan latihan inkubasi bahasa</h4>
            <span class="link-text">
                Detail
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                        fill="#753BBD" />
                </svg>
            </span>
        </a>

        <a href="{{ url('/admin/jumlah-test') }}" class="data-card">
            <h3>{{ $jumlahTest ?? 0 }}</h3>
            <h4>Orang telah melakukan tes inkubasi bahasa</h4>
            <span class="link-text">
                Detail
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                        fill="#753BBD" />
                </svg>
            </span>
        </a>

        <a href="{{ url('/admin/total-jawara') }}" class="data-card">
            <h3>{{ $meanPendanaan ?? 0 }}</h3>
            <h4>Rerata Dana Perlombaan</h4>
            <span class="link-text">
                Detail
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                        fill="#753BBD" />
                </svg>
            </span>
        </a>
    </section>
</div>
