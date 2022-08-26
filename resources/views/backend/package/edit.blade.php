@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Manajemen Paket Tour</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Paket Tour</h5>
                    </div>
                    <div class="card-body">
                        @include('backend.layouts.flash')
                        {!! Form::model($package, ['route' => ['package.update', $package->slug], 'enctype' => 'multipart/form-data', 'id' => 'updatePackageForm']) !!}
                        @include('backend.package.form')

                        <div class="mt-3">
                            <a href="{{ route('package.index') }}" class="btn btn-sm btn-danger">Batal</a>
                            <button class="btn btn-sm btn-primary" type="button" x-on:click="$store.package.update($event)">Simpan</button>
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
        const form = document.getElementById('updatePackageForm')

        document.addEventListener('alpine:init', () => {
            Alpine.store('package', {
                update(event){
                    let formData = new FormData(form)
                    formData.append('image_modified', imageIsModified)
                    formData.append('_method', 'PATCH')
                    formData.append('full_description', tinymce.activeEditor.getContent())
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
                        window.location.href = '{{ route('package.index') }}'
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

