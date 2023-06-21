@extends('layouts.app')

@section('title', 'Daftar Presensi Pertemuan ke-' . $pertemuan->urutan)

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ ucfirst(str_replace('_', ' ', $message)) . '.' }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="/kelas/{{ $pertemuan->kelas_id }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left"></i>
                Kembali</a>
        </div>
    </div>

    <div class="container">

        <!-- detail pertemuan -->
        <div class="row bg-light p-3 mb-3 align-items-center">
            <div class="col-md-9">
                <h5 class="mb-1">
                    <span class="badge bg-primary">{{ $pertemuan->kode_mk }}</span>
                    <p class="no-margin mt-2">
                        {{ $pertemuan->nama_mk }} ({{ $pertemuan->nama_kelas }})
                    </p>
                </h5>
                <p class="mb-2">
                    <i class="bi bi-calendar mr-1"></i> {{ $pertemuan->tanggal }}
                    <i class="bi bi-clock mr-1 ml-10"></i> {{ $pertemuan->jam_mulai }} - {{ $pertemuan->jam_selesai }}
                </p>
                <p class="mb-2">
                    Topik Perkuliahan:<br><strong>{{ $pertemuan->topik_kuliah }}</strong>
                </p>
                @if ($pertemuan->nama_pengajar)
                    <p class="mb-0">
                        Nama pengajar:<br><strong>{{ $pertemuan->nama_pengajar }}</strong>
                    </p>
                @endif
            </div>

            @if ($pertemuan->status_pertemuan == '2')
                <div class="col-12 col-md-3 text-center text-md-right d-flex align-items-center py-3 py-md-0">
                    <div>
                        <a href="{{ route('kode-presensi', $pertemuan->pertemuan_id) }}"
                            class="btn btn-outline-primary btn-block mb-2 w-100" target="_blank">
                            <i class="bi bi-qrcode mr-5"></i>Lihat Kode Presensi
                        </a>
                        <form action="{{ route('akhiri-pertemuan', ['id' => $pertemuan->pertemuan_id]) }}" method="post"
                            id="akhiri-pertemuan">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block w-100">Akhiri Pertemuan</button>
                        </form>
                        <p class="fst-italic small mt-2 mb-0">Dengan menekan tombol <span class="fw-bold">Akhiri
                                Pertemuan</span>, maka pertemuan akan berakhir dan mahasiswa bisa mulai mengisi berita acara
                        </p>
                    </div>
                </div>
            @endif

        </div>
        <!-- end of detail pertemuan -->

        @if ($pertemuan->status_pertemuan == '1' and !$pertemuan->is_boleh_mulai_pertemuan and !$pertemuan->is_terlewat)
            <div class="row justify-content-center">
                <div class="col-md-8 bg-light p-3 mb-3">
                    <div class="block-content block-content-full text-center font-size-lg font-italic">
                        Pertemuan dapat dimulai paling cepat pada
                        {{ $pertemuan->jam_boleh_mulai }}
                    </div>
                </div>
            </div>
        @endif

        @if ($pertemuan->status_pertemuan == '1' and $pertemuan->is_boleh_mulai_pertemuan)
            <div class="row justify-content-center">
                <div class="col-md-8 bg-light p-3 mb-3">
                    <form class="needs-validation" method="POST"
                        action="{{ route('mulai-pertemuan', ['id' => $pertemuan->pertemuan_id]) }}" novalidate>
                        @csrf
                        <div class="block-header block-header-default">
                            <h3 class="block-title font-w700">Pengaturan Presensi</h3>
                        </div>
                        <div class="block-content">
                            <div>
                                <h6>Mode Pertemuan</h6>
                                <span id="msg_selected_opt_kuliah"></span>
                                <div class="form-check">
                                    <input id="mode-tm-D" type="radio" class="form-check-input" name="opsi_mode_pertemuan"
                                        value="D" {{ $pertemuan->mode_pertemuan === 'D' ? 'checked' : '' }} required>
                                    <label for="mode-tm-D" class="form-check-label">
                                        <strong><i>Online</i></strong><br>
                                        <small class="ml-3 pl-3">Dosen dan mahasiswa terhubung melalui internet</small>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input id="mode-tm-L" type="radio" class="form-check-input" name="opsi_mode_pertemuan"
                                        value="L" {{ $pertemuan->mode_pertemuan === 'L' ? 'checked' : '' }} required>
                                    <label for="mode-tm-L" class="form-check-label">
                                        <strong><i>Offline</i></strong><br>
                                        <small class="ml-3 pl-3">Dosen dan mahasiswa berada di dalam ruangan yang
                                            sama</small>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input id="mode-tm-H" type="radio" class="form-check-input" name="opsi_mode_pertemuan"
                                        value="H" {{ $pertemuan->mode_pertemuan === 'H' ? 'checked' : '' }} required>
                                    <label for="mode-tm-H" class="form-check-label">
                                        <strong><i>Hybrid</i></strong><br>
                                        <small class="ml-3 pl-3">Pertemuan kombinasi <i>online</i> dan
                                            <i>offline</i></small>
                                    </label>
                                    <div class="invalid-feedback">
                                        Mohon isi bentuk pertemuan
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h6>Kehadiran Mengajar</h6>
                                <span class="text-right" id="msg_selected_opt_mengajar"></span>
                                <div class="form-check">
                                    <input id="hm_L" type="radio" class="form-check-input" name="opsi_mengajar"
                                        value="L" required>
                                    <label id="lbl_hm_L" for="hm_L" class="form-check-label">Saya mengajar di
                                        kelas</label>
                                </div>
                                <div class="form-check">
                                    <input id="hm_D" type="radio" class="form-check-input" name="opsi_mengajar"
                                        value="D" required>
                                    <label id="lbl_hm_D" for="hm_D" class="form-check-label">Saya mengajar secara
                                        <i>online</i></label>
                                    <div class="invalid-feedback">
                                        Mohon isi kehadiran mengajar
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h6 class="col-12">Masa Berlaku Kode Presensi / <i>QR Code</i></h6>
                                <div class="form-check">
                                    <input id="berlaku-sampai-akhir" type="radio" class="form-check-input"
                                        name="opsi_kode_presensi" value="auto"
                                        {{ $pertemuan->is_kode_presensi_berlaku_sampai_akhir ? 'checked' : '' }} required>
                                    <label for="berlaku-sampai-akhir" class="form-check-label">Kode Presensi / <i>QR
                                            Code</i> bisa diakses sampai kuliah berakhir</label>
                                </div>
                                <div class="form-check">
                                    <input id="berlaku-sampai-manual" type="radio"
                                        class="form-check-input d-inline align-middle" name="opsi_kode_presensi"
                                        value="manual"
                                        {{ !$pertemuan->is_kode_presensi_berlaku_sampai_akhir ? 'checked' : '' }} required>
                                    <label for="berlaku-sampai-manual" class="form-check-label">
                                        Kode Presensi / <i>QR Code</i> akan kadaluarsa setelah
                                        <input type="number" class="form-control d-inline" name="menit-berlaku"
                                            id="menit-berlaku" style="width: 80px">
                                        menit
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny mt-3">
                                <div class="col-12 text-center">
                                    <input type="submit" value="OK, Kelas Dimulai"
                                        class="btn btn-primary btn-block w-100" />
                                </div>
                            </div>
                        </div>
                        <div class="fst-italic small">
                            Dengan menekan tombol <strong><i class="bi bi-check"></i> OK, Kelas Dimulai</strong>, maka Kode
                            Presensi / QRCode bisa mulai diakses
                        </div>
                    </form>
                </div>
            </div>
        @endif

        @if ($pertemuan->status_pertemuan == '3')
            <div class="row justify-content-center">
                <div class="col-md-8 bg-light p-3 mb-3">
                    <div class="block-content block-content-full text-center font-size-lg font-italic">
                        Pertemuan dimulai pada {{ $pertemuan->jam_mulai_mengajar }} @isset($pertemuan->jam_selesai_mengajar)
                            dan berakhir pada {{ $pertemuan->jam_selesai_mengajar }}
                        @endisset
                    </div>
                </div>
            </div>
        @endif

        <!-- rekap kehadiran mahasiswa -->
        @php
            $jml_hadir = 0;
            $jml_izin = 0;
            $jml_sakit = 0;
            $jml_alpa = 0;
            $total = 0;

            foreach ($daftar_hadir_mahasiswa as $mhs) {
                if ($mhs->jenis_kehadiran === null || $mhs->jenis_kehadiran === 'A') {
                    $jml_alpa++;
                } elseif ($mhs->jenis_kehadiran === 'I') {
                    $jml_izin++;
                } elseif ($mhs->jenis_kehadiran === 'S') {
                    $jml_sakit++;
                } elseif ($mhs->jenis_kehadiran === 'H') {
                    $jml_hadir++;
                }
                $total++;
            }
        @endphp

        <div class="container bg-light p-3 mb-3">
            <div class="d-flex flex-column flex-md-row justify-content-md-between">
                <ul class="ps-0 mb-3 mb-md-0 row" style="list-style-type: none;">
                    <li class="col-2 text-center px-4">
                        <strong class="text-success" style="font-size: 0.8rem">HADIR</strong>
                        <h4 class="m-0 fw-bold count-kehadiran" data-jenis-hadir="H">{{ $jml_hadir }}</h4>
                    </li>
                    <li class="col-2 border-start text-center px-4">
                        <strong class="text-primary" style="font-size: 0.8rem">IZIN</strong>
                        <h4 class="m-0 fw-bold count-kehadiran" data-jenis-hadir="I">{{ $jml_izin }}</h4>
                    </li>
                    <li class="col-2 border-start text-center px-4">
                        <strong class="text-warning" style="font-size: 0.8rem">SAKIT</strong>
                        <h4 class="m-0 fw-bold count-kehadiran" data-jenis-hadir="S">{{ $jml_sakit }}</h4>
                    </li>
                    <li class="col-6 border-start text-center px-4">
                        <strong class="text-danger" style="font-size: 0.8rem">ALPA/BELUM TERCATAT</strong>
                        <h4 class="m-0 fw-bold count-kehadiran" data-jenis-hadir="A">{{ $jml_alpa }}</h4>
                    </li>
                </ul>
                <div class="text-center text-md-end">
                    <strong style="font-size: 0.8rem">
                        TOTAL MAHASISWA
                    </strong>
                    <h4 class="fw-bold count-kehadiran" data-jenis-hadir="T">
                        {{ $total }}
                    </h4>
                </div>
            </div>
        </div>
        <!-- end of rekap kehadiran mahasiswa -->

        <!-- daftar mahasiswa -->
        <div class="container">
            <div class="table-responsive d-none d-lg-block">
                <table class="table table-vcenter js-hadir-mhs-dsn">
                    <thead class="text-center bg-body-light">
                        <tr>
                            <th class="text-start">NRP / Nama</th>
                            <th style="width: 25%" class="text-end">Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody class="font-w600 text-center">
                        @foreach ($daftar_hadir_mahasiswa as $mhs)
                            <tr>
                                <td class="text-start py-3">
                                    <p class="font-w300 font-size-xs m-0">{{ $mhs->nrp }}</p>
                                    <span class="text-uppercase">{{ $mhs->nama }}</span>
                                </td>
                                <td class="kehadiran-mahasiswa align-middle text-end">
                                    @if ($pertemuan->status_pertemuan == '1' || $pertemuan->is_permanen)
                                        <div class="form-group">
                                            @if ($mhs->jenis_kehadiran === 'A')
                                                <span class="text-danger">ALPA</span>
                                            @elseif ($mhs->jenis_kehadiran === 'I')
                                                <span class="text-primary">IZIN</span>
                                            @elseif ($mhs->jenis_kehadiran === 'S')
                                                <span class="text-warning">SAKIT</span>
                                            @elseif ($mhs->jenis_kehadiran === 'H')
                                                <span class="text-success">HADIR</span>
                                            @else
                                                <span class="text-danger">BELUM TERCATAT</span>
                                            @endif
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end of daftar mahasiswa -->

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script>
        (function() {
            const forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        var cleaveJamMulai = new Cleave('#jam-mulai', {
            time: true,
            timePattern: ['h', 'm']
        });

        var cleaveJamSelesai = new Cleave('#jam-selesai', {
            time: true,
            timePattern: ['h', 'm']
        });
    </script>
@endsection
