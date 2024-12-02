<!-- Toggle Between Modals -->
<div class="col-lg-4 col-md-6">
    {{-- <small class="text-light fw-semibold">Toggle Between Modals</small> --}}
    <div class="mt-3">
        {{-- <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalToggle"
        >
        Launch modal
        </button> --}}
        <!-- Modal 1-->
        <div
        class="modal fade"
        id="modalToggle"
        aria-labelledby="modalToggleLabel"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">{{$titulo}}</h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">{{$contenido}}</div>
            <div class="modal-footer">
                <button
                class="btn btn-danger"
                type="submit"
                >
                Eliminar permanentemente
                </button>
                <a href=""
                class="btn btn-primary"
                data-bs-dismiss="modal">
                    Volver
                </a>
            </div>
            </div>
        </div>
        </div>
        <!-- Modal 2-->
        <div
        class="modal fade"
        id="modalToggle2"
        aria-hidden="true"
        aria-labelledby="modalToggleLabel2"
        tabindex="-1"
        >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel2">Modal 2</h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">Hide this modal and show the first with the button below.</div>
            <div class="modal-footer">
                <button
                class="btn btn-primary"
                data-bs-target="#modalToggle"
                data-bs-toggle="modal"
                data-bs-dismiss="modal"
                >
                Back to first
                </button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>