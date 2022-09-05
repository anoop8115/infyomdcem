<!-- App Name Field -->
<div class="col-sm-12">
    {!! Form::label('app_name', 'App Name:') !!}
    <p>{{ $setting->app_name }}</p>
</div>

<!-- Color Field -->
<div class="col-sm-12">
    {!! Form::label('color', 'Color:') !!}
    <p>{{ $setting->color }}</p>
</div>

<!-- Heading Field -->
<div class="col-sm-12">
    {!! Form::label('heading', 'Heading:') !!}
    <p>{{ $setting->heading }}</p>
</div>

<!-- Logo Field -->
<div class="col-sm-12">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{{ $setting->logo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $setting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $setting->updated_at }}</p>
</div>

