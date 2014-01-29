<?php

class GenreMenu
{
    public $select_genre;

    public function __construct($name, $genres)
    {
        $select = '<select name="'.$name.'">';
        
		for ( $x=0; $x<=count($genres)-1; $x++ )
  		{
	        $id = $genres[$x]["id"];
	    	$genre = $genres[$x]["genre"];
	    	
	    	$select = $select . '<option value='.$id.'>'.$genre.'</option>';
		}

		$select = $select . '</select>';

		$this->select_genre = $select;
    }

    public function __toString()
    {
        return $this->select_genre;
    }
}

?>