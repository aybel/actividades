<!DOCTYPE html>
<html>
    <?php echo $this->include('Layouts/Head') ?>
    <body>
        <?php echo $this->include('Layouts/Header') ?>
        <?php echo $this->renderSection('inicio'); ?>
        <?php echo $this->include('Layouts/Footer')
        ?>
    </body>
</html>
