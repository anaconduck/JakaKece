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
                <input wire:model.debounce.1500ms="searchMendatang" type="search" name="search" pattern=".*\S.*"
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
                    @foreach ($mendatang as $data)
                        <a href="{{ url('/jawara') . '/detail' . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{ $mendatang->links() }}
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
        <div role="tabpanel" class="t1 tab-pane
        @if ($pos == 3)
        show active
        @endif
        "
            id="Section4">
            <form action="" class="search-bar" autocomplete="off">
                <input wire:model.debounce.1500ms="searchHasil" type="search" name="search" pattern=".*\S.*" required>
                <button class="search-btn">
                    <span>Search</span>
                </button>
            </form>
            <div class="list_">
                <div class="items">
                    <div class="items-head">
                        <p>Hasil Event</p>
                        <hr>
                    </div>
                    @foreach ($hasil as $data)
                        <a href="{{ url('/jawara') . '/detail' . '/' . $data->id }}">
                            <div class="items-body">
                                <div class="items-body-content">
                                    <span>{{ $data->nama }}</span>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{ $hasil->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
