<?php 
    include_once 'db.php'
    class Productos extends DB{

        function __construct(){
            parent::__construct();
        }
    
        public function get($id){
            $query = $this->connect()->prepare('SELECT * FROM ordenes WHERE id = :id');
            $query->execute(['id' => $id]);
    
            $row = $query->fetch();
    
            return [
                    'id'        => $row['id'],
                    'nombre'    => $row['nombre'],
                    'cantidad' => $row['cantidad']
                    ];
        }
    
        public function getItemsByNombre($nombre){
            $query = $this->connect()->prepare('SELECT * FROM ordenes WHERE nombre = :nombre');
            $query->execute(['nombre' => $nombre]);
            $items = [];
            
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $item = [
                    'id'        => $row['id'],
                    'nombre'    => $row['nombre'],
                    'cantidad' => $row['cantidad']
                        ];
                array_push($items, $item);
            }
            return $items;
        }
    }
?>