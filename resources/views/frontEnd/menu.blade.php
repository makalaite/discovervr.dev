<div id="menu">


<ul class="nav nav-pills">
    <li role="presentation" > <a href="#"> Apie </a> </li>
    <li role="presentation" > <a href="#"> Vieta ir laikas </a> </li>
    <li role="presentation" > <a href="#"> Bilietai </a> </li>
    <li role="presentation"> <a href="#"> Remejai </a> </li>
    <ul class="nav nav-tabs">
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Virtualūs kambariai <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="presentation" > <a href="#"> The Lab </a> </li>
                <li role="presentation"> <a href="#"> Samsung irklavimas </a> </li>
                <li role="presentation"> <a href="#"> Fruit nija </a> </li>
                <li role="presentation"> <a href="#"> KTU parasparnis </a> </li>
                <li role="presentation"> <a href="#"> Space pirate trainer </a> </li>
            </ul>
        </li>
    </ul>
</ul>

</div>
{{--@foreach($list as $key => $record  )--}}

    {{--<div class="col-md-2 dropdown">--}}
        {{--<ul>--}}
            {{--@if (isset($record['sub_category']) && sizeof($record['sub_category']) > 0)--}}
                {{--{{dd($record['sub_category'])}}--}}
                {{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"--}}
                        {{--aria-haspopup="true" aria-expanded="true">--}}
                    {{--<li><a href=" {{ $record['url'] }}"> {{$record['name']}} </a></li>--}}
                    {{--<span class="caret"></span>--}}
                {{--</button>--}}
                {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">--}}
                    {{--@foreach($record['sub_category'] as $key => $dropDown)--}}
                        {{--<li><a href=" {{ $dropDown['url'] }}"> {{$dropDown['name']}} </a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}

            {{--@else--}}
                {{--<a href=" {{ $record['url'] }}"> {{$record['name']}} </a>--}}
            {{--@endif--}}

        {{--</ul>--}}

    {{--</div>--}}
{{--@endforeach--}}

