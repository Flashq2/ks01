
<style>
    .title_of_header{
        width: 100%;
        text-align: right;
        margin-bottom: 10px;
        font-size: 20px;
    }
    .main-title{
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
        margin-top: 20px;
        font-size: 30px;
        text-decoration: underline;
    }
    .title_img{
        width: 300px;
        height: 100px;

    }
    .title_img img{
        width: 100%;
        height: 100%;
        object-fit: contain ;
    }
</style>




@if (isset($excel))
    <div class="row">
        <div class="col-12 ">
                <div class="title_of_header text-right">
                    ព្រះរាជាណាចក្រកម្ពុជា​ <br>
                    ជាតិ សាសនា ព្រះមហាក្សត្រ
                
                </div>
        </div>
        @if(isset($print))
            <div class="col-12 ">
                <div class="title_img">
                    <img src="{{asset('system-logo.png')}}" alt="">
                </div>
            </div>
        @endif
        <div class="col-12 text-center">
            <div class="main-title">
                SETEC INSTITUTE
            </div>
        </div>
        <div class="col-12">
            <h5>{{createHeaderTitle($prefix)}}</h5>
        </div>
    </div>
@endif


<table class="table">
    <thead>
        <tr>
            @if (!isset($excel))
                <th style="width: 200px"></th>
            @endif
            @foreach ($fields as $item)
                <th>{{ createHeaderTitle($item->filed_name) }}</th>
            @endforeach

        </tr>
    </thead>
    <tbody id="tableRecord">
        @forelse ($records as $record)
            @include('admin.component.list_record')
        @empty
            <tr>
                <td class="text-center" colspan="{{ count($fields) + 1 }}">No Record Found</td>
            </tr>
        @endforelse
    </tbody>
     
</table>
@if (!isset($excel))
        {{ $records->links('pagination::bootstrap-5') }}
@endif