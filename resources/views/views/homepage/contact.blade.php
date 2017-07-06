<section id="5">
        <div class="container">
                <div class="col-md-12 text-center">
                    <h2 class="section-heading">Liên Hệ</h2>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <form name="sentMessage" id="contactForm" novalidate action ="{{route('contactus')}}" method ='POST' accept-charset='utf-8'>
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Họ và Tên *" id="name">
                                    <p class="help-block text-danger"></p>
                                    @if($errors->has('name'))
                                         <label class="col-md-9 errors-contact ">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email *" id="email">
                                    <p class="help-block text-danger"></p>
                                     @if($errors->has('email'))
                                         <label class="col-md-9 errors-contact ">
                                            <strong>{{$errors->first('email')}}</strong>
                                        </label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại *" id="phone">
                                    {{-- <input type="tel" class="form-control" placeholder="Só điện thoại *" id="phone" required data-validation-required-message="Please enter your phone number."> --}}
                                    <p class="help-block text-danger"></p>
                                     @if($errors->has('phone'))
                                         <label class="col-md-9 errors-contact ">
                                            <strong>{{$errors->first('phone')}}</strong>
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Tin nhắn*" id="message" rows="6"></textarea>
                                    <p class="help-block text-danger"></p>
                                     @if($errors->has('message'))
                                         <label class="col-md-9 errors-contact ">
                                            <strong>{{$errors->first('message')}}</strong>
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl"><b>Gửi tin nhắn</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>