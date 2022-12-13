<div class="services-single-menu mt-30">
    <ul>
        <li class="@if($active == '2022') services-active @endif">
            <a href="@if($active == '2022') javascript:() @else {{ route('turningPoint2022') }} @endif">2022 Finding Your Voice</a>
        </li>
        <li class="@if($active == '2020') services-active @endif">
            <a href="@if($active == '2020') javascript:() @else {{ route('turningPoint2020') }} @endif">2020 Elevate</a>
        </li>
        <li class="@if($active == '2019') services-active @endif">
            <a href="@if($active == '2019') javascript:() @else {{ route('turningPoint2019') }} @endif">2019 Rewriting Your Story</a>
        </li>
        <li class="@if($active == '2018') services-active @endif">
            <a href="@if($active == '2018') javascript:() @else {{ route('turningPoint2018') }} @endif">2018 Turning Point</a>
        </li>
    </ul>
</div>
