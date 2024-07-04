<?php 
   use App\MainSystem\system; 
   $system = new system() ;
   $record = $system->getUserMenu() ;
   $menu_group = $record['menu_group'] ;
   $menus    = $record['menus'];

?>
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu" >
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @foreach ($menu_group as $groups)
                <li class="menu-title" style="font-size: 12px;">{{$groups->description}}</li>
                    @foreach ($menus->where('menu_group_code',$groups->code) as $item)
                        <li>
                            <a href="{{url("/$item->url")}}" class=" waves-effect"style="font-size: 13px;margin-left: 20px">    
                                {!! $item->icon !!}
                                <span>{{$item->description}}</span>
                            </a>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>