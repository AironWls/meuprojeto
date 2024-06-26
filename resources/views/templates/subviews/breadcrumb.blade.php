<div class="container mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            @if(isset($model) && !is_null($model))
                <li class="breadcrumb-item"><a href="#">{{ $model }}</a></li>
            @endif

            @if (isset($action) && !is_null($action))
                <li class="breadcrumb-item">{{ $action }}</li>
            @endif

        </ol>
    </nav>

</div>
