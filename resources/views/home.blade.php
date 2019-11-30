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
    <div class="col-lg-6 col-12" style="padding-left: 0px!important;padding-right: 0px!important;background: white;">
        <nav style="padding-bottom: 15px;">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active medicoTab" id="nav-home-tab" 
                    data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" 
                    aria-selected="true" style="padding-left: 4px;padding-right: 4px;font-size: 11px;color:black;padding-bottom: 11px;">
                        Disponibilidade
                </a>
                <a class="nav-item nav-link medicoTab" id="nav-profile-tab" 
                    data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" 
                    aria-selected="false" style="padding-left: 12px;padding-right: 4px;font-size: 11px;color:red;padding-bottom: 11px;">
                        Prioritaria
                </a>
                <a class="nav-item nav-link medicoTab" id="nav-contact-tab" 
                    data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" 
                    aria-selected="false" style="padding-left: 6px;padding-right: 4px;font-size: 11px;color: #1ba74c;padding-bottom: 11px;">
                        Recorrente
                </a>
                <a class="nav-item nav-link medicoTab" id="nav-especifica"
                    data-toggle="tab" href="#nav-especificas" role="tab" aria-controls="nav-especificas" 
                    aria-selected="false" style="padding-left: 6px;padding-right: 4px;font-size: 11px;color: #2196f3;padding-bottom: 11px;">
                    Especifica
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" 
                style="height: 70vh;background: white;"
                role="tabpanel" aria-labelledby="nav-home-tab">
                
                <div class="row">
                    <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="alert alert-warning" style="left: 10px;right: 5px;width: 94%;top: 10px;text-align: center;" role="alert">
                                    Suas Disponibilidades
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="alert alert-info" 
                            style="left: 10px;right: 5px;width: 94%;background: #a09f9f!important;top: 0px;text-align: center;padding-top: 5px;padding-bottom: 5px;">
                            Mantenha sempre atualizado
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        @if(count($disponibilidades) == 0)
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
                        @else
                            <div class="row">
                                <div class="col-lg-6 col-12">

                                    <h5 style="font-weight: bold;margin-left: 20px;color: #1ba74c;">
                                        Recorrentes
                                    </h5>
                                    <table id="tableDispoRecorrentes" style="display:table!important;margin-left: 10px;width: 95%;"
                                        class="table table-striped table-responsive-sm">
                                        <tbody>
                                            @foreach($disponibilidades as $disponibilidade)
                                                @if($disponibilidade->idoportunidade_tipo == 1)
                                                <tr class="dados">
                                                    <td>
                                                        @if($disponibilidade->segunda == 1)
                                                            Segunda
                                                        @elseif ($disponibilidade->terca == 1)
                                                            Terça
                                                        @elseif ($disponibilidade->quarta == 1)
                                                            Quarta
                                                        @elseif ($disponibilidade->quinta == 1)
                                                            Quinta
                                                        @elseif ($disponibilidade->sexta == 1)
                                                            Sexta
                                                        @elseif ($disponibilidade->sabado == 1)
                                                            Sabado
                                                        @elseif ($disponibilidade->domingo == 1)
                                                            Domingo
                                                        @else
                                                            Combinar
                                                        @endif
                                                    </td> 
                                                    <td>
                                                        {{$disponibilidade->hora_inicio}}
                                                    </td>
                                                    <td>
                                                        {{$disponibilidade->hora_termino}}
                                                    </td>
                                                </tr>    
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <h5 style="font-weight: bold;margin-left: 20px;color: #2196f3;">
                                        Especificas
                                    </h5>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <table id="tableDispoEventuais" style="display:table!important;margin-left: 10px;width: 95%;"
                                                 class="table table-striped table-responsive-sm">
                                                    @foreach($disponibilidades as $disponibilidade)
                                                        @if($disponibilidade->idoportunidade_tipo == 2)
                                                        <tr class="dados" style="height:15px;">
                                                            <td>
                                                                {{date('d-m-Y', strtotime($disponibilidade->data_inicio_especifica))}}
                                                            </td> 
                                                            <td>
                                                                {{$disponibilidade->hora_inicio}}
                                                            </td>
                                                            <td>
                                                                {{$disponibilidade->hora_termino}}
                                                            </td>
                                                        </tr>    
                                                        @endif
                                                    @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile"  
                style="height: 80vh;background: white;"
                role="tabpanel" aria-labelledby="nav-profile-tab">
                
                <table id="tablePrioritaria" style="display:table!important;margin-left: 10px;width: 95%;"
                    class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dia</th>
                            <th>Hora</th>
                            <th>Especialidade</th>
                            <th>Cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($oportunidades as $oportunidade)
                           @if($oportunidade->prioridade == 1)
                                <tr class="dados <?php if(in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'selected'; } ?>">
                                    <td>
                                        {{$oportunidade->id}}
                                    </td> 
                                    <td>
                                        @if($oportunidade->idoportunidade_tipo == 1)
                                            @if($oportunidade->segunda == 1)
                                                Segunda
                                            @elseif ($oportunidade->terca == 1)
                                                Terça
                                            @elseif ($oportunidade->quarta == 1)
                                                Quarta
                                            @elseif ($oportunidade->quinta == 1)
                                                Quinta
                                            @elseif ($oportunidade->sexta == 1)
                                                Sexta
                                            @elseif ($oportunidade->sabado == 1)
                                                Sabado
                                            @elseif ($oportunidade->domingo == 1)
                                                Domingo
                                            @else
                                                Combinar
                                            @endif
                                        @else
                                            {{$oportunidade->data_inicio}}
                                        @endif
                                    </td> 
                                    <td>
                                        {{$oportunidade->hora_inicio . '-' . $oportunidade->hora_final}}
                                    </td>
                                    <td>
                                        {{$oportunidade->nomeEspecialidade}}
                                    </td>
                                    <td>
                                        {{$oportunidade->nomeCLiente}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-gray btnGrid <?php if(in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'invisivel'; } ?>" 
                                            data-toggle="tooltip" data-id="{{$oportunidade->id}}" 
                                            value="selecionar" type="button" data-placement="bottom" title="Selecionar">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                        <button class="btn btn-sm btn-gray btnDeselect <?php if(!in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'invisivel'; } ?>" 
                                            data-toggle="tooltip" data-id="{{$oportunidade->id}}" 
                                            value="selecionar" type="button" data-placement="bottom" title="Selecionar">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                </tr>  
                           @endif
                           
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" 
                aria-labelledby="nav-contact-tab" 
                style="background: white;padding-bottom:15px;">
                
                <table id="tableRecorrente" style="display:table!important;margin-left: 10px;width: 95%;"
                    class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sem</th>
                            <th>Hora</th>
                            <th>Especialidade</th>
                            <th>Cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($oportunidades as $oportunidade)
                           @if($oportunidade->prioridade == 0 and $oportunidade->idoportunidade_tipo == 1)
                                <tr class="dados <?php if(in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'selected'; } ?>">
                                    <td>{{$oportunidade->id}}</td>
                                    <td>
                                        @if($oportunidade->segunda == 1)
                                            Segunda
                                        @elseif ($oportunidade->terca == 1)
                                            Terça
                                        @elseif ($oportunidade->quarta == 1)
                                            Quarta
                                        @elseif ($oportunidade->quinta == 1)
                                            Quinta
                                        @elseif ($oportunidade->sexta == 1)
                                            Sexta
                                        @elseif ($oportunidade->sabado == 1)
                                            Sabado
                                        @elseif ($oportunidade->domingo == 1)
                                            Domingo
                                        @else
                                            Combinar
                                        @endif
                                    </td>
                                    <td>
                                        @if (strpos($oportunidade->hora_inicio, 'Combinar') !== false)
                                            Combinar
                                        @else
                                            {{$oportunidade->hora_inicio . '-' . $oportunidade->hora_final}}
                                        @endif
                                        
                                    </td>
                                    <td>
                                        {{$oportunidade->nomeEspecialidade}}
                                    </td>
                                    <td>
                                        {{$oportunidade->nomeCLiente}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-gray btnGrid <?php if(in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'invisivel'; } ?>" 
                                            data-toggle="tooltip" data-id="{{$oportunidade->id}}" 
                                            value="selecionar" type="button" data-placement="bottom" title="Selecionar">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                        <button class="btn btn-sm btn-gray btnDeselect <?php if(!in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'invisivel'; } ?>" 
                                            data-toggle="tooltip" data-id="{{$oportunidade->id}}" 
                                            value="selecionar" type="button" data-placement="bottom" title="Selecionar">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                </tr>  
                           @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-especificas" role="tabpanel" 
                aria-labelledby="nav-especifica" 
                style="background: white;padding-bottom:15px;">

                <table id="tableEspecifica" style="display:table!important;margin-left: 10px;width: 95%;"
                    class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Especialidade</th>
                            <th>Cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($oportunidades as $oportunidade)
                           @if($oportunidade->prioridade == 0 and $oportunidade->idoportunidade_tipo == 2)
                                <tr class="dados <?php if(in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'selected'; } ?>">
                                    <td>{{$oportunidade->id}}</td>
                                    <td>{{$oportunidade->data_inicio}}</td> 
                                    <td>
                                        {{$oportunidade->hora_inicio . '-' . $oportunidade->hora_final}}
                                    </td>
                                    <td>
                                        {{$oportunidade->nomeEspecialidade}}
                                    </td>
                                    <td>
                                        {{$oportunidade->nomeCLiente}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-gray btnGrid <?php if(in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'invisivel'; } ?>" 
                                            data-toggle="tooltip" data-id="{{$oportunidade->id}}" 
                                            value="selecionar" type="button" data-placement="bottom" title="Selecionar">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                        <button class="btn btn-sm btn-gray btnDeselect <?php if(!in_array($oportunidade->id, $oportunidadesMedicoInteressado)) { echo 'invisivel'; } ?>" 
                                            data-toggle="tooltip" data-id="{{$oportunidade->id}}" 
                                            value="selecionar" type="button" data-placement="bottom" title="Selecionar">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                </tr>  
                           @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row" id="divBotao">
    <div class="col-lg-6 col-12" style="text-align:end">
        <button type="button" class="btn btn-warning btn-circle btn-lg"
        style="width: 43px!important;border-radius:50px;margin-top:15px;height: 40px!important;" data-toggle="modal" data-target="#dispoModal">
            <i class="fa fa-plus"></i>
        </button>
    </div>
</div>

<div class="modal fade" id="dispoModal" tabindex="-1" 
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Adcionar Disponibilidade</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formModal">
            <div class="modal-body" style="padding-left: 0px;margin-top: 10px;margin-bottom: 10px;padding-top: 6px;padding-bottom: 6px;padding-right: 16px;">
                <div class="row">
                    <div class="col-4 col" style="top: 7px;text-align:end">
                        <label for="cmbTipo">Tipo:</label>
                    </div>
                    <div class="col-8 col">
                        <select id="cmbTipo" name="cmbTipo" required class="form-control">
                            <option value="" selected>Selecione...</option>  
                            <option value="1">Recorrente</option>  
                            <option value="2">Especifica</option>  
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 col" style="top: 7px;text-align:end">
                        <label for="cmbEspecialidade">Especialidade:</label>
                    </div>
                    <div class="col-8 col">
                        <select id="cmbEspecialidade" required name="cmbEspecialidade" class="form-control">
                            <option value="" selected>Selecione...</option>  
                            @foreach($especialidades as $especialidade)
                                @if(isset($especialidade->checked))
                                    <option value="{{$especialidade->id}}" selected>
                                        {{$especialidade->nome}}
                                    </option>
                                @else
                                    <option value="{{$especialidade->id}}">
                                        {{$especialidade->nome}}
                                    </option>
                                @endif
                            @endforeach          
                        </select>
                    </div>
                </div>
                <div class="row" id="rowtDtInicio">
                    <div class="col-4 col" style="top: 10px;text-align:end">
                        <label for="txtDtInicio" style="margin-top: 7px;">Data Inicio:</label>
                    </div>
                    <div class="col-8 col">
                        <input type="text" name="txtDtInicio" style="padding-bottom: 0px;"
                            id="txtDtInicio" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="row" id="rowDtFinal">
                    <div class="col-4 col" style="top: 10px;text-align:end">
                        <label for="txtDtFinal" style="margin-top: 7px;">Data Final:</label>
                    </div>
                    <div class="col-8 col">
                        <input type="text" name="txtDtFinal" style="padding-bottom: 0px;"
                            id="txtDtFinal" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="row"  id="rowHrInicio">
                    <div class="col-4 col" style="top: 10px;text-align:end">
                        <label for="txtHrInicio" style="margin-top: 7px;">Hora Inicio:</label>
                    </div>
                    <div class="col-8 col">
                        <input type="time" name="txtHrInicio" style="padding-bottom: 0px;"
                            id="txtDtInicio" autocomplete="off" class="form-control" required>
                    </div>
                </div>
                <div class="row"  id="rowtHrFinal">
                    <div class="col-4 col" style="top: 10px;text-align:end">
                        <label for="txtHrFinal" style="margin-top: 7px;">Hora Final:</label>
                    </div>
                    <div class="col-8 col">
                        <input type="time" name="txtHrFinal" style="padding-bottom: 0px;"
                            id="txtHrFinal" autocomplete="off" class="form-control" required>
                    </div>
                </div>
                <div class="row" id="rowDiaSemana">
                    <div class="col-4 col" style="top: 7px;text-align:end">
                        <label for="cmbDiaSemana">Dia Semana:</label>
                    </div>
                    <div class="col-8 col">
                        <select id="cmbDiaSemana" name="cmbDiaSemana" class="form-control">
                            <option value="" selected>Selecione...</option>
                            <option value="1" >Segunda</option>  
                            <option value="2" >Terça</option>  
                            <option value="3" >Quarta</option>              
                            <option value="4" >Quinta</option>  
                            <option value="5" >Sexta</option>  
                            <option value="6" >Sabado</option>  
                            <option value="7" >Domingo</option>  
                            <option value="8" >A Combinar</option>  
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-4">
                        <button type="button" id="submitButton" class="btn btn-primary btn-sm">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
      </form>
    </div>
  </div>
</div>
@yield('scripts')
<script>
    $(function(){
        $( "#txtDtInicio" ).datepicker();
        $( "#txtDtFinal" ).datepicker();

        function getFormData($form){
            var unindexed_array = $form.serializeArray();
            var indexed_array = {};

            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });

            return indexed_array;
        }

        $("#tableRecorrente").DataTable({
            "columnDefs": [
                { 
                    "width": "5%", 
                    "targets": 0
                },
                { 
                    "width": "10%", 
                    "targets": 1
                },
                { 
                    "width": "35%", 
                    "targets": 2
                },
                { 
                    "width": "50%", 
                    "targets": 3
                },
                { 
                    "width": "5%", 
                    "targets": 5,
                    "orderable": false
                }
            ]
        });

        $("#tableEspecifica").DataTable({
            "columnDefs": [
                { 
                    "width": "5%", 
                    "targets": 0
                },
                { 
                    "width": "25%", 
                    "targets": 1
                },
                { 
                    "width": "25%", 
                    "targets": 2
                },
                { 
                    "width": "50%", 
                    "targets": 3
                },
                { 
                    "width": "5%", 
                    "targets": 5,
                    "orderable": false
                }
            ]
        });

        $("#tablePrioritaria").DataTable({
            "columnDefs": [
                { 
                    "width": "5%", 
                    "targets": 0
                },
                { 
                    "width": "25%", 
                    "targets": 1
                },
                { 
                    "width": "25%", 
                    "targets": 2
                },
                { 
                    "width": "50%", 
                    "targets": 3
                },
                { 
                    "width": "5%", 
                    "targets": 5,
                    "orderable": false
                }
            ]
        });

        $("#nav-tab > .nav-link").click(function(e){
            if($(this).text().includes('Disponibilidade'))
            {
                $("#divBotao").show();
            }
            else
            {
                $("#divBotao").hide();
            }
        });

        $('#submitButton').click( function() {
            var $form = $("#formModal");
            if($form.valid()){
                $("#loading").show();    
                $.ajax({
                    type:'POST',
                    url: "{{ route('disponibilidades.salvar') }}",
                    data:{ dataForm:  getFormData($form)  },
                    success:function(data){
                        $('#dispoModal').modal('toggle');
                        location.reload();
                    }
                });
            }
        });

        $("#cmbTipo").change(function() {
            if($(this).val() == 1){
                $("#rowtDtInicio").hide();
                $("#rowDtFinal").hide();
                $("#rowHrInicio").show();
                $("#rowtHrFinal").show();
            }
            else if ($(this).val() == 2){
                $("#rowtDtInicio").show();
                $("#rowDtFinal").show();
                $("#rowHrInicio").show();
                $("#rowtHrFinal").show();
            }
        });

        $(".btnGrid").click(function(){
            var idOportunidade = $(this).data('id');
            $("#loading").show(); 
            var btnClicked = $(this);
            $.ajax(
            {
                url: "{{ route('oportunidades.candidatarse') }}",
                type: 'GET',
                data: 
                { 
                    idOportunidade: idOportunidade 
                } ,
                contentType: 'application/json; charset=utf-8',
                success: function (response) {
                    var tableId = '#' + $($($($(btnClicked.parent()).parent()).parent()).parent()).attr('id');
                    var table = $(tableId).DataTable();
                    marcarTables(table, idOportunidade);
                },
                complete: function (){
                    $("#loading").hide(); 
                }
            });
        });

        function marcarTables(table ,idOportunidade){
            var indexes = [];
            table.rows( function ( idx, data, node ) {             
                if(data[0] === idOportunidade.toString()){
                    indexes.push(node);                  
                }
        
                return false;
            });

            for(var idx in indexes){
                $(indexes[idx]).addClass('selected');
                $($(indexes[idx]).find('button')).hide();
                $($(indexes[idx]).find('.btnDeselect')).show();
            }
        }
    });
</script>
@endsection
