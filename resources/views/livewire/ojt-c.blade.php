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
                        <p>Pendaftaran Training</p>
                        <hr>
                    </div>
                    @foreach ($pendaftaran as $data)
                        <a href="{{ url('/training') . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama_instansi }}</span>
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
            <div class="list_">
                <div class="items">
                    <div class="items-head">
                        <p>Training Terlaksana</p>

                        <hr>
                    </div>
                    @foreach ($terlaksana as $data)
                        <a href="{{ url('/training/terlaksana')  . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama_event.' - '.$data->nama_instansi }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
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
                        <p>Riwayat</p>
                        <hr>
                    </div>
                    @foreach ($riwayat as $data)
                        <a href="{{ url('/training/riwayat')  . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama_instansi }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{ $riwayat->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
