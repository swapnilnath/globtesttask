<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="foo-logo"><img src="" alt=""></div>

            </div>
        </div>
    </div>
    <div class="foo-botom">
        <div class="container">
            © {{ date('Y') }} {{Settings::get('footer_text')}}
        </div>
    </div>
</footer>

@section('styles')
<style>
.help-block{color: red}
.open{
   display:block;
}
.closed{
   display:none;
}
</style>
@endsection

@section('scripts')
@endsection
