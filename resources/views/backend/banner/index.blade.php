@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3>Manajemen Banner</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="/">Admin Sistem</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-100">
                    @include('backend.layouts.flash')
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title mb-0"> <b>Daftar Banner</b> </h3>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('banner.create') }}" class="btn btn-primary">Tambah Banner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @forelse ($banners as $banner)
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="card h-100">
                                            <img src="{{ asset($banner->getImage()) }}" class="card-img-top" style="height: 250px; object-fit:cover" alt="{{ $banner->id }}">
                                            <div class="card-body d-flex flex-column">
                                                <h3 class="card-title-normalized"> <b> {{ $banner->title }} </b> </h3>
                                                <p class="card-text">Caption : {{ $banner->caption }}</p>
                                                <p class="card-text">Link : <a href="{{ $banner->link }}">{{ $banner->link }}</a></p>
                                                <p class="card-text">Button Text : {{ $banner->button_text }}</p>
                                                <div class="mt-auto">
                                                    <div class="row px-2">
                                                        <div class="col-6 px-1 mb-2">
                                                            <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-sm btn-warning w-100">Edit</a>
                                                        </div>
                                                        <div class="col-6 px-1 mb-2">
                                                            <button onclick="deleteModel('{{ route('banner.destroy', $banner->id) }}', null, 'banner', 'banner {{ $banner->title }} will deleted')" class="btn btn-sm btn-danger w-100">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h5 class="text-center mb-0">Tidak ada data !</h5>
                                @endforelse
                            </div>
                            {{ $banners->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
