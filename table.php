<?php
// EXAMPLE OF USE
// $data = array(
//    array(
//       'Name' => 'Trixie',
//       'Color' => 'Green',
//       'Element' => 'Earth',
//       'Likes' => 'Flowers'
//    ),
//    array(
//       'Element' => 'Water',
//       'Likes' => 'Dancing',
//       'Name' => 'Blum',
//       'Color' => 'Pink'
//    ),
// );

// $table = new Table($data);
// $table->render();

?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * This is the class for drow table from array.
 *
 * This is the class for drowing table from array in ASCII format.
 * 
 * @author Alex <itemedved@gmail.com>
 */
class Table 
{
	/** 
     * @var array array Start data 
     */
    private $rows;
    /** 
     * @var int The column width settings
     */
    private $cs = array();
    /**
     * @var int The keys of data
     */
    private $keys = array();
    /**
     * @var int Max Row (chars)
     */
    private $mW = 40;
    //option
    private $head  = false;
    //dorwing elements
    private $pcen  = "+";
    private $prow  = "-";
    private $pcol  = "|";
    
    /** 
     * @param array Start array data 
     */
	function __construct($arguments)
	{
		//if arguments not array stop progress 
		if(!$arguments || !is_array($arguments)) return false;

	    $this->rows = $arguments;               
        $this->keys = array_keys($this->rows[0]);

        foreach($this->rows as $row_key => $row) {
        	$col_key = 0;
        	foreach ($row as $cell_value) {
        		
        		$len = strlen($cell_value);
		        
		        if($len > $this->mW)
		            $len = ceil($lines % $this->mW);
		            // $len = $this->mW;
		 
		        if(!isset($this->cs[$col_key]) || $this->cs[$col_key] < $len)
		            $this->cs[$col_key] = $len + 1;
                $col_key++;
        	}
        }
    }
    
    /**
     * Prints the data to a text table
     *
     * @return mixed
     */
    public function render()
    {
  		$this->setHeading();
        $this->printHeading();
     
       	foreach ($this->rows as $key => $value) {
       		$this->drow($key);
       		# code...
       	}
        $this->printLine(false);
    }
    

    private function drow($row_key)
    {
    	echo $this->pcol;  
        for($col_key=0; $col_key < count($this->keys); $col_key++) { 
	        echo " ";
	        echo str_pad(substr($this->rows[$row_key][$this->keys[$col_key]], 0, $this->mW), $this->cs[$col_key], ' ', STR_PAD_RIGHT);
	        echo " " . $this->pcol;
    	}
    	echo  "\n";
    }

    private function setHeading()
    {
        $data = array();  
        foreach($this->keys as $col_key => $cell_value) {
        	$len = strlen($cell_value);

        	if($len > $this->mW)
        		$len = ceil($lines % $this->mW);

		 	if(!isset($this->cs[$col_key]) || $this->cs[$col_key] < $len)
		            $this->cs[$col_key] = $len;

            $data[$col_key] = strtoupper($cell_value);
        }
        if(!is_array($data)) return false;
        $this->head = $data;
    }

    private function printLine($nl=true)
    {
        echo $this->pcen;
        foreach($this->cs as $key => $val)
            echo $this->prow .
                str_pad('', $val, $this->prow, STR_PAD_RIGHT) .
                $this->prow .
                $this->pcen;
        if($nl) echo "\n";
    }

    private function printHeading()
    {
        if(!is_array($this->head)) return false;
        
        $this->printLine();
        
        echo $this->pcol;
        foreach($this->cs as $key => $val)
            echo ' '.
                str_pad($this->head[$key], $val, ' ', STR_PAD_BOTH) .
                ' ' .
                $this->pcol;

        echo "\n";
        $this->printLine();
    }
}

?>
