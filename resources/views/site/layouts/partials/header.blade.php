<div class="header-body">
    <div class="header-container container">
        <div class="header-row">
            <div class="header-column">
                <div class="header-row">
                    <div class="header-logo" style="width: 200px; height: 46.5625px;" itemscope itemtype="http://schema.org/Organization">
                        <a itemprop="url" href="{{ url('/') }}">
                               <img itemprop="logo" alt="Code Logo" width="200" height="auto" data-sticky-width="82" data-sticky-height="auto" src="{{ asset('site/img/code_logo_300w.png') }}">
                        </a>

                     </div>
                </div>
            </div>
            <div class="header-column justify-content-end"> 
                <div class="header-row">
                    <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">

                            {{-- @include('site.layouts.partials.generated-nav') --}}


                        </div>
                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>


                    <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                        <div class="header-nav-feature header-nav-features-search d-inline-flex">
                            <a href="#" class="header-nav-features-toggle" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
                            <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">

                                <form role="search" action="{{ URL::to('/search-result') }}" method="GET">
                                    {{-- {{ csrf_field() }} --}}
                                    <div class="simple-search input-group">
                                        <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                        <span class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fa fa-search header-nav-top-icon"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


