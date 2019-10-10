@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
             
        </div>
    </div>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="alert alert-warning" style="text-align: center;" role="alert">
                Suas Disponibilidades
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active medicoTab" id="nav-home-tab" 
                        data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" 
                        aria-selected="true" style="padding-left: 4px;padding-right: 4px;font-size: 11px;">
                            Disponibilidade
                    </a>
                    <a class="nav-item nav-link medicoTab" id="nav-profile-tab" 
                        data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" 
                        aria-selected="false" style="padding-left: 12px;padding-right: 4px;font-size: 11px;">
                            Prioritaria
                    </a>
                    <a class="nav-item nav-link medicoTab" id="nav-contact-tab" 
                        data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" 
                        aria-selected="false" style="padding-left: 6px;padding-right: 4px;font-size: 11px;">
                            Recorrente
                    </a>
                    <a class="nav-item nav-link medicoTab" id="nav-especifica"
                        data-toggle="tab" href="#nav-especificas" role="tab" aria-controls="nav-especificas" 
                        aria-selected="false" style="padding-left: 6px;padding-right: 4px;font-size: 11px;">
                        Especifica
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" 
                    style="height: 62vh;background: white;"
                    role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="alert alert-danger" role="alert" style="left: 10px;right: 5px;width: 94%;top: 10px;">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size: 35px;margin-top: 15px;"></i>
                                    </div>
                                    <div class="col-10">
                                        Ops! <br>
                                        Você ainda não possui disponibilidades cadastradas. <br>
                                        Que tal cadastrar agora mesmo?
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile"  
                    style="height: 62vh;background: white;"
                    role="tabpanel" aria-labelledby="nav-profile-tab">
                    2..
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" 
                    aria-labelledby="nav-contact-tab" 
                    style="height: 62vh;background: white;">
                    3..
                </div>
                <div class="tab-pane fade" id="nav-especificas" role="tabpanel" 
                    aria-labelledby="nav-especifica" 
                    style="height: 62vh;background: white;">
                    4..
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-12" style="text-align:end">
            <button type="button" class="btn btn-warning btn-circle btn-lg"
            style="border-radius:50px; margin-top:15px">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>

@endsection
