<div class="col-12 col-md-6">
    <div class="row">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('title', 'Judul', ['class' => 'mb-1']) !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('priceStart', 'Harga Terendah', ['class' => 'mb-1']) !!}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">IDR</div>
                </div>
                {!! Form::text('price_start', null, ['class' => 'form-control number-decimal', 'id' => 'priceStart']) !!}
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('priceEnd', 'Harga Tertinggi (Kosongkan apabila paket hanya memiliki 1 jenis harga)', ['class' => 'mb-1']) !!}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">IDR</div>
                </div>
                {!! Form::text('price_end', null, ['class' => 'form-control number-decimal', 'id' => 'priceEnd']) !!}
            </div>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('image', 'Foto (Thumbnail paket)', ['class' => 'mb-1']) !!}
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
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('shortDescription', 'Deskripsi Singkat (Penjelasan singkat untuk halaman depan)', ['class' => 'mb-1']) !!}
            {!! Form::textarea('short_description', null, ['class' => 'form-control', 'id' => 'shortDescription']) !!}
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('fullDescription', 'Deskripsi Detail (Penjelasan full mengenai paket)', ['class' => 'mb-1']) !!}
            {!! Form::textarea('full_description', null, ['class' => 'form-control tiny', 'id' => 'fullDescription']) !!}
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('plugin/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        const textPromptUpload = document.getElementById('textPromptUpload')
        const previewUpload = document.getElementById("previewUpload")
        const imageInputUpload = document.getElementById('imageInputUpload')
        const clearUpload = document.getElementById('clearUpload')
        let imageIsModified = false

        if(window.location.href.includes('edit')){
            const dataImage = previewUpload.getAttribute('data-image')
            if(dataImage){
                previewUpload.src = dataImage
                textPromptUpload.classList.add('d-none')
                previewUpload.classList.remove('d-none')
                previewUpload.classList.add('d-block')
                clearUpload.classList.remove('d-none')
            }
        }

        function showPreview(event) {
            if (event.target.files.length > 0) {

                console.log(event.target.files[0]);

                // Validate Size
                const fileSize = Math.round((event.target.files[0].size / 1024))
                if (fileSize >= 5120) {
                    imageInputUpload.value = ''
                    return showSwalAlert('error', 'File too big, please select a file less than 5MB')
                }

                // Validate extension
                const fileName = event.target.files[0].name
                const extension = fileName.substr(fileName.lastIndexOf("."))
                const allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;
                const isAllowed = allowedExtensionsRegx.test(extension)
                console.log(isAllowed);
                if(!isAllowed){
                    imageInputUpload.value = ''
                    return showSwalAlert('error', 'Invalid file type, please upload .jpg, .jpeg, .png, .gif, .webp file')
                }

                let src = URL.createObjectURL(event.target.files[0])
                previewUpload.src = src
                previewUpload.classList.add('d-block')
                textPromptUpload.classList.add('d-none')
                clearUpload.classList.remove('d-none')
                imageIsModified = true
            }
        }

        function clearFileUpload() {
            previewUpload.src = ''
            previewUpload.classList.remove('d-block')
            previewUpload.classList.add('d-none')
            textPromptUpload.classList.remove('d-none')
            clearUpload.classList.add('d-none')
            imageInputUpload.value = ''
            imageIsModified = true
        }

        function handleUpload(el) {
            imageInputUpload.click()
        }

        tinymce.init({
            selector: '.tiny',
            images_upload_url: "{!! url('tiny-image-upload') !!}",
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            image_title: true,
            automatic_uploads: true,
            plugins: 'image anchor advlist lists table',
            menubar: 'file edit view insert format tools table tc help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | image | table',
            content_style: "p { margin: 0; }",
            height: "750",
            branding: false,
        })
    </script>
@endpush
