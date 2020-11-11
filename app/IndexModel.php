<?php
namespace App\Apps;
use Quwi\framework\Observable_Model;
//use Quwi\framework\Database;

class IndexModel extends Observable_Model {
    
    
    public function findAll() : array{
      
        //$sqli = Database::getDbConnection();
        $connect = $this->makeConnection();
        $courses = [];
        $query_string = 'SELECT * FROM courses' ;
        $result = $connect->query($query_string);
        if ($connect->errno){
            trigger_error('SQL error ' . $connect->error, E_USER_ERROR);
        }
        while ($row = $result->fetch_assoc()){
            $courses['courses'] = $row;
        }
        return $courses;




        //returns all courses
       /*$data = $this->loadData(DATA_DIR . '/courses.json');
        var_dump($data);
        return $data;
      
        $popular_section = array_column($data['course'], 3);
        $recommended_section = array_column($data['courses'], 2);
        $extra = $data['courses'];

        array_multisort($recommended_section, SORT_DESC, $data['courses']);
        $recommended = array_slice($data['courses'], 0, 8);
        array_multisort($popular_section, SORT_DESC, $extra);
        $popular= array_slice($extra,0,8);

        return ['popular' => $popular, 'recommended'=> $recommended];*/
    }

    public function findRecord(string $id) : array {
        return [];
    }
}