<<<<<<< HEAD
 <?php 
            if(isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="add"){?>
            <div class="alert alert-success fade in" id="alertOK">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Super!</strong> Emploi du temps ajouté avec succès.
            </div>            
        <?php


         }elseif (isset($_REQUEST["alert"]) and $_REQUEST["alert"]=="edit") {?>
          <div class="alert alert-success fade in" id="alertOK">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Super!</strong> Emploi  du temps modifié avec succès.
            </div> 
         
         <?php }
        ?>


  

<form enctype="multipart/form-data" role="form" method="POST" action="../admin/index.php">   

    <div class="form-group input-group" >                                           
       <div class="row" >
       <table class="table table-striped table-dark" id="emploi">
=======
<form enctype="multipart/form-data" role="form" method="POST" action="../admin/index.php">

    <div class="form-group input-group">
       <div class="row">
       <table class="table table-striped table-dark">
>>>>>>> kolamus
        <thead>
        <tr>
          <th scope="col">Heures</th>
          <th scope="col" >Lundi</th>
          <th scope="col">Mardi</th>
          <th scope="col">Mercredi</th>
          <th scope="col">Jeudi</th>
          <th scope="col">Vendredi</th>
           <th scope="col">Samedi</th>
        </tr>
      </thead>
      <?php if(empty($DefaultMatieres)){?>
      <tbody>
        <tr>
<<<<<<< HEAD
          <th scope="row">8H-9H</th>
            <td>
                    <!-- Lundi-->
                <select class="selectpicker" data-live-search="true" name="lundi_8">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">8H00-9H00</th>
            <td style="padding:1px;line-height: 10px;">
                    <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_8" >
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause" >Pause</option>
                    <?php foreach ($matieres as $matiere) {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }

                    ?>
                </select>
            </td>
            <td style="padding:1px">
                 <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_8">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_8">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                 <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_8">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_8">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
<<<<<<< HEAD
            <td> <!-- Jeudi-->
                <select class="selectpicker" data-live-search="true" name="jeudi_8">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
            <td style="padding:1px"> <!-- Jeudi-->
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_8">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                 <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_8" >
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_8" >
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
<<<<<<< HEAD
             <td>
                 <!-- Samedi--> 
               <select class="selectpicker" data-live-search="true" name="samedi_8">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
             <td style="padding:1px">
                 <!-- Samedi-->
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_8">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>
        <tr>
<<<<<<< HEAD
        <th scope="row">09H-10H</th>
            <td>
                     <!-- Lundi-->  
                <select class="selectpicker" data-live-search="true" name="lundi_9">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
        <th scope="row">09H00-10H00</th>
            <td style="padding:1px">
                     <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_9">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_9">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_9">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_9">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_9">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_9">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_9">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_9">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_9">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_9">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_9">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>
        <tr>
<<<<<<< HEAD
        <th scope="row">10H-11H</th>
            <td>
                      <!-- Lundi--> 
                <select class="selectpicker" data-live-search="true" name="lundi_10">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
        <th scope="row">10H00-11H00</th>
            <td style="padding:1px">
                      <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_10">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_10">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_10">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_10">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_10">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_10">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_10">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_10">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_10">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_10"> 
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_10">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>
        <tr>
<<<<<<< HEAD
          <th scope="row">11H-12H</th>
          <td>
                 <!-- Lundi-->      
                <select class="selectpicker" data-live-search="true" name="lundi_11">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">11H00-12H00</th>
          <td style="padding:1px">
                 <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_11">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_11">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_11">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_11">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_11">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_11">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_11">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_11">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_11">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
             <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_11">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_11">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>


        </tr>
        <tr>
<<<<<<< HEAD
          <th scope="row">12H-13H</th>
            <td>
               <!-- Lundi-->        
                <select class="selectpicker" data-live-search="true" name="lundi_12">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">12H00-13H00</th>
            <td style="padding:1px">
               <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_12">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_12">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_12">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_12">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_12">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_12">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_12">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_12">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_12">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
             <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_12">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_12">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>


        </tr>
         <tr>
<<<<<<< HEAD
          <th scope="row">13H-14H</th>
            <td>
               <!-- Lundi-->        
                <select class="selectpicker" data-live-search="true" name="lundi_13">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">13H00-14H00</th>
            <td style="padding:1px">
               <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_13">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_13">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_13">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_13">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_13">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_13">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_13">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_13">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_13">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
             <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_13">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_13">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>


        </tr>
        <tr>
<<<<<<< HEAD
          <th scope="row">14H-15H</th>
            <td>
                      <!-- Lundi--> 
                <select class="selectpicker" data-live-search="true" name="lundi_14">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">14H00-15H00</th>
            <td style="padding:1px">
                      <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_14">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_14">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_14">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_14">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_14">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_14">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_14">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_14">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_14">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_14">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_14">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>


        </tr>
        <tr>
<<<<<<< HEAD
          <th scope="row">15H-16H</th>
            <td>
                       <!-- Lundi-->
                <select class="selectpicker" data-live-search="true" name="lundi_15">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">15H00-16H00</th>
            <td style="padding:1px">
                       <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_15">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_15">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_15">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_15">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_15">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_15">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_15">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_15">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_15">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
             <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_15">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_15">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>
        <tr>
<<<<<<< HEAD
          <th scope="row">16H-17H</th>
            <td>
                      <!-- Lundi--> 
                <select class="selectpicker" data-live-search="true" name="lundi_16">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">16H00-17H00</th>
            <td style="padding:1px">
                      <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_16">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_16">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_16">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mecredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_16">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_16">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_16">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_16">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_16">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_16">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
             <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_16">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_16">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>

        <tr>
<<<<<<< HEAD
          <th scope="row">17H-18H</th>
          <td>
                <!-- Lundi-->        
                <select class="selectpicker" data-live-search="true" name="lundi_17">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">17H00-18H00</th>
          <td style="padding:1px">
                <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_17">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_17">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_17">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                         <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_17">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_17">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_17">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_17">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_17">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_17">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
             <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_17">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_17">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>

        <tr>
<<<<<<< HEAD
          <th scope="row">18H-19H</th>
            <td>
               <!--Lundi-->        
                <select class="selectpicker" data-live-search="true" name="lundi_18">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">18H00-19H00</th>
            <td style="padding:1px">
               <!--Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_18">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_18">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_18">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                         <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_18">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_18">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_18">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_18">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_18">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_18">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
             <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_18">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_18">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>
        <tr>
<<<<<<< HEAD
          <th scope="row">19H-20H</th>
            <td>
                    <!-- Lundi-->   
                <select class="selectpicker" data-live-search="true" name="lundi_19">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
          <th scope="row">19H00-20H00</th>
            <td style="padding:1px">
                    <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" name="lundi_19">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                     <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mardi-->
<<<<<<< HEAD
                 <select class="selectpicker" data-live-search="true" name="mardi_19">
                        <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                 <select class="selectpicker input-sm" data-live-search="true" name="mardi_19">
                        <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Mercredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="mercredi_19">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="mercredi_19">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Jeudi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="jeudi_19">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="jeudi_19">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Vendredi-->
<<<<<<< HEAD
                <select class="selectpicker" data-live-search="true" name="vendredi_19">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
                <select class="selectpicker input-sm" data-live-search="true" name="vendredi_19">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td style="padding:1px">
                   <!-- Samedi-->
<<<<<<< HEAD
               <select class="selectpicker" data-live-search="true" name="samedi_19">
                    <option value="Choix de la Matiere">Choix de la Matiere</option>
=======
               <select class="selectpicker input-sm" data-live-search="true" name="samedi_19">
                    <option value="0">Choix de la Matiere</option>
>>>>>>> kolamus
                    <option value="pause">Pause</option>
                    <?php
                        foreach ($matieres as $matiere)
                        {
                 echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                        }
                    ?>
                </select>

            </td>

        </tr>
    <?php

    }
    else
    {
        $debut = 7;
        $fin = 8;

        foreach ($DefaultMatieres as $DefaultMatiere ) {




            $lundis = explode("*", $DefaultMatiere["lundi"]);
            $mardis = explode("*", $DefaultMatiere["mardi"]);
            $mercredis = explode("*", $DefaultMatiere["mercredi"]);
            $jeudis = explode("*", $DefaultMatiere["jeudi"]);
            $vendredis = explode("*", $DefaultMatiere["vendredi"]);
            $samedis = explode("*", $DefaultMatiere["samedi"]);

            for($i =0 ; $i<11; $i++)
            {
                $debut = $debut+1;
                $fin = $fin +1;



     ?>
     <tr>
          <th scope="row"><?php echo $debut .'H-'.$fin.'H' ?></th>
            <td style="padding:1px">
                    <!-- Lundi-->
                <select class="selectpicker input-sm" data-live-search="true" <?php echo 'name="lundi_'.$debut.'"' ?> >
                    <?php
                   echo '<option value="'.$lundis[$i].'" selected >'.$lundis[$i].' </option>';
                     ?>
                    <option value="pause" >Pause</option>
                    <?php


                        foreach ($matieres as $matiere)
                        {
                        echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].' </option>';
                        }

                    ?>
                </select>
            </td>
            <td style="padding:1px">
                 <!-- Mardi-->
                 <select class="selectpicker input-sm" data-live-search="true"  <?php echo 'name="mardi_'.$debut.'"' ?>>
                    <?php
                   echo '<option value="'.$mardis[$i].'" selected>'.$mardis[$i].'  </option>';
                     ?>

                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>

            <td style="padding:1px">
                 <!-- Mercredi-->
                 <select class="selectpicker input-sm" data-live-search="true"  <?php echo 'name="mercredi_'.$debut.'"' ?>>
                    <?php
                    echo '<option value="'.$mercredis[$i].'" selected>'.$mercredis[$i].'  </option>';
                     ?>

                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                     echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>

            <td style="padding:1px">
                 <!-- Jeudi-->
                 <select class="selectpicker input-sm" data-live-search="true"  <?php echo 'name="jeudi_'.$debut.'"' ?>>
                    <?php
                    echo '<option value="'.$jeudis[$i].'"selected>'.$jeudis[$i].'  </option>';
                     ?>

                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
              echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
             <td style="padding:1px">
                 <!-- Vendredi-->
                 <select class="selectpicker input-sm" data-live-search="true"  <?php echo 'name="vendredi_'.$debut.'"' ?>>
                    <?php
                  echo '<option value="'.$vendredis[$i].'" selected>'.$vendredis[$i].'  </option>';
                     ?>

                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
                   echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>
            <td style="padding:1px">
                 <!-- Samedi-->
                 <select class="selectpicker input-sm" data-live-search="true"  <?php echo 'name="samedi_'.$debut.'"' ?>>
                    <?php
                    echo '<option value="'.$samedis[$i].'" selected>'.$samedis[$i].'  </option>';
                     ?>

                        <option value="pause">Pause</option>
                        <?php
                            foreach ($matieres as $matiere)
                            {
         echo '<option value="'.$matiere['libelleMatiere'].'">'.$matiere['libelleMatiere'].'</option>';
                            }
                        ?>
                </select>
            </td>



     <tr>
    <?php

        }

        }
    }


     ?>

      </tbody>
    </table>
    </div><!--/.row-->
    </div>
 <!-- fin zone des ajouts-->
 <?php
    echo '<input type="hidden" name="idClasse" value="'.$_REQUEST["param"].'"">';
    ?>

<button type="submit" class="btn btn-info" name="action" value="EMPLOIajouter" style="margin-left:600px;">Valider</button>
</form>
<<<<<<< HEAD

=======
>>>>>>> kolamus
                        <!--Fin du formulaire d'inscription-->
