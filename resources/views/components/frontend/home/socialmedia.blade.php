@php use App\Models\GeneralSetting; @endphp
<div class="banner__area-two-bottom relative">
    <div class="container">
        <div class="banner__area-two-bottom-icon">
            <ul>
                <li>
                    <a href="{{GeneralSetting::getValueForKey('contact_facebook')}}"><i class="fab fa-facebook"></i></a>
                </li>
                <li>
                    <a href="{{GeneralSetting::getValueForKey('contact_whats_up')}}"><i class="fab fa-whatsapp"></i></a>
                </li>
                <li>
                    <a href="{{GeneralSetting::getValueForKey('contact_twitter')}}"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="{{GeneralSetting::getValueForKey('contact_instagram')}}"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
