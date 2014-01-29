<?php

class ArtistMenu
{
    public $select_artist;

    public function __construct($name, $artists)
    {
        $select = '<select name="'.$name.'">';
        
		for ( $x=0; $x<=count($artists)-1; $x++ )
  		{
	        $id = $artists[$x]["id"];
	    	$artist_name = $artists[$x]["artist_name"];
	    	
	    	$select .= '<option value='.$id.'>'.$artist_name.'</option>';
		}

		$select .= '</select>';

		$this->select_artist = $select;
    }

    public function __toString()
    {
        return $this->select_artist;
    }
}

?>