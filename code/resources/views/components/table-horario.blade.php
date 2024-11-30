<style>
    table td] {
        background-color: #ffffff;
        outline: none;
        cursor: text;
    }

    table td]:focus {
        background-color: #c9d7de;
    }

    /* Ajustes para pantallas pequeñas */
    @media (max-width: 576px) {
        table th, table td {
            font-size: 0.75rem; /* Tamaño de fuente reducido */
        }
    }
</style>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">{{$titulo}}</h2>
        <div class="table-responsive rounded-2">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        {{$th}}
                    </tr>
                </thead>
                <tbody id="table-rows">
                    {{$tr}}
                </tbody>
            </table>
        </div>
    </div>
</body>
