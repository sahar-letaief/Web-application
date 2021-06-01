<?php
include "../../Controller/animalerieC.php";
include "../../config.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once "header_animalerie_admin.php";
?>
<main class="main-content mt-1 border-radius-lg">
    <div class="panel panel-danger table-edit">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div>
                    <a href="afficherTRI.php" class="btn btn-lg btn-info btn-block">TRI % PRIX</a>
                    <a href="afficher.php" class="btn btn-lg btn-info btn-block">TRI % QTE</a>
                    <a href="afficherTRI2.php" class="btn btn-lg btn-info btn-block">TRI % NOM</a>
                    <a href="stat.php" class="btn btn-lg btn-info btn-block">Statistiques</a>
                </div>
                                    <span>
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                    Liste des Accessoires</span>
            </h3>
        </div>
        <div class="panel-body">
            <div id="sample_editable_1_wrapper" class="">
                <div>
                    <a href="ajouterAccess1.php"><input type="submit" name="ajouter" value="ajout d'un accessoire" class="btn btn-lg btn-info btn-block"></a>
                </div>
                <!  ********************************************************* !>
                <input class="col-10" type="text" name="AfficherClasse" onkeyup="myFunction()" placeholder="rechercher nom" id="myInput">


                <! *************************************************************** !>
                <table class="table table-striped table-bordered table-hover dataTable no-footer"
                       id="mytable" role="grid">
                    <thead class="table_head">
                    <tr>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                            colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                            colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">NOM
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                            colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">PRIX
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                            colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">VENDEUR
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                            colspan="1" aria-label="
                                                 IMAGE
                                            : activate to sort column ascending">IMAGE
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                            colspan="1" aria-label="
                                                 TYPE
                                            : activate to sort column ascending">TYPE
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                            colspan="1" aria-label="
                                                 QTE
                                            : activate to sort column ascending">QTE
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                            colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">Edit
                        </th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                    $access = new AccessC();
                    $liste=$access->QteAccess();
                    foreach ($liste as $row){ ?>
                        <tr>
                            <td><?PHP echo $row['id']; ?></td>
                            <td><?PHP echo $row['nom']; ?></td>
                            <td><?PHP echo $row['prix']; ?></td>
                            <td><?PHP echo $row['vendeur']; ?></td>
                            <td><?PHP echo $row['image']; ?></td>
                            <td><?PHP echo $row['type']; ?></td>
                            <td><?PHP echo $row['qte']; ?></td>
                            <td>
                                <a  href="modifierAccess1.php?id=<?PHP echo $row['id']; ?>" >
                                    edit</a></td>



                            </td>
                            <td>
                                <form method="POST"
                                      action="supprimerAccess.php">
                                    <input type="submit" name="supprimer"
                                           value="supprimer"  >
                                    <input  type="hidden" value="<?PHP echo $row['nom']; ?>" name="nom">
                                </form>

                            </td>

                        </tr>




                    <?PHP } ?>



                    </tbody>
                </table>
            </div>
            <div class="panel panel-danger table-edit">
                <div class="panel-heading">
                    <h3 class="panel-title">
                                    <span>
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                    Liste des Aliments</span>
                    </h3>
                </div>
                <div class="panel-body">
                    <div id="sample_editable_1_wrapper" class="">
                        <div>
                            <a href="ajouterAliment1.php"><input type="submit" name="ajouter" value="ajout d'un aliment" class="btn btn-lg btn-info btn-block"></a>

                        </div>
                        <!  ********************************************************* !>
                        <input class="col-10" type="text" name="AfficherClasse" onkeyup="myFunction1()" placeholder="rechercher nom" id="myInput1">


                        <! *************************************************************** !>
                        <table class="table table-striped table-bordered table-hover dataTable no-footer"
                               id="mytable1" role="grid">
                            <thead class="table_head">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable"
                                    rowspan="1" colspan="1">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                    colspan="1" aria-label="
                                                 NOM
                                            : activate to sort column ascending">NOM
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                    colspan="1" aria-label="
                                                 PRIX
                                            : activate to sort column ascending">PRIX
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                    colspan="1" aria-label="
                                                 VENDEUR
                                            : activate to sort column ascending">VENDEUR
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                    colspan="1" aria-label="
                                                 IMAGE
                                            : activate to sort column ascending">IMAGE
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                    colspan="1" aria-label="
                                                 TYPE
                                            : activate to sort column ascending">TYPE
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                    colspan="1" aria-label="
                                                 QTE
                                            : activate to sort column ascending">QTE
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                    colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">Edit
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending">Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?PHP
                            $aliment = new AlimentC();
                            $liste=$aliment->QteAliment();
                            foreach ($liste as $row){ ?>
                                <tr>
                                    <td><?PHP echo $row['id']; ?></td>
                                    <td><?PHP echo $row['nom']; ?></td>
                                    <td><?PHP echo $row['prix']; ?></td>
                                    <td><?PHP echo $row['vendeur']; ?></td>
                                    <td><?PHP echo $row['image']; ?></td>
                                    <td><?PHP echo $row['type']; ?></td>
                                    <td><?PHP echo $row['qte']; ?></td>
                                    <td>
                                        <a  href="modifierAliment1.php?id=<?PHP echo $row['id']; ?>" >
                                            edit</a></td>



                                    </td>
                                    <td>
                                        <form method="POST"
                                              action="supprimerAliment.php">
                                            <input type="submit" name="supprimer"
                                                   value="supprimer"  >
                                            <input  type="hidden" value="<?PHP echo $row['nom']; ?>" name="nom">
                                        </form>

                                    </td>

                                </tr>




                            <?PHP } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="panel panel-danger table-edit">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                    <span>
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                    Liste des Types</span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div id="sample_editable_1_wrapper" class="">
                                <div>
                                    <a href="ajouterType1.php"><input type="submit" name="ajouter" value="ajout d'un type" class="btn btn-lg btn-info btn-block"></a>

                                </div>
                                <!  ********************************************************* !>
                                <input class="col-10" type="text" name="AfficherClasse" onkeyup="myFunction2()" placeholder="rechercher type" id="myInput2">


                                <! *************************************************************** !>
                                <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                       id="mytable2" role="grid">
                                    <thead class="table_head">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_editable"
                                            rowspan="1" colspan="1">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                            colspan="1" aria-label="
                                                 NOM
                                            : activate to sort column ascending">TYPE
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable" rowspan="1"
                                            colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">Edit
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending">Delete
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?PHP
                                    $type = new TypeC();
                                    $liste=$type->afficherType();
                                    foreach ($liste as $row){ ?>
                                        <tr>
                                            <td><?PHP echo $row['id_type']; ?></td>
                                            <td><?PHP echo $row['type']; ?></td>
                                            <td>
                                                <a  href="modifierType1.php?id=<?PHP echo $row['id_type']; ?>" >
                                                    edit</a></td>



                                            </td>
                                            <td>
                                                <form method="POST"
                                                      action="supprimerType.php">
                                                    <input type="submit" name="supprimer"
                                                           value="supprimer"  >
                                                    <input  type="hidden" value="<?PHP echo $row['id_type']; ?>" name="id_type">
                                                </form>

                                            </td>

                                        </tr>




                                    <?PHP } ?>
                                    </tbody>
                                </table>
                            </div>

</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary " data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info active" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar Fixed</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.1"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="recherche.js"></script>
</html>