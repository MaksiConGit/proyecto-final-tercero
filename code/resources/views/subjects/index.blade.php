<x-template-layout>
    <div class="container">
        <div class="row">
            @foreach ($subjects as $subject)
                <x-card>
                    <x-slot name="subject">{{$subject->id}}</x-slot>
                    <x-slot name="nombre_materia">{{$subject->name}}</x-slot>
                    <x-slot name="nombre_profesor">

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
                </x-card>
            @endforeach
        </div>
    </div>

    <x-floating-icon></x-floating-icon>
</x-template-layout>
