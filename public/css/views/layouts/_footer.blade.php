<div class="footer_panel">
  <div class="panel-body">
    <div class="row">
      <div class="container">
        <div class="col-ms-4 col-sm-4 col-lg-4 col-xs-12">
          <ul class="nav navbar-nav navbar-left">
                 <div class="col-xs-push-3">
                  <a id="redsocial" href="#" class="btn btn-social-icon  btn-twitter ">
                  <span class = "fa fa-twitter "></span></a>

                  <a id="redsocial" href="#" class="btn btn-social-icon  btn-facebook ">
                  <span class = "fa fa-facebook"></span></a>

                  <a id="redsocial" href="#" class="btn btn-social-icon  btn-instagram ">
                  <span class = "fa fa-instagram"></span></a>

                  <a id="redsocial" href="#"class="btn btn-social-icon  btn-pinterest ">
                  <span class = "fa fa-pinterest"></span></a>

                  <a id="redsocial" href="#" class="btn btn-social-icon  btn-youtube ">
                  <span class = "fa fa-youtube-square"></span></a>
                </div>
          </ul>
        </div>
        <div class="col-ms-4 col-sm-4 col-lg-4 col-xs-12">
            <p class="text-center derechos"><adress><b>Autor Tesis &copy; Todos los Derechos Reservados 2017</b></adress></p>
          </div>
        <div class="col-ms-4 col-sm-4 col-lg-4 col-xs-12">
          <p class="text-center contacto"><a href="{{ route('contacto_path') }}">Contacto</a></p>
        </div>
      </div>
    </div>
</div>
</div>

<script type="text/javascript">

$('.datepicker').datepicker({

    format: "yyyy-mm-dd",
    language: "es",
    todayBtn:	true,
    today: "Today",
    autoclose: true
});



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
