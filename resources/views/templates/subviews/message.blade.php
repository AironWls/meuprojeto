@if (session('status'))
    <div class="container">
        <div class="alert {{ session('alert-class') ?? 'alert-success' }} alert-dismissible fade show mb-3" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
