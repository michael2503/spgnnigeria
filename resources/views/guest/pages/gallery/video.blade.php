@extends('guest.layouts.appmain')
@section('title', 'Video Gallery')


@section('content')
<link rel="stylesheet" href="{{ asset('css/gallery-plugins/magnific-popup.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('css/gallery-style.css') }}" /> --}}
<style>
    label{
        color: #777;
        font-size: 15px;
        cursor: pointer;
    }
    .mobileSort{
        display: none;
    }
    @media screen and (max-width: 991px){
        .defaultShow{
            display: none;
        }
        .mobileSort{
            display: block;
        }
    }
    .modal-dialog{
        min-width: 330px !important
    }
</style>

<x-GuestComps.breadcrum bigTitle='Video Gallery' smallTitle='Video Gallery'/>


<section class="section-block" data-scroll-index="3" id="portfolio">
    <div class="container">

        <div class="section-heading mb-5">
            <h4 style="font-size: 17px" class="text-center">Video Gallery</h4>
            <div class="section-heading-line"></div>
        </div>
        <div class="section-heading mb-1 mobileSort">
            <button data-toggle="modal" data-target="#catModal" class="btn btn-secondary pl-4 pr-4"><i class="fa fa-filter"></i> Filter</button>
        </div>

        <!-- filter links -->
        <!-- <div class="filtering text-center mb-50" style="margin-bottom: 80px">
            <span data-filter='*' class="active">All</span>
            <span data-filter='.flyers'>Flyers</span>
            <span data-filter='.vip'>With VIP's</span>
            <span data-filter='.life_event'>Events</span>
        </div> -->

        <!-- gallery -->
        <div class="">

            <div class="row">
            <?php foreach ($videos as $vid): ?>
                <!-- gallery item -->
            <div class="col-md-4 col-lg-4 col-sm-6 items p-1 col-6 wow fadeInUp mb-4">
                <div class="img-thumbnail">
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/<?=$vid->url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <p class="text-center"><?=ucwords($vid->vid_title)?></p>
                </div>
            </div>
            <?php endforeach ?>
            </div>




            {{-- <div class="clearfix"></div> --}}
        </div>


        <div class="d-flex justify-content-center mt-4 mb-3">
            <div class="mt-4 pagination-sm">
                {{ $videos->links() }}
            </div>
        </div>
        <p class="text-dark text-center">Showing:  {{ $from }} - {{ $to }} of {{ $total }}</p>

    </div>

</section>



<!-- The Modal -->
<div class="modal fade" id="catModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Categories</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mb-4 mt-4">
                    <div class="custom-control custom-radio" onclick="getCategory('all')">
                        {{-- <input type="radio" class="custom-control-input" name="example2" @if($controlCat == 'all') checked @endif> --}}
                        <label class="custom-control-label">All Category</label>
                    </div>
                </div>
                {{-- @foreach ($categories as $cat)
                <div class="mb-4 mt-4">
                    <div class="custom-control custom-radio" onclick="getCategory('{{ $cat->slug }}')">
                        <input type="radio" class="custom-control-input" name="example2" @if($cat->slug == $controlCat) checked @endif>
                        <label class="custom-control-label">{{ $cat->name }}</label>
                    </div>
                </div>
                @endforeach --}}
            </div>

        </div>
    </div>
</div>

<script>
    function getCategory(value) {
        console.log("/gallery/photo/" + value)
        window.location.replace("/gallery/photo/" + value);
    }
</script>

{{-- <script src="{{ asset('js/gallery-plugins/jquery-migrate-3.0.0.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/gallery-plugins/scrollIt.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/gallery-plugins/owl.carousel.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/gallery-plugins/jquery.magnific-popup.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/gallery-plugins/jquery.stellar.min.js') }}"></script> --}}
<script src="{{ asset('js/gallery-plugins/isotope.pkgd.min.js') }}"></script>

@endsection

