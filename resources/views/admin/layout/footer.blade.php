        <!-- Vendor js -->
        <script src="{{ asset('admin-asset/js/vendor.min.js') }}"></script>
        <!-- App js-->
        <script src="{{ asset('admin-asset/js/app.min.js') }}"></script>
        <script src="{{ asset('wt_assets/wt_alert.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function addLoader() {
                $("body").append(
                    "<div style='position: fixed; top: 0; left: 0; right:0; bottom:0; z-index:99999999; display:grid; align-items:center; justify-content:center; background-color:#c0c0c038;' id='loader'><img src='{{ asset('admin-asset/images/loader.gif') }}' style='width:35px; height:35px;'></div>"
                    );
            }

            function removeLoader(ele) {
                $(ele).remove();
            }
            $(document).on({
                ajaxStart: function() {
                    addLoader();
                },
                ajaxStop: function() {
                    removeLoader("#loader");
                }
            });
        </script>
