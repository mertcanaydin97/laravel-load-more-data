
@foreach ($items as $key => $item)
<div class="cs-isotop_item ui_ux_design">
    <a href="{{ route('portfolio',$item->slug) }}" class="cs-portfolio cs_style_1 cs-type1">
        <div class="cs-portfolio_hover"></div>
        <div class="cs-portfolio_bg cs-bg" data-src="{{ asset('storage/'.$item->image) }}"></div>
        <div class="cs-portfolio_info">
            <div class="cs-portfolio_info_bg cs-accent_bg"></div>
            <h2 class="cs-portfolio_title">{{ $item->title }}</h2>
            <div class="cs-portfolio_subtitle">Read More</div>
        </div>
    </a>
</div><!-- .cs-isotop_item -->
@endforeach
