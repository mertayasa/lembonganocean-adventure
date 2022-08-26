@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Manajemen Banner</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tambah Banner</h5>
                    </div>
                    <div class="card-body">
                        @include('backend.layouts.flash')
                        {!! Form::open(['route' => 'banner.store', 'enctype' => 'multipart/form-data', 'id' => 'createBannerForm']) !!}
                        @include('backend.banner.form')

                        <div class="mt-3">
                            <a href="{{ route('banner.index') }}" class="btn btn-sm btn-danger">Batal</a>
                            <button class="btn btn-sm btn-primary" type="button" x-on:click="$store.banner.store($event)">Simpan</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const form = document.getElementById('createBannerForm')

        document.addEventListener('alpine:init', () => {
            Alpine.store('banner', {
                store(event){
                    let formData = new FormData(form)
                    clearFlash()

                    Swal.fire({
                        html: '<i class="fas fa-circle-notch fa-spin fa-3x mb-3"></i> <br> Proccessing Data',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    })

                    fetch(form.getAttribute('action'), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        method: 'POST',
                        body: formData,
                    })
                    .then(function(response) {
                        const data = response.json()
                        if (response.status != 200) {
                            data.then((res) => {
                                const message = res.message
                                Alpine.store('global').showFlash(res.message, 'error')
                            })
                            throw new Error()
                        }

                        return data
                    })
                    .then(data => {
                        window.location.href = '{{ route('banner.index') }}'
                    })
                    .catch((error) => {
                        Alpine.store('global').showFlash('Terjadi kesalahan pada sistem', 'error')
                        Swal.close()
                        return showSwalAlert('error', 'Terjadi kesalahan pada sistem')
                    })
                }
            })
        })

    </script>
@endpush

