<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../template_files/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Inicio de Sesion</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../../template_files/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../template_files/assets/css/demo.css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../template_files/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="../../template_files/assets/vendor/js/helpers.js"></script>
    <script src="../../template_files/assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar min-vh-100 d-flex justify-content-center align-items-center">
        <div class="container-xxl d-flex justify-content-center align-items-center">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card px-sm-6 px-0" style="max-width: 400px;">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center mb-4">
                                <h3 class="text-primary app-brand-logo">Gestion Educativa</h3>
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-4">Bienvenido!</h4>
                            <p class="mb-6">Por favor ingrese sus datos de inicio de sesión para ingresar</p>
    
                            <!-- Mostrar mensaje de estado de la sesión -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
    
                            <!-- Formulario de Laravel Breeze -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
    
                                <!-- Email Address -->
                                <div class="mb-4">
                                    <x-input-label for="email" :value="__('Correo Electrónico')" />
                                    <x-text-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
    
                                <!-- Password -->
                                <div class="mt-4 mb-4">
                                    <x-input-label for="password" :value="__('Contraseña')" />
                                    <x-text-input id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                </div>
    
                                <!-- Remember Me -->
                                <div class="block mt-4 mb-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <span class="ms-2 text-sm text-gray-600">Recuerdame</span>
                                    </label>
                                </div>
    
                                <!-- Forgot Password -->
                                <div class="d-flex justify-content-between">
                                    @if (Route::has('password.request'))
                                        <a class="text-sm text-primary" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
    
                                <!-- Submit Button -->
                                <div class="mt-4">
                                    <x-primary-button class="btn btn-primary d-grid w-100">
                                        {{ __('Iniciar Sesión') }}
                                    </x-primary-button>
                                </div>
                            </form>
    
                            <p class="text-center mt-4 mb-0">
                                <span>No tienes cuenta?</span>
                                <a href="auth-register-basic.html">
                                    <span>Crea una cuenta</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <!-- Core JS -->
                <!-- build:js assets/vendor/js/core.js -->
                <script src="../../template_files/assets/vendor/libs/jquery/jquery.js"></script>
                <script src="../../template_files/assets/vendor/libs/popper/popper.js"></script>
                <script src="../../template_files/assets/vendor/js/bootstrap.js"></script>
                <script src="../../template_files/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                <script src="../../template_files/assets/vendor/js/menu.js"></script>
                <!-- endbuild -->

                <!-- Vendors JS -->
                <script src="../../template_files/assets/vendor/libs/apex-charts/apexcharts.js"></script>

                <!-- Main JS -->
                <script src="../../template_files/assets/js/main.js"></script>

                <!-- Page JS -->
                <script src="../../template_files/assets/js/dashboards-analytics.js"></script>

                <!-- Place this tag in your head or just before your close body tag. -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>


<!-- Session Status -->
{{-- <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
