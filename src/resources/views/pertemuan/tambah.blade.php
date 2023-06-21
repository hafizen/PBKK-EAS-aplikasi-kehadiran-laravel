@extends('layouts.app')

@section('title', 'Tambah Pertemuan')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <a href="{{ route('kelas', ['id' => $id_kelas]) }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left"></i> Kembali</a>
    </div>
</div>
<form method="POST" class="container bg-light p-3 mb-3 needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-sm-3 mb-3">
            <label for="pertemuan-ke" class="form-label fw-bolder">Pertemuan ke-</label>
            <input type="number" class="form-control" id="pertemuan-ke" name="pertemuan-ke" placeholder="1" required>
            <div class="invalid-feedback">
                Mohon masukkan nomor pertemuan
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="ruangan" class="form-label fw-bolder">Ruangan</label>
            <select class="form-select" id="ruangan" name="ruangan" aria-label="Default select example">
                <option value="" selected>Pilih ruangan</option>
                @foreach ($list_ruangan as $ruangan)
                <option value="{{ $ruangan->ruangan_id }}">{{ $ruangan->kode }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-3">
            <label for="tanggal" class="form-label fw-bolder">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            <div class="invalid-feedback">
                Mohon masukkan tanggal pertemuan
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <label for="jam-mulai" class="form-label fw-bolder">Jam Mulai</label>
            <input type="text" class="form-control" id="jam-mulai" name="jam-mulai" required>
            <div class="invalid-feedback">
                Mohon masukkan jam mulai pertemuan
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <label for="jam-selesai" class="form-label fw-bolder">Jam Selesai</label>
            <input type="text" class="form-control" id="jam-selesai" name="jam-selesai" required>
            <div class="invalid-feedback">
                Mohon masukkan jam selesai pertemuan
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="topik" class="form-label fw-bolder">Topik Perkuliahan</label>
        <textarea name="topik" id="topik" rows="5" class="form-control" required></textarea>
        <div class="invalid-feedback">
            Mohon masukkan topik perkuliahan
        </div>
    </div>
    <div class="mb-3">
        <label for="topik-en" class="form-label fw-bolder">Topik Perkuliahan (EN)</label>
        <textarea name="topik-en" id="topik-en" rows="5" class="form-control" required></textarea>
        <div class="invalid-feedback">
            Mohon masukkan topik perkuliahan (Bahasa Inggris)
        </div>
    </div>
    <div>
        <label for="mode-perkuliahan" class="form-label fw-bolder">Mode Perkuliahan</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="mode-perkuliahan" id="online" value="D" checked aria-checked="true" required>
            <label class="form-check-label fst-italic" for="online">
                <span>Online</span>
                <p class="small mb-0 fst-normal">Dosen dan mahasiswa terhubung melalui internet</p>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="mode-perkuliahan" id="offline" value="L">
            <label class="form-check-label fst-italic" for="offline">
                <span>Offline</span>
                <p class="small mb-0 fst-normal">Dosen dan mahasiswa berada di dalam ruangan yang sama</p>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="mode-perkuliahan" id="hybrid" value="H">
            <label class="form-check-label fst-italic" for="hybrid">
                <span>Hybrid</span>
                <p class="small mb-0 fst-normal">Tatap muka kombinasi <i>online</i> dan <i>offline</i></p>
            </label>
            <div class="invalid-feedback">
                <p>Mohon pilih bentuk pertemuan</p>
            </div>
        </div>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
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