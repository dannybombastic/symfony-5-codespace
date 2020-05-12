<?php

declare(strict_types=1);

namespace App\From\Articulos;



class ArticulosForm
{

    protected string $articuleTitle = '';
    protected $articuleEval = null;
    protected $articuleVisitCnt = null;


    /**
     * Get the value of articuleTitle
     */
    public function getArticuleTitle()
    {
        return $this->articuleTitle;
    }

    /**
     * Set the value of articuleTitle
     *
     * @return  self
     */
    public function setArticuleTitle($articuleTitle)
    {
        $this->articuleTitle = $articuleTitle;

        return $this;
    }

    /**
     * Get the value of articuleEval
     */
    public function getArticuleEval()
    {
        return $this->articuleEval;
    }

    /**
     * Set the value of articuleEval
     *
     * @return  self
     */
    public function setArticuleEval($articuleEval)
    {
        $this->articuleEval = $articuleEval;

        return $this;
    }

 

    /**
     * Get the value of articuleVisitCnt
     */ 
    public function getArticuleVisitCnt()
    {
        return $this->articuleVisitCnt;
    }

    /**
     * Set the value of articuleVisitCnt
     *
     * @return  self
     */ 
    public function setArticuleVisitCnt($articuleVisitCnt)
    {
        $this->articuleVisitCnt = $articuleVisitCnt;

        return $this;
    }
}
