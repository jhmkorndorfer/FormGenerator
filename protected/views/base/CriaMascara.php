<?php
/* @var $value FormularioModel */
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/CriaMascara.js');
// $campo = new CampoModel();
$formulario = new FormularioModel();
$campo = new CampoModel();
?>
<div id="columnLeft">
    <br>
    <center><h4>Campos Base</h4></center>
    <div class="dragField" id="ss">
        <input type="text" class="inputText"/>
        <input type="hidden" id="1"/>
    </div>
    <br>
    <div class="dragField">
        <label>Label</label>
<!--        <br>-->

<!--        <input type="text" value="Label" style="display: none;">-->
    </div>
    <br>
    <div class="dragField">
        <select>uhashuashu</select>
    </div>
    <br>
    <div class="dragField">
        <h1>Titulo 1</h1>
<!--        <input type="text" value="Titulo 1" style="display: none;">-->
    </div>

</div>
<div id="columnMid">


</div>
<div id="columnRight">
    <center>
        <br>
        <label>Nome da Máscara:</label>
        <input type="text" id="mascName" />
        <br><br>
        <label>Data Início Validade:</label>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'publishDate',
            'language' => 'pt',
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'id' => 'dataInicio'
            ),
        ));
        ?>
        <br><br>
        <label>Data Fim Validade:</label>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'publishDate2',
            'language' => 'pt',
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'id' => 'dataFim'
            ),
        ));
        ?>
        <br><br>
        <label>Escolher Formulário:</label>
        <?php
        $forms = CHtml::listData($formularios, 'CodFormulario', 'NomeFormulario');
        echo CHtml::activeDropDownList($formulario, 'CodFormulario', $forms, array('prompt' => 'Escolha o Formulario', 'id' => 'codForm'));
        ?>
        <br>
        <br>
        <?= CHtml::button('Salvar', array('id' => 'salvar')) ?>

    </center>
</div>
<div id="divInput">
    <h2>Definição do Campo</h2>
    <?php
    $tiposCampos = CHtml::listData($campos, 'CodTipoCampo', 'NomeCampo');
    echo CHtml::activeDropDownList($campo, 'CodTipoCampo', $tiposCampos, array('empty' => 'Escolher o Tipo deste Campo', 'id' => 'codCampo'));
    ?>
    <input type="button" value="salvar" id="saveInput" />
    <input type="button" value="cancelar" class="cancelar" />
</div>
<script>
    $(document).ready(function() {
        var i = 0;
        var editando;
        //Class ------------------------------------------------------------------------
        $('#divInput').on('click','.cancelar',function(e){
            $('#divInput').hide();
        });
        $('#columnMid').on('dblclick','h1',function(e){
            $(this).html("<input type='text' value="+$(this).text()+" />");
            $(this).children().blur(function(){
                if($(this).val()==''){
                     $(this).parent().text('Titulo 1');
                     $(this).remove(); 
                }else{
                    $(this).parent().text($(this).val());
                    $(this).remove();  
                }
                $(this).hide();
                    
            });
           
        });
        $('#columnMid').on('dblclick','label',function(e){
            $(this).html("<input type='text' value="+$(this).text()+" />");
            $(this).children().blur(function(){
                if($(this).val()==''){
                    $(this).parent().text('Label');
                    $(this).remove();
                }else{
                    $(this).parent().text($(this).val());
                    $(this).remove();  
                }
                $(this).hide();
                    
            });
           
        });
        $('#columnMid').on('dblclick','.inputText',function(e){
            $('#divInput').show();
            editando = $(this);
        });
        $('#divInput').on('click','#saveInput',function(e){
            $('#divInput').hide();
            editando.next().attr('id',$('#codCampo').val());
        });
        //Class ------------------------------------------------------------------------
        $('#salvar').click(function(){
            htmlMasc = new Array();
            nomeM = $('#mascName').val();
            dataInicio = $('#dataInicio').val();
            dataFim = $('#dataFim').val();
            codForm = $('#codForm').val();
            for(a=1;a<=i;a++){
                htmlMasc.push($('#'+a).clone().wrap('<div></div>').parent().html());
            }
            $.ajax({
                url: "<?php echo (Yii::app()->createUrl('base/SalvaMasc')); ?>",
                type: "POST",
                data: {htmlMasc: htmlMasc, nomeM: nomeM, dataInicio: dataInicio, 
                    dataFim: dataFim, codForm: codForm},
                error: function(xhr,tStatus,e){
                    if(!xhr){
                        alert(" We have an error ");
                        alert(tStatus+"   "+e.message);
                    }else{
                        alert("else: "+e.message); 
                    }
                },
                success: function(resp){
                    alert(resp);
                }
            });
    
        });
   
        var element;
        $('.dragField').draggable({
            containment: 'body',
            cursor: 'move',
            helper: 'clone',
            revert: 'invalid',
            snap: '.dragField',
            snapTolerance: 8,
            start: function (event, ui) {
                i++;
            }
        });
        $('#columnMid').droppable({
            accept: ".dragField",
            drop: handleDropEvent
        
        });

        function handleDropEvent(event, ui) {
        
            //  element = ui.helper.attr('id') + i;
            var offsetXPos = parseInt(ui.offset.left);
            var offsetYPos = parseInt(ui.offset.top);
            $(this).find('#columnMid').remove();
            if($(ui.helper).attr('id')<=i){
                $(this).append($(ui.helper).clone().draggable({
                    containment: '#columnMid',
                    cursor: 'move',
                    snap: '.dragField',
                    snapTolerance: 8,
                    stop: function (event, ui) {
                        $(this).remove();
                    }
                }));
            }
            else{
                $(this).append($(ui.helper).clone().attr('id',i).draggable({
                    containment: '#columnMid',
                    cursor: 'move',
                    snap: '.dragField',
                    snapTolerance: 8,
                    stop: function (event, ui) {
                        $(this).remove();
                    }
                }));
            }
        }
    });
    
    //    $('.dragField').live('right', function (event) {
    //        $(this).remove();
    //    });
    //        $("h1").live('dblclick', function(){
    //            editando = $(this).attr('id');
    //            $('#divH1').show();
    //        });

    //        $("#saveH1").live('click', function(){
    //           $('#'+editando).text($('#textH1').text());
    //            $('#divH1').hide();
    //        });
    //        $(".cancelar").live('click', function(){
    //            $('#divH1').hide();
    //        });

    //            $('#divH1').show();
    
    
    //    $('.dragField').click(function(){
    //        i++;
    //        
    //        alert($(this).attr('id'));
    //    });
    
//        $('#columnMid').on('dblclick','h1',function(e){
//            $(this).next().show();
//            $(this).next().blur(function(){
//                if($(this).val()==''){
//                    $(this).prev().text('Titulo 1');  
//                }else{
//                    $(this).prev().text($(this).val());  
//                }
//                $(this).hide();
//                    
//            });
//           
//        });
    
//        $('#columnMid').on('dblclick','label',function(e){
//            $(this).next().next().show();
//            $(this).next().next().blur(function(){
//                if($(this).val()==''){
//                    $(this).prev().prev().text('Label');  
//                }else{
//                    $(this).prev().prev().text($(this).val());  
//                }
//                $(this).hide();
//                    
//            });
//           
//        });
</script>
