@php use App\Models\GeneralSetting; @endphp
<div id="contact" class="contact__area section-padding">
    <div class="container">
        <div class="row mb-60">
            <div class="col-md-5 col-lg-6">
                <div class="contact__area-title lg-t-center"> <span class="subtitle">{{app()->getLocale() =='ar'?GeneralSetting::getValueForKey('nav7_ar'):GeneralSetting::getValueForKey('nav7_en')}}.</span>
                    <h2>{{app()->getLocale() =='ar'?GeneralSetting::getValueForKey('contact_title_ar'):GeneralSetting::getValueForKey('contact_title_en')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact__area-bottom">
                    <div class="contact__area-bottom-form">
                        <form id="form-contact">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 mb-25">
                                    <div class="contact__area-bottom-form-item">
                                        <input type="text" name="name" placeholder="{{__('dashboard.table name')}}" id="name-contact" required="required" minlength="5">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-25">
                                    <div class="contact__area-bottom-form-item">
                                        <input type="email" name="email" placeholder="{{__('dashboard.table email')}}" id="email-contact" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-25">
                                    <div class="contact__area-bottom-form-item">
                                        <input type="text" name="phone" placeholder="{{__('dashboard.table phone')}}" id="phone-contact" required="required" minlength="9" maxlength="13">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-25">
                                    <div class="contact__area-bottom-form-item">
                                        <input type="text" name="subject" placeholder="{{__('dashboard.subject')}}" id="subject-contact" required="required" minlength="5">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-30">
                                    <div class="contact__area-bottom-form-item">
                                        <textarea name="feedBack" rows="5" placeholder="{{__('dashboard.message')}}" minlength="10" id="message-contact" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="contact__area-bottom-form-item">
                                        <button class="theme-btn-1" type="submit" id="btn-contact">{{__('dashboard.save')}}<i class="far fa-long-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="contact__area-bottom-map">
                        {!! GeneralSetting::getValueForKey('contact_map_iframe')??'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830894606!2d-74.11976383964463!3d40.69766374865767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1652012644726!5m2!1sen!2sbd" loading="lazy"></iframe>'!!}
{{--                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830894606!2d-74.11976383964463!3d40.69766374865767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1652012644726!5m2!1sen!2sbd" loading="lazy"></iframe>--}}
{{--                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14932162.856164385!2d36.05035290453929!3d23.976433629929215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2seg!4v1676227351957!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        $('#form-contact').on('submit',function (e){
            e.preventDefault();
            let name = $('#name-contact').val();
            let email = $('#email-contact').val();
            let phone = $('#phone-contact').val();
            let subject = $('#subject-contact').val();
            let feedBack = $('#subject-contact').val();
            $.ajax({
                type:"POST",
                url:"{{route('contactUs.store')}}",
                data:{
                    name:name,
                    email:email,
                    phone:phone,
                    subject:subject,
                    feedBack:feedBack,
                    _token:"{{csrf_token()}}"
                },
                success:function (response){
                    if(response){
                        Swal.fire({
                            title: 'Success!',
                            text: response.success,
                            icon: 'success',
                            confirmButtonText: 'Cool'
                        });
                        $('#form-contact')[0].reset();
                    }
                }
            })
        })
    </script>
@endsection
