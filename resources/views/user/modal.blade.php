<!-- Modal (Pop up when detail button clicked) -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Task Editor</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" novalidate>
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    {{--Champs complementaires--}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                            @if ($errors->has('firstName'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                            @if ($errors->has('lastName'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required autofocus>

                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday') }}" required autofocus>

                            @if ($errors->has('birthday'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="gender1" name="gender" class="custom-control-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="male">
                            <label class="custom-control-label" for="gender1">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="gender2" name="gender" class="custom-control-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="female">
                            <label class="custom-control-label" for="gender2">Female</label>
                        </div>
                        @if ($errors->has('gender'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Activation') }}</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="activation1" name="activation" class="custom-control-input{{ $errors->has('activation') ? ' is-invalid' : '' }}" value="1">
                            <label class="custom-control-label" for="activation1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="activation2" name="activation" class="custom-control-input{{ $errors->has('activation') ? ' is-invalid' : '' }}" value="0">
                            <label class="custom-control-label" for="activation2">No</label>
                        </div>
                        @if ($errors->has('activation'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('activation') }}</strong>
                                    </span>
                        @endif
                    </div>

                    {{--***********************************************************--}}

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="task_id" name="task_id" value="0">
            </div>
        </div>
    </div>
</div>