@extends('sites.master')
@section('content')
@include('sites._include.navbar')
@include('sites._include.banner')
<div class="page-content">
    <div class="container main">
        <div class="row">
            <div class="col-md-9 post" id="ok">
                <div class="col-md-12 ">
                    <div class="col-md-12">
                        <div class="card card-body text-center inforprofile">
                            <h3><i class="fa fa-history text-success" aria-hidden="true"></i>Lịch sử khám bệnh - tran van my</h3></h4>
                            <div class="card text-center">
                                <table class="table text-left">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Lan Kham</th>
                                            <th>Noi Dung</th>
                                            <th>Ngay Kham</th>
                                            <th>Xem Chi Tiet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>1</td>
                                            <td>Sieu am</td>
                                            <td>19/10/2017</td>
                                            <td>
                                                <button class="btn btn-success" v-on:click="viewdetail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-paper-plane text-success" aria-hidden="true"></i> Thong Tin Chi Tiet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Recipient:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="form-control-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            @include('sites._include.mucluc')
        </div>
    </div>
</div>

@include('sites._include.footer')
@endsection
@section('style')
    {{ Html::style('css/sites/profile/profile.css') }}
    {{ Html::style('css/sites/_include/navbar.css') }}
    {{ Html::style('css/sites/_include/footer.css') }}
    {{ Html::style('css/sites/_include/banner.css') }}
@endsection
@section('script')
    {{ Html::script('js/lichsukham/lichsukham.js') }}
@endsection
