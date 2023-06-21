@extends('layouts.app')

@section('title', 'Daftar Pertemuan')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ ucfirst(str_replace('_', ' ', $message)) . '.' }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ ucfirst(str_replace('_', ' ', session('success'))) . '.' }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="/" class="btn btn-outline-secondary"><i class="bi bi-chevron-left"></i> Kembali</a>
        </div>
    </div>
    <div class="container bg-light p-3 mb-3">
        <div class="row">
            <div class="col-md-9">
                <h5 class="mb-1">
                    <span class="badge bg-primary">{{ $kelas->kode_mk }}</span>
                    <p class="no-margin mt-2">{{ $kelas->nama_mk }} ({{ $kelas->nama_kelas }})</p>
                </h5>
                <p class="no-margin">
                    <i class="bi bi-calendar"></i> {{ $kelas->hari }}
                    <i class="bi bi-clock"></i> {{ $kelas->jam_mulai }} - {{ $kelas->jam_selesai }}
                    <i class="bi bi-building"></i> {{ $kelas->ruangan }}
                </p>
                @if (count($kelas->pengajar) > 1)
                    <p class="mt-10 mb-0 fw-bolder">Kelas ini adalah <i>team teaching</i> dosen:</p>
                @else
                    <p class="mt-10 mb-0 fw-bolder">Dosen :</p>
                @endif
                <ul class="list-unstyled mb-0">
                    @foreach ($kelas->pengajar as $pengajar)
                        <li>{{ $pengajar->nama }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 text-center text-md-right mb-20">
            <a href="{{ route('tambah-pertemuan', $kelas->kelas_id) }}" class="btn btn-primary btn-block btn-sm float-right">
                <i class="bi bi-plus"></i>
                Tambah Pertemuan
            </a>
        </div>
        </div>
    </div>
    <div class="container bg-light pt-2 pb-2 mb-3">
        <div class="table-responsive d-none d-sm-block">
            <table class="table">
                <thead class="text-center">
                    <tr class="bg-body-light">
                        <th style="width: 15%;">Pertemuan</th>
                        <th style="width: 25%;">Waktu / Tempat</th>
                        <th style="width: 20%;">Dosen</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($list_pertemuan as $pertemuan)
                        <tr class="">
                            <td class="py-3">
                                <p class="mb-3 font-size-h1 align-middle">
                                    <a href="/pertemuan/{{ $pertemuan->pertemuan_id }}">
                                        <button type="button" class="btn btn-lg btn-primary">
                                            <i class="bi bi-card-checklist"></i> {{ $pertemuan->urutan }}
                                        </button>
                                    </a>
                                </p>
                                <p class="small fst-italic mb-1">{{ $pertemuan->topik_kuliah }}</p>
                            </td>
                            <td class="text-left align-middle">
                                <p class="m-0">
                                    <i class="bi bi-calendar"></i>
                                    {{ ($tanggal_tm = (new \Carbon\Carbon($pertemuan->tanggal))->locale('id'))->dayName }},
                                    {{ $tanggal_tm->day }} {{ $tanggal_tm->monthName }} {{ $tanggal_tm->year }}
                                </p>
                                <p class="m-0">
                                    <i class="bi bi-clock"></i> {{ $pertemuan->jam_mulai }} -
                                    {{ $pertemuan->jam_selesai }}
                                </p>
                                <p class="m-0">
                                    <i class="bi bi-building"></i> {{ $pertemuan->ruangan }}
                                </p>
                            </td>
                            <td class="text-left align-middle">
                                <p class="m-0">
                                    {{ $pertemuan->pengajar }}
                                </p>
                                <p class="m-0 mt-3 fw-bolder">
                                    {{ $pertemuan->getStatusPertemuan() }}
                                </p>
                            </td>
                            <td class="align-middle">
                                <div class="row gy-2 px-3 m-0">
                                    <a
                                        href="{{ route('ubah-pertemuan', ['kelasId' => $kelas->kelas_id, 'pertemuanId' => $pertemuan->pertemuan_id]) }}">
                                        <button type="button" class="btn btn-sm btn-primary col-12">
                                            Ubah
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-body-light small">
                        <td colspan="4" class="">Klik pada nomor tatap muka di atas untuk membuka daftar presensi
                            pada tatap muka tersebut.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
