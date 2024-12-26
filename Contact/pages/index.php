<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
   
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Liste des Contacts</h2>
                        <a href="create.php" class="btn btn-success"><i class="bi bi-plus"></i>Ajouter</a>
                    </div>
                    <?php 
                       require_once "connexion.php";  
                       require_once "contact.php";



                       class Contacts {
                        public $connexion;

                        public function __construct($connexion) {
                            $this->connexion = $connexion;
                        }
                           
                        }
                        
                        $sql = "SELECT * FROM Contact";

                        

                        try{
   
                        $stmt = $connexion->query($sql);
    
    
                        if ($stmt->rowCount() > 0) {
                             echo '<table class="table table-bordered table-striped">';
                             echo "<thead>";
                             echo "<tr>";
                             echo "<th>ID</th>";
                             echo "<th>Nom</th>";
                             echo "<th>Prenom</th>";
                             echo "<th>Email</th>";
                             echo "<th>Telephone</th>";
                             echo "</tr>";
                             echo "</thead>";
                             echo "<tbody>";
        
        
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                             echo "<tr>";
                             echo "<td>" . $row['ID'] . "</td>";
                             echo "<td>" . $row['Nom'] . "</td>";
                             echo "<td>" . $row['Prenom'] . "</td>";
                             echo "<td>" . $row['Email'] . "</td>";
                             echo "<td>" . $row['Numero'] . "</td>";
                             echo "<td>";
                             echo '<a href="read.php?id='. $row['ID'] .'" class="me-3" ><span class="bi bi-eye"></span></a>';
                             echo '<a href="update.php?id='. $row['ID'] .'" class="me-3" ><span class="bi bi-pencil"></span></a>';
                             echo '<a href="delete.php?id='. $row['ID'] .'" ><span class="bi bi-trash"></span></a>';
                             echo "</td>";
                             echo "</tr>";
                         }
        
                       echo "</tbody>";
                       echo "</table>";
                  } else {
                       echo '<div class="alert alert-danger"><em>Pas d\'enregistrement</em></div>';
                  }
             } catch (PDOException $e) {
                 echo "Oops! Une erreur est survenue. " . $e->getMessage();
             }
            
            ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
