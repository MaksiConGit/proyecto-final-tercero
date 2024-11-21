<x-template-layout>
    <div class="container">
        <div class="row">
            @foreach ($subjects as $subject)
                <div class="col-md-6 col-lg-4 mb-3 d-flex">
                    <a href="{{route('subjects.show', [$subject->id])}}">
                        <x-card>
                            <x-slot name="style"></x-slot>
                            <x-slot name="objeto">{{$subject->id}}</x-slot>
                            <x-slot name="titulo">{{$subject->name}}</x-slot>
                            <x-slot name="img">
                                <img class="card-img-top" src="../template_files/assets/img/reyo/programacion-2-e1551291144973.jpg" alt="materia" />
                            </x-slot>
                            <x-slot name="texto">

                                @php
                                    $primero = true;  
                                @endphp

                                @if ($subject->teacherSubject->isNotEmpty())

                                    Profesores:

                                    @foreach ($subject->teacherSubject as $teacherSubject)

                                        @php
                                            if (!$primero) {
                                                echo ", ";
                                            }

                                            echo $teacherSubject->teacher->name;

                                            $primero = false;
                                            
                                        @endphp

                                    @endforeach

                                @else
                                    No tiene profesor asignado.
                                @endif
                            
                            </x-slot>
                            <x-slot name="footer"></x-slot>
                        </x-card>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <x-floating-icon></x-floating-icon>
</x-template-layout>
