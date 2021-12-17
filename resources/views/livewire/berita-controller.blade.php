<div>
    @section('css')
        <style>
            body {
                background-image: url('https://assets.codepen.io/1462889/back-page.svg')
            }

            section.why-us {
                min-height: 95vh;
            }

            body {
                background-color: #f5a5250c
            }

            .title {
                margin-top: 30px;
            }

            .content {
                margin: 0;
                padding: 30px 15px;
                background-color: rgba(255, 255, 255, 0.548);
                box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.315);
            }

            h3 {
                color: #865b14;
                width: 100%;
                text-align: center;
                border-bottom: white
            }

            .stage {
                width: 90%;
                margin-left: auto;
                margin-right: auto;
            }

            .stage .p {
                font-size: 20px;
                font-weight: 600;
                text-align: center;
                display: inline-block;
                min-height: 60px;
                height: 100%;
                cursor: pointer;
                width: 100%;
                background: #f5a525a4;
                border-radius: 10px;
                font-family: Century Gothic;
                letter-spacing: 2px;
                margin: 0;
                color: #333;
            }

            .stage .div {
                margin-left: auto;
                margin-right: auto;
                border-radius: 10px;
                width: 200px;
                min-height: 60px;
                height: 100%;
                margin-top: 4%;
                transition-duration: 0.5s;

            }

            .stage .p:hover {
                background: #f5a5251f;
                color: black;
            }

            .stage .div:nth-child(odd) {
                transform: perspective(300px) rotateY(45deg);
                box-shadow: -2px 2px 7px gray;
            }

            .stage .div:nth-child(even) {
                transform: perspective(300px) rotateY(-45deg);
                box-shadow: 2px 2px 7px gray;
            }

            .stage .div:hover {
                transform: rotateY(0);
                background: white;
                color: black;
                box-shadow: 0px 0px 0px;
                border: 1px solid #f5a525
            }

            .siteTitle {
                display: block;
                font-weight: 900;
                font-size: 30px;
                margin: 20px 0;
            }

            @media (min-width: 768px) {
                .siteTitle {
                    font-size: 60px;
                }
            }


            main {
                max-width: 960px;
                margin: 0 auto;
            }

            .card {
                max-height: 150px;
                position: relative;
                padding: 10px;
                box-sizing: border-box;
                display: flex;
                align-items: flex-end;
                text-decoration: none;
                border: 4px solid #b0215e;
                margin-bottom: 20px;
                background-size: cover;
                cursor: pointer;
            }

            @media (min-width: 768px) {
                .card {
                    height: 500px;
                }
            }

            .inner {
                height: 50%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background: white;
                box-sizing: border-box;
            }

            @media (min-width: 768px) {
                .inner {
                    width: 70%;
                    height: 100%;
                }
            }

            .title {
                font-size: 14px;
                color: black;
                text-align: center;
                font-weight: 700;
                color: #181818;
                text-shadow: 0px 2px 2px #a6f8d5;
                position: relative;
                margin: 0 0 20px 0;
            }

            @media (min-width: 768px) {
                .title {
                    font-size: 14px;
                }
            }

            .subtitle {
                color: #b67b1d;
                font-size: 12px;
                text-align: center;
            }

            li.page-item {

                display: none;
            }

            .page-item:first-child,
            .page-item:nth-child(2),
            .page-item:nth-last-child(2),
            .page-item:last-child,
            .page-item.active,
            .page-item.disabled {

                display: block;
            }

        </style>
    @stop

    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="section-heading">

                    </div>
                </div>
                <div class="col-md-12 anot">
                    <h1>{{ $currentBerita->judul }}</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">

                            <main>
                                @foreach ($berita as $item)
                                    <a wire:click="show({{ $item->id }})" class="card"
                                        style="background-image: url('{{ Storage::url($item->file) }}')">
                                        <div class="inner">
                                            <h2 class="title">{{ $item->judul }}</h2>
                                            <time
                                                class="subtitle">{{ date('d M Y', strtotime($item->created_at)) }}<time>
                                        </div>
                                    </a>
                                @endforeach
                            </main>
                            {{ $berita->links() }}
                        </div>
                        <div class="col-md-8" style="border-left: 5px solid rgba(0, 0, 0, 0.075)">
                            <img src="{{ Storage::url($currentBerita->file) }}" width="100%"/>
                            <div class="content">
                                {!! $currentBerita->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
