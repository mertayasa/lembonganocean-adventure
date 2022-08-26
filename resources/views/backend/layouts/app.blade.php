<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Admin Sistem</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <style>
        .select2 {
            width: 100% !important;
        }

        .toast-error {
            background-color: red !important;
        }

        .toast-success {
            background-color: green !important;
        }

        .col-md-16-6 {
            flex: 0 0 auto;
            width: 16.6%;
        }

        .btn {
            font-weight: 500;
        }

        .btn-sm {
            border-radius: .2rem !important;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="wrapper" x-data="{}">
        @include('backend.layouts.sidebar')
        <div class="main">
            @include('backend.layouts.navbar')

            <main class="content">
                @yield('content')
            </main>

            {{-- <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer> --}}
        </div>
    </div>

    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script defer src="{{ asset('plugin/alpinejs/alpine.min.js') }}"></script>
    <script>
        const baseUrl = "{{ url('/') }}"

		function deleteModel(deleteUrl, tableId, model = '', additional_warning = '', additionalMethod = null){
			Swal.fire({
				title: "Warning",
				text: `Destroy data ${model}? ${additional_warning}`,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#169b6b',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.isConfirmed) {
					fetch(deleteUrl, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            method: 'DELETE',
                        })
                        .then(function(response) {
                            const data = response.json()
                            if (response.status != 200) {
                                throw new Error()
                            }

                            return data
                        })
                        .then(data => {

                            if(tableId != null){
                                $('#'+tableId).DataTable().ajax.reload()
                            }else{
                                return Swal.fire({
                                    title: 'Success',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                })
                                .then((result) => {
                                    if(additionalMethod != null){
                                        additionalMethod()
                                    }

                                    console.log(result);

                                    if (result.isConfirmed) {
                                        window.location.reload()
                                    }
                                })
                            }

							if(additionalMethod != null){
								additionalMethod.apply(this, [data.args])
							}
                            Swal.fire('Success', data.message,'success')
                        })
                        .catch((error) => {
							Swal.fire('Error', "{{ trans('flash.failed.delete') }}", 'error')
                        })
				}
			})
		}


        $(document).ready(function() {
            $('select:not(.custom-select)').select2({
                theme: 'bootstrap4',
            });
        })

        function showToast(code, text) {
            if (code == 1) {
                toastr.success(text)
            }

            if (code == 0) {
                toastr.error(text)
            }
        }

        function clearErrorMessage() {
            const invalidFeedback = document.getElementsByClassName('invalid-feedback')

            for (let invalid = 0; invalid < invalidFeedback.length; invalid++) {
                const element = invalidFeedback[invalid]
                const targetField = element.getAttribute('error-name')
                const inputElement = document.querySelectorAll(`[name="${targetField}"]`)
                element.innerHTML = ''
                for (let inputEl = 0; inputEl < inputElement.length; inputEl++) {
                    if (inputElement[inputEl] != undefined) {
                        inputElement[inputEl].classList.remove('is-invalid')
                    }
                }

            }
        }

        function showValidationMessage(errors) {
            Object.keys(errors).forEach(function(key) {
                let errorSpan = document.querySelectorAll(`[error-name="${key}"]`)
                let errorInput = document.querySelectorAll(`[name="${key}"]`)

                for (let eInput = 0; eInput < errorInput.length; eInput++) {
                    const selectedErrorInput = errorInput[eInput];
                    selectedErrorInput.classList.add('is-invalid')
                }

                for (let eSpan = 0; eSpan < errorSpan.length; eSpan++) {
                    const selectedErrorSpan = errorSpan[eSpan];
                    if (selectedErrorSpan != undefined) {
                        selectedErrorSpan.innerHTML = errors[key][0]
                    } else {
                        showToast(0, 'Terjadi kesalahan pada sistem')
                    }
                }

            })
        }

        function isNull(value) {
            if (value == '' || value == undefined || value == null) {
                return true
            }

            return false;
        }

        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $.fn.dataTable.tables({
                    visible: true,
                    api: true
                }).columns.adjust().responsive.recalc().ajax.reload();
            });
        })

		function strict2Decimal(element) {
            let value = element.value;
            element.value = (value.indexOf(".") >= 0) ? (value.substr(0, value.indexOf(".")) + value.substr(value.indexOf("."), 3)) : value
        }

        function rmStringFromNumber(value){
            return value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')
        }

        document.body.addEventListener('input', function ( element ) {
            if( element.target.classList.contains('number-decimal') ) {
                element.target.value = rmStringFromNumber(element.target.value)
                strict2Decimal(element.target)
            }
        })

        function showSwalAlert(type, message){
            const title = type == 'success' ? 'Success' : (type == 'error' ? 'Oppps..' : 'Warning')
            return Swal.fire({
                title: title,
                text: message,
                icon: type,
            })
        }

        function clearFlash(){
            Alpine.store('global').isFlash = false
            Alpine.store('global').flashData = []
        }

        document.addEventListener('alpine:init', () => {
            Alpine.store('global', {
                isFlash: false,
                flashClass: 'error',
                flashData: [],
                showFlash: function(message, flashType) {
                    this.isFlash = true
                    switch(flashType) {
                        case 'success':
                            this.flashClass = 'bg-success'
                            break
                        case 'error':
                            this.flashClass = 'bg-danger'
                            break
                        case 'warning':
                            this.flashClass = 'bg-warning'
                            break
                        case 'info':
                            this.flashClass = 'bg-info'
                            break
                        default:
                            this.flashClass = 'bg-danger'
                            break
                    }

                    if(typeof message === 'object') {
                        this.flashData = message
                    }else{
                        this.flashData.push(message)
                    }
                },
            })
        })
    </script>

    @stack('scripts')
</body>

</html>
