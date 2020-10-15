<?php 
class LoginModel extends Observable_Model{

    public function getAll() : array{
        
        return [];
        //returns all courses
       /*$data = $this->loadData(DATA_DIR . '/courses.json');
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

    public function getRecord(string $id) : array {
        return [];
    }
}