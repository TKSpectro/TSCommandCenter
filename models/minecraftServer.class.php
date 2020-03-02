<?php


class minecraftServer
{
    protected $id;
    protected $version;
    protected $name;
    protected $dirPath;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDirPath()
    {
        return $this->dirPath;
    }

    public function setDirPath($dirPath)
    {
        $this->dirPath = $dirPath;
    }
}