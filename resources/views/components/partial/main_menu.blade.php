
@props([
    'mainHref'=>'#',
    'icon'=>'mdi mdi-home',
    'mainTitle'=>'Dashboard',
    'subMenus'=>[],
    'mainUrl'=>""
])

<li class="has-submenu">
    
    <a href="{{ $mainHref }}"><i class="{{ $icon }}"></i>{{ $mainTitle }}</a>
    @if ($subMenus)
    <ul class="submenu megamenu">
        <li>
            <ul>
                @foreach ($subMenus as $subMenu)
                <li><a href="{{ url($mainUrl.$subMenu->id) }}">{{ $subMenu->for_menu }}</a></li>
                @endforeach
               
              
            </ul>
        </li>
       
    </ul>
    @endif
    
</li>