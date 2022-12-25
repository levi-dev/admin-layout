@php
    $itemClass = "ms-1 ms-lg-3";
    $btnClass = "btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px";
    $userAvatarClass = "symbol-30px symbol-md-40px";
    $btnIconClass = "svg-icon-1";
    $topbars = config('backend.topbar');
@endphp

<!--begin::Toolbar wrapper-->
<div class="d-flex align-items-stretch flex-shrink-0">
    @foreach ($topbars as $topbar)
        {{ view($topbar['template']) }}
    @endforeach
    <!--begin::Header menu toggle-->
        @if(theme()->getOption('layout', 'header/left') === 'menu')
            <div class="d-flex align-items-center d-lg-none ms-2 me-n3">
                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                     id="kt_header_menu_mobile_toggle">
                    {!! theme()->getSvgIcon("icons/duotune/text/txt001.svg", "svg-icon-1") !!}
                </div>
            </div>
        @endif
    <!--end::Header menu toggle-->
</div>
<!--end::Toolbar wrapper-->
