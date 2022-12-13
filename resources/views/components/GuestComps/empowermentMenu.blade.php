
<div class="services-single-menu mt-30">
    <ul>
        <li class="@if($active == 'mentorship') services-active @endif">
            <a href="@if($active == 'mentorship') javascript:() @else {{ route('mentorshipScheme') }} @endif">Mentorship Scheme</a>
        </li>
        <li class="@if($active == 'entrepreneur') services-active @endif">
            <a href="@if($active == 'entrepreneur') javascript:() @else {{ route('entrepreneurship') }} @endif">Entrepreneurship</a>
        </li>
        <li class="@if($active == 'skill') services-active @endif">
            <a href="@if($active == 'skill') javascript:() @else {{ route('skillAcquisition') }} @endif">Skill Acquisition</a>
        </li>
        <li class="@if($active == 'addon') services-active @endif">
            <a href="@if($active == 'addon') javascript:() @else {{ route('spgnAddon') }} @endif">SPGN ADD-ONS</a>
        </li>
    </ul>
</div>
