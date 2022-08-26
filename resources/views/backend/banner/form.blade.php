<div class="col-12 col-md-6">
    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('image', 'Gambar Banner', ['class' => 'mb-1']) !!}
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
            {!! Form::label('title', 'Judul (Kosongkan apabila tidak diperlukan)', ['class' => 'mb-1']) !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('caption', 'Caption (Kosongkan apabila tidak diperlukan)', ['class' => 'mb-1']) !!}
            {!! Form::textarea('caption', null, ['class' => 'form-control', 'id' => 'caption', 'style' => 'height:80px']) !!}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('link', 'Link (Kosongkan apabila tidak diperlukan)', ['class' => 'mb-1']) !!}
            {!! Form::text('link', null, ['class' => 'form-control', 'id' => 'link']) !!}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('button_text', 'Text Untuk Tombol (Kosongkan apabila tidak diperlukan)', ['class' => 'mb-1']) !!}
            {!! Form::text('button_text', null, ['class' => 'form-control', 'id' => 'button_text']) !!}
        </div>
    </div>
</div>

@push('scripts')
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
    </script>
@endpush
