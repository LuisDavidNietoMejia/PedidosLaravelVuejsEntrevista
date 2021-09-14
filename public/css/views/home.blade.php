@include('layouts.app')

<div class="container">
      @include('layouts._mensajes')
    <div class="row">
      <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
          @include('layouts._sectionmenu')
     </div>
      <div class="col-xs-12 col-md-4 col-sm-4 col-lg-4">
          @include('layouts._asidemenu')
       </div>
    </div>
    @include('layouts._footermenu')
</div>



<script type="text/javascript">

var owl = $('.owl-carousel');

$('.owl-carousel').owlCarousel({
            items:1,
            margin:20,
            loop:true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true

        });

        $(document).ready(
        function(){
        $(".item").hover(

        function(){
        $(".texto").fadeIn("slow");
        },

        function(){
         $(".texto").fadeOut(3000);

        }
        );
        });
        </script>
