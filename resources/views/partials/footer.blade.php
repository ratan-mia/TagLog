<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('images/logos/TagLog.png')}}" class="img-responsive" alt="Taglog">
                <ul class="taglog-footer-list">
                    <li>> Find Sending Organization</li>
                    <li>> Find Employer</li>
                </ul>
            </div>
            <div class="col-md-3">
                <img src="{{asset('images/logos/TagLog_Assist.png')}}" class="img-responsive" alt="Taglog Assist">
                <ul class="taglog-footer-list">
                    <li>> Concierge</li>
                    <li>> Language support</li>
                </ul>
            </div>
            <div class="col-md-3">
                <img src="{{asset('images/logos/TagLog_Next.png')}}" class="img-responsive" alt="Taglog Next">
                <ul class="taglog-footer-list">
                    <li>> Find Full-Time Jobs in Japan</li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="taglog-footer-list">
                    <li> > My page</li>
                    <li> > Contact Us</li>
                    <li>> About Us</li>
                    <li>> Privacy</li>
                    <li>> Terms of Use</li>
                </ul>
            </div>


        </div>
        <div class="row">
            <div class="col-sm-6 col-12 m-t-20">
                <!-- Copyright -->
                <div class="copyright">
                    <p>Copyright © {{ date('Y') }}. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
        <a id="top" class="" href=""><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>


<!--==========================       Registration page     ========================================-->
<script src="{{asset('js/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('js/retina-1.1.0.min.js')}}"></script>
<script src="{{asset('js/registration.js')}}"></script>
<!--==========================       Login Page     ===============================================-->

<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
<script src="{{asset('js/login.js')}}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/conditionize.flexible.jquery.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#country_id").change(function (e) {
            e.preventDefault();
            var country_id = $('#country_id').val();

            $.ajax({
                type: 'GET',
                url: "{{ route('ajax-relevant-city') }}",
                data: {country_id: country_id},
                success: function (data) {
                    $('#city_id').html(data);
                }
            });

        });
    });


</script>
<!--[if lt IE 10]>
<script src="{{asset('js/placeholder.js')}"></script>
<![endif]-->
