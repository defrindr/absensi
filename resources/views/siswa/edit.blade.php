@extends('layouts.main')


@push('title')
	Ubah Siswa
@endpush
@push('header-title')
	Ubah Siswa
@endpush


@section('content')
<div class="col-md-12">
  <x-alerts :data="$errors" />
  <div class="card card-success">
    <div class="card-body">
        <form action="{{ route('siswa.update',[
            'kelas' => $kelas,
            'siswa' => $siswa,
            ]) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nip">NIP <span class="text-danger">*</span></label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ $siswa->nip }}" disabled>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}">
            </div>
            <div class="form-group">
                <label for="alamat_rumah">Alamat Rumah <span class="text-danger">*</span></label>
                <textarea type="text" name="alamat_rumah" id="alamat_rumah" class="form-control">{{ $siswa->alamat_rumah }}</textarea>
            </div>
            <div class="form-group">
                <label for="alamat_domisili">Alamat Domisili <span class="text-danger">*</span></label>
                <textarea type="text" name="alamat_domisili" id="alamat_domisili" class="form-control">{{ $siswa->alamat_domisili }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp <span class="text-danger">*</span></label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="+62" value="{{ $siswa->no_telp }}">
            </div>
            <div class="form-group">
                <label for="nama_wali">Nama Wali <span class="text-danger">*</span></label>
                <input type="text" name="nama_wali" id="nama_wali" class="form-control" value="{{ $siswa->nama_wali }}">
            </div>
            <div class="form-group">
                <label for="no_telp_wali">No Telp Wali <span class="text-danger">*</span></label>
                <input type="text" name="no_telp_wali" id="no_telp_wali" class="form-control" placeholder="+62" value="{{ $siswa->no_telp_wali }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="btn-submit">
                    Submit
                </button>
                <a href="{{ route('kelas.show',['kelas' => $kelas]) }}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
  </div>
</div>
@stop

@push('_js')
<script>
$(document).ready(function() {
    $('#btn-submit').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data akan ditambahkan ke dalam database setelah proses ini dijalankan.",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya!",
            cancelButtonText: 'Tidak',
        }).then( (result) => {
            if (result.value) form.submit();
        });
    });
});

</script>
@endpush