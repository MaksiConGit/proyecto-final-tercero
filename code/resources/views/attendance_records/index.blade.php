<x-template-layout>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($students as $student)
                <x-card-attendance>
                    @php
                        $attendance = $student->attendanceRecords->where('has_attended', 1)->count();
                        $attendance_percentage = round($attendance / round(50) * 100, 1);
                        $absence_percentage = 100 - $attendance_percentage;
                    @endphp
                    <x-slot name="titulo">{{$student->name}}, {{$student->lastname}}</x-slot>
                    <x-slot name="url">{{route('students.show', [$student->id])}}</x-slot>
                    <x-slot name="id">{{ $student->id }}</x-slot>
                    <x-slot name="porcentaje_asistencia">{{ $attendance_percentage }}</x-slot>
                    <x-slot name="porcentaje_inasistencia">{{ $absence_percentage }}</x-slot>
                </x-card-attendance>
            @endforeach
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const primaryColor = '#666ee8';
            const lightGreyColor = '#D3D3D3';
            const orangeLightColor = '#FDAC34';
            
            @foreach ($students as $student)

                @php
                    $attendance = $student->attendanceRecords->where('has_attended', 1)->count();
                    $attendance_percentage = round($attendance / round(50) * 100, 1);
                    $absence_percentage = 100 - $attendance_percentage;
                @endphp
                
                const ctx{{$student->id}} = document.getElementById('doughnutChart{{$student->id}}').getContext('2d');
                const doughnutChart{{$student->id}} = new Chart(ctx{{$student->id}}, {
                    type: 'doughnut',
                    data: {
                        labels: ['Asistencia', 'Inasistencia'],
                        datasets: [{
                            data: [{{ $attendance_percentage }}, {{ $absence_percentage }}],
                            backgroundColor: [primaryColor, lightGreyColor],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        cutout: '68%',
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.label + ' : ' + context.raw + ' %';
                                    }
                                },
                                backgroundColor: '#FFF',
                                titleColor: '#333',
                                bodyColor: '#666',
                                borderWidth: 1,
                                borderColor: '#DDD'
                            }
                        }
                    }
                });
            @endforeach
        });
    </script>
    <x-floating-icon>
        <x-slot name="url">{{route('attendance_records.create')}}</x-slot>
    </x-floating-icon>
</x-template-layout>
