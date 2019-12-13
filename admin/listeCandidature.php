        <!--=============================================================================================================== -->
        <!--========================== page : liste des candidature    ========================= -->
        <!--========================== parametre : rien ================= --> 
        <!--========================== acteur  :  secrtariat =================== --> 
        <!--========================== traitement  :  chosir un stage (select) puis afficher ses candidats   ========== -->  
        <!--========================== Redirection  :  examinerCandidature , supprimerCandidature   ======= -->                          
        <!-- =============================================================================================================== --> 

    <!--=============================================================================================================== -->
    <!--=========================================== php  ============================================= -->
	<!-- =============================================================================================================== -->
    
    <?php
    
    require('connexion.php');
    
    
    ?>

    <!--=============================================================================================================== -->
    <!--=========================================== fin php   ============================================= -->
	<!-- =============================================================================================================== --> 

   
    <!--=============================================================================================================== -->
    <!--=========================================== FIN Head  ============================================= -->
	<!-- =============================================================================================================== -->    
    


    <!--=============================================================================================================== -->
    <!--=========================================== javascript  ============================================= -->
	<!-- =============================================================================================================== -->
    
    <script language="JavaScript">
        
        /*<!--===================================================================== -->
        <!--=== fonction qui return un object request xml  ======== -->
        <!-- ==================================================================== --> */ 

        function getRequestObject()
       {
           var req = null; 

           if (window.XMLHttpRequest)
            {
                req = new XMLHttpRequest();

            } 
            else if (window.ActiveXObject) 
            {
                try {
                    req = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e)
                {
                    try {
                        req = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {}
                }
            }

            return req;
       }
        

        /*<!--===================================================================== -->
        <!--=== fonction remplir table liste candditaure selon le stage selectionner ====== -->
        <!-- ==================================================================== --> */ 
        
        function afficherListeCandidatures()
        {
            
            var req = getRequestObject(); 
            var stage=document.form2.stages.value; // id stage selectionner 

            req.onreadystatechange = function()
            { 
               
                if(req.readyState == 4)
                {
                    if(req.status == 200)
                    {
                        var table=document.getElementById("ContenuListeCandidature");
                        table.innerHTML=req.responseText;	 // stocker le resultat (liste des candidature ) dans la table 

                    }	
                    else	
                    {
                        alert("ddddddd");
                    }	
                } 
            }; 


            req.open("GET", "admin/script_listeCandidatureByIdStage.php?idstage="+stage, true); 
            req.send(null);
        }

        /*<!--===================================================================== -->
        <!--=== afficher le nombre de place disponible du stage selectionner   ======== -->
        <!-- ==================================================================== --> */

        function remplirNombreDeplace()
        {
            var req = getRequestObject(); 
            var stage=document.form2.stages.value; // id stage selectionner 

            req.onreadystatechange = function()
            { 
               
                if(req.readyState == 4)
                {
                    if(req.status == 200)
                    {
                       
                        var input=document.getElementById("nbpl");
                        input.value=parseInt(req.responseText);    // stocker le resultat (liste des candidature ) dans la table 

                    }   
                    else    
                    {
                        alert(req.responseText);
                    }   
                } 
            }; 


            req.open("GET", "admin/script_NombreDeplaceDispByStage.php?id="+stage, true); 
            req.send(null);
        }
        
    </script>
    
    <!--=============================================================================================================== -->
    <!--=========================================== FIN javascript  ============================================= -->
	<!-- =============================================================================================================== -->
    
   	<!--=============================================================================================================== -->
    <!--=========================================== Center  ============================================= -->
	<!-- =============================================================================================================== -->

    <br>
    <br>

    <div id="Candidats" class="text-center">
      <div class="container-fluid">
        <div class="section-title">
              <h2>Candidats</h2>
        </div>
    
    <div class="container" >

        <form name="form2" >
            
            <!--===================================================================== -->
            <!--==================== select : liste des stages   ============= -->
            <!-- ==================================================================== -->

                <div class="form-row">

                    <div class="form-group col-md-6">

                        <label for="stages">  Stage  : </label>
                        <select class="form-control" name="stages" onchange="afficherListeCandidatures();remplirNombreDeplace()">
                            <option> selectionner</option>
                            <?php

                                $reponse = $bdd->query('SELECT * FROM stage');
                                while ($donnees = $reponse->fetch())
                                {
                                    echo "<option value=".$donnees["id"]." >".$donnees["theme"]."</option>";
                                }

                            ?>

                        </select>
                    </div>

                    <!--===================================================================== -->
                    <!--==================== nombre de place disponible   ============= -->
                    <!-- ==================================================================== -->

                    <div class="form-group col-md-6">
                        <label for="titre" class="form-control-label">nombre de place :</label> 
                         <input  type="number" class="form-control" id="nbpl" />
                    </div>

               </div>
            <!--===================================================================== -->
            <!--==================== table : listes des candidatures   ============= -->
            <!-- ==================================================================== -->

            <table class="table table-striped table-bordered">

                <!--===================================================================== -->
                <!--==================== en tete du table   ============= -->
                <!-- ==================================================================== -->
                  <thead>
                    <tr>
                      <th scope="col">Nom </th>
                      <th scope="col">Prenom</th>
                      <th scope="col">Email</th>
                      <th scope="col">Examiné</th>
                      <th scope="col">Etat</th>
                    </tr>
                  </thead>


                <!--===================================================================== -->
                <!--============== contenu du table : sera remplir avec ajax   ========== -->
                <!-- ==================================================================== -->
                  <tbody id="ContenuListeCandidature">

                  </tbody>

            </table>

            <!--===================================================================== -->
            <!--==================== FIN  table   ============= -->
            <!-- ==================================================================== -->


         </form>

    </div>
</div>
</div>
	<!--=============================================================================================================== -->
    <!--===========================================  FIN Center  ============================================= -->
	<!-- =============================================================================================================== -->
    
