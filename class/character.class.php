<?php
   /** 
    * Character Sheet
    * 
    * PHP version 7.2
    * 
    * @category  Games
    * @package   Terrana
    * @author    Bruno José Spolavori <bspol.323@gmail.com>
    * @copyright 2018 Bruno José Spolavori
    * @license   terrana.ddns.net/license Copyrigth
    * @link      terrana.ddns.net
    */
    
class Character
{
    //##TODO Transfer all set code to a just one medoth with data loop
    protected $character = array();
    
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function _construct($character)
    {
        $this->character = $character;
    }
    
    /** 
     * Construction Function
     * 
     * @param player       $player       int
     * @param OnlyPlayable $onlyPlayable bool
     * 
     * @return null
     */
    function setPlayer($player, $onlyPlayable)
    {
        $this->character['player'] = $player;
        
        $this->character['onlyplayable'] = $onlyPlayable;
    }

    /** 
     * Construction Function
     * 
     * @param Name $name Character name
     * 
     * @return null
     */
    function setName($name)
    {
        $this->character['name'] = $name; 
    }
    
    /** 
     * Construction Function
     * 
     * @param race $race Character race
     * 
     * @return null
     */
    function setRace($race)
    {
        $this->character['race'] = $race;
    }
    
    /**
     * Construction Function
     * 
     * @param class $class Character class
     * 
     * @return null
     */
    function setClass($class)
    {
        $this->character['class'] = $class;
    }
    
    /********************************************************************
     * Construction Function
     * 
     * @param adventure $adventure belongs to adventure
     * 
     * @return null
     */
    function setAdventure($adventure)
    {
        $this->character['adventure'] = $adventure;
    }
    
    /** 
     * Construction Function
     * 
     * @param armor      $armor      int
     * @param focus      $focus      int
     * @param strength   $strength   int
     * @param ability    $ability    int
     * @param resistence $resistence int
     * @param accuracy   $accuracy   int
     * 
     * @return null
     */
    function setAspects($armor, $focus, $strength, $ability, $resistence, $accuracy)
    {
        $aspects = array(
            'armor' => $armor,
            'focus' => $focus,
            'strength' => $strength,
            'ability' => $ability,
            'resistence' => $resistence,
            'accuracy' => $accuracy
        );
        $this->character['aspects'] = json_encode($aspects, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
    }
    
    /** 
     * Construction Function
     * 
     * @param water    $water    int
     * @param air      $air      int
     * @param fire     $fire     int
     * @param ligth    $ligth    int
     * @param earth    $earth    int
     * @param darkness $darkness int
     * 
     * @return null
     */
    function setFocus($water, $air, $fire, $ligth, $earth, $darkness)
    {
        $focus = array(
            'water' => $water,
            'air' => $air,
            'fire' => $fire,
            'ligth' => $ligth,
            'earth' => $earth,
            'darkness' => $darkness
        );
        $this->character['focus'] = json_encode($focus, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
    }
    
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function setBenefit($benefit)
    {
        $this->character['benefits'] = json_encode($benefit, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
    }
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function addBenefit(){ }

    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function removeBenefit(){ }
    
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function setInjury($injury)
    {   
        $this->character['injurys'] = json_encode($injury, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
    }
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function addInjury(){ }

    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function removeInjury(){ }
    
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function setKnowledge($knowledge)
    {
        $this->character['knowledges'] = json_encode($knowledge, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
    }
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function addKnowledge(){ }
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function levelUpKnowledge(){ }
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function setHistory($history)
    {
        $this->character['history'] = $history;
    }
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function addHistory($data)
    {   
    }
    /** 
     * Construction Function
     * 
     * @param Character $character if have a formated array
     * 
     * @return null
     */
    function setLevel($level)
    {
        $this->character['level'] = $level; 
    }
    
    function setPoints($points, $hp, $hpr, $mp, $mpr, $sp, $spr, $gems, $gold, $silver, $copper, $paragon)
    {
        $data = array(
            'points' => $points,
            'hp' => $hp,
            'hpr' => $hpr,
            'mp' => $mp,
            'mpr' => $mpr,
            'sp' => $sp,
            'spr' => $spr,
            'gems' => $gems,
            'gold' => $gold,
            'silver' => $silver,
            'copper' => $copper,
            'paragon' => $paragon
        );
        $this->character['points'] = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK); 
    }
    
    function setSkills(){ }
    function addSkills(){ }
    function levelUpSkills(){ }
    function setMagics(){ }
    function addMagics(){ }
    function levelUpMagics(){ }
    function addItem($itemId){ }
    function removeItem($itemId){ }
    function levelUpItem($itemId){ }
    function addBank(){ }
    function removeBank(){ }
    
    function decrypt()
    {
        $data = base64_decode($cryptedCharacter);
        $dataToDecrypt = mb_substr($data, SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NPUBBYTES, null, '8bit');
        $IV = mb_substr($data, 0, SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NPUBBYTES, '8bit');
        
        $dataNoCrypt = '';
        //$key =  sodium_crypto_aead_chacha20poly1305_ietf_keygen();
        
        $TextoClaro = sodium_crypto_aead_chacha20poly1305_ietf_decrypt($dataToDecrypt, $dataNoCrypt, $IV, $key);
        echo "entrou";
        return $TextoClaro;
    }
    function encrypt()
    {
        global $cryptedCharacter;
        global $key;
        $dataToCrypt = json_encode($this->character);
        $dataNoCrypt = 'this is a rpg character file on terrana system'; 
        
        $IV = random_bytes(SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NPUBBYTES);
        $key =  sodium_crypto_aead_chacha20poly1305_ietf_keygen();
        
        $dataCrypted = sodium_crypto_aead_chacha20poly1305_ietf_encrypt($dataToCrypt, $dataNoCrypt, $IV, $key);
        
        $dataCrypted = base64_encode($IV . $dataCrypted);
        return $cryptedCharacter = $dataCrypted;
    }
    function getCharacter()
    {  
        return $this->character;
    }
}
?>