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
            url:'/oportunidades/candidatarse',
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