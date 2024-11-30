{{-- <x-template-layout>
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

    <x-floating-icon>
        <x-slot name="url">{{route('subjects.create')}}</x-slot>
    </x-floating-icon>
</x-template-layout> --}}

<x-template-layout>


    @foreach ($courses as $course)

        @foreach ($course->timetables as $timetable)
        <a href="{{ route('timetables.edit', [$timetable->id]) }}">
            <x-table-horario>
                <x-slot name="titulo">{{$course->course_number}}°{{$course->section}}</x-slot>
                <x-slot name="th">
                    <th class="text-center fs-6">Hora</th>
                    <th class="text-center fs-6">Lunes</th>
                    <th class="text-center fs-6">Martes</th>
                    <th class="text-center fs-6">Miércoles</th>
                    <th class="text-center fs-6">Jueves</th>
                    <th class="text-center fs-6">Viernes</th>
                    <th class="text-center fs-6">Sábado</th>
                    <th class="text-center fs-6">Domingo</th>
                </x-slot>
                <x-slot name="tr">
                    @if ($timetable->timeslots->isNotEmpty())
                        @foreach ($timetable->timeslots as $timeslot)
                        <tr>
                            <th scope="row" class="text-center align-middle fs-6">{{$timeslot->start_time}}-{{$timeslot->end_time}}</th>
                            <td scope="row" class="text-center align-middle fs-6">
                                {{($timeslot->daysofweek->day == 'Lunes') ? $timeslot->subject->name : ''}}
                            </td>
                            <td scope="row" class="text-center align-middle fs-6">
                                {{($timeslot->daysofweek->day == 'Martes') ? $timeslot->subject->name : ''}}
                            </td>
                            <td scope="row" class="text-center align-middle fs-6">
                                {{($timeslot->daysofweek->day == 'Miércoles') ? $timeslot->subject->name : ''}}
                            </td>
                            <td scope="row" class="text-center align-middle fs-6">
                                {{($timeslot->daysofweek->day == 'Jueves') ? $timeslot->subject->name : ''}}
                            </td>
                            <td scope="row" class="text-center align-middle fs-6">
                                {{($timeslot->daysofweek->day == 'Viernes') ? $timeslot->subject->name : ''}}
                            </td>
                            <td scope="row" class="text-center align-middle fs-6">
                                {{($timeslot->daysofweek->day == 'Sábado') ? $timeslot->subject->name : ''}}
                            </td>
                            <td scope="row" class="text-center align-middle fs-6">
                                {{($timeslot->daysofweek->day == 'Domingo') ? $timeslot->subject->name : ''}}
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </x-slot>

            </x-table-horario>
        </a>
        @endforeach

    @endforeach

    <x-floating-icon>
        <x-slot name="url">{{route('timetables.create')}}</x-slot>
    </x-floating-icon>

</x-template-layout>
