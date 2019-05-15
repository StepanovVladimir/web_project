@if (session()->has('error'))
    <script type="text/javascript">
        $(function() {
            alertify.error("{!! session()->get('error')  !!}");
        });
    </script>
@endif