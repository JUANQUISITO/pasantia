<!------    ESTRUCTURA DEL CUERPO NAV TOP---- NAV LATERAL ----FOOTER--->

<!DOCTYPE html>
<html>
<!-- header -->
<?php include 'Views/Template/Header.php'; ?>

<body>

    <div class="wrapper"> 
        <div class="body-overlay"></div>
        <!-- Sidebar  -->
        <?php include 'Views/Template/navlateral.php'; ?>
         



        

        <div id="content" class="">
            <div class="top-navbar">
             <!-- nav top -->
             <?php include 'Views/Template/navtop.php'; ?>
            </div>

            <div class="main-content">
                <!--AQUI VA EL CONTENIDO COMO EJMPLO DASHBOARD-->
                <!-- Page Content  -->                   
            </div>
                <!-- footer  -->
                <?php include 'Views/Template/Footer.php'; ?>
        </div>
    </div>  
</body>

</html>