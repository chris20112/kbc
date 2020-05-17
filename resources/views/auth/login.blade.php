@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div id="app" class="card-body">
                    <login-form>

                    </login-form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
<script>
    import LoginForm from "../../js/components/loginForm.vue";
    export default {
        components: {LoginForm}
    }
</script>
