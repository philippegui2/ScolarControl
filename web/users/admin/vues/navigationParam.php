<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> <?php echo $nomPage;?></h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="../admin/?road=accueil">Accueil</a></li>
            <?php if(isset($navig2)){?>
            <li><i class="fa fa-bars"></i><a href="../admin/?road=<?php echo $navig2Lien;?>"><?php echo $navig2;?></a></li>
            <?php }?>
            <?php if($navig3!=" "){?>
            <li><i class="fa fa-square-o"></i><a href="../admin/?road=<?php echo $_REQUEST["road"].'&param='.$_REQUEST['param'];?>"> <?php echo $navig3;?></a></li>
            <?php }?>
        </ol>
    </div>
</div>