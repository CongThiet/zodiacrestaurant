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
                    <a href="#see" role="tab" data-toggle="tab"><h4>Liên lạc chưa xem</h4></a>
                </li>
                <li role="presentation" >
                    <a href="#seen" role="tab" data-toggle="tab"><h4>Liên lạc đã xem</h4></a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active relative" id="see">
                    <div style="min-height: 500px">
                        <form class="form-horizontal" role="form" action ="{{route('admin-contact-destroy')}}" method ='POST' accept-charset='utf-8'>
                        {{ csrf_field() }}	
                            <table class="table table-hover  table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="col-md-1"></th>
                                        <th class="col-md-3">Họ tên</th>
                                        <th>Nội dung</th>
                                        <th><input type="checkbox" id="select_all" class="select-all-check"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($contacts as $contact)
                                        <tr>
                                            <td class="col-md-1"><span>{{$contact->id}}</span></td>
                                            <td class="contact-name col-md-3"><span><b>{{$contact->name}}</b></span></td>
                                            <td class="contact-message"><a href="{{route('admin-contact-detail',['contact'=>$contact->id])}}" title="Liên lạc chưa xem"><b>{{$contact->message}}</b></a></td>
                                            <td><input type="checkbox" name="checkbox[]" id="{{$contact->id}}" value="{{$contact->id}}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>                               
                                        <td></td>                               
                                        <td></td>                               
                                        <td><button class="contact-button" type="submit" onclick="return confirm('Bạn có muốn xóa liên lạc?');"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i></button></td>                               
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                        <div class="container panginate paginate-link">{{$contacts->links()}}</div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="seen">
                    <div style="min-height: 500px">
                        <form class="form-horizontal" role="form" action ="{{route('admin-contact-destroy')}}" method ='POST' accept-charset='utf-8'>
                        {{ csrf_field() }}	
                            <table class="table table-hover  table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="col-md-1"></th>
                                        <th class="col-md-3">Họ tên</th>
                                        <th>Nội dung</th>
                                        <th><input type="checkbox" id="selectAll" class="select-all-check"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($contactSeens as $contactSeen)
                                        <tr>
                                            <td class="col-md-1"><span>{{$contactSeen->id}}</span></td>
                                            <td class="contact-name col-md-3"><span><b>{{$contactSeen->name}}</b></span></td>
                                            <td class="contact-message"><a href="{{route('admin-contact-detail',['contact'=>$contactSeen->id])}}" title="Liên lạc chưa xem"><b>{{$contactSeen->message}}</b></a></td>
                                            <td><input type="checkbox" name="checkbox[]" id="{{$contactSeen->id}}" value="{{$contactSeen->id}}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>                               
                                        <td></td>                               
                                        <td></td>                               
                                        <td><button class="contact-button" type="submit" onclick="return confirm('Bạn có muốn xóa liên lạc?');"><i class="fa fa-trash-o fa-2" aria-hidden="true"></i></button></td>                               
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection