<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $breadcrumb->title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumb->list as $label => $url)
                        @if ($loop->last)
                            <li class="breadcrumb-item active">{{ $label }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>
