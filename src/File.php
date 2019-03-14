<?php
/**
 * Created by PhpStorm.
 * User: matthieuKoskas
 * Date: 14/03/2019
 * Time: 11:11
 */

namespace App;

class File
{
    private $id;
    private $name;
    private $numberDownloads;
    private $size;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNumberDownloads()
    {
        return $this->numberDownloads;
    }

    /**
     * @param mixed $numberDownloads
     */
    public function setNumberDownloads($numberDownloads)
    {
        $this->numberDownloads = $numberDownloads;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * File constructor.
     * @param $name
     * @param $numberDownloads
     * @param $size
     * @param $id
     */
    public function __construct(string $name, int $numberDownloads, int $size,string $id = null)
    {
        $this->name = $name;
        $this->numberDownloads = $numberDownloads;
        $this->size = $size;
        $this->id = $id;
    }
}