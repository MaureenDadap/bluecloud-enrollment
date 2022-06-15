@if ($message = Session::get('error'))
    <div class="alert alert-danger mt-3 fade show d-flex justify-content-between">
        <span>{{ $message }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($message = Session::get('success'))
    <div class="alert alert-success mt-3 fade show  d-flex justify-content-between">
        <span>{{ $message }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
