<?php

namespace App\Repositories\Ultra;

class UltraUser
{
    /**
     * @var int
     */
    protected $moodleId;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var string
     */
    protected $boardOfDirector;

    /**
     * @var string
     */
    protected $function;

    /**
     * @var string
     */
    protected $division;

    /**
     * @var string
     */
    protected $area;

    /**
     * @var string
     */
    protected $subarea;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var boolean
     */
    protected $cfh;

    /**
     * @var boolean
     */
    protected $active;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
