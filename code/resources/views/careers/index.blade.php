<x-template-layout>
    <div class="container">

        <div class="row">
            @foreach ($careers as $career)
                <div class="col-md-6 col-lg-4 mb-3 d-flex">
                    <a href="{{route('careers.show', [$career->id])}}">
                        <x-card>
                            <x-slot name="titulo">{{$career->name}}</x-slot>
                            <x-slot name="img">
                                <img class="card-img-top" src="../template_files/assets/img/reyo/programacion-2-e1551291144973.jpg" alt="materia" />
                            </x-slot>
                            <x-slot name="texto">{{$career->institution->name}}</x-slot>
                            <x-slot name="footer"></x-slot>
                        </x-card>
                    </a>
                </div>
            @endforeach
        </div>

{{-- 
        <h1>Carreras</h1>
        <a href="{{route('careers.create')}}">create</a>
        <ul>
            @foreach ($careers as $career)
            <li><a href="{{route('careers.show', [$career])}}"> {{$career->name}}</a></li>
            @endforeach
        </ul>
        <hr>
        <h4>Carreras Eliminadas</h4>
        <ul>
            @foreach ($trashed as $trash)
                <li>{{$trash->name}}</li>
            @endforeach
        </ul> --}}
    </div>
    <x-floating-icon>
        <x-slot name="url">{{route('careers.create')}}</x-slot>
    </x-floating-icon>
</x-template-layout>