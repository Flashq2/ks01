
@forelse ($record as $item)
    <a class="dropdown-item" href="{{url($item->url)}}"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i>{{$item->description}}</a>
@empty
    <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i>No record found</a>
@endforelse