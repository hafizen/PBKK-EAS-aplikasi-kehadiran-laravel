@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container bg-light pt-2 pb-2 mb-3">
                    <div class="">Selamat datang,</div>
                    <div class="fw-bold">{{ $dosen->nama }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container bg-light pt-2 pb-2 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-left">
                                        <div>Hari ini:
                                            {{ \Carbon\CarbonImmutable::now()->locale('id')->setTimezone('Asia/Jakarta')->isoFormat('dddd, D MMMM YYYY') }}
                                        </div>
                                        <div class="fw-bold">Pekan Perkuliahan ke-16</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container bg-light pt-2 pb-2 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="">Kuliah yang akan datang</div>
                                    @if (count($list_kelas) > 0)
                                        <div class="fw-bold" id="next-kelas">
                                            -
                                        </div>
                                    @else
                                        <div class="fw-bold">
                                            Tidak ada kelas
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container bg-light pt-2 pb-2 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="">Daftar Kuliah Anda</div>
                            <div class="fw-bold">Semester {{ $semester->nama }}</div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            @if (count($list_kelas) > 0)
                                <ul style="list-style-type: none; padding-left: 0px;">
                                    @foreach ($list_kelas as $kelas)
                                        <li>
                                            <div class="content-li mt-2 mb-2">
                                                <div class="mb-2">
                                                    <a href="/kelas/{{ $kelas->kelas_id }}">
                                                        <span class="badge bg-primary mr-2">{{ $kelas->kode_mk }}</span>
                                                        <p class="no-margin mt-2">{{ $kelas->nama_mk }}
                                                            ({{ $kelas->nama_kelas }})
                                                            - {{ $kelas->prodi }}</p>
                                                    </a>
                                                </div>
                                                <p class="no-margin">
                                                    <span class="mr-10"><i class="bi bi-calendar"></i>
                                                        {{ $kelas->hari }}</span>
                                                    <span class="mr-10"><i class="bi bi-clock"></i> <span
                                                            class="start-time" data-day="{{ $kelas->hari }}"
                                                            data-mata-kuliah="{{ $kelas->kode_mk }} - {{ $kelas->nama_mk }} ({{ $kelas->nama_kelas }})">{{ $kelas->jam_mulai }}</span>
                                                        - {{ $kelas->jam_selesai }}</span>
                                                    <span class="mr-10"><i class="bi bi-building"></i>
                                                        {{ $kelas->ruangan }}</span>
                                                </p>
                                            </div>
                                            <hr>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="py-1">
                                    <h6 class="m-0">
                                        <strong>
                                            <i>Tidak ada kelas</i>
                                        </strong>
                                    </h6>
                                </div>
                                <hr>
                            @endif
                        </div>
                    </div>
                    <div class="fw-lighter small">
                        Klik pada nama kuliah Anda di atas untuk membuka daftar tatap muka kuliah tersebut, atau klik <a
                            href="/kelas" class="">di sini</a> untuk membuka daftar kuliah Anda pada semester yang
                        telah lalu.
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        @if (count($list_kelas) > 0)
            <script>
                function convertTimeFormatToSeconds(startTime) {
                    const [hour, min] = startTime.split(':')
                    return 3600 * hour + 60 * min
                }

                function convertDayNameToInt(dayName) {
                    const intRepresentation = {
                        'Minggu': '0',
                        'Senin': '1',
                        'Selasa': '2',
                        'Rabu': '3',
                        'Kamis': '4',
                        'Jumat': '5',
                        'Sabtu': '6',
                    }

                    return intRepresentation[dayName]
                }

                // UTC disini menjadi WIB
                function getWIBDateInstance() {
                    const currentDate = new Date()
                    const wibDate = new Date(Date.UTC(currentDate.getUTCFullYear(), currentDate.getUTCMonth(), currentDate
                        .getUTCDate(), currentDate.getUTCHours(),
                        currentDate.getUTCMinutes(), currentDate.getUTCSeconds(), currentDate.getUTCMilliseconds()))
                    wibDate.setHours(wibDate.getHours() + 7)
                    return wibDate
                }

                function mapStartTimeToDay() {
                    const startTimes = document.getElementsByClassName('start-time')
                    const mappedToDay = {
                        '0': [],
                        '1': [],
                        '2': [],
                        '3': [],
                        '4': [],
                        '5': [],
                        '6': [],
                    }
                    for (let i = 0; i < startTimes.length; i++) {
                        mappedToDay[convertDayNameToInt(startTimes[i].dataset.day)].push({
                            startTime: convertTimeFormatToSeconds(startTimes[i].innerText),
                            mataKuliah: startTimes[i].dataset.mataKuliah
                        })
                    }
                    return mappedToDay
                }

                // For next one week
                function convertStartTimeToEpoch(currentDate) {
                    const mapped = mapStartTimeToDay()
                    const arr = []
                    const currentTime = Math.trunc(currentDate.getTime() / 1000)
                    for (let i = 0; i <= 7; i++) {
                        const dateWithoutHours = new Date(Date.UTC(currentDate.getUTCFullYear(), currentDate.getUTCMonth(),
                            currentDate.getUTCDate()))
                        const wibDay = dateWithoutHours.getUTCDay()
                        for (let j = 0; j < mapped[wibDay].length; j++) {
                            const newStartTime = mapped[wibDay][j].startTime + Math.trunc(dateWithoutHours.getTime() / 1000)
                            if (newStartTime > currentTime)
                                arr.push({
                                    startTime: newStartTime,
                                    mataKuliah: mapped[wibDay][j].mataKuliah
                                })
                        }
                        currentDate.setDate(currentDate.getDate() + 1)
                    }
                    return arr
                }

                function compareObject(a, b) {
                    if (a.startTime < b.startTime) return -1
                    if (a.startTime > b.startTime) return 1
                    if (a.mataKuliah < b.mataKuliah) return -1
                    if (a.mataKuliah > b.mataKuliah) return 1
                    return 0
                }

                const nextKelas = convertStartTimeToEpoch(getWIBDateInstance()).sort(compareObject)[0]?.mataKuliah
                if (nextKelas) document.getElementById('next-kelas').innerText = nextKelas
            </script>
        @endif
    @endsection
