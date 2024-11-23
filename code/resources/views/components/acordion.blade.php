<div class="accordion mt-3" id="accordionExample{{$numero}}">
    <div class="card accordion-item ">
    <h2 class="accordion-header" id="headingOne">
        <button
        type="button"
        class="accordion-button collapsed"
        data-bs-toggle="collapse"
        data-bs-target="#accordion{{$numero}}"
        aria-expanded="false"
        aria-controls="accordion{{$numero}}"
        >
        {{$titulo}}
        </button>
    </h2>

    <div
        id="accordion{{$numero}}"
        class="accordion-collapse collapse"
        data-bs-parent="#accordionExample{{$numero}}"
    >
        <div class="accordion-body">
        {{$body}}
        </div>
    </div>
    </div>
</div>
