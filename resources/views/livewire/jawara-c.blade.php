<div>
    <div class="tab-content tabs">
        <div role="tabpanel" class="t1 tab-pane fade
        @if ($pos == 0)
        show active
        @endif
        "
            id="Section1">

            <form action="" class="search-bar" autocomplete="off">
                <input wire:model.debounce.1500ms="searchPendaftaran" type="search" name="search" pattern=".*\S.*"
                    required>
                <button class="search-btn">
                    <span>Search</span>
                </button>
            </form>
            <div class="list_">
                <div class="items">
                    <div class="items-head">
                        <p>Pendaftaran Event</p>
                        <hr>
                    </div>
                    @foreach ($pendaftaran as $data)
                        <a href="{{ url('/jawara') . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <hr>
                    {{ $pendaftaran->links() }}
                </div>
            </div>
        </div>
        <div role="tabpanel" class="t1 tab-pane
        @if ($pos == 1)
        show active
        @endif
        "
            id="Section2">
            <form action="" class="search-bar" autocomplete="off">
                <input wire:model.debounce.1500ms="searchTerlaksana" type="search" name="search" pattern=".*\S.*"
                    required>
                <button class="search-btn">
                    <span>Search</span>
                </button>
            </form>
            <div class="list_">
                <div class="items">
                    <div class="items-head">
                        <p>Event Terlaksana</p>
                        <hr>
                    </div>
                    @foreach ($terlaksana as $data)
                        <a href="{{ url('/jawara') . '/detail' . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{ $terlaksana->links() }}
                </div>
            </div>
        </div>
        @if (auth()->user())
            <div role="tabpanel" class="t1 tab-pane
        @if ($pos == 2)
        show active
        @endif
        "
                id="Section3">

                <div class="container ta">
                    @if(!$statusTanya)
                        @if($errors->any())
                            <p>{{ implode(', ', $errors->all()) }}</p>
                        @endif
                    <form method="POST" action="" wire:submit.prevent="submit">
                        <div class="row">
                            <h4>Tanya Admin</h4>
                            <div class="input-group input-group-icon">
                                <input wire:model.lazy="pertanyaan.email" name="email" type="email" placeholder="Email Anda" required />
                                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                            </div>
                        </div>
                        <div class="row">
                            <h4>Pertanyaan</h4>
                            <div class="input-group input-group-icon">
                                <textarea wire:model.lazy="pertanyaan.pertanyaan" name="pertanyaan" placeholder="Tuliskan pertanyaan" required
                                    style="width: 100%; height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="ro">
                            <input class="btn btn-warning" type="submit" value="Kirim"/>
                        </div>
                    </form>
                    @else
                        <h3>Pertanyaan anda telah terkirim!</h3>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
