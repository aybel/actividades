<?php $this->extend('default'); ?>
<?php $this->section('inicio') ?>
<div  id="ContenedorLoading"  class="container-fluid">
    <div class="row">
        <div class="col-12">
            
        </div>
    </div>
   
    <div class="row">
        <?php echo $this->renderSection('main'); ?>
    </div>
    
</div>

<?php $this->endSection() ?>