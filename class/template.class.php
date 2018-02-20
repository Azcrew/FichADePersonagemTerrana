<?php
	class Template 
	{
		protected $file;
		protected $values = array();

		public function __construct($file) 
		{
			$this->file = $file;
		}
		
		public function set($key, $value) 
		{
			$this->values[$key] = $value;
		}
		
        public function add($key, $value)
        {
            $this->values[$key] = $this->values[$key].$value;
        }

		public function output() 
		{
			if (!file_exists($this->file)) 
			{
				return false;
			}
			$output = file_get_contents($this->file);
	 
			foreach ($this->values as $key => $value) 
			{
				$tag = '{'.$key.'}';
                $output = str_replace($tag, $value, $output);
			}
	 
		return $output;
		}
	}
?>