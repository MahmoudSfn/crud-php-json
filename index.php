<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test Technique Hospitalidee</title>
        <?php include("./includes/head.php"); ?>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout ">
			<header class="mdl-layout__header mdl-layout__header--waterfall">
				<div class="mdl-layout__header-row">
					<h1 class="mdl-layout-title">Freshcore</h1>
				</div>
			</header>
			<main class="mdl-layout__content">
				<div class="page-content">
					<div class="centeritems mdl-grid">
						<div class="mdl-layout-spacer"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="user_table" class="table table-striped table-bordered table-sm table-main">
                                            
                                            <thead class="thead-dark">
                                                <tr style="background-color: #343a40">
                                                    <td colspan="7"><a href="./views/add.php"><button class="btn btn-success"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add new user</button></a></td>
                                                </tr>
                                                <tr>
                                                    <th>Prenom</th>
                                                    <th>Nom</th>
                                                    <th>Email</th>
                                                    <th>Sex</th>
                                                    <th>Mot de Passe<span style="float: right"><a href="./controler/initPassAll.php">Click <i class="fas fa-key"></i></a></span></th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $data = file_get_contents('db.json');
                                                $data = json_decode($data);
                                                if(!empty($data)){
                                                    foreach($data as $row){ 
                                                ?>
                                                        <tr>
                                                            <td><?php echo $row->prenom; ?></td>
                                                            <td><?php echo $row->nom; ?></td>
                                                            <td><?php echo $row->email; ?></td>
                                                            <td><?php if ($row->genre == "Monsieur") { echo "H"; } else { echo "F"; }?></td>
                                                            <td><?php echo $row->password; ?></td>
                                                            <td>
                                                                <a href="./views/update.php?edit_id=<?php echo $row->id; ?>"><button class="btn btn-primary"><i class="fas fa-user-edit">&nbsp;</i>Edit</button></a>&nbsp; &nbsp;
                                                                <a href="./views/delete.php?delete_id=<?php echo $row->id; ?>"><button class="btn btn-danger"><i class="fas fa-user-minus"></i>&nbsp;Delete</button></a> 
                                                                <a href="./controler/initPass.php?user_id=<?php echo $row->id; ?>"><button class="btn btn-secondary"><i class="fas fa-key"></i></button></a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <div class="mdl-layout-spacer"></div>
					</div>
				</div>
            </main>
        </div>
        <?php include("./includes/footer.php") ?>
        <script>
            $(document).ready(function () {
                $('#user_table').DataTable();
                $('.dataTables_length').addClass('bs-select');
                // $('.dataTables_length').css('display', 'inline-block');
                // $('.bs-select').css('display', 'inline-block');

                // $('.dataTables_filter').css({'display': 'inline-block', 'float': 'right'});
                // $('#user_table_info').css({'position': 'relative', 'align-items': 'center'});
                
            });
        </script>
        </body>
</html>