<?php
/**
 * Created by PhpStorm.
 * User: matthieuKoskas
 * Date: 14/03/2019
 * Time: 11:09
 */

namespace App;

class Utilisateur
{
    const USER_MAX_QUOTA = 1000;

    private $id;
    private $login;
    private $quotaRemaining;
    private $mdp;

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getQuotaRemaining()
    {
        return $this->quotaRemaining;
    }

    /**
     * @param mixed $quotaRemaining
     */
    public function setQuotaRemaining($quotaRemaining)
    {
        $this->quotaRemaining = $quotaRemaining;
    }

    /**
     * Utilisateur constructor.
     * @param $id
     * @param $login
     * @param $quotaRemaining
     * @param $mdp
     */
    public function __construct(string $login, int $quotaRemaining, string $mdp, string $id = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->quotaRemaining = $quotaRemaining;
        $this->mdp = $mdp;
    }

    /**
     * Utilisateur constructor.
     * @param $id
     * @param $login
     * @param $quotaRemaining
     * @param $mdp
     */
}