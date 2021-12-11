<div>
    <div class="tab-content tabs">
        <div role="tabpanel" class="t1 tab-pane fade
        @if ($pos == 0)
        show active
        @endif
        "
            id="Section1">

            <form action="" class="search-bar" autocomplete="off">
                <input wire:model.debounce.1500ms="searchDn" type="search" name="search" pattern=".*\S.*"
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
                    @foreach ($dn as $data)
                        <a href="{{ url('/exchange/dn') . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama_universitas }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <hr>
                    {{ $dn->links() }}
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
                <input wire:model.debounce.1500ms="searchLn" type="search" name="search" pattern=".*\S.*"
                    required>
                <button class="search-btn">
                    <span>Search</span>
                </button>
            </form>
            <div class="list_">
                <div class="items">
                    <div class="items-head">
                        <p>Event Mendatang</p>

                        <hr>
                    </div>
                    @foreach ($ln as $data)
                        <a href="{{ url('/exchange/ln')  . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama_universitas }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{ $ln->links() }}
                </div>
            </div>
        </div>
        <div role="tabpanel" class="t1 tab-pane
        @if ($pos == 2)
        show active
        @endif
        "
            id="Section3">
            <form action="" class="search-bar" autocomplete="off">
                <input wire:model.debounce.1500ms="searchRiwayat" type="search" name="search" pattern=".*\S.*"
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
                    @foreach ($riwayat as $data)
                        <a href="{{ url('/exchange/riwayat')  . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama_universitas }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{ $riwayat->links() }}
                </div>
            </div>
        </div>
        @if (auth()->user())
            <div role="tabpanel" class="t1 tab-pane
        @if ($pos == 3)
        show active
        @endif
        "
                id="Section4">

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
