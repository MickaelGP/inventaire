<?php

namespace App;

class Aliments{
    private $id;

    private $aliments;

    private $quantites;

    private $dates;
    

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAliments() {
		return $this->aliments;
	}
	
	/**
	 * @param mixed $aliments 
	 * @return self
	 */
	public function setAliments($aliments): self {
		$this->aliments = $aliments;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getQuantites() {
		return $this->quantites;
	}
	
	/**
	 * @param mixed $quantites 
	 * @return self
	 */
	public function setQuantites($quantites): self {
		$this->quantites = $quantites;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDates() {
		return $this->dates;
	}
	
	/**
	 * @param mixed $dates 
	 * @return self
	 */
	public function setDates($dates): self {
		$this->dates = $dates;
		return $this;
	}
}