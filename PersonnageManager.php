<?php

class PersonnageManager{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addPersonnage(): bool 
    {
        $name = $_POST['name'];
        $atk = $_POST['atk'];
        $pv = $_POST['pv'];
        $image = $_POST['img'];

        $requete = "INSERT INTO personnages (name, atk, pv, img) VALUES (:name, :atk, :pv, :img)";
        $stmt = $this->db->prepare($requete);

        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':atk', $atk, PDO::PARAM_INT); 
        $stmt->bindValue(':pv', $pv, PDO::PARAM_INT);   
        $stmt->bindValue(':img', $image, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }

    public function deletePersonnage($id): bool 
    {
        $requete = "DELETE FROM personnages WHERE id = :id";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function modifyPersonnage(): bool 
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $atk = $_POST['atk'];
        $pv = $_POST['pv'];
        $image = $_POST['img'];

        $requete = "UPDATE personnages SET name = :name, atk = :atk, pv = :pv, img = :img WHERE id = :id";
        $stmt = $this->db->prepare($requete);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':atk', $atk, PDO::PARAM_INT); 
        $stmt->bindValue(':pv', $pv, PDO::PARAM_INT);   
        $stmt->bindValue(':img', $image, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }

    public function getAllPersonnage()
    {
        $query = $this->db->query('SELECT * FROM personnages ORDER BY id');
        while($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $personnage[] = new Personnage($donnees);
        }
        return $personnage;
    }

    public function getOnePersonnageById($id): Personnage
    {
        $query = $this->db->prepare('SELECT * FROM personnages WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        return new Personnage($data);
    }
}

?>
