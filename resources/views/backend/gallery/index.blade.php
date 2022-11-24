@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3>Manajemen Gallery</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="/">Admin Sistem</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-100">
                    @include('backend.layouts.flash')
                </div>
            </div>

            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'gallery.store', 'enctype' => 'multipart/form-data', 'id' => 'createGalleryForm']) !!}
                                {!! Form::label('image', 'Gambar', ['class' => 'mb-1']) !!}
                                <div class="border d-flex align-items-center justify-content-center" onclick="handleUpload(this)" style="height:250px !important;">
                                    <a class="text-center" id="textPromptUpload">Click Here to Upload Image</a>
                                    <img src="" alt="" id="previewUpload" data-image="{{ $data_image ?? null }}" class="mx-auto" style="height:100%; width:100%; object-fit:contain; display:none">
                                </div>
                                <div class="input-group">
                                    {!! Form::file('image', ['class' => 'form-control', 'id' => 'imageInputUpload', 'accept'=>'image/*', 'onchange'=>'showPreview(event)']) !!}
                                    <div class="input-group-prepend">
                                        <button class="input-group-text btn-danger d-none" id="clearUpload" type="button" onclick="clearFileUpload()">Clear</button>
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="col-12 pb-3 pb-md-0">
                                        {!! Form::label('caption', 'Caption (Kosongkan apabila tidak diperlukan)', ['class' => 'mb-1']) !!}
                                        {!! Form::text('caption', null, ['class' => 'form-control', 'id' => 'caption']) !!}
                                    </div>
                                </div> --}}
                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary" type="button" x-on:click="$store.gallery.store($event)">Upload Gambar</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @forelse ($galleries as $gallery)
                                    <div class="col-6 col-md-3 mb-3">
                                        <div class="card mb-0">
                                            <img src="{{ asset($gallery->getImage()) }}" class="card-img-top" style="max-height: 200px; object-fit:contain" alt="{{ $gallery->id }}">
                                            <span class="p-2">{{ $gallery->caption }}</span>
                                            <button onclick="deleteModel('{{ route('gallery.destroy', $gallery->id) }}', null, 'gallery', 'this image will deleted')" class="btn btn-sm btn-danger w-100">Hapus</button>
                                        </div>
                                    </div>
                                @empty
                                    <h5 class="text-center mb-0">Tidak ada data !</h5>
                                @endforelse
                            </div>
                            {{ $galleries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const form = document.getElementById('createGalleryForm')

        document.addEventListener('alpine:init', () => {
            Alpine.store('gallery', {
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
                        window.location.href = '{{ route('gallery.index') }}'
                    })
                    .catch((error) => {
                        Alpine.store('global').showFlash('Terjadi kesalahan pada sistem', 'error')
                        Swal.close()
                        return showSwalAlert('error', 'Terjadi kesalahan pada sistem')
                    })
                },
                destroy(event){
                    console.log(event.target.dataset.id);
                }
            })
        })

    </script>
    @include('backend.layouts.upload_image_js')
@endpush
