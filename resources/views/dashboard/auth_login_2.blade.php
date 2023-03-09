<?php use App\Models\GeneralSetting; ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Nebras Films & Enriching The Human Thought">
    <meta name="keywords" content="Creative, Digital, multipage, landing, freelancer template">
    <meta name="author" content="PIXINVENT">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('dashboardAssets/app-assets/images/logo/N-FAVICON.png') }}">
    <title>{{ __('dashboard.login') }}</title>
    <link rel="stylesheet" href="{{ asset('dashboardAssets/app-assets/css/login_2.css') }}" />
</head>

<body>
    <div class="form-structor">
        <div class="signup">
            <h2 class="form-title">{{ __('auth.login') }}</h2>
            <form action="{{ route('admin.startSession') }}" method="POST">
                @csrf
                <div class="form-holder">
                    <input type="email" class="input" placeholder="Email" name="email" required
                        autocomplete="off" />
                    <input type="password" class="input" placeholder="Password" name="password" required
                        autocomplete="off" />
                </div>

                <input type="submit" class="submit-btn" value="{{ __('auth.login') }}" />
            </form>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:brown">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="login slide-up">
            <div class="center">
                <h2 class="form-title">
                    {{ app()->getLocale() == 'ar' ? GeneralSetting::getValueForKey('website_name_ar') : GeneralSetting::getValueForKey('website_name_en') }}
                </h2>
            </div>
        </div>
    </div>
</body>

</html>
