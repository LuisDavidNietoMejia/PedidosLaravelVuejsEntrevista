@include('layouts._app')

@include('layouts._section')

@include('layouts._footer')


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
