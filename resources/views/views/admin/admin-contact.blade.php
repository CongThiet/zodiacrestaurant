@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12 box-page">
	<div class="container">
        <div class="box-head">
            <h4>Liên lạc của khách hàng</h4>
        </div>
        <div class="row contact-mail relative" >
            @if(session('contact-del'))
                <div class="alert alert-success contact-del" role="alert">
                    <strong>{{session('contact-del')}}</strong>
                </div>
            @endif
            @if($errors->has('checkbox'))
                <div class="alert alert-danger contact-del ">
                    <strong>{{$errors->first('checkbox')}}</strong>
                </div>
            @endif
            <ul class="nav nav-tabs nav-contact" role="tablist">
                <li role="presentation" class="active" >
                    <a href="#see" role="tab" data-toggle="tab">Liên lạc chưa xem</a>
                </li>
                <li role="presentation" >
                    <a href="#seen" role="tab" data-toggle="tab">Liên lạc đã xem</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active relative" id="see">
                    <div style="min-height: 500px">
                        <form class="form-horizontal" role="form" action ="{{route('admin-contact-destroy')}}" method ='POST' accept-charset='utf-8'>
                        {{ csrf_field() }}	
                            <button class="contact-button" type="submit" onclick="return confirm('Bạn có muốn xóa liên lạc?');"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i></button>
                            @foreach($contacts as $contact)
                            <div class="row contact-see">
                                <div class="col-md-1">
                                    <span>{{$contact->id}}</span>
                                </div>
                                <div class="col-md-3 contact-name">
                                    <span><b>{{$contact->name}}</b></span>
                                </div>
                                <div class="col-md-4 contact-message">
                                    <a href="{{route('admin-contact-detail',['contact'=>$contact->id])}}" title="Liên lạc chưa xem"><span><b>{{$contact->message}}</b></span></a>
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="checkbox[]" id="{{$contact->id}}" value="{{$contact->id}}">
                                </div>
                            </div>
                            @endforeach
                                <input type="checkbox" id="select_all" class="select-all-check">
                        </form>
                        <div class="container panginate paginate-link">{{$contacts->links()}}</div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="seen">
                    <div style="min-height: 500px">
                        <form class="form-horizontal" role="form" action ="{{route('admin-contact-destroy')}}" method ='POST' accept-charset='utf-8'>
                            {{ csrf_field() }}	
                            <button class="contact-button" type="submit" onclick="return confirm('Bạn có muốn xóa liên lạc?');"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i></button>
                            @foreach($contactSeens as $contactSeen)
                            <div class="row contact-see">
                                <div class="col-md-1">
                                    <span>{{$contactSeen->id}}</span>
                                </div>
                                <div class="col-md-3 contact-name">
                                    <span><b>{{$contactSeen->name}}</b></span>
                                </div>
                                <div class="col-md-4 contact-message">
                                    <a href="{{route('admin-contact-detail',['contact'=>$contactSeen->id])}}" title="Liên lạc đã xem"><span><b>{{$contactSeen->message}}</b></span></a>
                                </div>
                                <div class="col-md-1">
                                    <input type="checkbox" name="checkbox[]" id="{{$contactSeen->id}}" value="{{$contactSeen->id}}">
                                </div>
                            </div>
                            @endforeach
                            <input type="checkbox" id="selectAll" class="select-all-check">
                        </form>
                        <div class="container panginate paginate-link">{{$contactSeens->links()}}</div>
                    </div>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection