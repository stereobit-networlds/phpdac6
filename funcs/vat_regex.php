<?php 
//This is a function that uses regular expressions to match against the various VAT formats required across the EU. 
/** 
 * @param integer $country Country name 
 * @param integer $vat_number VAT number to test e.g. GB123 4567 89 
 * @return integer -1 if country not included OR 1 if the VAT Num matches for the country OR 0 if no match 
*/ 
function checkVatNumber( $country, $vat_number ) { 
    switch($country) { 
        case 'Austria': 
            $regex = '/^(AT){0,1}U[0-9]{8}$/i'; 
            break; 
        case 'Belgium': 
            $regex = '/^(BE){0,1}[0]{0,1}[0-9]{9}$/i'; 
            break; 
        case 'Bulgaria': 
            $regex = '/^(BG){0,1}[0-9]{9,10}$/i'; 
            break; 
        case 'Cyprus': 
            $regex = '/^(CY){0,1}[0-9]{8}[A-Z]$/i'; 
            break; 
        case 'Czech Republic': 
            $regex = '/^(CZ){0,1}[0-9]{8,10}$/i'; 
            break; 
        case 'Denmark': 
            $regex = '/^(DK){0,1}([0-9]{2}[\ ]{0,1}){3}[0-9]{2}$/i'; 
            break; 
        case 'Estonia': 
        case 'Germany': 
        case 'Greece': 
        case 'Portugal': 
            $regex = '/^(EE|EL|DE|PT){0,1}[0-9]{9}$/i'; 
            break; 
        case 'France': 
            $regex = '/^(FR){0,1}[0-9A-Z]{2}[\ ]{0,1}[0-9]{9}$/i'; 
            break; 
        case 'Finland': 
        case 'Hungary': 
        case 'Luxembourg': 
        case 'Malta': 
        case 'Slovenia': 
            $regex = '/^(FI|HU|LU|MT|SI){0,1}[0-9]{8}$/i'; 
            break; 
        case 'Ireland': 
            $regex = '/^(IE){0,1}[0-9][0-9A-Z\+\*][0-9]{5}[A-Z]$/i'; 
            break; 
        case 'Italy': 
        case 'Latvia': 
            $regex = '/^(IT|LV){0,1}[0-9]{11}$/i'; 
            break; 
        case 'Lithuania': 
            $regex = '/^(LT){0,1}([0-9]{9}|[0-9]{12})$/i'; 
            break; 
        case 'Netherlands': 
            $regex = '/^(NL){0,1}[0-9]{9}B[0-9]{2}$/i'; 
            break; 
        case 'Poland': 
        case 'Slovakia': 
            $regex = '/^(PL|SK){0,1}[0-9]{10}$/i'; 
            break; 
        case 'Romania': 
            $regex = '/^(RO){0,1}[0-9]{2,10}$/i'; 
            break; 
        case 'Sweden': 
            $regex = '/^(SE){0,1}[0-9]{12}$/i'; 
            break; 
        case 'Spain': 
            $regex = '/^(ES){0,1}([0-9A-Z][0-9]{7}[A-Z])|([A-Z][0-9]{7}[0-9A-Z])$/i'; 
            break; 
        case 'United Kingdom': 
            $regex = '/^(GB){0,1}([1-9][0-9]{2}[\ ]{0,1}[0-9]{4}[\ ]{0,1}[0-9]{2})|([1-9][0-9]{2}[\ ]{0,1}[0-9]{4}[\ ]{0,1}[0-9]{2}[\ ]{0,1}[0-9]{3})|((GD|HA)[0-9]{3})$/i'; 
            break; 
        default: 
            return -1; 
            break; 
    } 
    
    return preg_match($regex, $vat_number); 
} 
?>