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

const SAVE_PATH = '../characters/';
const EXTENSION = '.char';

class Character
{
    //##TODO Transfer all set code to a just one medoth with data loop
    protected $character = array();
    protected $key;
    public $cryptedCharacter;
    
    
    function _construct($character)
    {
        $this->character = $character;
    }
    
    
    function setPlayer($player, $allowAsNPC)
    {
        $this->character['player'] = $player;
        
        $this->character['allowasnpc'] = $allowAsNPC;
    }
    
    
    function setName($name)
    {
        $this->character['name'] = $name; 
    }
    
    
    function setRace($race)
    {
        $this->character['race'] = $race;
    }
    
    
    function setClass($class)
    {
        $this->character['class'] = $class;
    }
    
    
    function setAdventure($adventure)
    {
        $this->character['adventure'] = $adventure;
    }
    
    function setAspects($armor, $focus, $strength, $ability, $resistence, $accuracy)
    {
        $data = array(
            'armor' => $armor + 0,
            'focus' => $focus + 0,
            'strength' => $strength + 0,
            'ability' => $ability + 0,
            'resistence' => $resistence + 0,
            'accuracy' => $accuracy + 0
        );
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['aspects'] = $data;
    }
    
    function setFocus($water, $air, $fire, $ligth, $earth, $darkness)
    {
        $data = array(
            'water' => $water + 0,
            'air' => $air + 0,
            'fire' => $fire + 0,
            'ligth' => $ligth + 0,
            'earth' => $earth + 0,
            'darkness' => $darkness + 0
        );
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['focus'] = $data;
    }
    
    
    function setBenefit($data)
    {
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['benefits'] = $data;
    }
    function addBenefit(){ }
    function removeBenefit(){ }
    
    function setInjury($data)
    {   
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['injurys'] = $data;
    }
    function addInjury(){ }
    function removeInjury(){ }
    
    function setKnowledge($data)
    {
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['knowledges'] = $data;
    }
    function addKnowledge(){ }
    function levelUpKnowledge(){ }
    
    function setHistory($history)
    {
        $this->character['history'] = $history;
    }
    
    function addHistory($data)
    {   
    }
    
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
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);  
        $this->character['points'] = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK); 
    }
    
    function setSkills($data){
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['skills'] = $data;
    }
    function addSkills(){ }
    function levelUpSkills(){ }
    
    function setMagics($data){  
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['magics'] = $data;
    }
    function addMagics(){ }
    function levelUpMagics(){ }
    
    function setItens($data){
        $data = json_encode($data, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
        $data = str_replace('"', "'", $data);
        $this->character['itens'] = $data;
    }
    function addItem($itemId){ }
    function removeItem($itemId){ }
    function levelUpItem($itemId){ }
    function addBank(){ }
    function removeBank(){ }
    
    function decrypt()
    {
        $data = base64_decode($this->cryptedCharacter);
        $dataToDecrypt = mb_substr($data, SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NPUBBYTES, null, '8bit');
        $IV = mb_substr($data, 0, SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NPUBBYTES, '8bit');
        
        $dataNoCrypt = $this->character['id']; 
        
        $data = sodium_crypto_aead_chacha20poly1305_ietf_decrypt($dataToDecrypt, $dataNoCrypt, $IV, $this->key);
        return $data;
    }
    
    function encrypt()
    {   
        $dataToCrypt = json_encode($this->character);
        $dataNoCrypt = $this->character['id']; 
        
        $IV = random_bytes(SODIUM_CRYPTO_AEAD_CHACHA20POLY1305_IETF_NPUBBYTES);
        $key =  sodium_crypto_aead_chacha20poly1305_ietf_keygen();
        
        $dataCrypted = sodium_crypto_aead_chacha20poly1305_ietf_encrypt($dataToCrypt, $dataNoCrypt, $IV, $key);
        
        $this->key = $key;
        $this->cryptedCharacter = base64_encode($IV . $dataCrypted);
        return $this->cryptedCharacter;
    }
    
    function save(){
        $this->encrypt();
        
        $character['name'] = $this->character['name'];
        $character['allowasnpc'] = $this->character['allowasnpc'];
        $character['ckey'] = base64_encode($this->key);
        $character['ccharacter'] = $this->cryptedCharacter;
        
        $file = SAVE_PATH.$character['player'].$character['name'].EXTENSION;

        if($file = fopen($file, 'w')){
            fputs($file, $character['name'].PHP_EOL);
            fputs($file, $character['allowasnpc'].PHP_EOL);
            fputs($file, $character['ckey'].PHP_EOL);
            fputs($file, $character['ccharacter'].PHP_EOL);
            fclose();
        }
        return DBInsert('character', $character);
    }
    
    function getCharacter()
    {  
        return json_encode($this->character);
    }
}
?>