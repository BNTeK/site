<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Eve API class
 *
 * @author		V. Polyakov, BNTeKKZ@gmail.com
 * @copyright           Copyright (c) 2011. V. Polyakov, BNTeKKZ@gmail.com
 * @category            library
 */
class Eveapi {

    public static function server_status() {
        $xml = simplexml_load_file('http://api.eve-online.com/server/ServerStatus.xml.aspx');
        $data = array('onlinePlayers' => $xml->result->onlinePlayers,
            'ServerStatus' => $xml->result->serverOpen);
        return $data;
    }

    function apikeyinfo($keyID, $vCode) {
        $xml = simplexml_load_file("http://api.eve-online.com/account/APIKeyInfo.xml.aspx?keyID=$keyID&vCode=$vCode");
        if (!isset($xml->error)) {

            $data = array('characterID' => $xml->result->key->rowset->row->attributes()->characterID,
                'characterName' => $xml->result->key->rowset->row->attributes()->characterName,
                'corporationID' => $xml->result->key->rowset->row->attributes()->corporationID,
                'corporationName' => $xml->result->key->rowset->row->attributes()->corporationName);
            return $data;
        }
        else
            return FALSE;
    }

    function character_sheet($keyID, $vCode, $characterID) {
        if (!isset($xml->error)) {
            $xml = simplexml_load_file("http://api.eveonline.com/char/CharacterSheet.xml.aspx?keyID=$keyID&vCode=$vCode&CharacterID=$characterID");
            $sum = 0;
            foreach ($xml->result->rowset->row as $row) {
                $sum += $row['skillpoints'];
            }

            $race = $xml->result->race;
            $data = array('characterID' => $xml->result->characterID,
                'characterName' => $xml->result->name,
                'corporationID' => $xml->result->corporationID,
                'corporationName' => $xml->result->corporationName,
                'user_race' => "$race",
                'DoB' => $xml->result->DoB,
                'allianceName' => $xml->result->allianceName,
                'allianceID' => $xml->result->allianceID,
                'SP' => $sum);

            if ($data['allianceName'] == '') {
                $data['allianceName'] = 'NONE';
            }

            return $data;
        } else {
            return FALSE;
        }
    }

    function corp_sheet($keyID, $vCode) {
        $xml = simplexml_load_file("http://api.eveonline.com/corp/CorporationSheet.xml.aspx?keyID=$keyID&vCode=$vCode");

        $data = array('corporationID' => $xml->result->corporationID,
            'corporationName' => $xml->result->corporationName,
            'ticker' => $xml->result->ticker,
            'CEOid' => $xml->result->ceoID,
            'CEOname' => $xml->result->ceoName,
            'taxRate' => $xml->result->taxRate,
            'memberCount' => $xml->result->memberCount,
            'memberLimit' => $xml->result->memberLimit,
            'allianceName' => $xml->result->allianceName,
            'allianceID' => $xml->result->allianceID);

        return $data;
    }

}

/* End of file *.php */
?>