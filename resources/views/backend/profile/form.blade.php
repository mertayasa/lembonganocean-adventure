{{-- Profile Form --}}
<div class="col-12 col-md-6">
    <div class="row">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('nama', 'Nama', ['class' => 'mb-1']) !!}
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('email', 'Email', ['class' => 'mb-1']) !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('password', 'Password', ['class' => 'mb-1']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 pb-3 pb-md-0">
            {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) !!}
        </div>
    </div>
</div>
