@extends('layouts.app')

@section('title', 'Kode Presensi')

@section('content')
@foreach($errors->all() as $message)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ ucfirst(str_replace('_', ' ', $message)) . '.' }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endforeach
<div class="row mb-3">
    <div class="col-md-12">
        <a href="{{ route('pertemuan', $id_pertemuan) }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-left"></i> Kembali</a>
    </div>
</div>
<div class="container">
    @if ($kode_presensi && $kode_presensi->kode_akses)
        <div class="col-md-12">
            <div class="row items-push">
                <div class="col-md-12">
                    <div id="code-qr" class="text-center">
                    </div>
                </div>
            </div>
            <div class="row items-push">
                <div class="col-md-12">
                    <div id="code-access" class="text-center">
                        <div id="code-qr" class="text-center mg-t-10"></div>
                        <h1 class="mt-4">{{ $kode_presensi->kode_akses }}</h1>
                        <p>
                            Kode akses berlaku sampai {{ $kode_presensi->berlaku_sampai }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row items-push">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateModal">
                        Ganti kode presensi
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-12">
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i>
                <strong>Kode akses belum dibuat</strong>
                <p>
                    Silahkan memulai pertemuan terlebih dahulu.
                </p>
            </div>
        </div>
    @endif
</div>
{{--<div class="modal fade" id="generateModal" tabindex="-1">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <form action="{{ route('ganti-kode-presensi', $id_pertemuan) }}" method="post">--}}
{{--                @csrf--}}
{{--                @method('PATCH')--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="generateModalLabel">Ganti Kode Presensi</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    Apakah anda yakin ingin mengganti kode presensi?--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="submit" class="btn btn-primary" id="code-halaman-tampil">--}}
{{--                        Buat kode presensi baru--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

@section('scripts')
<script src="/lib/qrcodejs/qrcode.min.js"></script>
<script type="text/javascript">
    @if ($kode_presensi)
        function drawQRCode() {
            new QRCode(document.getElementById('code-qr'), {
                text: '{{ $kode_presensi->payload }}',
                width: 500,
                height: 500,
            });
        }

        drawQRCode()
    @endif

    document.querySelectorAll('.bataswaktu').forEach(function(e) {
        e.addEventListener('click', function() {
            let denganBatasWaktu = document.getElementById('bataswaktu').checked;
            document.getElementById('menitBerlaku').disabled = !denganBatasWaktu;
            if (!denganBatasWaktu)
                document.getElementById('menitBerlaku').value = '';
        })
    })
</script>
@endsection

@section('styles')
    <style>
        img {
            margin: 0 auto
        }
    </style>
@endsection
