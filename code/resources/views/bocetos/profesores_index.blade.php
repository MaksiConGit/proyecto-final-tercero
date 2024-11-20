<x-template-layout>
    <div class="container">
        <div class="d-flex flex-column align-items-stretch gap-3">
            <x-card-horizontal>
                <x-slot name="titulo">Nicolas Rotili</x-slot>
                <x-slot name="texto"> Materias: Base de Datos y Desarrollo Web
                    <br>
                    Email: NicoRotili@gmail.com</x-slot>
            </x-card-horizontal>
            <x-card-horizontal>
                <x-slot name="titulo">Walter Bur</x-slot>
                <x-slot name="texto"> Materias: Seguridad de los sistemas, Sistema de Informacion Organizacional, Redes
                    y
                    Comunicacion
                    <br>
                    Email: Wbur@gmail.com</x-slot>
            </x-card-horizontal>
            <x-card-horizontal>
                <x-slot name="titulo">Karina Gigli</x-slot>
                <x-slot name="texto"> Materia: Practica Profecionalizante II
                    <br>
                    Email: GigliKarina@gmail.com</x-slot>
            </x-card-horizontal>
        </div>
    </div>

</x-template-layout>
