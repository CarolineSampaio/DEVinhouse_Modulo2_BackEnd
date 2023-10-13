<?php

class Enemy
{
    protected $id;
    protected $name;
    protected $life;
    protected $damage;
    protected $defese;
    protected $level;
    protected $type;

    public function __construct($type)
    {
        $this->id = uniqid();
        $this->type = $type;
    }

    public function save()
    {
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLife()
    {
        return $this->life;
    }

    public function setLife($life)
    {
        $this->life = $life;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function setDamage($damage)
    {
        $this->damage = $damage;
    }


    public function getDefese()
    {
        return $this->defese;
    }

    public function setDefese($defese)
    {
        $this->defese = $defese;
    }

    public function getLevel()
    {
        return $this->level;
    }


    public function setLevel($level)
    {
        $this->level = $level;
    }


    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function atacar()
    {
        echo "ATACANDO";
    }
}
