Usage

create view named 'data' inside your views folders. For example you have portfolios directory and this directory 3 files(index.blade.php,show.blade.php) in views folder. Now navigate to portfoilos directory and create data.blade.php file and add content below.
( you can customize data according to your theme or frontend)

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
 
 After this code you need to create content div with unique id and include data.blade.php file that we created.
  <div id="data-wrapper">
    @include('portfolio.data')
  </div>
  <a href="javascript:void(0)" class="cs-text_btn load-more-data">
                <span>Daha Fazla</span>
                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M25.5303 6.53033C25.8232 6.23744 25.8232 5.76256 25.5303 5.46967L20.7574 0.696699C20.4645 0.403806 19.9896 0.403806 19.6967 0.696699C19.4038 0.989593 19.4038 1.46447 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM0 6.75H25V5.25H0V6.75Z"
                        fill="currentColor"></path>
                </svg>
            </a>
<!-- dont forget to add load more button ->

Last step you need to add jquery codes

<script>
        var ENDPOINT = "{{ route('items') }}";
        var page = 1;


        $(".load-more-data").click(function() {
            page++;
            infinteLoadMore(page);
        });

        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })
                .done(function(response) {
                    if (response.html == '') {
                        $('.auto-load').html("No more data!");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response.html);
                    $('[data-src]').each(function() {
                        var src = $(this).attr('data-src');
                        $(this).css({
                            'background-image': 'url(' + src + ')',
                        });
                    });
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
    </script>

Done 

