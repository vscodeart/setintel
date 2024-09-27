<div class="card card-stats mb-4 mb-xl-0 "  style="
{!! isset($image)  ? "margin-bottom:0;overflow:hidden;background-image:url('$image');" : '' !!}
{!!   isset($bg_color) && !isset($image)  ? "background: linear-gradient(to right, #493240, $bg_color) !important;" : '' !!}
{!!   isset($text_color)  ? "color:$text_color !important;" : '' !!}
">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h5 class="card-title text-uppercase  {!!   isset($text_color)  ? '' :'text-muted' !!}   mb-0"> {!!   $title  ?? '' !!}</h5>
                <span class="h2 font-weight-bold mb-0">{!!   $number  ?? '' !!}</span>
            </div>


            <div class="col-auto">
                <div
                    class="icon icon-shape   text-white rounded-circle  {!!   $icon  ? 'shadow' :'' !!} " style="  {!!   isset($icon_bg_color)   ? "background-color: $icon_bg_color;" : '' !!}">
                    {{--fonts awesome 5 icon--}}
                    <i class="fas {!!   $icon  ?? 'fa-chart-bar' !!}"></i>

                </div>
            </div>



        </div>
        @if(isset($percent) || isset($button))
        <p class="mt-3 mb-0 {!!   isset($text_color)  ? '' :'text-muted' !!} text-sm">

            @if(isset($percent))
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ $percent }} %</span>
            @endif

            @if(isset($percent_text))
                <span class="text-nowrap"> {!!   $percent_text  ?? '' !!}</span>
            @endif

            @if(isset($button))
              <span class="text-nowrap float-right mr-2   "> <a href="{!!    $button['link'] ?? '/' !!}" class="{!!   isset($text_color)  ? '' :'text-muted' !!} btn btn-sm btn-primary">{!!    $button['text'] ?? 'Show' !!}</a> </span>
            @endif
        </p>
        @endif
    </div>
</div>
