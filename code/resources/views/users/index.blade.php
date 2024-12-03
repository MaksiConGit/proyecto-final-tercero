<x-template-layout>
    <style>
        .stretched-link {
            z-index: 1;
        }

        .internal-link {
            position: relative;
            z-index: 2;
        }

        .user-card img {
            object-fit: cover;
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }

        .user-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .user-card:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Configuración de la cuadrícula -->
            @foreach ($users as $user)
                <div class="col">
                    <div class="card user-card position-relative">
                        <a href="{{ route('users.show', [$user->id]) }}" class="stretched-link"></a>
                        <div class="d-flex align-items-center p-3">
                            <img src="../../template_files/assets/img/elements/12.jpg" alt="User image">
                            <div class="ms-3">
                                <h5 class="card-title mb-1">{{ $user->name }}</h5>
                                <p class="card-text mb-0">
                                    <span class="">
                                        @if ($user->teacher)
                                            {{$user->teacher->name}}, 
                                            {{$user->teacher->lastname}}
                                        @elseif ($user->student)
                                            {{$user->student->name}}, 
                                            {{$user->student->lastname}}
                                        @elseif ($user->principal)
                                            {{$user->principal->name}}, 
                                            {{$user->principal->lastname}}
                                        @endif
                                    </span>
                                </p>
                                <p class="card-text mb-0">
                                    <span class="badge me-1
                                    @if($user->role->id == 1) bg-label-danger 
                                    @elseif($user->role->id == 2) bg-label-primary 
                                    @elseif($user->role->id == 3) bg-label-warning 
                                    @elseif($user->role->id == 4) bg-label-info 
                                    @else bg-label-secondary
                                    @endif">
                                    {{$user->role->name}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-template-layout>
