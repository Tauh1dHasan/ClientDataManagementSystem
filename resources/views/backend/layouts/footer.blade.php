  <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade">
    <i class="fa fa-arrow-up"></i>
  </a>
</div>
<script src="{{asset('backend-assets/js/jquery_3_70.js')}}"></script>
<script src="{{asset('backend-assets/js/popper.min.js')}}"></script>
<script src="{{asset('backend-assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('backend-assets/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('backend-assets/js/vendor.min.js')}}"></script>
<script src="{{asset('backend-assets/js/app.min.js')}}"></script>
<script src="{{asset('backend-assets/plugins/jvectormap-next/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('backend-assets/plugins/jvectormap-content/world-mill.js')}}"></script>
<script src="{{asset('backend-assets/js/demo/dashboard.demo.js')}}"></script>
<script src="{{asset('backend-assets/plugins/%40highlightjs/cdn-assets/highlight.min.js')}}"></script>
<script src="{{asset('backend-assets/js/demo/highlightjs.demo.js')}}"></script>
<script src="{{asset('backend-assets/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
{{-- <script src="{{asset('backend-assets/js/demo/chart-apex.demo.js')}}"></script> --}}
<script src="{{asset('backend-assets/js/demo/ui-modal-notification.demo.js')}}"></script>
<script src="{{asset('backend-assets/js/demo/sidebar-scrollspy.demo.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'G-Y3Q0VGQKY3');
</script>
<script src="{{asset('backend-assets/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="4ed70d7121ae39edafa5c1dd-|49" defer></script>
<script>
  $(document).ready(function() {
    $(".menu-toggler").click(function(){
      if($('#app').hasClass('app-sidebar-collapsed')){
        $("#content").addClass("fullWidth");
      }else{
        $("#content").removeClass("fullWidth");
      }
    })
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

<!-- Dropzone.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

@stack('script')
</body>
</html>
