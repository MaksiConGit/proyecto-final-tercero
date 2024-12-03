<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">{{$titulo}}</label>
    <div class="col-sm-10">
        <select id="defaultSelect" class="form-select" name="{{$name}}" {{ $attributes }}>
            {{$opciones}}
        </select>
    </div>
</div>