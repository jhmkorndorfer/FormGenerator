<?php
/*@var $model MascaraModel */

?>
<div id="columnLeft">
   
    
</div>
<div id="columnMid">
    <?php
foreach ($model as $value) {
    echo ($value->getAttribute('htmlMascara'));
}
    ?>
    
</div>
<div id="columnRight">
    
</div>

