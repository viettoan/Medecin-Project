@extends('admin.master')

@section('content-admin')
<div class="content-admin" id="index-contacts">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.contacts') }}</h2>
        </div>
        <div class="panel-body">
            <div class="col-md-12 admin-actions">
                <form role="form" class="col-md-5 pull-right">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter user">
                    </div>
                </form>
            </div>
            <table class="table table-hover table-bordered">
                <thead >
                    <tr>
                        <th class="text-center col-md-1">{{ trans('message.id') }}</th>
                        <th class="text-center col-md-1">{{ trans('message.name') }}</th>
                        <th class="text-center col-md-1">{{ trans('message.phone') }}</th>
                        <th class="text-center col-md-1">{{ trans('message.email') }}</th>
                        <th class="text-center">{{ trans('message.content') }}</th>
                        <th class="text-center">{{ trans('message.status') }}</th>
                        <th class="text-center ">{{ trans('message.action') }}</th>
                    </tr>   
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr >
                        <th class="col-md-1">{{ $contact->id }}</th>
                        <th class="col-md-2">{{ $contact->name }}</th>
                        <th class="col-md-1">{{ $contact->phone }}</th>
                        <th class="col-md-1">{{ $contact->email }}</th>
                        <th class="col-md-5">{{ $contact->content }}</th>
                        <th class="text-center col-md-1" id="contact-status-{{ $contact->id }}" >
                        @if ($contact->status == config('custom.contact.pending'))
                            <span class="label label-default">{{ trans('message.pending') }}</span></th>
                        @else 
                            <span class="label label-success">{{ trans('message.accept') }}</span></th>
                        @endif    
                        <th class="col-md-1">
                            <a data-toggle="modal" v-on:click="getDetailContact({{ $contact->id }})"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </th>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            @if (isset($users)) 
                {{ $users->links() }}
            @endif
        </div>
    </div>
    <!-- Detail contact -->
    <div class="modal fade" id="detailContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('message.detail_contact') }}</h4>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fa fa-user" aria-hidden="true"></i>{{ trans('message.name') }} :</b>
                                <a>@{{ contact.name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-phone" aria-hidden="true"></i>{{ trans('message.phone') }} :</b>
                                <a>@{{ contact.phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <b>{{ trans('message.email') }}:</b>
                                <a>
                                    @{{ contact.email }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('message.content') }} :</b>
                                <p>@{{ contact.content }}</p>
                            </li>
                        </ul>
                        <button class="btn btn-success" v-if="contact.status == 0" v-on:click="changeStatus(contact.id)">{{ trans('message.accept') }}</button>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
    {{ Html::script('js/admin/contact.js') }}
@endsection
