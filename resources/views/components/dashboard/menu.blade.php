@php
    if (!function_exists('getCollapseId')) {
        function getCollapseId(string $text): string {
            return (string) Str::of('collapse ' . $text)->slug()->camel();
        }
    }

    if (!function_exists('getShowCollapse')) {
        function getShowCollapse(array $item): bool {
            $result = false;

            if (isset($item['items'])) {
                $routes = function (string $route) {
                    $new = explode('.', $route);
                    array_pop($new) xor array_push($new, '*');

                    return [$route, implode('.', $new)];
                };

                foreach ($item['items'] as $k => $v) {
                    if (isset($v['route']) && request()->routeIs($routes($v['route']))) {
                        $result = true;
                    }
                }
            }

            return $result;
        }
    }

    if (!function_exists('getLink')) {
        function getLink(array $item): string {
            return isset($item['route']) && Route::has($item['route'])
                ? route_relative($item['route'])
                : (isset($item['link'])
                    ? $item['link']
                    : '#');
        }
    }
@endphp

<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.main') }}">
        <div class="sidebar-brand-icon">
            <img src="/assets/images/logo-main.svg" style="height: 2.5rem;">
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    @foreach ($items as $item)
        @if (is_array($item))
            @if (empty($item))
                <hr class="sidebar-divider">
                @continue
            @elseif (isset($item['heading']))
                <div class="sidebar-heading">{{ $item['heading'] }}</div>
                @continue
            @endif
        @endif

        @unless (isset($item['items']))
        <li @class(['nav-item', 'active' => request()->routeIs($item['route'])])>
            <a class="nav-link" href="{{ getLink($item) }}">
                @isset($item['icon'])
                <i class="{{ $item['icon'] }}"></i>
                @endisset
                <span>{{ $item['text'] }}</span>
            </a>
        </li>
        @else
        @php
            $isActive = getShowCollapse($item);
            $collapseId = getCollapseId($item['text']);
        @endphp
        <li @class(['nav-item', 'active' => $isActive])>
            <a @class(['nav-link']) href="javascript:void(0)" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="{{ $isActive ? 'false' : 'true' }}" aria-controls="{{ $collapseId }}">
                <i class="{{ $item['icon'] }}"></i>
                <span>{{ $item['text'] }}</span>
            </a>
            <div id="{{ $collapseId }}" @class(['collapse', 'show' => $isActive]) aria-labelledby="{{ str_replace('collapse', 'heading', $collapseId) }}" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @foreach ($item['items'] as $children)
                    @if (is_array($children))
                        @if (empty($children))
                            <div class="collapse-divider"></div>
                            @continue
                        @elseif (isset($children['heading']))
                            <h6 class="collapse-header">{{ $children['heading'] }}</h6>
                            @continue
                        @endif
                    @endif

                    <a class="collapse-item" href="{{ getLink($children) }}">
                        {{ $children['text'] }}
                    </a>
                    @endforeach
                </div>
            </div>
        </li>
        @endunless
    @endforeach

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>